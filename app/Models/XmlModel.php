<?php

namespace App\Models;

use SimpleXMLElement;
use Illuminate\Support\Str;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Support\Facades\Storage;

class XmlModel extends Model
{
    use HasFactory;
    public function xmlToJson() {
        //$url   =   file_get_contents("/storage/uploads/23/2397100/xml/aa.xml");
        //$xmlFile = simplexml_load_file($url);
        $xmlFile = simplexml_load_file('storage/uploads/23/2397100/xml/aa.xml');
        $json = json_encode($xmlFile);
        $array = json_decode($json,TRUE);

        return $array;
    }

    public function kontakty($file) {
     
        $xmlFile = simplexml_load_file($file);
        $json = json_encode($xmlFile);
        $data = json_decode($json,TRUE);

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
        
                return $hodnoty;
                

    }
}
