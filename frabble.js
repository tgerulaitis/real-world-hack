$(document).ready(function() {
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
	  	});
	  	$('#theanswer').replaceWith('<div id="theanswer" class="block">*drum roll....*</div>');
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

