<?php
namespace App\Http\Controllers\Auth;
use App\Models\Ms_User;
use App\Http\Controllers\Controller;
use App\Helpers\UIHelper;
use Illuminate\Auth\Events\Registered;
use Illuminate\Http\Redirect;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\Rules;
use Illuminate\View\View;
class UserController extends Controller
{
    /**
     * Display ALL RECORDS CATALOG.
     */
    public static function getAll()
    {
        $records = [];
        $Users = Ms_User::where('FirstName', 'LIKE', '%%')->orderBy('FirstName', 'asc')->get();
        foreach ($Users as $post) {
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
        $user = Ms_User::where('ID', '=', $id)->get();
        $rec = $user[0]->getAttributes();
        return $rec;
    }
    /**
     * Display the RECORD FOR EDIT.
     */
    public function edit(Request $request, $id): View
    {
        $idFromRequest = $request->route('id');
        $records = [];
        $records = Ms_User::where('ID', '=', $idFromRequest)->get();
        foreach ($records as $post) {
            $rec = $post->getAttributes();
        }
        return view('user.edit', ['user' => $request->user(),])->with('rec', $rec);
    }
    /**
     * Update RECORD.
     */
    public function update(Request $request)
    {
        $id = $request->input('ID');
        // Find the record by ID
        $record = Ms_User::find($id);
        // Check if record exists
        if (!$record) {
            return response()->json(['message' => 'Record not found'], 404);
        }
        $record->Email = $request->input('Email');
        $record->Password = $request->input('Password');
        $record->FirstName = $request->input('FirstName');
        $record->LastName = $request->input('LastName');
        $record->Phone = $request->input('Phone');
        $record->UserGroupID = $request->input('UserGroupID');
        $record->save();
        return redirect()->route('user.show'); 
    }
    /**
     * Delete RECORD form.
     */
    public function destroy(Request $request)
    {
        return redirect()->route('user.show');
    }
    /**
     * Display RECORDS CATALOG.
     */
    public function show(Request $request): View
    {
        $records = [];
        $Users = Ms_User::where('FirstName', 'LIKE', '%%')->orderBy('FirstName', 'asc')->get();
        foreach ($Users as $post) {
            $rec = $post->getAttributes();
            $rec['Button_Del'] = UIHelper::delRecButton($rec['ID'],"ccc");
            $rec['Button_Active'] = UIHelper::delRecButton($rec['ID'],"ccc");
            $records[] = $rec;
        }
        $data['Users'] = $records;
        return view('user.show', [
            'user' => $request->user(),
        ])->with('data', $data);
    }
}