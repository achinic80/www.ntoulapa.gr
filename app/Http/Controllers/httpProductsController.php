<?php

namespace App\Http\Controllers;

use App\Http\Requests\ProfileUpdateRequest;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Redirect;
use Illuminate\View\View;
use Illuminate\Support\Facades\DB;
use App\Models\Products;
use Jenssegers\Agent\Agent;
 
class httpProductsController extends Controller
{

// Ντουλάπες>>Συρόμενες
// Ντουλάπες>>Ανοιγόμενες
// Ντουλάπες>>Walk-In
// Γυψοσανίδες>>Ψευδοροφές
// Γυψοσανίδες>>Χωρίσματα
// Γυψοσανίδες>>Κρυφοί φωτισμοί

    /**
     * Display RECORDS CATALOG.
     */
    public function loadProductsImages($products)
    {
        $url = asset('uploads/');
        foreach ($products as $product) {
            $sql = "SELECT *
                    FROM tbl_upload_imgs
                    WHERE ontotita = ?
                    AND ontotita_id = ? AND sort_aa<>-999 
                    ORDER BY sort_aa";
            $images = DB::select($sql, ['chatgpt', $product->id]);
            if (isset($images[0]->filename))  $product->img1 = $url."/".$images[0]->filename;
        }
        return $products;
    }


    /**
     * Display RECORDS CATALOG.
     */
    public function productssearch(Request $request): View
    {
    $agent = new Agent();
    $subcategory1 = $request->input('subcategory1');

    $query = Products::query();
    $sortBy = 'cat1';
    $sortOrder = $request->input('sort_order', 'asc');
  
    $products = Products::where('cat1', 'Γυψοσανίδες')
        ->orderBy($sortBy, $sortOrder)
        ->get();
    $products = $this::loadProductsImages($products);    
    //  echo "<pre>";    print_r($products);    echo "</pre>";
    $data['products'] = $products;
    $data['workers'] = $products;
    $data['footermenuchoices'] = MenusController::getFooterMenuChoices($request);
    if ($agent->isMobile()) {
    return view('ntoulapa.productsdesktop', [])->with('data', $data);
    }
    else {
    return view('ntoulapa.productsmobile', [])->with('data', $data);
    }
    }


    /**
     * Display RECORDS CATALOG.
     */
    public function main(Request $request): View
    {
    $subcategory1 = $request->input('subcategory1');

    $query = Products::query();
    $sortBy = 'cat1';
    $sortOrder = $request->input('sort_order', 'asc');
  
    $products = Products::where('cat1', $subcategory1)
        ->orderBy($sortBy, $sortOrder)
        ->get();

    $data['products'] = $products;
    $data['workers'] = $products;
    return view('ntoulapa.main', [])->with('data', $data);
    }
}
