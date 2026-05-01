<?php

namespace App\Http\Controllers\Auth;

use App\Models\Kiniseis;
use App\Http\Controllers\Controller;
use App\Http\Controllers\Auth\MeliController;
use Illuminate\Auth\Events\Registered;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\Rules;
use Illuminate\View\View;
use App\Helpers\UIHelper;

class KiniseisController extends Controller
{
    /**
     * Display ALL RECORDS CATALOG.
     */
    public static function getAll()
    {
        $records = [];
        $Companies = Kiniseis::where('Name', 'LIKE', '%%')->orderBy('Name', 'asc')->get();
        foreach ($Companies as $post) {
            $rec = $post->getAttributes();
            $rec['Button_Del'] = UIHelper::delRecButton($rec['ID'],"ccc");
            $rec['Button_Active'] = UIHelper::delRecButton($rec['ID'],"ccc"); 
            $records[] = $rec;
        }
        return $records;
    }
    /**
     * Display REORD by ID
     */
    public static function getByID($id)
    {
        $records = [];
        $company = Kiniseis::where('ID', '=', $id)->get();
        $rec = $company[0]->getAttributes();
        return $rec;
    }



    /**
     * Display the RECORD FOR EDIT.
     */
    public function edit(Request $request, $id)
    {
        $idFromRequest = $request->route('id');
        $rec = [];
        $rec['ID'] = 0;
        $rec['ck_date'] = '2025-02-01';
        $rec['ck_datenum'] = 0;
        $rec['ck_cussupcode'] = "";
        $rec['ck_parastatiko'] = "";
        $rec['ck_aitiologia'] = "";
        $rec['ck_poso'] = "";
        $rec['ck_kk'] = "";
        $rec['ck_sale_a'] = "";
        $rec['ck_cussup'] = "";
        $rec['ck_year'] = "";
        $aa = 1;
        if ( $idFromRequest != 0) {
            $records = Kiniseis::where('ID', '=', $id)->get();
            foreach ($records as $post) {
                 $rec = $post->getAttributes();
            }
        }

        $data['Combo_KKID'] = UIHelper::view_combo('getΚΚOptions');

        $data['request'] = $request->route('id');
        $data['record'] = $rec;
        return view('kiniseis.partials.edit', ['user' => $request->user(),])->with('data', $data);
    }


    /**
     * Display the RECORD FOR EDIT.
     */
    public function insert(Request $request, $id)
    {
        $idFromRequest = $request->route('id');

        $dateStr = date('Y-m-d');
      //  echo "DateStr -> ".$dateStr."<br>";

        $rec = [];
        $rec['ID'] = 0;
        $rec['ck_date'] = $dateStr;
        $rec['ck_datenum'] = 0;
        $rec['ck_cussupcode'] = $id;
        $rec['ck_cussuptxt'] = MeliController::getByNameSurname($id);
        $rec['ck_parastatiko'] = "";
        $rec['ck_aitiologia'] = "";
        $rec['ck_poso'] = 0;
        $rec['ck_kk'] = "";
        $rec['ck_sale_a'] = "";
        $rec['ck_cussup'] = "";
        $rec['ck_year'] = "";

        $data['Combo_KKID'] = UIHelper::view_combo('getΚΚOptions');

        $data['request'] = $request->route('id');
        $data['record'] = $rec;
        return view('kiniseis.partials.edit', ['user' => $request->user(),])->with('data', $data);
    }

    /**
     * Update RECORD.
     */
    public function update(Request $request)
    {
        $id = $request->input('ID');
        $record = Kiniseis::find($id);


        if (!$record) {
            $record =  new Kiniseis();
        }



        $ck_year = substr($request->input('ck_date'),0,4);
        $ck_datenum = UIHelper::dateToDateNum($request->input('ck_date'));
        $ck_supcode = $request->input('ck_cussupcode');
        $record->ck_date = $request->input('ck_date');
        $record->ck_datenum = $ck_datenum ;
        $record->ck_cussupcode = $request->input('ck_cussupcode');
        $record->ck_parastatiko = $request->input('ck_parastatiko');
        $record->ck_aitiologia = $request->input('ck_aitiologia');
        $record->ck_poso = $request->input('ck_poso');
        $record->ck_kk = $request->input('ck_kk');
        $record->ck_cussup = $request->input('ck_cussup');
        $record->ck_year = $ck_year;
        $record->save();

        return redirect()->to("meli/analysi/".$ck_supcode);  // Redirects to /profile/1
     //."/".$request->input('ck_cussup')
    }
    /**
     * Delete RECORD form.
     */
    public function destroy(Request $request)
    {
        return redirect()->route('kiniseis.show');
    }

