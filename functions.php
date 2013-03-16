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

?>