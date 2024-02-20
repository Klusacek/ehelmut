<?php

namespace App\Helpers;

class KorunyHelper
{
    public static function formatCurrency($amount, $decimals = 2, $decimalSeparator = ',', $thousandsSeparator = ' ')
    {
        return 'Částka: ' . number_format($amount, $decimals, $decimalSeparator, $thousandsSeparator) . ' Kč';
    }
}