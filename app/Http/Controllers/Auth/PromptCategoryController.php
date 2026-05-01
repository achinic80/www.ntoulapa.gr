<?php

namespace App\Http\Controllers\Auth;

use App\Models\PromptCategory;
use App\Http\Controllers\Controller;
use App\Models\User;
use App\Helpers\UIHelper;
use Illuminate\Auth\Events\Registered;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\Rules;
use Illuminate\View\View;

class PromptCategoryController extends Controller
{
         
    /**
     * Display ALL RECORDS CATALOG.
     */
    public static function getAll()
    {
        $records = [];
        $Subjects = PromptCategory::where('Name', 'LIKE', '%%')->orderBy('Name', 'asc')->get();

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
        $subject = PromptCategory::where('ID', '=', $id)->get();
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
        $rec['Name'] = "";
        $rec['Description'] = "";
        $records = PromptCategory::where('ID', '=', $id)->get();
        foreach ($records as $post) {
            $rec = $post->getAttributes();
        }
        $record = $rec;

        $html = view('promptcategory.partials.edit', ['user' => $request->user(),])->with('record', $record)->render();
        return $html;
    }

    /**
     * Update RECORD.
     */
    public function update(Request $request)
    {
        $id = $request->input('ID');
        $record = PromptCategory::find($id);
        if (!$record) {
            return response()->json(['message' => 'Record not found'], 404);
        }
        $record->Name = $request->input('Name');
        $record->Description = $request->input('Description');
        $record->save();
        return redirect()->route('promptcategory.show');
    }

    /**
     * Delete the user's account.
     */
    public function destroy(Request $request): RedirectResponse
    {
        $request->validateWithBag('userDeletion', [
            'password' => ['required', 'current_password'],
        ]);
        
        $user = $request->user();
        Auth::logout();
        $user->delete();
        $request->session()->invalidate();
        $request->session()->regenerateToken();
        return Redirect::to('/');
    }

    /**
     * Display the RECORDS.
     */
    public function show(Request $request): View
    {

        $PromptCategories = PromptCategory::all();
        foreach ($PromptCategories as $post) {
            $records[] = $post->getAttributes();
        }

        $selectedOptions = [
            "aaa" => "aaa",
            "aa4a" => "aa2a",
            "a3aa" => "a3aa",
            "aa5a" => "a4aa"
        ];

        $data['selectedOptions'] = $selectedOptions;
        $data['PromptCategories'] = $records;


        return view('promptcategory.show', [
            'user' => $request->user(),
        ])->with('data', $data);
    }



     /**
     * Display categoryies.
     */
    public function getcategories(Request $request): View
    {
        $rsPrompts = PromptCategory::where('MainCategory', '=', $request->input('MainCategory'))->orderBy('Name', 'asc')->get();
        $PromptCategories = [];
        foreach ($rsPrompts as $rec) {
            $PromptCategories[] = $rec->getAttributes();
        }

        $data['PromptCategories'] = $PromptCategories;
        return view('promptcategory.jx_getpromptcategories', [
            'user' => $request->user(),
        ])->with('data', $data);
    }

}
