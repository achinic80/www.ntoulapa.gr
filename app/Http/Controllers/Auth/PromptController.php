<?php

namespace App\Http\Controllers\Auth;

use App\Models\Prompt;
use App\Models\PromptCategory;
use App\Helpers\UIHelper;
use App\Http\Controllers\Controller;
use Illuminate\Auth\Events\Registered;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\Rules;
use Illuminate\View\View;

class PromptController extends Controller
{
       
    /**
    * Display ALL RECORDS CATALOG.
    */
    public static function getAll()
    {
        $records = [];
        $Subjects = Prompt::where('Name', 'LIKE', '%%')->orderBy('Name', 'asc')->get();

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
        $subject = Prompt::where('ID', '=', $id)->get();
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
        $rec['PromptText'] = "";
        $rec['PromptCategoryID']= "";
        $rec['AIProviderID']= "";
        $records = Prompt::where('ID', '=', $idFromRequest)->get();
        foreach ($records as $post) {
            $rec = $post->getAttributes(); 
            $rec['Combo_PromptCategory'] = UIHelper::view_combo("getPromptCategoryOptions",$rec['PromptCategoryID']);
                $rec['Combo_AiProvider'] = UIHelper::view_combo("getAiProviderOptions",$rec['AIProviderID']);

            
        }
        return view('prompt.partials.edit', ['user' => $request->user(),])->with('rec', $rec);
    }

    /**
     * Update RECORD.
     */
    public function update(Request $request)
    {
        $id = $request->input('ID');
        $record = Prompt::find($id);
        if (!$record) {
            return response()->json(['message' => 'Record not found'], 404);
        }
        $record->Name = $request->input('Name');
        $record->Description = $request->input('Description');
        $record->PromptText = $request->input('PromptText');
        $record->PromptCategoryID = $request->input('PromptCategoryID');
        $record->AIProviderID = $request->input('AIProviderID');
        $record->save();
        return redirect()->route('prompt.show');
    }

    /**
     * Display the RECORDS.
     */
    public function show(Request $request): View
    {
        $rsPromptCategories = PromptCategory::all();
        $rsPrompts = Prompt::all();

        $PromptCategories = [];
        foreach ($rsPromptCategories as $rec) {
            $PromptCategories[] = $rec->getAttributes();
        }
        $Prompts = [];
        foreach ($rsPrompts as $rec) {
            $Prompts[] = $rec->getAttributes();
        }
        $data['PromptCategories'] = $PromptCategories;
        $data['records'] = $Prompts;
        return view('prompt.show', [
            'user' => $request->user(),
        ])->with('data', $data);
    }

    /**
    * Display AI prompts filtered by category.
    */
    public function getpromptsbycategory(Request $request): View
    {
        $idFromRequest = $request->input('PromptCategoryID');
        $rsPrompts = Prompt::where('PromptCategoryID', '=', $idFromRequest)->orderBy('Name', 'asc')->get();
        $Prompts = [];
        foreach ($rsPrompts as $rec) {
            $Prompts[] = $rec->getAttributes();
        }
        $data['Prompts'] = $Prompts;
        return view('prompt.jx_getbycategory', [
            'user' => $request->user(),
        ])->with('data', $data);
    }

}


  