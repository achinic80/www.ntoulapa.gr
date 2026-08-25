<?php

namespace App\Helpers;

use App\Models\MediaSource;
use App\Models\Subject;
use App\Models\Prompt;
use App\Models\AIProvider;

use App\Http\Controllers\Auth\KkController;
use App\Http\Controllers\Auth\AIProviderController;

class WPHelper
{

public static function getFAQs() {
				ini_set("display_errors", "1"); error_reporting(E_ALL);
				$MySQL = "
							SELECT * FROM `wp_terms` 
							LEFT JOIN wp_term_taxonomy ON (wp_terms.term_id = wp_term_taxonomy.term_id) 
							LEFT JOIN wp_term_relationships ON (wp_term_taxonomy.term_id = wp_term_relationships.term_taxonomy_id) 
							LEFT JOIN wp_posts ON (wp_posts.id = wp_term_relationships.object_id) 
							where wp_terms.name='FAQS';
							";

				$conn = mysqli_connect(DB_HOST, DB_USER, DB_PASSWORD, DB_NAME);mysqli_set_charset($conn, 'utf8');
				$r2 = $conn->query($MySQL);
				$faqs = array();
				while ($rs = $r2->fetch_assoc())  {
					$faq['question'] = $rs['post_title'];
					$faq['answer'] = $rs['post_content'];
					$faqs[]=$faq;
				}
			return $faqs;
		}


public static function getPageContent($page_title) {
				ini_set("display_errors", "1"); error_reporting(E_ALL);
				$MySQL = "SELECT * FROM `wp_posts` where post_title = '".$page_title."' and ping_status='closed' and comment_status='closed' ";
				$out = "not found page conent for title = #".$page_title."# ";

				$conn = mysqli_connect(DB_HOST, DB_USER, DB_PASSWORD, DB_NAME);mysqli_set_charset($conn, 'utf8');
				$r2 = $conn->query($MySQL);
				while ($rs = $r2->fetch_assoc())  {
								$out = $rs['post_content'];
				}
				$out = str_replace(IMGS_REPLACE_FROM, IMGS_REPLACE_TO, $out);
				return $out;
}
  
}
