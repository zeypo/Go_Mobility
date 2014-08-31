// google.maps.event.addDomListener(window, 'load', init);

// function init() {
//     var myLatlng = new google.maps.LatLng(44.8152705, 4.3737854);

//     var mapOptions = {
//         zoom: 16,
//         center: myLatlng,
//         disableDefaultUI: false,
//         scrollwheel: false,

//         styles: [
//                     {
//                         "stylers": [
//                             {
//                                 "visibility": "off"
//                             }
//                         ]
//                     },
//                     {
//                         "featureType": "road",
//                         "stylers": [
//                             {
//                                 "visibility": "on"
//                             },
//                             {
//                                 "color": "#ffffff"
//                             }
//                         ]
//                     },
//                     {
//                         "featureType": "road.arterial",
//                         "stylers": [
//                             {
//                                 "visibility": "on"
//                             },
//                             {
//                                 "color": "#fee379"
//                             }
//                         ]
//                     },
//                     {
//                         "featureType": "road.highway",
//                         "stylers": [
//                             {
//                                 "visibility": "on"
//                             },
//                             {
//                                 "color": "#fee379"
//                             }
//                         ]
//                     },
//                     {
//                         "featureType": "landscape",
//                         "stylers": [
//                             {
//                                 "visibility": "on"
//                             },
//                             {
//                                 "color": "#f3f4f4"
//                             }
//                         ]
//                     },
//                     {
//                         "featureType": "water",
//                         "stylers": [
//                             {
//                                 "visibility": "on"
//                             },
//                             {
//                                 "color": "#7fc8ed"
//                             }
//                         ]
//                     },
//                     {},
//                     {
//                         "featureType": "road",
//                         "elementType": "labels",
//                         "stylers": [
//                             {
//                                 "visibility": "off"
//                             }
//                         ]
//                     },
//                     {
//                         "featureType": "poi.park",
//                         "elementType": "geometry.fill",
//                         "stylers": [
//                             {
//                                 "visibility": "on"
//                             },
//                             {
//                                 "color": "#83cead"
//                             }
//                         ]
//                     },
//                     {
//                         "elementType": "labels",
//                         "stylers": [
//                             {
//                                 "visibility": "off"
//                             }
//                         ]
//                     },
//                     {
//                         "featureType": "landscape.man_made",
//                         "elementType": "geometry",
//                         "stylers": [
//                             {
//                                 "weight": 0.9
//                             },
//                             {
//                                 "visibility": "off"
//                             }
//                         ]
//                     }
//                 ]
//             };

//     var mapElement = document.getElementById('map');

//     var map = new google.maps.Map(mapElement, mapOptions);

// }




