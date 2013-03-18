<?php
require('functions.php');

if (isset($_POST['method'])) $_GET = $_POST;

switch ($_GET['method']) {
  case 'revealAnswer':
    revealAnswer();
    break;
	case 'getNewMovie':
		getNewMovie();
    break;
  case 'guessMovie':
    guessMovie();
    break;
  case 'revealHint':
    revealHint();
    break;
	default:
		break;
}

function getNewMovie() {

  $movie = "";

  while (!$movie) {
    $candidate = getMovie();
  
    $candidate = $candidate['Items'][0];
  
    $words = explode(' ',$candidate['title']);

    $valid = true;
    foreach ($words as $word) {
        if (!isValidWord($word)) {
            $valid = false;
            break;
        }
    }
    if (!$valid) {
        continue;
    }
    $movie = $candidate;
  }
  
  $words = explode(' ',$movie['title']);

  $_SESSION['movie'] = $movie;
  
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

function guessMovie() {
    if (!isset($_SESSION['movie'])) {
        die(json_encode(array('result'=>'failure','error'=>'No movie chosen')));
    }
    if (!isset($_GET['answer'])) {
        die(json_encode(array('result'=>'failure','error'=>'No answer supplied')));
    }
    
    $movie = $_SESSION['movie'];
    $answer = $_GET['answer'];
    
    if (strtolower($answer) == strtolower($movie['title'])) {
        unset($_SESSION['movie']);
        die(json_encode(array('result'=>'success','correct'=>true,'title'=>$movie['title'])));
    } else {
        die(json_encode(array('result'=>'success','correct'=>false)));
    }  
}

function revealHint() {
    if (!isset($_SESSION['movie'])) {
        die(json_encode(array('result'=>'failure','error'=>'No movie chosen')));
    }
    if (!isset($_GET['type'])) {
        die(json_encode(array('result'=>'failure','error'=>'No hint type supplied')));
    }
    
    $movie = $_SESSION['movie'];
    $type = $_GET['type'];
    $value = "";
    
    switch($type) {
        case 'starring':
            $value = $movie['metadata']['item']['actors']['actor'][0];
            break;
        case 'director':
            $value = $movie['metadata']['item']['directors']['director'];
            if (is_array($value)) {
                $value = $value[0];
            }
            break;
        case 'year':
            $value = $movie['metadata']['item']['releaseYear'];
            break;
        case 'genre':
            $value = $movie['metadata']['item']['genres']['genre'];
            if (is_array($value)) {
                $value = implode(', ', $value);
            }
            break;
        default:
            die(json_encode(array('result'=>'failure','error'=>'No such hint type')));
            break;
    }
    
    die(json_encode(array('result'=>'success','hint'=>array('type'=>$type,'value'=>$value))));
}

function revealAnswer() {
    $movie = $_SESSION['movie'];
    die(json_encode(array('result'=>'success','answer'=>$movie['title'])));
}

?>