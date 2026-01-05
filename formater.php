<?php

class Formater{
    public static function currency(float $amount){
        if($amount >= 1_000_000){
            return round($amount / 1_000_000, 1) . 'M €';
        }
        elseif($amount >= 1_000){
            return round($amount / 1_000, 1) . 'k €';
        }else{
            return $amount . '€';
        }
    }
}

?>