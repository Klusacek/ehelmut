<?php

namespace App\Http\Controllers;


use Illuminate\Http\Request;

class Files extends Controller
{
    //
    function list(Request $request ) {
        return view ('files', [
            'siteName' => "Soubory zakázky $request->id : František",
            'order'   => $request->id,
        ]);
       }

   // posledni zavorka 
}
