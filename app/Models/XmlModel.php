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
    function xmlData($file) {

        $xml = simplexml_load_file($file);
        $ordernum =$xml->CustomerBusiness; // přečtění ordernum

        foreach ($xml->Headings->Heading as $rubrika) {
			$rubrika_nazev = $rubrika['Name'];
			
			foreach($rubrika->Items->Item as $kod){
                $data 		=	"";
                $dvereBarva =   "";
                $korpusBarva = "";
				//$ordernum =(string) $data['ordernum'];
				$number = (string) $kod->Number;
				$reference =  (string) $kod['KeyRef'];
				$popisek =  (string) $kod->Description;
				if($kod->ModifiedDescription) $popisek = $kod->ModifiedDescription;
				$mnozstvi = (string) $kod->Quantity;
				//$rubrika =  (string) $kod->Topic;
				$rubrika =  (string) $rubrika_nazev;
				$dodavatel_kod =  (string) $kod->SupplierCode;
				$katalog_name =  (string) $kod->CatalogName;
				$catalog_active	=	(string) $kod->CatalogCode;
				$model_name = (string) $kod->Model['Name'];
				$dvere = $kod->xpath('./Detail[@Type=26]/Name');
				//$dvere = (string) $dvere . $kod->xpath('./Detail[@Type=2]/Name')[0]; // toto je pro RECOR
				$korpus	= $kod->xpath('./Detail[@Type=3]/Name');
				//$provedeni	=	(string) $kod->xpath('./Detail[@Type=1]/Name')[0]; 
				$dx = 	(string)	$kod->Dx;
				$dy	=	(string)	$kod->Dy;
				$dz	=	(string)	$kod->Dz;
				$id_poznamky =  (string) $kod['KeyRef'];
				$cena_nakup_kd = (string)  $kod->PurchasePriceItemHnk;
				if(!isset($kod->PurchasePriceItemHnk)) $cena_nakup_kd = (string) $kod->PurchasePrice;
				$cena_prodej =   ($kod->SellPrice[2] );
				$cena_prodej_dph =  ($kod->SellPrice[3]);
				if (!empty($dvere))  {
                    $dvereBarva = $dvere[0];
                    unset($dvere);
                }
				if (!empty($korpus))  {
                    $korpusBarva = $korpus[0];
                    unset($korpus);
                }
				//if ($catalog_active == "stop" ) $katalog_name = $katalog_name . "-SKONČIL!";
				//if ($provedeni)  $popisek = $popisek . " **** Provedení:". $provedeni;
		
				$data = array(
					'orderNum' => $ordernum, 
					//'item_id' => $number,
					'kod'=> $reference,
					'popis'=> $popisek,
					'kus'=> $mnozstvi,
					'dodavatelKod'=> $dodavatel_kod,
					'katalog'=> $katalog_name,
                    'rubrika' => $rubrika,
                    'modelName' => $model_name,
					'nakupKd'=> $cena_nakup_kd,
					'barvaDvere' => $dvereBarva,
					'barvaKorpus' => $korpusBarva,
					'prodej'=> $cena_prodej,
					'prodejDph'=> $cena_prodej_dph	
				);
				
                CustomerOrderItem::Create($data);
                

						//kontrola jesli není subitems
                        if ($kod->SubItems->SubItem){
                            foreach ($kod->SubItems->SubItem as $subitem ) {
                                $dvereBarva     =   "";
                                $korpusBarva    =   "";
                                    $reference =  (string) $subitem['KeyRef'];
                                    $popisek =  (string) $subitem->Description;
                                    if($subitem->ModifiedDescription) $popisek = $subitem->ModifiedDescription;
                                    $mnozstvi = (string) $subitem->Quantity;
                                    //$rubrika =  (string) $subitem->Topic;
                                    $rubrika =  (string) $rubrika_nazev;
                                    $dodavatel_kod =  (string) $subitem->SupplierCode;
                                    $katalog_name =  (string) $subitem->CatalogName;
                                    $catalog_active	=	(string) $kod->CatalogCode;
                                    $model_name = (string) $subitem->Model['Name'];
                                    $dvere = $subitem->xpath('./Detail[@Type=26]/Name');
                                    $korpus	= $subitem->xpath('./Detail[@Type=3]/Name');
    
                                    $cena_nakup_kd = (string)  $subitem->PurchasePriceItemHnk;
                                    if(!$cena_nakup_kd) $cena_nakup_kd = (string) $subitem->PurchasePrice;
                                    $cena_prodej =   ($subitem->SellPrice[2] );
                                    $cena_prodej_dph =  ($subitem->SellPrice[3] );
                                    if (!empty($dvere))  {
                                        $dvereBarva = $dvere[0];
                                        unset($dvere);
                                    }
                                    if (!empty($korpus))  {
                                        $korpusBarva = $korpus[0];
                                        unset($korpus);
                                    }
                                    //if ($catalog_active = "stop") $katalog_name = $katalog_name . "-*SKONČIL!";
    
                                    $data = array(
                                        'orderNum' => $ordernum, 
                                        //'item_id' => $number,
                                        'kod'=> $reference,
                                        'popis'=> $popisek,
                                        'kus'=> $mnozstvi,
                                        'dodavatelKod'=> $dodavatel_kod,
                                        'katalog'=> $katalog_name,
                                        'rubrika' => $rubrika,
                                        'modelName' => $model_name,
                                        'nakupKd'=> $cena_nakup_kd,
                                        'barvaDvere' => $dvereBarva,
                                        'barvaKorpus' => $korpusBarva,
                                        'prodej'=> $cena_prodej,
                                        'prodejDph'=> $cena_prodej_dph	
                                    );
                                    
                                    CustomerOrderItem::Create($data);
                                    
                            }
                            
                       }
			 }

			}

    }

    function xmlOrderNum_test($file, $ordernum) {
        $xml = simplexml_load_file($file); // načtení XML
        $xml_cislo =  $xml->CustomerBusiness; // přečtění ordernum
        // pokud nesoulkasí čísla
        if ($xml_cislo != $ordernum) {
            $message =  "Snažíte se nahrát XML s číslem: $xml_cislo do dokumentů objednávky: $ordernum. Vyberte správnou objednávku nebo opravte číslo objednávky v KD a znovu nahrajte XML se správným číslem.";
            $stav = 0;
        }
        // pokud není vyplněno číslo
        if (!$xml_cislo) {
            $message =  "Nevyplnili jste číslo objednávky: $ordernum v KD. Doplňte číslo objednávky v KD a znovu nahrajte XML";
            $stav = 0;
        }
        // pokud je vše ok
        if ($xml_cislo == $ordernum) {
            $message = "";
        }
        //unlink($uploadfile); // smazání temp souboru
        //fclose($file);
 
        return $message;	
       }

            


    // poslední závorka
}
