 var map;
 var geocoder;
 var marker;
 function initMap(){
 	var LatLong = {lat: 28.736241, lng:  77.119804};
        map = new google.maps.Map(document.getElementById('map'), {
          center: LatLong,
          zoom: 17
        });
        marker = new google.maps.Marker({
        position: LatLong,
        map: map,
        title: 'Ana Trujillo    Mexico D.F.'
      });
      geocoder = new google.maps.Geocoder();
      coreAddress();
 }
 function coreAddress() {
  var address = document.getElementById('addr').innerHTML;
  geocoder.geocode({ 'address': address}, function(results, status) {
    if(status == 'OK') {
      map.setCenter(results[0].geometry.location);
      var point = {};
      point.lat = map.getCenter().lat;
      point.lon = map.getCenter().lon;
      marker = new google.maps.Marker({
        position: google.maps.LatLng(map.getCenter().lat,map.getCenter().lon),
        map: map,
        title: 'Ana Trujillo    Mexico D.F.'
      });
    } else {
      alert('Geocode was not successful for the reason : ' + status);
    }
  })
 }