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
use Illuminate\Support\Facades\File;


class UploadImagesController extends Controller
{


    /**
     * delbase64image
     */
    public static function delbase64image(Request $request)
    {
                    echo "<hr>";
                    $arg1 = $request->input('arg1');
                    $ontotita = $request->input('ontotita');
                    $ontotita_id = $request->input('ontotita_id');
                    $prefix = $request->input('prefix');
					echo "arg1:".$arg1."<hr>";
                    echo "ontotita:".$ontotita."<hr>";
                    echo "ontotita_id:".$ontotita_id."<hr>";
                    echo "prefix:".$prefix."<hr>";
                    $sql = " 
                        UPDATE tbl_upload_imgs set sort_aa=-999 WHERE 
                        ontotita='".$ontotita."' 
                        AND ontotita_id='".$ontotita_id."'
                        AND sort_aa='".$arg1."'  ";
                        echo $sql;
                        DB::update($sql, []);
    }

    /**
     * saveBase64Image
     */
    public static function saveBase64Image(Request $request)
    {
                    echo "<hr>";
                    $arg1 = $request->input('arg1');
                    $arg2 = $request->input('arg2');
                    $ontotita = $request->input('ontotita');
                    $ontotita_id = $request->input('ontotita_id');
                    $prefix = $request->input('prefix');
					echo "arg1:".$arg1."<hr>";
                    echo "ontotita:".$ontotita."<hr>";
                    echo "ontotita_id:".$ontotita_id."<hr>";
                    echo "prefix:".$prefix."<hr>";

					if ($arg2=="") return;
                    if (substr($arg2,0,4) == 'http') return;

                    $path = public_path('uploads');
                     // create folder if not exists
                    if (!File::exists($path)) {
                        File::makeDirectory($path, 0755, true);
                    }


                                        // Detect image type
                    $extension = 'png';
                    $img = $arg2;

                    $aa = $arg1;

                    if (strpos($img, 'data:image/jpeg;base64,') === 0) {
                        $img = str_replace('data:image/jpeg;base64,', '', $img);
                        $extension = 'jpg';
                    } elseif (strpos($img, 'data:image/jpg;base64,') === 0) {
                        $img = str_replace('data:image/jpg;base64,', '', $img);
                        $extension = 'jpg';
                    } elseif (strpos($img, 'data:image/png;base64,') === 0) {
                        $img = str_replace('data:image/png;base64,', '', $img);
                        $extension = 'png';
                    }



                    $counter = $arg1;
                        do {
                            $filenameSaved = 'image_' . $prefix . '_' . $ontotita . '_' . $ontotita_id . '_' . $counter . '.' . $extension;
                            $fullPath = $path . '/' . $filenameSaved;
                            $counter++;
                        } while (file_exists($fullPath));

                   $sql = " 
                        UPDATE tbl_upload_imgs set sort_aa=-999 WHERE 
                        ontotita='".$ontotita."' 
                        AND ontotita_id='".$ontotita_id."'
                        AND sort_aa='".$aa."'  ";
                       echo $sql;
                        DB::update($sql, []);

                    $sql = " 
                        INSERT INTO tbl_upload_imgs   
                        (ontotita ,	ontotita_id, filename, sort_aa) 
                        VALUES ('".$ontotita."','".$ontotita_id."','".$filenameSaved."','".$aa."')  ";

                       echo $sql;
                        DB::insert($sql, []);

					$img = str_replace(' ', '+', $img);
					$data = base64_decode($img);
                    
					file_put_contents($path . '/' .$filenameSaved,  $data);
					echo "<div id='rs_jx_data'>";
					echo "<div id='rs".$arg1."' style='float:left;display:inline-block;border:2px solid #d10000;'>";
					echo "<img src='{{ asset('uploads/'.$filenameSaved) }}'><br><b>{{ asset('uploads/'.$filenameSaved) }}</b>";
					echo "</div>";
					echo "</div>";
    }










/**
     * saveuploadedphotoBase64Image
     */
    public static function saveuploadedphotoBase64Image(Request $request)
    {
                    echo "<hr>";
                    $arg1 = $request->input('arg1');
                    $arg2 = $request->input('arg2');
                    $ontotita = $request->input('ontotita');
                    $ontotita_id = $request->input('ontotita_id');
                    $prefix = $request->input('prefix');
					echo "arg1:".$arg1."<hr>";
                    echo "ontotita:".$ontotita."<hr>";
                    echo "ontotita_id:".$ontotita_id."<hr>";
                    echo "prefix:".$prefix."<hr>";

					if ($arg2=="") return;
                    if (substr($arg2,0,4) == 'http') return;

                    $path = public_path('uploads');
                     // create folder if not exists
                    if (!File::exists($path)) {
                        File::makeDirectory($path, 0755, true);
                    }


                                        // Detect image type
                    $extension = 'png';
                    $img = $arg2;

                    $aa = $arg1;

                    if (strpos($img, 'data:image/jpeg;base64,') === 0) {
                        $img = str_replace('data:image/jpeg;base64,', '', $img);
                        $extension = 'jpg';
                    } elseif (strpos($img, 'data:image/jpg;base64,') === 0) {
                        $img = str_replace('data:image/jpg;base64,', '', $img);
                        $extension = 'jpg';
                    } elseif (strpos($img, 'data:image/png;base64,') === 0) {
                        $img = str_replace('data:image/png;base64,', '', $img);
                        $extension = 'png';
                    }

                    $counter = $arg1;
                        do {
                            $filenameSaved = 'image_' . $prefix . '_' . $ontotita . '_' . $ontotita_id . '_' . $counter . '.' . $extension;
                            $fullPath = $path . '/' . $filenameSaved;
                            $counter++;
                        } while (file_exists($fullPath));

                   $sql = " 
                        UPDATE tbl_upload_imgs set sort_aa=-999 WHERE 
                        ontotita='".$ontotita."' 
                        AND ontotita_id='".$ontotita_id."'
                        AND sort_aa='".$aa."'  ";
                       echo $sql;
                        DB::update($sql, []);

                    $sql = " 
                        INSERT INTO tbl_upload_imgs   
                        (ontotita ,	ontotita_id, filename, sort_aa) 
                        VALUES ('".$ontotita."','".$ontotita_id."','".$filenameSaved."','".$aa."')  ";

                       echo $sql;
                        DB::insert($sql, []);

					$img = str_replace(' ', '+', $img);
					$data = base64_decode($img);
                    
					file_put_contents($path . '/' .$filenameSaved,  $data);
					
    }


    
}