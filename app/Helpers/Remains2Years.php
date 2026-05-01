<?php

namespace App\Helpers;

use App\Models\MediaSource;
use App\Models\Subject;
use App\Models\Prompt;
use App\Models\AIProvider;

use App\Http\Controllers\Auth\KkController;
use App\Http\Controllers\Auth\AIProviderController;
use Illuminate\Support\Facades\DB;

class Remains2Years
{
    public static function getYear1()
    {
        $sql = "SELECT max(ck_year) as ck_year from sillogos_kiniseis ";
        // echo "<h1>".$sql."</h1>";
        $res = DB::select($sql, []);
        //  echo "<pre>";  print_r($res);   echo "</pre>";
        return $res[0]->ck_year;
    }
    public static function getYear2($year1)
    {
        $sql = "SELECT max(ck_year) as ck_year from sillogos_kiniseis where ck_year < ".$year1."  ";
        // echo "<h1>".$sql."</h1>";
        $res = DB::select($sql, []);
        //  $results = json_decode(json_encode($res), true);
        // echo "<pre>";  print_r($results);   echo "</pre>";
        return $res[0]->ck_year;
    }
    public static function getCustomersRemains($year1, $year2)
    {
       $sql = "
            SELECT
                m.ID as ID,
                m.name as name,
                m.surname as surname,
                m.fathername as fathername,

                -- 2024
                SUM(CASE 
                    WHEN k.ck_year = " . $year2 . " AND k.ck_poso > 0 THEN k.ck_poso 
                    ELSE 0 
                END) AS xr1,

                SUM(CASE 
                    WHEN k.ck_year = " . $year2 . " AND k.ck_poso < 0 THEN k.ck_poso 
                    ELSE 0 
                END) AS pis1,

                -- 2025
                SUM(CASE 
                    WHEN k.ck_year = " . $year1 . " AND k.ck_poso > 0 THEN k.ck_poso 
                    ELSE 0 
                END) AS xr2,

                SUM(CASE 
                    WHEN k.ck_year = " . $year1 . " AND k.ck_poso < 0 THEN k.ck_poso 
                    ELSE 0 
                END) AS pis2
            FROM sillogos_people m
            INNER JOIN sillogos_kiniseis k
                ON k.ck_cussupcode = m.id
            GROUP BY m.id, m.name, m.surname, m.fathername 
            ORDER BY m.name;
        ";
        // echo "<h1>".$sql."</h1>";
        $res = DB::select($sql, []);
        //  echo "<pre>";  print_r($res2);   echo "</pre>";
        return $res;
    }


    public static function Remains2Years()
    {
        $year1 = self::getYear1();
        $year2 = self::getYear2(2004);

        $res = self::getCustomersRemains($year1, $year2);
        echo "<pre>";  print_r($res);   echo "</pre>";
        return strtoupper($res);
    }

}
