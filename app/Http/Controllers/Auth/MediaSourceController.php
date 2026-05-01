<?php

namespace App\Http\Controllers\Auth;

use App\Models\MediaSource;
use App\Http\Controllers\Controller;
use Illuminate\Auth\Events\Registered;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\Rules;
use Illuminate\View\View;
use App\Helpers\UIHelper;

class MediaSourceController extends Controller
{
    
    /**
     * Display ALL RECORDS CATALOG.
     */
    public static function getAll()
    {
        $records = [];
        $Subjects = MediaSource::where('Name', 'LIKE', '%%')->orderBy('Name', 'asc')->get();
        foreach ($Subjects as $post) {
            $rec = $post->getAttributes();
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
        $subject = MediaSource::where('ID', '=', $id)->get();
        $rec = $subject[0]->getAttributes();
        return $rec;
    }

    /**
     * Display the RECORD FOR EDIT.
     */
    public function edit(Request $request, $id): View
    {
        $idFromRequest = $request->route('id');
        $records = [];
        $records = MediaSource::where('ID', '=', $idFromRequest)->get();
        foreach ($records as $post) {
            $rec = $post->getAttributes(); 
            $rec['Combo_SubjectID'] = UIHelper::view_combo("getSubjectOptions",$rec['SubjectID']);
            $rec['Combo_PromptID'] = UIHelper::view_combo("getPromptOptions",$rec['PromptID']);
            $rec['Combo_SourceType'] = UIHelper::view_combo("getSourceTypeOptions",$rec['SourceType']);
            $rec['Combo_Language'] = UIHelper::view_combo("getLanguageOptions",$rec['Language']);
            
        }
        return view('mediasource.partials.edit', ['user' => $request->user(),])->with('rec', $rec);
    }

    /**
     * Update RECORD.
     */
    public function update(Request $request)
    {
        $id = $request->input('ID');
        // Find the record by ID
        $record = MediaSource::find($id);
        // Check if record exists
        if (!$record) {
            return response()->json(['message' => 'Record not found'], 404);
        }
        $record->SourceName = $request->input('SourceName');
        $record->SourceDescription = $request->input('SourceDescription');
        $record->CompanyID = $request->input('CompanyID');
        $record->ListSourceURL = $request->input('ListSourceURL');
        $record->ListSourceFeed = $request->input('ListSourceFeed');
        $record->Language = $request->input('Language');
        $record->SourceType = $request->input('SourceType');
        $record->PromptID = $request->input('PromptID');
        $record->save();
        return redirect()->route('subject.show');
    }

    /**
     * Delete RECORD form.
     */
    public function destroy(Request $request)
    {
        return redirect()->route('subject.show');
    }

    /**
     * Display RECORDS CATALOG.
     */
    public function show(Request $request): View
    {
    $query = MediaSource::query();
    if ($request->has('SourceName') && $request->input('SourceName') !== '') {
        $query->where('SourceName', 'like', '%' . $request->input('SourceName') . '%');
    }
    $sortBy = $request->input('sort_by', 'SourceName');  // Default sort by 'title'
    $sortOrder = $request->input('sort_order', 'asc');  // Default sort order 'ascending'
    $query->orderBy($sortBy, $sortOrder);

    $records = $query->paginate(4);
    return view('mediasource.show', compact('records'));
    }


}