!function(d,s,id){
  var js,fjs=d.getElementsByTagName(s)[0],p=/^http:/.test(d.location)?'http':'https';
  if(!d.getElementById(id)){
    js=d.createElement(s);js.id=id;js.src=p+"://platform.twitter.com/widgets.js";
    fjs.parentNode.insertBefore(js,fjs);
  }
}
(document,"script","twitter-wjs"); 
!function(d,s,id){var js,fjs=d.getElementsByTagName(s)[0];
  if(!d.getElementById(id)){
    js=d.createElement(s);
    js.id=id;js.src="//platform.twitter.com/widgets.js";
    fjs.parentNode.insertBefore(js,fjs);}
  }(document,"script","twitter-wjs");


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
;(function(window)
{
    expform = function(){

        var self = this;
        
        this.windowHeight = null;
        this.windowWidth  = null;
        this.footerHeight = null;
        this.headerHeight = null;
        this.count        = null;
        this.$mooveStep   = null;
        this.$step        = null;
        this.$email       = null;
        this.$start       = null;
        this.$arrival     = null;
        this.$desc        = null;
        this.$erros       = null;
        this.$submit      = null;
        this.$form        = null;
        this.errors       = [];
        this.select       = 0;

        this.init = function()
        {
            this.windowHeight    = $(window).height();
            this.windowWidth     = $(window).width();
            this.footerHeight    = $('footer').height();
            this.headerHeight    = $('header').height();
            this.count           = $('.step_control').children().length;
            this.$mooveStep      = $('.content_creat form ul');
            this.$step           = $('.step_ca');
            this.$email          = $('#gomobility_sitebundle_experiences_email');
            this.$start          = $('#gomobility_sitebundle_experiences_start');
            this.$arrival        = $('#gomobility_sitebundle_experiences_arrival');
            this.$desc           = $('#gomobility_sitebundle_experiences_description');
            this.$errors         = $('#errors');
            this.$submit         = $('#gomobility_sitebundle_experiences_envoyer');
            this.$form           = $('#eperience-form');

            self.initHtml();

            self.$step.on('click', function(e)
            {
                e.preventDefault();
                self.mooveStep($(this));
            })

            self.$submit.on('click', function(e)
            {
                if(!self.validateForm()){
                    e.preventDefault();
                    self.showErrors();
                }
            })

            self.$form.on('keypress', 'input', function(e)
            {
                var key = e.which || e.keyCode;
                if (key == 13) {
                    e.preventDefault();
                }
            })

        }

        this.initHtml = function()
        {
            $('.step_control li').eq(0).addClass('active');
            $('.content_creat form').css({width : self.windowWidth});
            $('.content_creat form ul').css({width:self.windowWidth * self.count});
            $('.content_creat form ul li').css({width:self.windowWidth});
        }

        this.mooveStep = function(stepClass)
        {
            self.$errors.empty();
            self.errors = [];
            
            if(stepClass.hasClass('step_suiv')){
                var isValid = self.validateForm();
                isValid ? self.moveForward() : self.showErrors();
            } else {
                self.moveBackward()
            }
        }

        this.moveForward = function()
        {
            self.select++;
            self.$mooveStep.animate({
                right : self.windowWidth * self.select
            });
            $('.step_control li').eq(self.select).addClass('active');
            $('.bg_step_control div').animate({
                width : 125 * self.select
            })
        }

        this.moveBackward = function()
        {
            self.select--;
            self.$mooveStep.animate({
                right : self.windowWidth * self.select
            });
            $('.step_control li').eq(self.select+1).removeClass('active');
            $('.step_control li').eq(self.select).addClass('active');
            $('.bg_step_control div').animate({
                width : 125 * self.select
            })
        }

        this.validateForm = function()
        {
            var isValid;
            
            if(self.select == 0){
                isValid = self.validateEmail();
            } else if (self.select == 1) {
                var gstart   = self.notEmpty(self.$start);
                var garrival = self.notEmpty(self.$arrival);

                isValid = garrival == true && gstart == true ? true : false; 
            } else if (self.select == 2) {
                isValid = self.notEmpty(self.$desc);
            }

            return isValid;
        }


        this.validateEmail = function()
        {
            var regEmail = new RegExp('^[a-z0-9._-]+@[a-z0-9._-]{2,}\.[a-z]{2,4}$');
            var isValid = regEmail.test(self.$email.val());

            if(isValid != true) self.errors.push('Merci de rentrer un email valide');

            return isValid;
        }

        this.notEmpty = function($input)
        {
            var isValid = $input.val() ? true : false;

            if(isValid != true) self.errors.push('Merci de remplir tous les champs');

            return isValid;
        }

        this.showErrors = function()
        {
            for(var i=0; i<self.errors.length; i++){
                self.$errors.append('<p>'+self.errors[i]+'</p>');
            }
        }
    }

    window.expform = expform;

})(window);
;(function(window)
{
    gmapGestion = function(){

        this.mapOptions = null;
        this.myLatlng   = null;
        this.mapElement = null;
        this.map        = null;
        this.travelType = null;
        this.tracedata  = null;

        var self = this;

        this.init = function()
        {
            self.myLatlng = new google.maps.LatLng(44.8152705, 4.3737854);
            self.mapElement = document.getElementById('map');
            self.setMapOptions();

            self.map = new google.maps.Map(self.mapElement, self.mapOptions);
        }

        this.predicatePlace = function(input)
        {
            var input   = document.getElementById(input);
            var options = {componentRestrictions: {country: 'fr'}};
            new google.maps.places.Autocomplete(input, options);
        }

        this.trace = function(origin, destination, transport)
        {
            self.travelType = transport;
            var direction = new google.maps.DirectionsRenderer({
                map   : self.map
            });
            
            if(origin && destination){
                self.setRequest(origin, destination);
                direction.setMap(self.map);

                self.getDirectionService(self.request, direction);
            }
        };

        this.setRequest = function(origin, destination)
        {
            self.request = {
                origin      : origin,
                destination : destination,
                travelMode  : self.setTravelMode()
            }

            return self.request;
        }

        this.getDirectionService = function(request, direction)
        {
            var directionsService = new google.maps.DirectionsService();
            directionsService.route(request, function(result, status) {
                if (status == google.maps.DirectionsStatus.OK) {
                    self.tracedata = result;
                    direction.setDirections(result);
                }
            });
        }

        this.setTravelMode = function()
        {
            if(self.travelType == 'sportif'){
                return google.maps.DirectionsTravelMode.WALKING;
            } else {
                return google.maps.DirectionsTravelMode.DRIVING;
            }
        }

        this.setMapOptions = function()
        {
            self.mapOptions = {
                zoom: 16,
                center: self.myLatlng,
                disableDefaultUI: false,
                scrollwheel: false,
            };
        }
    }

    window.gmapGestion = gmapGestion;

})(window);