    /**
     * Display RECORDS CATALOG.
     */
    public function show(Request $request): View
    {

    $query = Kiniseis::query()
    ->join('sillogos_people', 'sillogos_kiniseis.ck_cussupcode', '=', 'sillogos_people.ID');
   // ->select('posts.id', 'posts.title', 'posts.content', 'users.name as author_name', 'users.email as author_email');



   $ck_kk = !empty($_GET['ck_kk']) ? $_GET['ck_kk'] : "";
   $ck_cussupcode = !empty($_GET['ck_cussupcode']) ? $_GET['ck_cussupcode'] : "";          
$ck_parastatiko = !empty($_GET['ck_parastatiko']) ? $_GET['ck_parastatiko'] : "";
  $ck_aitiologia = !empty($_GET['ck_aitiologia']) ? $_GET['ck_aitiologia'] : "";
  $ck_year = !empty($_GET['ck_year']) ? $_GET['ck_year'] : "";
  

    if ($ck_kk != '')     $query->where('ck_kk', '=',  $ck_kk );
    if ($ck_cussupcode != '')  $query->where('ck_cussupcode', 'like', '%' . $ck_cussupcode . '%');
    if ($ck_parastatiko != '') $query->where('ck_parastatiko', 'like', '%' . $ck_parastatiko . '%');
    if ($ck_aitiologia != '') $query->where('ck_aitiologia', 'like', '%' . $ck_aitiologia . '%');
    if ($ck_year != '') $query->where('ck_year', '=',  $ck_year );


    $sortBy = $request->input('sort_by', 'ck_datenum');  // Default sort by 'title'
    $sortOrder = $request->input('sort_order', 'desc');  // Default sort order 'ascending'
    $query->orderBy($sortBy, $sortOrder);

    $records = $query->paginate(200);

    // echo "<pre>";
    // print_r($records);
    // echo "</pre>";
    return view('kiniseis.show', compact('records'));
    }




    
    // function select with db select {
        

    //     $sql = "
    //     SELECT 

    //     sillogos_kiniseis.ID as sillogos_kiniseis_ID,
    //     sillogos_kiniseis.ck_date as sillogos_kiniseis_ck_date,
    //     sillogos_kiniseis.ck_datenum as sillogos_kiniseis_ck_datenum,
    //     sillogos_kiniseis.ck_cussupcode as sillogos_kiniseis_ck_cussupcode,
    //     sillogos_kiniseis.ck_parastatiko as sillogos_kiniseis_ck_parastatiko,
    //     sillogos_kiniseis.ck_aitiologia as sillogos_kiniseis_ck_aitiologia,
    //     sillogos_kiniseis.ck_poso as sillogos_kiniseis_ck_poso,
    //     sillogos_kiniseis.ck_kk as sillogos_kiniseis_ck_kk,
    //     sillogos_kiniseis.ck_user as sillogos_kiniseis_ck_user,
    //     sillogos_kiniseis.ck_cussup as sillogos_kiniseis_ck_cussup,
    //     sillogos_kiniseis.ck_year as sillogos_kiniseis_ck_year
    //     -- sillogos_people
    //     sillogos_people.ID as sillogos_people_ID,
    //     sillogos_people.name as sillogos_people_name,
    //     sillogos_people.surname as sillogos_peopled_surname,
    //     FROM  sillogos_kiniseis as sillogos_kiniseis 
    //     JOIN sillogos_people as sillogos_people on sillogos_kiniseis.ck_cussupcode = sillogos_people.ID
    //     where sillogos_kiniseis.ID<>-999 

    //   //  where ContentSiteID='".$ContentSiteID."'  ";


    //     if ($request->has('ck_kk') && $request->input('ck_kk') !== '') {
    //         $sql .= " and  sillogos_kiniseis_ck_kk = ".$request->input('ck_kk') ;
    //     }

    //     if ($request->has('ck_cussupcode') && $request->input('ck_cussupcode') !== '') {
    //         $sql .= " and  sillogos_kiniseis_ck_cussupcode = ".$request->input('ck_cussupcode') ;
    //     }

    //     if ($request->has('ck_parastatiko') && $request->input('ck_parastatiko') !== '') {
    //         $sql .= " and  sillogos_kiniseis_ck_parastatiko like '%" . $request->input('ck_parastatiko') . '%"';
    //     }

    //     if ($request->has('ck_aitiologia') && $request->input('ck_aitiologia') !== '') {
    //         $sql .= " and  sillogos_kiniseis_ck_aitiologia like '%" . $request->input('ck_aitiologia') . '%"';
    //     }

    //     $results2 = DB::select($sql, []);
    //     $results = json_decode(json_encode($results2), true);
    //     $data = $results[0];
        
    //     $records = [];
    //     foreach ($data as $key => $value) {
    //         $ar = [];
    //         $ar['fieldname'] = $key;
    //         $ar['fieldvalue'] = $value;
    //         array_push($records,$ar);
    //     }



    // }
}