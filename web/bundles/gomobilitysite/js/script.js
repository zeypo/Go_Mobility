
function initialize() {
var mapOptions = {
  center: new google.maps.LatLng(44.8152705, 4.3737854),
  zoom: 10
};
var map = new google.maps.Map(document.getElementById("map"),mapOptions);


google.maps.event.addListener(map, 'click', function(evt) {
  
});

} 
google.maps.event.addDomListener(window, 'load', initialize);


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

