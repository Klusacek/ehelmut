<?php

namespace App\Http\Controllers;

use App\Models\CustomerContact;
use Illuminate\Http\Request;

class CustomerContactController extends Controller
{
    function update(Request $request)  {
        
        $id = $request->input('id');

        // todo: dodělat validaci, minimálně telefonu a emailu
        CustomerContact::updateOrCreate(['id'=>$id],[
        
            'firma' =>  $request->input('firma'),
            'ico' =>  $request->input('ico'),
            'dic' =>  $request->input('dic'),
            'jmeno' =>  $request->input('jmeno'),
            'prijmeni' =>  $request->input('prijmeni'),
            'tel' =>  $request->input('tel'),
            'email' =>  $request->input('email'),
            'ulice' =>  $request->input('ulice'),
            'mesto' =>  $request->input('mesto'),
            'psc' =>  $request->input('psc'),
        ]);

        return redirect()->route('zakazkaDetail', ['id' => $id]);
    }
}
