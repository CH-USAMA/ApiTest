<?php
namespace App\Helpers;

class PriceHelper {
    public static function format($amount, $currency = 'PKR') {
        return number_format($amount, 2) . " $currency";
    }
}

