<?php

namespace App\Http\Controllers;


use App\Models\XmlModel;
use Illuminate\Http\Request;
use App\Models\CustomerContact;
use Illuminate\Support\Facades\Storage;

class Files extends Controller
{
    //
    function list(Request $request ) {
        return view ('files', [
            'siteName' => "Soubory zakázky $request->orderNum : František",
            'order'   => $request->orderNum,
            'id'    => $request->id

        ]);
       }


       public function store(Request $request)
    {

        
        // $request->validate([
        //     'file' => 'required|file|mimes:xml|max:20048', // Max velikost souboru 2 MB
        // ]);
        
        if ($request->hasFile('file')) {
            $file       =   $request->file('file');
            $fileType   =   $request->file('file')->getMimeType();
            $orderNum   =   $request->orderNum;
            $id         =   $request->id;
            $prefix     =   substr($orderNum,0,2);
            $path       =   "public/uploads/$prefix/$orderNum";

            // vytvořit adresar a podadresar není nutné . vytvoří to storage::put
            //Storage::makeDirectory($path);

            if ($fileType =="text/xml"){
            // kotrola jestli lze nahrát XML. Tedy jestli je již zboží objednáno 
            
            // Storage::putFileAs($path, $file, 'xml.xml');
            $path     =  $path."/xml";
            $cestaXml =  Storage::put($path, $file);
            $cestaXml    = str_replace("public","storage",$cestaXml);   //todo toto je nahrazeni public na storage natvrdo. Je potřeba to nastudovat, protože ctečka XML nedokáže přistupovat na public a potřebuje storage.
            $data    = new XmlModel(); 
            $kontakty = $data->kontakty("$cestaXml");
            
            // kontrola jestli je nahráváno  správné XML -> se správným číslem
               // Kontrola jestli existuje záznam v kontaktech a rozhodnití jestli přepsat
               $exist   = CustomerContact::find($id); 
               if(!$exist){
                   // nahrání kontaktu pokud neexistuje
                   CustomerContact::updateOrCreate(['id'=>$id],$kontakty);
               };
                  
            }

            if ($fileType =="image/jpeg"){
                $path     =  $path."/jpg";
                Storage::put($path, $file);
             }
            
            if ($fileType =="application/msword" || $fileType == "application/pdf"){
                $path     =  $path."/dokundace";
                Storage::put($path, $file);
             } 

            // Uložit soubor do adresáře public/upload
            //$path = $file->store('uploads', 'public');
            
            
            // Když chcete získat absolutní cestu, použijte:
            // $path = Storage::url($path);

            // Můžete také získat URL k souboru:
            // $url = asset('storage/' . $path);

            return redirect()->back()->with('success', 'Soubor byl úspěšně nahrán.');
        }
        return redirect()->back()->with('error', 'Nepodařilo se nahrát soubor.');
    }

   // posledni zavorka 
}
