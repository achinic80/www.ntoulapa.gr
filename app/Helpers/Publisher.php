<?php

namespace App\Helpers;

use App\Models\MediaSource;
use App\Models\Subject;
use App\Models\Prompt;
use App\Models\AIProvider;
use App\Http\Controllers\Auth\MediaController;
use App\Http\Controllers\Auth\SubjectController;
use App\Http\Controllers\Auth\PromptController;
use App\Http\Controllers\Auth\PromptCategoryController;
use App\Http\Controllers\Auth\MotherCompanyController;
use App\Http\Controllers\Auth\AIProviderController;
use App\Http\Controllers\Auth\ContentSiteController;
use Illuminate\Support\Facades\DB;

class Publisher
{

    public static function gridAllPublisherTablesJoins($PublisherID) {
    $sql = "
            SELECT * FROM `ms_contentpublisher` as contentpublisher 
            JOIN ms_contentsite as contentsite on contentsite.ContentPublisherID = contentpublisher.ID 
            JOIN ms_contentsitefeed as contentsitefeed on contentsitefeed.ContentSiteID = contentsite.ID
            JOIN ms_prompt as prompt2 on prompt2.ID = contentsitefeed.PromptID
            
            JOIN ms_mediasourceoncontentsitefeed as mediasourceoncontentsitefeed on mediasourceoncontentsitefeed.ContentSiteFeedID = contentsitefeed.ID 
            JOIN ms_mediasource as mediasource on mediasource.ID = mediasourceoncontentsitefeed.MediaSourceID
            JOIN ms_prompt as prompt1 on prompt1.ID = mediasourceoncontentsitefeed.PromptID
            ";
    $results2 = DB::select($sql, []);
    $results = json_decode(json_encode($results2), true);

    


        $result['records'] = $results;
        $result ['cols'] = [
            0 => [
                "FieldCaption" => "Domain",
                "FieldName" => "Domain",
                "Width" => 100
            ],
            1 => [
               "FieldCaption" => "Language",
               "FieldName" => "Language",
               "Width" => 100
        ]
        ];
        return self::renderGrid($result);
    }


   
    public static function gridContentSite($PublisherID) {

        $result['records'] = ContentSiteController::getByContentPublisherID($PublisherID);
        $result ['cols'] = [
            0 => [
                "FieldCaption" => "Domain",
                "FieldName" => "Domain",
                "Width" => "Domain"
            ],
            1 => [
               "FieldCaption" => "Language",
               "FieldName" => "Language",
               "Width" => "Language"
        ]
        ];
        return self::renderGrid($result);
    }

    public static function renderGrid($data) {
            $html = [];
            $cols = $data['cols'];
            $html[] = "<table>";

            $html[] = "<tr>";
            foreach ($cols as $key => $value) {
               $html[] = "<th>".$value['FieldCaption']."</th>";
            }
            $html[] = "</tr>";
            foreach ($data['records'] as $key => $value) {
                $html[] = "<tr>";
                foreach ($cols as $key2 => $value2) {
                $html[] = "<td>".$value[$value2['FieldName']]."</td>";
                }
                $html[] = "</tr>";
             }
            $html[] = "</table>";
            return implode("\n",$html);
    }


}