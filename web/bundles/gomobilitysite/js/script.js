google.maps.event.addDomListener(window, 'load', init);

function init() {
    var myLatlng = new google.maps.LatLng(44.8152705, 4.3737854);

    var mapOptions = {
        zoom: 16,
        center: myLatlng,
        disableDefaultUI: false,
        scrollwheel: false,

        styles: [
                    {
                        "stylers": [
                            {
                                "visibility": "off"
                            }
                        ]
                    },
                    {
                        "featureType": "road",
                        "stylers": [
                            {
                                "visibility": "on"
                            },
                            {
                                "color": "#ffffff"
                            }
                        ]
                    },
                    {
                        "featureType": "road.arterial",
                        "stylers": [
                            {
                                "visibility": "on"
                            },
                            {
                                "color": "#fee379"
                            }
                        ]
                    },
                    {
                        "featureType": "road.highway",
                        "stylers": [
                            {
                                "visibility": "on"
                            },
                            {
                                "color": "#fee379"
                            }
                        ]
                    },
                    {
                        "featureType": "landscape",
                        "stylers": [
                            {
                                "visibility": "on"
                            },
                            {
                                "color": "#f3f4f4"
                            }
                        ]
                    },
                    {
                        "featureType": "water",
                        "stylers": [
                            {
                                "visibility": "on"
                            },
                            {
                                "color": "#7fc8ed"
                            }
                        ]
                    },
                    {},
                    {
                        "featureType": "road",
                        "elementType": "labels",
                        "stylers": [
                            {
                                "visibility": "off"
                            }
                        ]
                    },
                    {
                        "featureType": "poi.park",
                        "elementType": "geometry.fill",
                        "stylers": [
                            {
                                "visibility": "on"
                            },
                            {
                                "color": "#83cead"
                            }
                        ]
                    },
                    {
                        "elementType": "labels",
                        "stylers": [
                            {
                                "visibility": "off"
                            }
                        ]
                    },
                    {
                        "featureType": "landscape.man_made",
                        "elementType": "geometry",
                        "stylers": [
                            {
                                "weight": 0.9
                            },
                            {
                                "visibility": "off"
                            }
                        ]
                    }
                ]
            };

    var mapElement = document.getElementById('map');

    var map = new google.maps.Map(mapElement, mapOptions);

}




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

