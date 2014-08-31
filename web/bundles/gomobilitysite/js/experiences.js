$(document).ready(function(){
	var list	= $('.traject_entity');
	var bList	= $('.org-list ul li a');
	var display = 'all';

	bList.on('click', function(){
		display = $(this).attr('id');
		toogleList();
	});
	
	function toogleList ()
	{
		list.toggle().hide();
		if(display == 'touristique'){
			$('.traject_entity.touristique').css({
				display :'inherit'
			});
		}else if(display == 'sportif'){
			$('.traject_entity.sportif').css({
				display :'inherit'
			});		
		}else if(display == 'work'){
			$('.traject_entity.work').css({
				display :'inherit'
			});		
		}else{
			list.css({
				display :'inherit'
			});		
		}
	}
	
	toogleList();
});