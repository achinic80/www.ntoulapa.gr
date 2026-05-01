<?php

namespace App\Http\Controllers\Auth;

use App\Models\ContentSite;
use App\Http\Controllers\Controller;
use App\Helpers\UIHelper;
use App\Helpers\Remains2Years;
use Illuminate\Http\Request;
use Illuminate\View\View;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Auth\KkController;

class StatisticsController extends Controller
{
    private static  $start_date_from = "";
    private static  $start_date_to = "";
    private static  $start_date_fromnum = "0";
    private static  $start_date_tonum = "0";

    public function getDistinctFromDateToDate()
    {
        $sql = "SELECT distinct ck_date,ck_datenum from sillogos_kiniseis where ck_date is not null and ck_datenum<>0 ";
        if (self::$start_date_from !="") $sql .= " and ck_datenum >= ".self::$start_date_fromnum ." ";
        if (self::$start_date_to !="")   $sql .= " and ck_datenum <= ".self::$start_date_tonum ." ";
        $sql .= " order by ck_datenum desc";

       // echo "<h1>".$sql."</h1>";
        $results2 = DB::select($sql, []);
        $results = json_decode(json_encode($results2), true);
        return $results;
    }

    public function getData($date)
    {
        $sql = "SELECT * from sillogos_kiniseis 
        inner join sillogos_people on sillogos_people.ID = sillogos_kiniseis.ck_cussupcode 
        inner join sillogos_kk on sillogos_kk.ID = sillogos_kiniseis.ck_kk
        where ck_date = '".$date."' ";
        $results2 = DB::select($sql, []);
        $results = json_decode(json_encode($results2), true);
        return $results;
    }


    /**
     * Display statistics CATALOG.
     */
    public function maziki (Request $request): View
    {
        $nowDate = date('Y-m-d');
        $nowYear = substr($nowDate ,0,4);
        //echo "<h1>xx".$nowYear."</h1>";
        $sql = " SELECT count(*) as recs from sillogos_kiniseis where ck_year='".$nowYear."' and ck_packet is not null";
        $rs_max = DB::select($sql, []);
        $max = json_decode(json_encode($rs_max), true);
        $data = $max[0];
        $recs = $data['recs'];


        $data = [];
        $data['countResult'] = "";
        if ($recs > 0 )  { $data['countResult'] =  "ΠΡΟΣΟΧΗ βρεθηκε ήδη μαζικη χρέωση μελών για το έτος ".$nowYear ."  =  ".$recs." μέλη με μαζική χρεώση."; }
        
        $data['Combo_KKID'] = UIHelper::view_combo('getΚΚOptions');
        $data['maziki_date'] = date('Y-m-d');
        $data['maziki_poso'] = "100";
        $data['maziki_aitiologia'] = "ΣΥΝΔΡΟΜΕΣ";
        return view('statistics.maziki', [
            'user' => $request->user(),
        ])->with('data', $data);
    }

    /**
     * Display statistics CATALOG.
     */
    public function maziki2 (Request $request): View
    {
        $data = [];
        $data['Combo_KKID'] = UIHelper::view_combo('getΚΚOptions');
        
          $maziki_date = !empty($_GET['maziki_date']) ? $_GET['maziki_date'] : "";
            $maziki_kk = !empty($_GET['ck_kk']) ? $_GET['ck_kk'] : "";
          $maziki_poso = !empty($_GET['maziki_poso']) ? $_GET['maziki_poso'] : "";
    $maziki_aitiologia = !empty($_GET['maziki_aitiologia']) ? $_GET['maziki_aitiologia'] : "";

        
        $kk = KkController::getByID($maziki_kk);
        $meli = MeliController::getAll();
        $tot_meli_records = count($meli);
        $tot_poso = ($tot_meli_records * $maziki_poso);

        $data['maziki_date'] = $maziki_date;
        $data['tot_meli_records'] = $tot_meli_records;
        $data['tot_poso'] = $tot_poso;

        $data['kk'] = $kk;
        $data['maziki_aitiologia'] = $maziki_aitiologia;
        $data['maziki_poso'] = $maziki_poso;

        return view('statistics.maziki2', [
            'user' => $request->user(),
        ])->with('data', $data);
    }

