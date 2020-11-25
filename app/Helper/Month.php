<?php
namespace App\Helper;
class Month
{
    public static function getListMonthInYear()
    {
        $arrayMonth = [];
        for ($month = 1;$month <=12;$month++)
        {
            $arrayMonth[] = $month;
        }
        return $arrayMonth;
    }
}
