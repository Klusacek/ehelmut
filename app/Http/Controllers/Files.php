<?php

namespace App\Http\Controllers;


use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class Files extends Controller
{
    //
    function list(Request $request ) {
        return view ('files', [
            'siteName' => "Soubory zakázky $request->id : František",
            'order'   => $request->id,
        ]);
       }


       public function store(Request $request)
    {

        
        // $request->validate([
        //     'file' => 'required|file|mimes:xml|max:20048', // Max velikost souboru 2 MB
        // ]);
        
        if ($request->hasFile('file')) {
            $file = $request->file('file');

            // Uložit soubor do adresáře public/upload
            $path = $file->store('uploads', 'public');
            

            // Když chcete získat absolutní cestu, použijte:
             $path = Storage::url($path);

            // Můžete také získat URL k souboru:
            // $url = asset('storage/' . $path);

            return redirect()->back()->with('success', 'Soubor byl úspěšně nahrán.' );
        }
        return redirect()->back()->with('error', 'Nepodařilo se nahrát soubor.');
    }

   // posledni zavorka 
}