    /**
     * Display statistics CATALOG.
     */
    public function  maziki3 (Request $request): View
    {
    $data = [];
          $maziki_date = !empty($_GET['maziki_date']) ? $_GET['maziki_date'] : "";
            $maziki_kk = !empty($_GET['ck_kk']) ? $_GET['ck_kk'] : "";
          $maziki_poso = !empty($_GET['maziki_poso']) ? $_GET['maziki_poso'] : "";
    $maziki_aitiologia = !empty($_GET['maziki_aitiologia']) ? $_GET['maziki_aitiologia'] : "";
       $maziki_datenum = UIHelper::dateToDatenum($maziki_date);
          $maziki_year = substr($maziki_datenum,0,4);

    $sql = " SELECT max(ck_packet) as ck_packet from sillogos_kiniseis";
    $rs_max = DB::select($sql, []);
    $max = json_decode(json_encode($rs_max), true);
    $data = $max[0];
    $ck_packet = $data['ck_packet'];
    if ($ck_packet=="") $ck_packet=0;
    $ck_packet = $ck_packet + 1;

    $meli = MeliController::getAll();
    foreach ($meli as $melos) {
        $sql = "INSERT INTO sillogos_kiniseis (ck_packet,ck_cussupcode,ck_date,ck_datenum,ck_aitiologia,ck_kk,ck_poso,ck_year) values (";
        $sql .= "'".$ck_packet."', ";
        $sql .= "'".$melos['ID']."', ";
        $sql .= "'".$maziki_date."', ";
        $sql .= "'".$maziki_datenum."', ";
        $sql .= "'".$maziki_aitiologia."', ";
        $sql .= "'".$maziki_kk."', ";
        $sql .= "'".$maziki_poso."', ";
        $sql .= "'".$maziki_year."'); ";
       // echo $sql."<br>";
        $result = DB::insert($sql, []);
    }



    $nowDate = date('Y-m-d');
    $nowYear = substr($nowDate ,0,4);
    
    $sql = " SELECT count(*) as recs from sillogos_kiniseis where ck_year='".$maziki_year."' and ck_packet='".$ck_packet."' ";
    $rs_max = DB::select($sql, []);
    $max = json_decode(json_encode($rs_max), true);
    $data = $max[0];
    $recs = $data['recs'];

    $data['countResult'] =  "ΕΝΗΜΕΡΩΘΗΚΑΝ ".$recs." μέλη με μαζική χρεώση.";




    $maziki_date = !empty($_GET['maziki_date']) ? $_GET['maziki_date'] : "";
    $maziki_kk = !empty($_GET['ck_kk']) ? $_GET['ck_kk'] : "";
    $maziki_poso = !empty($_GET['maziki_poso']) ? $_GET['maziki_poso'] : "";
    $maziki_aitiologia = !empty($_GET['maziki_aitiologia']) ? $_GET['maziki_aitiologia'] : "";


    $kk = KkController::getByID($maziki_kk);
    $meli = MeliController::getAll();
    $tot_meli_records = count($meli);
    $tot_poso = ($tot_meli_records * $maziki_poso);


    $data['maziki_date'] = $maziki_date;
    $data['tot_meli_records'] = $tot_meli_records;
    $data['tot_poso'] = $tot_poso;

    $data['kk'] = $kk;
    $data['maziki_aitiologia'] = $maziki_aitiologia;
    $data['maziki_poso'] = $maziki_poso;


    return view('statistics.maziki3', [
        'user' => $request->user(),
    ])->with('data', $data);
    }



    /**
     * Display statistics CATALOG.
     */
    public function statistics(Request $request): View
    {
        $data = [];
        self::$start_date_from = !empty($_GET['start_date_from']) ? $_GET['start_date_from'] : "";
        self::$start_date_to = !empty($_GET['start_date_to']) ? $_GET['start_date_to'] : "";
        self::$start_date_fromnum = UIHelper::dateToDatenum(self::$start_date_from);
        self::$start_date_tonum = UIHelper::dateToDatenum(self::$start_date_to);  
        $data['dates'] = self::getDistinctFromDateToDate();
        $new_dates = [];
        if (count($data['dates'])>20) { for ($t=0;$t<20;$t++) { $new_dates['dates'][] = $data['dates'][$t];  }  
                          $data = $new_dates;
        }
        if (!isset($data['dates'])) { $data['dates'] = []; }
        foreach($data['dates'] as $date) {
            $key = $date['ck_date'];
            $data['records'][$key] = self::getData($key);
        }

        return view('statistics.show', [
            'user' => $request->user(),
        ])->with('data', $data);
    }

    /**
     * Display statistics CATALOG.
     */
    public function remains2years(Request $request): View
    {
        $year1 = Remains2Years::getYear1();
        $year2 = Remains2Years::getYear2($year1);
        $results2 = Remains2Years::getCustomersRemains($year1, $year2);
         $arr = [];
         $res = json_decode(json_encode($results2), true);
         $aa = 0;
         foreach($res as $rec) {
            $r = $rec;
            $aa++;
            $r['aa'] = $aa;
            $r['etos'] = "";
            $r['ypol1'] = $r['xr1']+$r['pis1'];
            $r['ypol2'] = $r['xr2']+$r['pis2'];
            
            if ($r['ypol2']<>0) $r['etos'] .= $year2."  ";
            if ($r['ypol1']<>0) $r['etos'] .= $year1."  ";

            if (($r['ypol1']<>0) || ($r['ypol2']<>0)) $arr[] = $r;
        }

        $data['records'] = $arr;
        $data['year1'] = $year1;
        $data['year2'] = $year2;
        //  echo "<pre>";  print_r($data['records']);   echo "</pre>";
        return view('statistics.2years', [
            'user' => $request->user(),
        ])->with('data', $data);
    }

}
