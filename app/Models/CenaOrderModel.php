<?php

namespace App\Models;

use Illuminate\Support\Facades\DB;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Psy\CodeCleaner\IssetPass;

class CenaOrderModel extends Model
{
    use HasFactory;
    public function Sumarizace ($orderNum)  {
        $ceny                   =   DB::table('sum_customer_order_prices')->where('orderNum', $orderNum)->first();
        // počítej pouze pokud je vráceno něco
        if(isset($ceny)) {                
            $ceny->objednanoPerc    =   100*($ceny->objednanoCount/$ceny->itemsCount);
            $ceny->dodanoPerc       =   100*($ceny->dodakCount/$ceny->itemsCount);
        };
        return $ceny;
    }
}
