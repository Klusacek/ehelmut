<?php

namespace App\Http\Controllers;

use SimpleXMLElement;
use App\Models\XmlModel;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use App\Models\CustomerContact;

class XmlController extends Controller
{
    function xmlToJson ($id){
               
        $model      =   new XmlModel();
        $data       =   $model->xmlToJson();
        // pokud je vyplneno ičo
        if (isset($data['CustomerAddress3'])){
            $ico    =   Str::slug($data['CustomerAddress3']);
            $ico    =   str_replace(array(':', ',', 'ico', 'dic', '-'),'',$ico);
            $ico    =   str_replace('cz',';CZ',$ico);
            $ico    =   explode(';',$ico);
            
            $hodnoty['ico'] = $ico[0];
            $hodnoty['dic'] = $ico[1];
        };
        // pokud je vyplněna firma
        if (isset($data['CustomerCompany'])){
            $ocistitFirma = preg_replace('/[0-9]{7}/', '', $data['CustomerCompany']);

            $hodnoty['firma'] =  $ocistitFirma;
        };
        // ocistit prijmeni
        if (isset($data['CustomerName'])){
            $ocistitName = preg_replace('/[0-9]{7}/', '', $data['CustomerName']);
            
            $hodnoty['prijmeni'] = $ocistitName;
        };
        // očitit jmeno
        if (isset($data['CustomerFirstName'])){
            $ocistitFName = preg_replace('/[0-9]{7}/', '', $data['CustomerFirstName']);
            $hodnoty['jmeno'] =  $ocistitFName;
        };
        // pocistit telefony
        if(isset($data['CustomerTel1'])){
            $tel    =   $data['CustomerTel1'];
            $tel    =   str_replace(' ', '',$tel);
            $hodnoty['tel'] =  $tel;
        };
        //pridat adresu ulice pokud je
        if(isset($data['CustomerAddress1'])){
            $ulice = $data['CustomerAddress1'];
            $hodnoty['ulice'] =  $ulice;
        };
        //pridat mesto pokud je
        if(isset($data['CustomerAddress2'])){
            $mesto = $data['CustomerAddress2'];
            $hodnoty['mesto'] =  $mesto;
        };
        //pridat email pokud je
        if(isset($data['CustomerEmail'])){
            $email = $data['CustomerEmail'];
            $hodnoty['email'] =  $email;
        };        

        CustomerContact::updateOrCreate(['id'=>$id],$hodnoty);
        
        return redirect()->route('zakazkaDetail', ['id' => $id]);
    }
}