$(document).ready(function(){
	
	var imgLength	= $('.slide_phone ul li img').length;


	var windowWidth	= $(window).width(),
		liWidth		= 254,
		widthImg	= $('.slide_phone ul li img').width();

	$('.slide_control ul').empty();
	for (i = 0; i<imgLength; i++) 
	{
		$('.slide_control ul').append('<li></li>')
	};

	$('.slide_control ul li').on('click', function (){
		var liIndex = $(this).index();
		var eqImg	= $('.slide_phone ul li img:eq('+ liIndex +')');
		var scale	= liWidth*liIndex
		console.log(scale)
		
		$('.slide_phone ul').animate({
			right:scale
		})
	});	
});