$(document).ready(function(){
	
	window.onload = init;

	function init ()
	{
		reziseElmt();
		addActive();
	}

	function reziseElmt (argument) 
	{
		var windowHeight 	= $(window).height();
		var windowWidth		= $(window).width();
		var navWidth		= $('nav').width();
		var headerHeight	= $('header').height();
		var content 		= $('.content');

		content.css({
			'padding-left':navWidth,
			'padding-top':headerHeight
		});
	}

	window.diaNb = function(sportNb, tourismeNb, gotoworkNb)
	{
		$('.sport .dia-ct').height(sportNb+'%');
		$('.tourisme .dia-ct').height(tourismeNb+'%');
		$('.gotowork .dia-ct').height(gotoworkNb+'%');
	}

	function addActive ()
	{
		var url = window.location.pathname;
		url = url.split("/");
		urlLenght = url.length - 1; 		
	}
});


