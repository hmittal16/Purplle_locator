





	<html>
	<head>
		<script src="http://maps.google.com/maps/api/js?sensor=false"
              type="text/javascript"></script>
		
	<title>Query Results</title>
	</head>
	<body>
		
  <div id="map" style="width: 800px; height:600px; float: right ; margin-left:5%;"></div>

      <script type="text/javascript">
        var locations = [
          [' Name_1', 19.003243615006838, 72.90356260375984, 1],
          ['Name_2',  	19.06783893295714 , 72.87891310291297, 2],
          ['Name_3', 19.068031596093437, 72.8761611564637 	, 3],
          [' Name_4',  	19.122171194687137, 72.83884626464851, 4],
          [' Name_5', 19.090216779053662, 72.88845640258796, 5],
          [' Name_6', 19.003243615006838, 72.90356260375984, 6],
          [' Name_7', 19.036675260057397, 72.8546391113282, 7],
          [' Name_8', 19.003243615006838, 72.90356260375984, 8],
         /* ['Stadtbibliothek Name_1', 19.003243615006838, 72.90356260375984, 9],
          ['Stadtbibliothek Name_1', 19.003243615006838, 72.90356260375984, 10],
          ['Stadtbibliothek Name_1', 19.003243615006838, 72.90356260375984, 11],
          ['Stadtbibliothek Name_1', 19.003243615006838, 72.90356260375984, 12],*/

          
        ];

        var map = new google.maps.Map(document.getElementById('map'), {
          zoom: 12,
          center: new google.maps.LatLng(19.067179820534243, 72.87798505859382),
          mapTypeId: google.maps.MapTypeId.ROADMAP
        });

        var infowindow = new google.maps.InfoWindow();

        var marker, i;

        for (i = 0; i < locations.length; i++) {
          marker = new google.maps.Marker({
            position: new google.maps.LatLng(locations[i][1], locations[i][2]),
            map: map
          });

          google.maps.event.addListener(marker, 'click', (function(marker, i) {
            return function() {
              infowindow.setContent(locations[i][0]);
              infowindow.open(map, marker);
            }
          })(marker, i));
        }
      </script>


		<?php 
		 function getDistanceBetweenPointsNew($latitude1, $longitude1, $latitude2, $longitude2) {
			    $theta = $longitude1 - $longitude2;
			    $miles = (sin(deg2rad($latitude1)) * sin(deg2rad($latitude2))) + (cos(deg2rad($latitude1)) * cos(deg2rad($latitude2)) * cos(deg2rad($theta)));
			    $miles = acos($miles);
			    $miles = rad2deg($miles);
			    $miles = $miles * 60 * 1.1515;
			    $feet = $miles * 5280;
			    $yards = $feet / 3;
			    $kilometers = $miles * 1.609344;
			    
			    return $kilometers; 
}
			 mysql_connect("localhost", "root", "shirlie25") or die(mysql_error()); 
			 mysql_select_db("mittal") or die(mysql_error()); 

			 $data = mysql_query("SELECT * FROM purplle") 
			 or die(mysql_error()); 
			
			 while($info = mysql_fetch_array( $data )) 
			 {
			 	$dis = getDistanceBetweenPointsNew($_GET["latitude"],$_GET["longitude"] ,$info['Latitude'],$info['Longitude']);
			 	
			  if ($dis <= "10") {
			   	# code...
			    Print "<table border cellpadding=3 >"; 
			 Print "<tr>"; 
			 Print "<th>Name:</th> <td>".$info['Name'] . "</td> "; 
			 Print "<th>Latitude:</th> <td>".$info['Latitude'] . " </td></tr>"; 
			 Print "<th>Longitude:</th> <td>".$info['Longitude'] . "</td> "; 
			 Print "<th>Store Type:</th> <td>".$info['Store Type'] . " </td></tr>"; 
			 Print "<th>City:</th> <td>".$info['City'] . "</td> "; 
			  Print "<th>Distance:</th> <td>".$dis. "</td> ";
 Print "</table>"; 
 echo "<br>";

			
			 } 

			}
			
			 ?> 

	</body>
	</html>
