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
            self.map = new google.maps.Map(self.mapElement, self.mapOptions);

            var direction = new google.maps.DirectionsRenderer({
                map   : self.map
            });
            
            if(origin && destination){
                self.setRequest(origin, destination);
                direction.setMap(self.map);

                self.getDirectionService(self.request, direction);
            }
        };

        this.getDistance = function(origin, destination, transport)
        {
            var url = "http://maps.googleapis.com/maps/api/distancematrix/json?origins="+origin+"&destinations="+destination+"&mode="+transport+"&language=fr-FR";

            $.getJSON( url, {
                format: "json"
            })
            .done(function( data ) {
                console.log(data);
            })
        }

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
        }
    }

    window.gmapGestion = gmapGestion;

})(window);