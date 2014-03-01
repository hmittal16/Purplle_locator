<?php

$mylat = $_GET['lat1'];
$mylon = $_GET['lon1'];
$stlat = $_GET['lat2'];
$stlon = $_GET['lon2'];
?>
<!DOCTYPE html>
<html>
  <head>
    <meta name="viewport" content="initial-scale=1.0, user-scalable=no">
    <meta charset="utf-8">
    <title>Simple markers</title>
    <style>
      html, body, #map-canvas {
        height: 100%;
        margin: 0px;
        padding: 0px
      }
    </style>
    <script src="https://maps.googleapis.com/maps/api/js?v=3.exp&sensor=false"></script>
    <script>
function initialize() {
  var mylat = "<?php echo $mylat; ?>";
  var mylon = "<?php echo $mylon; ?>";
  var stlat = "<?php echo $stlat; ?>";
  var stlon = "<?php echo $stlon; ?>";
  var myLatlng = new google.maps.LatLng(mylat,mylon);
  var stLatlng = new google.maps.LatLng(stlat,stlon);
  var mapOptions = {
    zoom: 12,
    center: myLatlng
  }
  var map = new google.maps.Map(document.getElementById('map-canvas'), mapOptions);

  var marker1 = new google.maps.Marker({
      position: myLatlng,
      icon: {
      path: google.maps.SymbolPath.CIRCLE,
      scale: 10
    },

      map: map,
      title: 'Hello World!'
  });
  var marker = new google.maps.Marker({
      position: stLatlng,
      map: map,
      title: 'Store'
  });

   var infowindow = new google.maps.InfoWindow({
      content: 'Store'
  });

   var infowindow1 = new google.maps.InfoWindow({
      content: 'You'
  });


  google.maps.event.addListener(marker, 'click', function() {
    infowindow.open(map,marker);
  });

   google.maps.event.addListener(marker1, 'click', function() {
    infowindow1.open(map,marker1);
  });


}

google.maps.event.addDomListener(window, 'load', initialize);

    </script>
  </head>
  <body>
    <div id="map-canvas"></div>
  </body>
</html>

