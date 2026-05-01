<?php

namespace App\Http\Controllers\Auth;

use App\Models\Kk;
use App\Helpers\UIHelper;
use App\Http\Controllers\Controller;
use Illuminate\Auth\Events\Registered;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\Rules;
use Illuminate\View\View;

class KkController extends Controller
{
       
    /**
    * Display ALL RECORDS CATALOG.
    */
    public static function getAll()
    {
        $records = [];
        $Subjects = Kk::where('ID', '<>', '-999')->orderBy('year', 'desc')->get();

        foreach ($Subjects as $post) {
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
        $subject = Kk::where('ID', '=', $id)->get();
        $rec = $subject[0]->getAttributes();
        return $rec;
    }

    /**
    * EDIT THE RECORD
    */
    public function edit(Request $request, $id)
    {
        $idFromRequest = $request->route('id');
        $records = [];
        $rec = [];
        $rec['ID'] = -999;
        $rec['txt'] = "";
        $rec['description'] = "";
        $rec['year'] = "";

        $records = Kk::where('ID', '=', $idFromRequest)->get();
        foreach ($records as $post) {
            $rec = $post->getAttributes(); 
        }
        $data['request'] = $request->route('id');
        $data['record'] = $rec;
        return view('kk.partials.edit', ['user' => $request->user(),])->with('data', $data);
    }

    /**
     * Update RECORD.
     */
    public function update(Request $request)
    {
        echo "<pre>";
        print_r($request->input('ID'));
        echo "</pre>";
        $id = $request->input('ID');
        $record = Kk::find($id);
        if (!$record) {
            return response()->json(['message' => 'Record not found'], 404);
        }
        $record->kk = $request->input('kk');
        $record->txt = $request->input('txt');
        $record->description = $request->input('description');
        $record->year = $request->input('year');
        $record->save();
        return redirect()->route('kk.show');
    }

    /**
     * Display the RECORDS.
     */
    public function show(Request $request): View
    {
        $query = Kk::query();
        $ID = !empty($_GET['ID']) ? $_GET['ID'] : "";
        $txt = !empty($_GET['txt']) ? $_GET['txt'] : "";          
     $year = !empty($_GET['year']) ? $_GET['year'] : "";
 
         if ($ID != '')     $query->where('ID', 'like', '%' . $ID . '%');
         if ($txt != '')  $query->where('txt', 'like', '%' . $txt . '%');
         if ($year != '') $query->where('year', 'like', '%' . $year . '%');

         


        $sortBy = $request->input('sort_by', 'year');  // Default sort by 'title'
        $sortOrder = $request->input('sort_order', 'desc');  // Default sort order 'ascending'
        $query->orderBy($sortBy, $sortOrder);
    
        $records = $query->paginate(80);
        return view('kk.show', compact('records'));
    }


}


  