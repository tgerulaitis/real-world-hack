<?php

session_start();

function getMovie() {
	$rand = rand(0,500);
	$url = 'http://api-dvlp.thefilter.com/realworldhack/video/realtime/video?$$orderby=hype%20desc&$format=jsonverbose&g=storm&$top=1&$skip='.$rand;
	
	$data = file_get_contents($url);
	
	$movie = json_decode($data,true);
	
	return $movie;
}

function getGabbleFor($title) {
	
	$url = 'http://testapi.gabble.com/Files?pageSize=30&search='.urlencode($title);
	
	$data = file_get_contents($url);
	
	$json = json_decode($data, true);
	
	if (is_array($json)) $json = array_unique($json);
		
	return $json;
	
}

function isValidWord($word) {
    return (dictionaryLookup($word)) ? true : false;
}

$DICTIONARY_CACHE = array();

function dictionaryLookup($word) {
    $api_slug = "http://words.bighugelabs.com/api/2/5bac5e5cc52dca2801381d37b54daa3d";
    $api_format = "json";
    
    if (isset($GLOBALS["DICTIONARY_CACHE"][$word])) {
        return $GLOBALS["DICTIONARY_CACHE"][$word];
    } else { 
        $json = @file_get_contents($api_slug . "/" . $word . "/" . $api_format);
        $contents = json_decode($json, true);
        $GLOBALS["DICTIONARY_CACHE"][$word] = $contents;
        return $contents;
    }
}

?>