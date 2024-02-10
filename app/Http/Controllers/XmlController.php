<?php

namespace App\Http\Controllers;

use App\Models\XmlModel;
use Illuminate\Http\Request;
use SimpleXMLElement;

class XmlController extends Controller
{
    function xmlToJson (){
       
        $xmlFile = simplexml_load_file('upload/xml.xml');

        return response()->json($xmlFile);
    }
}
