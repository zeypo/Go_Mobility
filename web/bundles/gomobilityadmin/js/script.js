$(document).ready(function(){
	
	window.onload = init;

	function init (){
		reziseElmt();
		diaNb();
	}

	function reziseElmt (argument) {
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

	function diaNb () {
		var sportNb = 10;
		var tourismeNb = 70;
		var gotoworkNb = 20;

		$('.sport .dia-ct').height(sportNb+'%');
		$('.tourisme .dia-ct').height(tourismeNb+'%');
		$('.gotowork .dia-ct').height(gotoworkNb+'%');
	}

});


