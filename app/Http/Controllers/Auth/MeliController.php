<?php

namespace App\Http\Controllers\Auth;

use App\Models\Meli;
use App\Http\Controllers\Controller;
use Illuminate\Auth\Events\Registered;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\Rules;
use Illuminate\View\View;
use App\Helpers\UIHelper;
use App\Models\Kiniseis;
use Illuminate\Support\Facades\DB;


class MeliController extends Controller
{
    /**
     * Display ALL RECORDS CATALOG.
     */
    public static function getAll()
    {
        $records = [];
        $Companies = Meli::where('Name', 'LIKE', '%%')->orderBy('Name', 'asc')->get();
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
    public static function getByNameSurname($id)
    {
        $records = [];
        $company = Meli::where('ID', '=', $id)->get();
        if (!isset($company[0])) return "??";
        $rec = $company[0]->getAttributes();
        return $rec['surname']." ".$rec['name'];
    }

    /**
     * Display REORD by ID
     */
    public static function getByID($id)
    {
        $records = [];
        $company = Meli::where('ID', '=', $id)->get();
        if (!isset($company[0])) return [];
        $rec = $company[0]->getAttributes();
        return $rec;
    }



    /**
     * Display the RECORD FOR EDIT.
     */
    public function edit(Request $request, $id)
    {
        $idFromRequest = $request->route('id');
        $records = Meli::where('ID', '=', $idFromRequest)->get();
        foreach ($records as $post) {
            $rec = $post->getAttributes();
        }
         $data['request'] = $request->route('id');
        $data['record'] = $rec;
        $html = view('meli.partials.edit', ['user' => $request->user(),])->with('data', $data)->render();
        return $html;
    }

    /**
     * Display the RECORD FOR EDIT.
     */
    public function delete1(Request $request)
    {

        $data = [];
        $data['errorMsg'] = "";
        $data['newID'] = 0;
        $html = view('meli.delete1', ['user' => $request->user(),])->with('data', $data)->render();
        return $html;
    }

  /**
     * Display the RECORD FOR EDIT.
     */
    public function delete2(Request $request)
    {
        $newID = $request->input('newID');
        $melos = self::getByID($newID);

        if (!isset($melos['ID'])) {
            $data = [];
            $data['newID'] = $newID;
            $data['errorMsg'] = "<div style='background:#d10000; color:#fff; padding:10px; border-radius:5px; max-width:auto;'>Ο αριθμός μητρώου : <b>".$melos['ID']."</b> ΔΕΝ ΥΠΑΡΧΕΙ ! </div><br><br>";
            $html = view('meli.delete1', ['user' => $request->user(),])->with('data', $data)->render();
            return $html;
            exit();
        }

        $records = Meli::where('ID', '=', $newID)->get();
        foreach ($records as $post) {
            $rec = $post->getAttributes();
        }
        $data['request'] = $request->route('id');
        $data['record'] = $rec;
        $html = view('meli.delete2', ['user' => $request->user(),])->with('data', $data)->render();
        return $html;

    }


      /**
     * Display the RECORD FOR EDIT.
     */
    public function delete3(Request $request)
    {
        $ID = $request->input('ID');
        $melos = Meli::find($ID);
        if ($melos) {
            $melos->delete();
        }
        return redirect()->route('meli.show');
        
    }

    /**
     * Display the RECORD FOR EDIT.
     */
    public function insert1(Request $request, $id)
    {
        $sql = "SELECT MAX(ID) as maxID from sillogos_people ";
        $results2 = DB::select($sql, []);
        $results = json_decode(json_encode($results2), true);
        $rec = $results[0];


        $data = [];
        $data['errorMsg'] = "";
        $data['newID'] = $rec['maxID']+1;
        $html = view('meli.insert1', ['user' => $request->user(),])->with('data', $data)->render();
        return $html;
    }

  /**
     * Display the RECORD FOR EDIT.
     */
    public function insert2(Request $request)
    {
        $newID = $request->input('newID');
        $melos = self::getByID($newID);

        if (isset($melos['ID'])) {
            $data = [];
            $data['newID'] = $newID;
            $data['errorMsg'] = "<div style='background:#d10000; color:#fff; padding:10px; border-radius:5px; max-width:auto;'>Ο αριθμός μητρώου : <b>".$melos['ID']."</b> ΥΠΑΡΧΕΙ ΗΔΗ ! <br><br>Για το μέλος : <b>".$melos['surname']." ".$melos['name']."</b></div><br><br>";
            $html = view('meli.insert1', ['user' => $request->user(),])->with('data', $data)->render();
            return $html;
            exit();
        }

        $sql = "INSERT INTO sillogos_people (ID) values ('".$newID."'); ";
       // echo $sql."<br>";
        $result = DB::insert($sql, []);

        
        $records = Meli::where('ID', '=', $newID)->get();
        foreach ($records as $post) {
            $rec = $post->getAttributes();
        }
        $data['request'] = $request->route('id');
        $data['record'] = $rec;
        $html = view('meli.insert2', ['user' => $request->user(),])->with('data', $data)->render();
        return $html;

    }


    /**
     * Update RECORD.
     */
    public function updatenew(Request $request)
    {
        $idFromRequest = $request->input('ID');

        $record = Meli::find($idFromRequest);
        if (!$record) {
            $record =  new Meli();
        }
        $record->name = $request->input('name');
        $record->surname = $request->input('surname');
        $record->fathername = $request->input('fathername');
        $record->occupation = $request->input('occupation');
        $record->dateofbirth = $request->input('dateofbirth');
        $record->dateofrecord = $request->input('dateofrecord');
        $record->category = $request->input('category');
        $record->simetoxiseGS = $request->input('simetoxiseGS');
        $record->address1 = $request->input('address1');
        $record->zip1 = $request->input('zip1');
        $record->city1 = $request->input('city1');
        $record->phone1 = $request->input('phone1');
        $record->phone2 = $request->input('phone2');
        $record->address2 = $request->input('address2');
        $record->zip2 = $request->input('zip2');
        $record->city2 = $request->input('city2');
        $record->phone3 = $request->input('phone3');
        $record->phone4 = $request->input('phone4');
        $record->fax = $request->input('fax');
        $record->ipoloipo = $request->input('ipoloipo');
        $record->email = $request->input('email');
        $record->bea = $request->input('bea');
        $record->ebea = $request->input('ebea');
        $record->diegrameno = $request->input('diegrameno');
        $record->dateofdelete = $request->input('dateofdelete');
        $record->apofasidelete = $request->input('apofasidelete');
        $record->logsxedio = $request->input('logsxedio');
        $record->notes = $request->input('notes');
        $record->save();
        if ($idFromRequest!=0) {
        return redirect()->to("meli/analysi/".$idFromRequest);  // Redirects to /profile/1
        }
        else {
            return redirect()->to("meli");  // Redirects to /profile/1
        }

    }
    

    /**
     * Update RECORD.
     */
    public function update(Request $request)
    {
        $idFromRequest = $request->route('ID');

        $record = Meli::find($idFromRequest);
        if (!$record) {
            $record =  new Meli();
        }
        $record->name = $request->input('name');
        $record->surname = $request->input('surname');
        $record->fathername = $request->input('fathername');
        $record->occupation = $request->input('occupation');
        $record->dateofbirth = $request->input('dateofbirth');
        $record->dateofrecord = $request->input('dateofrecord');
        $record->category = $request->input('category');
        $record->simetoxiseGS = $request->input('simetoxiseGS');
        $record->address1 = $request->input('address1');
        $record->zip1 = $request->input('zip1');
        $record->city1 = $request->input('city1');
        $record->phone1 = $request->input('phone1');
        $record->phone2 = $request->input('phone2');
        $record->address2 = $request->input('address2');
        $record->zip2 = $request->input('zip2');
        $record->city2 = $request->input('city2');
        $record->phone3 = $request->input('phone3');
        $record->phone4 = $request->input('phone4');
        $record->fax = $request->input('fax');
        $record->ipoloipo = $request->input('ipoloipo');
        $record->email = $request->input('email');
        $record->bea = $request->input('bea');
        $record->ebea = $request->input('ebea');
        $record->diegrameno = $request->input('diegrameno');
        $record->dateofdelete = $request->input('dateofdelete');
        $record->apofasidelete = $request->input('apofasidelete');
        $record->logsxedio = $request->input('logsxedio');
        $record->notes = $request->input('notes');
        $record->save();
        if ($idFromRequest!=0) {
        return redirect()->to("meli/analysi/".$idFromRequest);  // Redirects to /profile/1
        }
        else {
            return redirect()->to("meli");  // Redirects to /profile/1
        }

    }
    /**
     * Delete RECORD form.
     */
    public function destroy(Request $request) 
    {
        return redirect()->route('meli.show');
    }


    /**
     * Display RECORDS CATALOG.
     */
    public function show(Request $request): View
    {
    $query = Meli::query();

          $name = !empty($_GET['name']) ? $_GET['name'] : "";
       $surname = !empty($_GET['surname']) ? $_GET['surname'] : "";          
    $occupation = !empty($_GET['occupation']) ? $_GET['occupation'] : "";
      $category = !empty($_GET['category']) ? $_GET['category'] : "";
      $city1 = !empty($_GET['city1']) ? $_GET['city1'] : "";
      $phone1 = !empty($_GET['phone1']) ? $_GET['phone1'] : "";
      $email = !empty($_GET['email']) ? $_GET['email'] : "";
      $simetoxiseGS = !empty($_GET['simetoxiseGS']) ? $_GET['simetoxiseGS'] : "";

    if ($name != '')     $query->where('name', 'like', '%' . $name . '%');
    if ($surname != '')  $query->where('surname', 'like', '%' . $surname . '%');
    if ($occupation != '') $query->where('occupation', 'like', '%' . $occupation . '%');
    if ($category != '') $query->where('category', 'like', '%' . $category . '%');
    if ($city1 != '') $query->where('city1', 'like', '%' . $city1 . '%');
    if ($phone1 != '') $query->where('phone1', 'like', '%' . $phone1 . '%');
    if ($email != '') $query->where('email', 'like', '%' . $email . '%');
    if ($simetoxiseGS != '') $query->where('simetoxiseGS', 'like', '%' . $simetoxiseGS . '%');


    $sortBy = $request->input('sort_by', 'surname');  // Default sort by 'title'
    $sortOrder = $request->input('sort_order', 'asc');  // Default sort order 'ascending'
    $query->orderBy($sortBy, $sortOrder);
    $records = $query->paginate(40);
    return view('meli.show', compact('records'));
    }

    /**
    * Display analysi
    */
    public function analysi(Request $request)
    {
        $id = $request->route('id');

        $sql = "SELECT * from sillogos_people where ID = '".$id."' ";
        $results2 = DB::select($sql, []);
        $results = json_decode(json_encode($results2), true);
        $rec = $results[0];


        $sql = "SELECT * from sillogos_kiniseis 
        inner join sillogos_kk on sillogos_kk.ID = sillogos_kiniseis.ck_kk
        where ck_cussupcode = '".$id."' order by ck_datenum desc";
        $results2 = DB::select($sql, []);
        $results = json_decode(json_encode($results2), true);

            $remain = 0;
            foreach ($results as $r) {
                $remain = $remain + $r['ck_poso'];
            }
            $remain = number_format($remain, 2); // 2 decimal places
            //echo "<pre>";  print_r($rec2);     echo "</pre>";
            $data['request'] = $request->input('id');
            $data['remain'] = $remain;

            $data['record'] = $rec;
            $data['kiniseis'] = $results;
            $html = view('meli.analysi', ['user' => $request->user(),])->with('data', $data)->render();
            return $html;
    }

    /**
    * Display remains
    */
    public function remains(Request $request)
    {
        $sort_by = !empty($_GET['sort_by']) ? $_GET['sort_by'] : "";
        $sql = "
            SELECT 
            sp.*,
            COALESCE(SUM(sk.ck_poso), 0) AS remain
            FROM sillogos_people sp
            LEFT JOIN sillogos_kiniseis sk 
            ON sk.ck_cussupcode = sp.ID 
            GROUP BY sp.ID, sp.name, sp.surname, sp.fathername, sp.occupation, sp.dateofbirth, sp.dateofrecord, sp.category, sp.simetoxiseGS,
            sp.address1, sp.zip1, sp.city1, sp.phone1, sp.phone2, sp.address2, sp.zip2, sp.city2, sp.phone3, sp.phone4,
            sp.fax, sp.ipoloipo, sp.email, sp.bea, sp.ebea,
            sp.diegrameno, sp.dateofdelete, sp.apofasidelete, sp.logsxedio, sp.notes, sp.source_id 
            order by ";
        if ($sort_by == "") $sql .= "sp.surname,sp.name ; ";
        if ($sort_by == "surname") $sql .= "sp.surname,sp.name ; ";
        if ($sort_by == "cussupcode") $sql .= "sp.ID ; ";
        if ($sort_by == "category") $sql .= " sp.category,sp.surname,sp.name ; ";
        if ($sort_by == "remain") $sql .= " remain,sp.surname,sp.name ; ";


        $records = DB::select($sql, []);
        $rec2 = json_decode(json_encode($records), true);
        //  echo "<pre>";   print_r($records);  echo "<pre>";
        $tot_remain = 0;
        $aa = 1;
        foreach ($rec2 as $rec) {
        //  echo "<pre>";   print_r($rec);      echo "<pre>";
            $tot_remain = $tot_remain + $rec['remain'];
            $rec['aa'] = $aa;
            $aa = $aa+1;
        }
        //  echo "<pre>";   print_r($rec);      echo "</pre>";
        $data['tot_remain'] = $tot_remain;
        $data['records'] = $records;
        $data['aa'] = 1;
        $html = view('meli.remains', ['user' => $request->user(),])->with('data', $data)->render();
        return $html;
    }



    /**
    * Display remains
    */
    public function remains0(Request $request)
    {
        $sort_by = !empty($_GET['sort_by']) ? $_GET['sort_by'] : "";
        $sql = "
        SELECT 
            sp.*,
            COALESCE(SUM(sk.ck_poso), 0) AS remain
        FROM sillogos_people sp
        LEFT JOIN sillogos_kiniseis sk 
            ON sk.ck_cussupcode = sp.ID 
            GROUP BY sp.ID, sp.name, sp.surname, sp.fathername, sp.occupation, sp.dateofbirth, sp.dateofrecord, sp.category, sp.simetoxiseGS,
            sp.address1, sp.zip1, sp.city1, sp.phone1, sp.phone2, sp.address2, sp.zip2, sp.city2, sp.phone3, sp.phone4,
            sp.fax, sp.ipoloipo, sp.email, sp.bea, sp.ebea,
            sp.diegrameno, sp.dateofdelete, sp.apofasidelete, sp.logsxedio, sp.notes, sp.source_id 
        order by ";
        if ($sort_by == "") $sql .= " sp.surname, sp.name ; ";
        if ($sort_by == "surname") $sql .= "sp.surname,sp.name ; ";
        if ($sort_by == "cussupcode") $sql .= "sp.ID ; ";
        if ($sort_by == "category") $sql .= " sp.category, sp.surname, sp.name ; ";
        if ($sort_by == "remain") $sql .= " remain, sp.surname, sp.name ; ";

        $records = DB::select($sql, []);
        $rec2 = json_decode(json_encode($records), true);

   
        $arr = [];
        foreach ($rec2 as $rec) {
            if ($rec['remain'] == 0) { $arr[] = $rec;}
            if ($rec['remain'] == "") { $arr[] = $rec;}
        }
        $rec2 = $arr;
        $tot_remain = 0;
        $aa = 1;
        foreach ($rec2 as $rec) {
        //  echo "<pre>";   print_r($rec);      echo "<pre>";
            $tot_remain = $tot_remain + $rec['remain'];
            $rec['aa'] = $aa;
            $aa = $aa+1;
        }
        //  echo "<pre>";   print_r($rec);      echo "</pre>";

        $rec3 = json_decode(json_encode($rec2));

        $data['tot_remain'] = $tot_remain;
        $data['records'] = $rec3;
        $data['aa'] = 1;
        $html = view('meli.remains0', ['user' => $request->user(),])->with('data', $data)->render();
        return $html;
    }

    /**
    * Display remains
    */
    public function mitroo(Request $request)
    {
        $sort_by = !empty($_GET['sort_by']) ? $_GET['sort_by'] : "";
        $sql = " SELECT * FROM sillogos_people order by ";
        if ($sort_by == "") $sql .= "surname,name ; ";
        if ($sort_by == "surname") $sql .= "surname,name ; ";
        if ($sort_by == "cussupcode") $sql .= "ID ; ";
        if ($sort_by == "category") $sql .= " category,surname,name ; ";
        if ($sort_by == "occupation") $sql .= " occupation,surname,name ; ";

        $records = DB::select($sql, []);
        $rec2 = json_decode(json_encode($records), true);
        //  echo "<pre>";   print_r($records);  echo "<pre>";
        $tot_remain = 0;
        $aa = 1;
        $rec3 = [];
        $all=[];
        foreach ($rec2 as $rec) {
            $rec3 = $rec;
        //  echo "<pre>";   print_r($rec);      echo "<pre>";
            $tot_remain = $tot_remain + 0;
            $rec3['aa'] = $aa;
            $rec3['address2'] = str_replace("-","<br>-",$rec3['address2']);
            $rec3['address2'] = str_replace("(","<br>(",$rec3['address2']);

            $rec3['surname'] = str_replace("(","<br>(",$rec3['surname']);
            $rec3['name'] = str_replace("(","<br>(",$rec3['name']);

            $rec3['surname'] = str_replace("-","<br>-",$rec3['surname']);
            $rec3['name'] = str_replace("-","<br>-",$rec3['name']);

            $rec3['fathername'] = mb_substr($rec3['fathername'],0,10);
            $rec3['occupation'] = mb_substr($rec3['occupation'],0,12);
            $aa ++;
            $all[]=$rec3;
        }
        //  echo "<pre>";   print_r($rec);      echo "</pre>";
        $data['tot_remain'] = $tot_remain;
        $data['records'] = $all;
        $data['aa'] = 1;
        $html = view('meli.mitroo', ['user' => $request->user(),])->with('data', $data)->render();
        return $html;
    }
}