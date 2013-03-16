<?php
session_start();
require('functions.php');

?>
<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8" />
  </head>
  <body>

    <?php require('header.php'); ?>
    
    <h1>Local Frabble</h1>
    
    <?php 
    
	    $movie = getMovie();
	    
	    $movie = $movie['Items'][0];
	    
	    $_SESSION['movie'] = $movie;
	    
	    $words = explode(' ',$movie['title']);
	    
	    $display = array();
	    
	    foreach($words as $word) {
	    	
	    	if (strlen($word) < 3) {
		    	$display[] = array('type'=>'text','word'=>$word,'result'=>$word);
	    	} else {
	    	
		    $gabble = getGabbleFor($word);
		    
			    if (is_array($gabble)) {
				    $display[] = array('type'=>'picture','word'=>$word,'result'=>$gabble[0]);
			    } else {
			    	$display[] = array('type'=>'text','word'=>$word,'result'=>$word);
			    }
		    }
	    }
	    
	    foreach($display as $d) {
		    if ($d['type'] == 'text') {
			    echo $d['result'];
		    } else {
			    echo '<img name="'.$d['word'].'" src="'.$d['result'].'" />';
		    }
	    }
	    
 
    ?>
    
    <?php require('footer.php'); ?>
  </body>
</html>