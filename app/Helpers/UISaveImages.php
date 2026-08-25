<?php

namespace App\Helpers;


use App\Models\KnowledgeCategory;
use App\Http\Controllers\Auth\KkController;
use App\Http\Controllers\Auth\KnowledgeCategoryController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;


class UISaveImages
{
    public static $imagesDir;
    public static $request;
    public static $ontotita;
    public static $ontotita_id;
    public static $prefix;

    public static function getUploadImagesDir() {
        self::$imagesDir = "." . DIRECTORY_SEPARATOR . 'images';
        return ;
    }



    public static function getUniqueFilename() {
        $dir = self::$imagesDir;
        $filename = self::$prefix . '_' . self::$ontotita . '_' . self::$ontotita_id . '.jpg';
        $filePath = $dir . DIRECTORY_SEPARATOR . $filename;

        if (file_exists($filePath)) {
            $pathInfo = pathinfo($filename);
            $baseName = self::$prefix . '_' . self::$ontotita . '_' . self::$ontotita_id;
            $extension = isset($pathInfo['extension']) ? '.' . $pathInfo['extension'] : '';
            $i = 1;
            while (file_exists($dir . DIRECTORY_SEPARATOR . $baseName . "_" . $i . $extension)) {
                $i++;
            }
            return $baseName . "_" . $i . $extension;
        }
        return $filename;
    }

    public static function base64_to_jpeg($base64_string) {
        $newFilename = self::getUniqueFilename();
        $output_file = self::$imagesDir . DIRECTORY_SEPARATOR .  $newFilename;
        $ifp = fopen( $output_file, 'wb' ); 
        $data = explode( ',', $base64_string );
        fwrite( $ifp, base64_decode( $data[ 1 ] ) );
        fclose( $ifp ); 
        return $output_file; 
    }

    public static function insertToDatabase($aa , $filenameSaved)
    {
        $sql = " SELECT count(*) as tot_recs from tbl_upload_imgs 
        where ontotita='".self::$ontotita."'
        and ontotita_id='".self::$ontotita_id."'
        and sort_aa='".$aa."' ";
        $recs2 = DB::select($sql, []);
        $recs = json_decode(json_encode($recs2), true);
        $tot_recs = $recs[0]['tot_recs'];
        if ( $tot_recs == 0) {
            $sql = " 
            INSERT INTO tbl_upload_imgs   
            (ontotita ,	ontotita_id, filename, sort_aa) 
            VALUES ('".self::$ontotita."','".self::$ontotita_id."','".$filenameSaved."','".$aa."')  ";
            DB::insert($sql, []);
        }
//        id 	ontotita 	ontotita_id 	filename 	ext 	is_img 	width 	height 	img_type 	is_energo 	is_deleted 	sys_save 	is_small 	filename_sm 	width_sm 	height_sm 	caption1 	blob1 	lezanta 	sort_aa
        $sql = " 
          UPDATE tbl_upload_imgs  set filename = '".$filenameSaved."' 
          WHERE ontotita='".self::$ontotita."' 
          and ontotita_id = '".self::$ontotita_id."'
          and sort_aa ='".$aa."'  ";
        DB::update($sql, []);
    }


    public static function saveimages(Request $request, $totImages)
    {
        self::getUploadImagesDir();
        self::$request = $request;
       self::$ontotita = $request->input('ontotita');
       self::$ontotita_id = $request->input('ontotita_id');
       self::$prefix = $request->input('prefix');

       $imgs = [];
     
       for ($t=1;$t<$totImages;$t++) {
       if (null !== $request->input('img'.$t)) {  
            $imgContent = $request->input('img'.$t);
            if (strpos($imgContent,'data:image') !== false) {
                $fileSave = self::base64_to_jpeg($imgContent);
                $fileSave = str_replace(DIRECTORY_SEPARATOR, DIRECTORY_SEPARATOR.DIRECTORY_SEPARATOR, $fileSave);
                self::insertToDatabase($t,$fileSave);
                $imgs[$t] = $fileSave;
            }
        }
       }
       return $imgs;
    }


    public static function loadUploadedImages(&$record, $ontotita, $id, $totImages)
    {
        for ($t=1;$t<=$totImages;$t++) {
            $record['img' . $t] = '';   
            $sql = "SELECT * from tbl_upload_imgs 
            WHERE ontotita = '".$ontotita."' 
            AND ontotita_id='". $id ."' 
            AND sort_aa = '" . $t . "' ";
            $results2 = DB::select($sql, []);
            $results = json_decode(json_encode($results2), true);
            if (isset($results[0])) {
              $res = $results[0];
              $asset = asset($res['filename']);
              $asset = str_replace("/public","/public/uploads",$asset);
              $record['img' . $t] = $asset;
            }
        }
       
        return $record;
    }


    public static function loadFirstUploadedImages(&$imgs, $ontotita, $id, $totImages)
    {
        $imgs[$id]['img1'] = '';   
        $sql = "SELECT * from tbl_upload_imgs 
        WHERE ontotita = '".$ontotita."' 
        AND ontotita_id='". $id ."' 
        AND sort_aa = '1' ";
        $results2 = DB::select($sql, []);
        $results = json_decode(json_encode($results2), true);
        if (isset($results[0])) {
            $res = $results[0];
            $imgs[$id]['img1'] = asset($res['filename']);
        }
        
        return $imgs;
    }
}
