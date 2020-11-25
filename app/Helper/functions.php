<?php

if (!function_exists('number_price1'))
{
    function number_price1($price, $sale_price)
    {
        if ($sale_price<1)
        {
            return 0;
        }
        $price1 = (($price - $sale_price)/ $sale_price)*100;
        return round($price1);
    }
}
