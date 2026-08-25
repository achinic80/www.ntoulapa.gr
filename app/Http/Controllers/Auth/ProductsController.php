<?php

namespace App\Http\Controllers\Auth;

use App\Models\Products;
use App\Helpers\UISaveImages;
use App\Http\Controllers\Controller;
use Illuminate\Auth\Events\Registered;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\Rules;
use Illuminate\View\View;
use App\Helpers\UIHelper;
use Illuminate\Support\Facades\DB;


class ProductsController extends Controller
{
        public static $totImages = 15;
    /**
     * Display ALL RECORDS CATALOG.
     */
    public static function getAll()
    {
        $records = [];
        $Companies = Products::where('Name', 'LIKE', '%%')->orderBy('Name', 'asc')->get();
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
        $company = Products::where('ID', '=', $id)->get();
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
        $company = Products::where('ID', '=', $id)->get();
        if (!isset($company[0])) return [];
        $rec = $company[0]->getAttributes();
        return $rec;
    }

    /**
     * Update RECORD.
     */
    public function update(Request $request)
    {
        $id = $request->input('id');
        // Find the record by ID
        $record = Products::find($id);
        // Check if record exists
        if (!$record) {
            $record = new Products();
        }
        $record->cat1 = $request->input('cat1');
        $record->cat2 = $request->input('cat2');
        $record->notes1 = $request->input('notes1');
        $record->save();
        return redirect()->route('products.show');
    }


     /**
     * Display the RECORD FOR EDIT.
     */
    public function insert(Request $request): View
    {
        $record=[];
        $record['id'] = 0;
        $record['cat1'] = 'cat1';
        $record['cat2'] = 'cat2222';
        $record['email'] = 'email';
        $record['notes1'] = 'email';
        $data['record'] = $record;
        return view('products.view', [
            'user' => $request->user(),
        ])->with('data', $data);
    }

    /**
     * Display the RECORD FOR EDIT.
     */ 
    public function edit(Request $request, $id): View
        {
            $idFromRequest = $request->route('id');
            $records = [];
            $records = Products::where('id', '=', $idFromRequest)->get();
            foreach ($records as $post) {
                $record = $post->getAttributes();
            }
            $data['record'] = $record;
            $data['id'] = $idFromRequest;
            $data['ImageSlot']['totImages'] = self::$totImages;
            UISaveImages::loadUploadedImages($data,'chatgpt', $idFromRequest,self::$totImages);
            return view('products.view', ['user' => $request->user(),])->with('data', $data);

        }

    /**
     * Delete RECORD form.
     */
    public function destroy(Request $request) 
        {
            return redirect()->route('products.show');
        }


/**
 * Display RECORDS CATALOG.
 */
public function show(Request $request): View
        {
        $query = Products::query();
        $cat1 = !empty($_GET['cat1']) ? $_GET['cat1'] : "";
        $cat2 = !empty($_GET['cat2']) ? $_GET['cat2'] : "";          
        if ($cat1 != '')  $query->where('cat1', 'like', '%' . $cat1 . '%');
        if ($cat2 != '')  $query->where('cat2', 'like', '%' . $cat2 . '%');
        $sortby = !empty($_GET['sortby']) ? $_GET['sortby'] : " 1 ASC"; 
        $sortbychoices = [
            'Description' => 'description',
            'Name' => 'name',
            'Checked' => 'is_checked',
        ];
        $sortbychoices = UIHelper::sortbychoices($sortbychoices, $sortby);        
        $query->orderByRaw($sortby);
        $records = $query->paginate(40);

        $imgs = [];
        foreach ($records as $post) {
            $rec = $post->getAttributes();
            UISaveImages::loadUploadedImages($rec,'chatgpt', $rec['id'],self::$totImages);
            $imgs[$rec['id']] = $rec['img1'];
        }

        return view('products.show',  ['records' => $records , 'imgs' => $imgs, 'sortbychoices' => $sortbychoices]);
        }

    /**
     * Display the RECORD FOR EDIT.
     */
    public function getProductImages($id)
        {
           $imgs = [];
           $imgs[] = 'https://www.newsit.gr/wp-content/uploads/2026/05/donald-trump-xi-jinping-6-r-1400x788.jpg';
           $imgs[] = 'https://www.newsit.gr/wp-content/uploads/2026/05/donald-trump-xi-jinping-6-r-1400x788.jpg';
           $imgs[] = 'https://www.newsit.gr/wp-content/uploads/2026/05/donald-trump-xi-jinping-6-r-1400x788.jpg';
        }

public function toggleField(Request $request)
        {
        $record = Products::find($request->id);
        if (!$record) {
            return response()->json([
                'success' => false
            ], 404);
        }
        $allowedFields = ['enabled_chk','new_chk', 'top_chk','bitrina_chk'];
        if (!in_array($request->field, $allowedFields)) {
            return response()->json([
                'success' => false
            ], 400);
        }
        $record->{$request->field} = $request->value;
        $record->save();
        return response()->json([
            'success' => true
        ]);
        }

}