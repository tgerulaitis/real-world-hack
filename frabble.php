<?php
require('functions.php');

?>

<!DOCTYPE html>
<!--[if IE 8]> 				 <html class="no-js lt-ie9" lang="en"> <![endif]-->
<!--[if gt IE 8]><!--> <html class="no-js" lang="en"> <!--<![endif]-->

<head>
	<meta charset="utf-8" />
  <meta name="viewport" content="width=device-width" />
  <title>Frabble</title>
  <link rel="stylesheet" href="stylesheets/normalize.css" />
  <link rel="stylesheet" href="stylesheets/foundation.css" />
  <link rel="stylesheet" href="stylesheets/style.css" />
  <link href='http://fonts.googleapis.com/css?family=Lato' rel='stylesheet' type='text/css'>
  <link href='http://fonts.googleapis.com/css?family=Open+Sans' rel='stylesheet' type='text/css'>
  
  <script src="//ajax.googleapis.com/ajax/libs/jquery/1.9.1/jquery.min.js"></script>
  <script src="frabble.js"></script>
  <script src="javascript/vendor/custom.modernizr.js"></script>

</head>
<body>
<?php require('header.php'); ?>
	<div class="row">
		<div class="large-12 columns">
		  <div class="header">
  			<h1 class="logo">Fra<span>bble</span><span class="beta"> beta</span></h1>
			</div>
		</div>
	</div>

	<div class="row">
  	<div class="large-12 columns">
  	  <div class="block">
  	    <h4 class="subheader">Guess the movie title</h4>
  	    <a href="#" class="try right" id="start">Try another</a>

  	    <ul class="large-block-grid-6 small-block-grid-3" id="imagelist">
  	      <li><img src="http://placehold.it/100x100"/></li>
  	      <li><img src="http://placehold.it/100x100"/></li>
  	      <li><img src="http://placehold.it/100x100"/></li>
  	      <li><img src="http://placehold.it/100x100"/></li>
  	      <li><img src="http://placehold.it/100x100"/></li>
  	      <li><img src="http://placehold.it/100x100"/></li>  	        	        	        	        	      
  	    </ul>  	    
  	  </div>
  	</div>
	</div>
	
	<div class="row">
  	    <div class="large-12 columns">
  	    <div class="block">
  	    <h4 class="subheader">Your answer</h4>
              <div class="row collapse">
                <div class="small-10 columns">
                  <input id="myanswer" type="text" placeholder="Movie title...">
                </div>
                <div class="small-2 columns">
                  <a href="#" class="button prefix" id="answer">Guess</a>
                </div>
              </div>
            </div>
  	    </div>
	</div>
	<div class="row">
  	<div class="large-12 columns">
  	  <div id="theanswer" class="block">
  	   *drum roll....*
  	  </div>
  	</div>
	</div>
	
	
	<div class="row">
  	<div class="large-12 columns">
  	  <div class="block">
  	   <h4 class="subheader">Need a hint?</h4>
  	   <hr />
  	       <ul class="icons small-block-grid-1 large-block-grid-2">
    	       <li id="actor">
	    	       <strong>Staring:</strong>
	    	       <a href="#" id="actorhint" class="try">Reveal hint</a>
	    	       <span id="actorhintval" class="hidden"></span>
    	       </li>
    	       <li id="director">
	    	       <strong>Director:</strong>
	    	       <a href="#" id="directorhint" class="try">Reveal hint</a>
	    	       <span id="directorhintval" class="hidden"></span>
    	       </li>
    	       <li id="year">
	    	       <strong>Year:</strong>
	    	       <a href="#" id="yearhint" class="try">Reveal hint</a>
	    	       <span id="yearhintval" class="hidden"></span>
    	       </li>
    	       <li id="genre">
	    	       <strong>Genre:</strong>
	    	       <a href="#" id="genrehint" class="try">Reveal hint</a>
	    	       <span id="genrehintval" class="hidden"></span>
    	       </li>
  	       </ul>
  	  </div>
  	</div>
	</div>

	<div class="row">
  	<div class="large-12 columns">
  	  <div class="footer">Made by <a href="http://stormconsultancy.co.uk">Storm</a> &amp; Friends at <a href="http://realworldstudios.com/">Real World Studios</a> as part of <a href="http://bathdigitalfestival.com">Bath Digital Festival</a>
  	  </div>
  	</div>
	</div>
	
  <?php require('footer.php'); ?>
</body>
</html>
