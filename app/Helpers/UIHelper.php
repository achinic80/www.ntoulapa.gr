<?php

namespace App\Helpers;

use App\Models\MediaSource;
use App\Models\Subject;
use App\Models\Prompt;
use App\Models\AIProvider;

use App\Http\Controllers\Auth\KkController;
use App\Http\Controllers\Auth\AIProviderController;

class UIHelper
{

    // δημιουργεί ένα combo με τα πεδία x 2  
    // e.g.
    //  Name ASC
    //  Name DESC
    //  Description ASC
    //  Description DESC
    public static function sortbychoices($sortchoices, $nowvalue)
    {
        $html = [];
        $html[] = "<select size=1 name='sortby' id='sortby'>";
        foreach($sortchoices as $key => $value) {
        $html[] = "<option value='{$value} ASC' ";
        if ($value . " ASC" == $nowvalue) $html[] = "selected";
        $html[] = ">{$key} ASC</option> ";
        $html[] = "<option value='{$value} DESC' ";
        if ($value . " DESC" == $nowvalue) $html[] = "selected";
        $html[] = ">{$key} DESC</option> ";
        }
        $html[] = "</select>";
        return implode("\n", $html);
    }

    public static function delRecButton($id)
    {
        return strtoupper($id);
    }

    public static function getΚΚOptions()
    {
        $data = KkController::getAll();
        $result['name'] = "ck_kk";
        $result['data'] = $data;
        return $result;
    }

    public static function dateToDateNum($date)
    {
        $datenum = "";  //2025-01-01
        if ($date=="") return 0;
        $datenum .= substr($date,0,4);
        $datenum .= substr($date,5,2);
        $datenum .= substr($date,8,2);
        return $datenum;
    }



    public static function view_combo($method = "",  $selected_id = 999)
    {
        $instance = new UIHelper();
        if (!method_exists($instance, $method )) {
            echo "Method [".$method."] not Exist to get DATA in Combo. Class -> ".__FILE__;
            exit();
        } else {
            $res = call_user_func([$instance, $method]);
        }
       
        $data = $res['data'] ;
        $html = [];
        $html[] = "<select size=1 name='".$res['name']."' id='".$res['name']."' class='mt-1 block w-full border-gray-300 rounded-md shadow-sm'>";
        foreach ($data as $rec) {

            if (isset($rec['Name']))  $txt = $rec['Name'];
            if (isset($rec['txt']))   $txt = $rec['txt'];

            $html[] = '<option ';
            if ($rec['ID'] == $selected_id)  $html[] = ' selected ';
            $html[] = 'value="'.$rec['ID'].'">'.$txt.'</option>';
        }
        $html[] = '</select>';
        return implode("\n",$html);
    }    
}
