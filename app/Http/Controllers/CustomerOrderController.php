<?php

namespace App\Http\Controllers;

use App\Models\CustomerContact;
use App\Models\CustomerOrder;
use Faker\Core\DateTime;
use Illuminate\Http\Request;
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
        $order    = CustomerOrder::find($id);
        $kontakt     = CustomerContact::find($id) ; 

    return view ('zakazka_detail', [
        'siteName' => "Detail zakázky $order->orderNum : František",
        'order'   => $order,
        'id'  => $id,
        'kontakt'    => $kontakt
    ]);
   }
   
    // poslední zavorka
}
