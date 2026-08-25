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

}
