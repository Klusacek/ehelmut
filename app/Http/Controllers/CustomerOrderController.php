<?php

namespace App\Http\Controllers;

use App\Models\Sites;
use App\Models\Comment;
use App\Models\Developer;
use App\Models\OrdersTypes;
use Illuminate\Http\Request;
use App\Models\CustomerOrder;
use App\Models\CenaOrderModel;
use App\Models\CustomerContact;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;


class CustomerOrderController extends Controller
{

    

    public function index(){
        
       $zakazky = CustomerOrder::orderBy('cas','desc')->paginate ();
       return view ('zakazky', [
            'siteName' => 'Zakázky list : František',
            'zakazky'   => $zakazky
        ]);

    }

    public function new (){

        return view('zakazka_new',
        ['siteName' => 'Nová zakázka : František']);
    }

    public function store (Request $request) {

        $request ->validate([
            'jmeno' =>'required|min:3',
            'prijmeni' =>'required|min:3'
        ]
        );

        $prenosDPH = 0 ;                        // vychozí hodnota pro zakázku je že se nejednám o přenos

        $firma      = $request->input('firma') ;
        $jmeno      = ucwords($request->input('jmeno')). " " ;
        $prijmeni   = ucwords($request->input('prijmeni')) ;

        if ($firma) {                           // pokud se jedná o firmu je to přenesená DPH  a upravím název zakázky aby to bylop přehledné
                    $prenosDPH  = 1; 
                    $firma      = strtoupper($firma) . " ("  ;
                    $prijmeni   = $prijmeni . ")" ;
        } 
               
        $orderNum = CustomerOrder::max('orderNum') + 100; // vybere nejvyšší hodnotu

        $data = new CustomerOrder([
            'orderNum'      => $orderNum,
            'oznaceni'      => $firma . $jmeno . $prijmeni,
            'idKontakt'     => 1,                           // klient z ulice, vracenící se, ZRUŠIT BUDE V RÁMCI DEVELOP
            'prenosDPH'     => $prenosDPH,
            'typ'           => 1,                           // typ objednávky, zde vždy hlavní, tedy 00
            'druh'          => 1,                           // kuchyně, obývák, kompet interier, (CD), skříně apod
            'user'          => Auth::user()->id,            // aktuálně přihlášený uživatel
            'provozovna'    => Auth::user()->idProvozovna,  // aktuálně přihlášený uživatel provozovna
            'developer'     => 1,
        ]);

        $data->save();

        return redirect()->route('zakazkyList');
    }

    public function find (Request $request){

        $hledejCo   =   $request->input('zakazkaSearch');
              
        $zakazky    =   CustomerOrder::orWhere('orderNum','like',$hledejCo.'%')
                                     ->orWhere('oznaceni','like','%'.$hledejCo.'%')
                                     ->paginate();
       

        return view ('zakazky', [
            'siteName' => 'Zakázky list : František',
            'zakazky'   => $zakazky,
            'hledej'    => $hledejCo
        ]);
    }

   function detail($id) {
        $order          =   CustomerOrder::find($id);    
        $kontakt        =   CustomerContact::find($id) ; 
        $cenyModel      =   new CenaOrderModel;
        $ceny           =   $cenyModel->sumarizace($order->orderNum);  
        $poznamky       =   Comment::where('orderNum',$order->orderNum)->get()->sortByDesc('cas');

      

    return view ('zakazka_detail', [
        'siteName' => "Detail zakázky $order->orderNum : František",
        'order'   => $order,
        'id'  => $id,
        'kontakt'    => $kontakt,
        'ceny' => $ceny,
        'poznamky'  => $poznamky,
    ]);

    
   }

   function poznamkaNew(Request $request) {

    $request ->validate([
        'poznamka' =>'required|min:1'
    ]);

    $id = $request->input('idOrder');

    $poznamka = new Comment([
        'user'          =>  Auth::user()->id,            // aktuálně přihlášený uživatel
        'orderNum'      =>  $request->input('orderNum'),
        'poznamka'      =>  $request->input('poznamka'),
        'idOrder'       =>  $id
    ]);

    $poznamka->save();

    return redirect()->route('zakazkaDetail', ['id' => $id]);

   }

   function detailEdit($orderNum) {
    $order          =   CustomerOrder::where('orderNum', $orderNum)->first();
    $developers     =   Developer::where('active', 1)->get();
    $users          =   db::table('users')->select('id','prijmeni')->where('active', 1)->get();
    $sites          =   Sites::all();
    $types          =   OrdersTypes::all();

   
    return view ('zakazka_oprava', [
        'siteName' => "Zakázka $orderNum oprava : František",
        'zakazka'   => $order,
        'developers' => $developers,
        'users'     =>  $users,
        'provozovny'  => $sites,
        'types'  => $types,
    ]);
   }

   function detailEditStore($ordernum, Request $request){

        CustomerOrder::where('orderNum',$ordernum)
                        ->update([
                            'user' => $request->input('user'),
                            'druh' => $request->input('druh'),
                            'provozovna' => $request->input('provozovna'),
                            'developer' => $request->input('developer'),
                        ]);

                        return redirect()->back();
   }


    // poslední zavorka
}
