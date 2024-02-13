<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use SimpleXMLElement;

class XmlModel extends Model
{
    use HasFactory;
    public function xmlToJson() {
        $xmlFile = simplexml_load_file('upload/xml.xml');
        $json = json_encode($xmlFile);
        $array = json_decode($json,TRUE);

        return $array;
    }
}
