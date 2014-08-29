$(document).ready(function(){
	var windowHeight 	= $(window).height();
	var windowWidth		= $(window).width();
	var footerHeight	= $('footer').height();
	var headerHeight	= $('header').height();
	var count 			= $('.step_control').children().length;
	var mooveStep		= $('.content_creat form ul');
	var select			= 0;

	$('.step_control li').eq(0).addClass('active');

	$('.content_creat form').css({
		width : windowWidth
	});
	$('.content_creat form ul').css({
		width:windowWidth * count
	});
	$('.content_creat form ul li').css({
		width:windowWidth
	});
	$('.step_suiv').click(function( event ) {
		select++;
  		event.preventDefault();
		mooveStep.animate({
			right : windowWidth * select
		});
  		$('.step_control li').eq(select).addClass('active');
  		$('.bg_step_control div').animate({
  			width : 125 * select
  		})
  	});

});