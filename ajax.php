<?php
require('functions.php');

if (isset($_POST['method'])) $_GET = $_POST;

switch ($_GET['method']) {
	case 'getNewMovie':
		getNewMovie();
	  break;
	default:
		break;
}

function getNewMovie() {
	
  $movie = getMovie();
  
  $movie = $movie['Items'][0];
  
  $_SESSION['movie'] = $movie;
  
  $words = explode(' ',$movie['title']);
  
  $display = array();
  
  foreach($words as $word) {
  	
  	if (strlen($word) < 3) {
    	$display[] = array('type'=>'text','result'=>$word);
  	} else {
  	
    $gabble = getGabbleFor($word);
    
	    if (is_array($gabble)) {
		    $display[] = array('type'=>'picture','result'=>$gabble[0]);
	    } else {
	    	$display[] = array('type'=>'text','result'=>$word);
	    }
    }
  }
	
	die(json_encode(array('result'=>'success','words'=>$display)));
	
}

?>