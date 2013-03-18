$(document).ready(function() {

	startGame();

	$('#start').click(function(e) {
		startGame();
		e.preventDefault();
	});
	
	$('#answer').click(function(e) {
		testAnswer();
		e.preventDefault();
	});
	
	$('#actorhint').click(function(e) {
		actorHint();
		e.preventDefault();
	});
	
	$('#directorhint').click(function(e) {
		directorHint();
		e.preventDefault();
	});
	
	$('#yearhint').click(function(e) {
		yearHint();
		e.preventDefault();
	});
	
	$('#genrehint').click(function(e) {
		genreHint();
		e.preventDefault();
	});
	
	
});

function startGame() {

  $('#imagelist').html('<h5 class="subheader">Loading your next movie title... Please wait!</h5>');
  $('#myanswer').val('');
	$('#theanswer').removeClass("winner");

  $.getJSON('/ajax.php?method=getNewMovie', function(data) {
    var items = [];
    words = data.words;
    $.each(words, function(index, word) {
      if(word.type == 'text'){
      	items.push('<li class="'+ word.type +'">' + word.result + '</li>');
      }
      else{
      	items.push('<li class="'+ word.type +'"><img src="' + word.result + '" /></li>');
      }
    });
    $('#imagelist').html(items.join(''));
  }).error(function() {
    alert("We're sorry - We couldn't load a movie title at this time. We're using a lot of beta APIs here and one of them returned something we didn't expect.");
  });;
  
  $('#theanswer').replaceWith('<div id="theanswer" class="block">Awaiting answer...</div>');
  $('#actorhintval').empty();
  $('#directorhintval').empty();
  $('#yearhintval').empty();
  $('#genrehintval').empty();
  
  
  $('#actorhint').show();
  $('#directorhint').show();
  $('#yearhint').show();
  $('#genrehint').show();
  
  return(false);	  	
}


function testAnswer() {

		var thefinalanswer = $('#myanswer').val();		
  	    $.getJSON('/ajax.php?method=guessMovie&answer='+thefinalanswer, function(data) {
	  	    var items = [];
	  	    if(data.correct == true){
	  	    	items.push('Correct!');
	  	    	$('#theanswer').addClass("winner");
	  	    }
	  	    else{
	  	    	items.push('Try Again...');
          	$('#theanswer').removeClass("winner");
		  	}
		  	$('#theanswer').html(items.join(''));
	  	});

		return(false);	  	
}

function actorHint() {	
  	    $.getJSON('/ajax.php?method=revealHint&type=starring', function(data) {
		  	$('#actorhintval').html(data.hint.value);
		  	$('#actorhint').hide();
	  	});
		return(false);	  	
}

function yearHint() {	
  	    $.getJSON('/ajax.php?method=revealHint&type=year', function(data) {
		  	$('#yearhintval').html(data.hint.value);
		  	$('#yearhint').hide();
	  	});
		return(false);	  	
}

function directorHint() {	
  	    $.getJSON('/ajax.php?method=revealHint&type=director', function(data) {
		  	$('#directorhintval').html(data.hint.value);
		  	$('#directorhint').hide();
	  	});
		return(false);	  	
}

function genreHint() {	
  	    $.getJSON('/ajax.php?method=revealHint&type=genre', function(data) {
		  	$('#genrehintval').html(data.hint.value);
		  	$('#genrehint').hide();
	  	});
		return(false);	  	
}

