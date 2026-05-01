<?php

namespace App\Helpers;

use App\Models\MediaSource;
use App\Models\Subject;
use App\Models\Prompt;
use App\Models\AIProvider;
use App\Http\Controllers\Auth\SubjectController;
use App\Http\Controllers\Auth\PromptController;

class RSSFeed
{

public static function getRSS($rssFeedUrl = "https://example.com/rss-feed.xml") {
        // Initialize a cURL session
        $ch = curl_init();
        // Set cURL options
        curl_setopt($ch, CURLOPT_URL, $rssFeedUrl);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
        curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);
        curl_setopt($ch, CURLOPT_FOLLOWLOCATION, true); // Follow redirects if any
        // Execute the cURL session
        $response = curl_exec($ch);
        // Check for errors
        if (curl_errno($ch)) {
            echo 'Curl error: ' . curl_error($ch);
        } else {
          $xmlObject = simplexml_load_string($response);
          // Convert SimpleXMLElement object to an array
          $rssArray = json_decode(json_encode($xmlObject), true);
        }
        $result = $rssArray['channel']['item'];
        // Close the cURL session
        curl_close($ch);  
        return $result;
      }





public static function getArticleContent($rssFeedUrl = "https://example.com/rss-feed.xml", $mediaSource) {
        // Initialize a cURL session

        $className = $mediaSource['rssClassContentName'];
        //$className = $mediaSource['rssClassContentName'];

        $ch = curl_init();
        // Set cURL options
        curl_setopt($ch, CURLOPT_URL, $rssFeedUrl);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
        curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);
        curl_setopt($ch, CURLOPT_FOLLOWLOCATION, true); // Follow redirects if any
        // Execute the cURL session
        $response = curl_exec($ch);
        // Check for errors
        if (curl_errno($ch)) {
            echo 'Curl error: ' . curl_error($ch);
        };
        $result = $response;
        // Close the cURL session
        curl_close($ch);  


        $content = [];
      
        $dom = new \DOMDocument();
          @$dom->loadHTML($response); // Suppress warnings if HTML is not well-formed
          $response = mb_convert_encoding($response, 'HTML-ENTITIES', 'UTF-8'); // Convert to HTML-ENTITIES to prevent encoding issues

          // Suppress warnings (e.g., malformed HTML), load HTML content
          @$dom->loadHTML($response);
          // Create a new DOMXPath instance to query the document
          $xpath = new \DOMXPath($dom);

          // Query for div with a specific class name
          // Replace with your desired class name
          $nodes = $xpath->query("//div[contains(@class, '$className')]");

          // Loop through the matching divs and display the HTML content
          foreach ($nodes as $node) {
            $content[] =  $dom->saveHTML($node);
          }
        return implode("\n",$content);
    }

    public static function ArticleStartFromEndTo($article, $srt, $end) {
      if (strpos($article,$srt) !== false) {
        $i_srt = stripos($article,$srt);
        $article = substr($article,$i_srt+strlen($srt),999999);
      }

      if (strpos($article,$end) !== false) {
        $i_end = stripos($article,$end);
        $article = substr($article,0, $i_end);
      }

      return $article;

    }

}