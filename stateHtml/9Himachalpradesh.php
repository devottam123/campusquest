<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Himachal Pradesh | Tour</title>
    <!-- <link rel="stylesheet" href="css/stateStyle.css"> -->
    <script src="https://api.tiles.mapbox.com/mapbox-gl-js/v2.8.1/mapbox-gl.js"></script>
    <link
      href="https://api.tiles.mapbox.com/mapbox-gl-js/v2.8.1/mapbox-gl.css"
      rel="stylesheet"
    />

    
    <style>
        body {
            background: url('../states/himachalpradesh.jpg');
            background-repeat: no-repeat;
            background-attachment: fixed;
            background-size: 100% 100%;
            opacity: 2.2;
            background-color: black;
          }
         
          #map {
        position: relative;
        top: 0;
        margin-left:30px;
        bottom: 0;
        width: 100%;
        height: 700px;
        z-index: 1;
        ;
      } 
      #menu {
        position:relative;
          background: #efefef;
          padding: 10px;
          font-family:"Open Sans", sans-serif;;
          width:420px;
          margin-top:30px;
           margin: 0px 0px -40px 29px;
           z-index: 2;
           /* font-size: 10px; */
           /* margin-top:30px; */
          }
           .mapboxgl-popup {
            max-width: 200px;
          }
          .lx{
            width: 750px; 
            margin:  auto;
            /* height: 800px; */
            margin-top: 50px;
            margin-bottom: 50px;
          }
    </style>
</head>

<body>
 

    <!-- Load the `mapbox-gl-geocoder` plugin. -->
<!-- Load the `mapbox-gl-geocoder` plugin. -->
<script src="https://api.mapbox.com/mapbox-gl-js/plugins/mapbox-gl-geocoder/v5.0.0/mapbox-gl-geocoder.min.js"></script>
<link rel="stylesheet" href="https://api.mapbox.com/mapbox-gl-js/plugins/mapbox-gl-geocoder/v5.0.0/mapbox-gl-geocoder.css" type="text/css">

    <!-- Create a container for the map. -->
    <!-- <div class="divessh"> -->
   <div class="lx">

     <div id="menu">
       <input
       id="satellite-streets-v9"
       type="radio"
        name="rtoggle"
        value="satellite"
        checked="checked"
        />
        <!-- See a list of Mapbox-hosted public styles at -->
        <!-- https://docs.mapbox.com/api/maps/styles/#mapbox-styles -->
        <label for="satellite-streets-v9">Satellite</label>
        <input id="light-v10" type="radio" name="rtoggle" value="light" />
        <label for="light-v10">Light</label>
        <input id="dark-v10" type="radio" name="rtoggle" value="dark" />
        <label for="dark-v10">Dark</label>
        <input id="streets-v11" type="radio" name="rtoggle" value="streets" />
        <label for="streets-v11">Streets</label>
        <input id="outdoors-v11" type="radio" name="rtoggle" value="outdoors" />
        <label for="outdoors-v11">Outdoors</label>
      </div>
    <div id="map"></div>
  </div>
    
    
    <script>
      // Add your Mapbox access token.
      mapboxgl.accessToken =
      "pk.eyJ1IjoiZGV2b3R0YW0xMjMiLCJhIjoiY2wyaXYwM3QyMHJlOTNmb2ozcGhla3F2eSJ9.FvdDZ2MG9NT9DdFu-GJq9g";
      
      const map = new mapboxgl.Map({
        container: "map", // HTML container ID
        style: "mapbox://styles/mapbox/streets-v11", // style URL
        center: [77.2349954963878, 31.927407662491348], // starting position [lng, lat]
        zoom: 7, // starting zoom
      });

      </script>
	  <?php
	  include("connect.php");
			$s="select * from locations where state='himachal pradesh'";
		$rs=mysqli_query($con,$s);
		while($r=mysqli_fetch_array($rs))
		{
	  echo"<script>
      const popup".$r[0]." = new mapboxgl.Popup().setHTML(
        '<b>".$r[1]."</b><br><a href=".$r[2].">Virtual Tour</a><br><a href=".$r[3].">Website</a><br><a href=".$r[4].">Gallery</a><br>Click on the above links to see the Virtual Tour, Website and Photos of the College.'
      );
      
      // Create a default Marker and add it to the map.
      const marker".$r[0]." = new mapboxgl.Marker()
      .setLngLat([".$r[7].", ".$r[6]."])
        .setPopup(popup".$r[0].") // sets a popup on this marker
        .addTo(map);
        </script>";
		}
		?>
        <script>
      // Add the control to the map.
      map.addControl(
        new MapboxGeocoder({
          accessToken: mapboxgl.accessToken,
          mapboxgl: mapboxgl,
        })
        );
        
        // Add geolocate control to the map.
      map.addControl(
        new mapboxgl.GeolocateControl({
          positionOptions: {
            enableHighAccuracy: true,
          },
          // When active the map will receive updates to the device's location as it changes.
          trackUserLocation: true,
          // Draw an arrow next to the location dot to indicate which direction the device is heading.
          showUserHeading: true,
        })
      );
      
      //Full Screen Controls
      map.addControl(new mapboxgl.FullscreenControl());
      
      //Menu Javascript
      const layerList = document.getElementById("menu");
      const inputs = layerList.getElementsByTagName("input");
      
      for (const input of inputs) {
        input.onclick = (layer) => {
          const layerId = layer.target.id;
          map.setStyle("mapbox://styles/mapbox/" + layerId);
        };
      }
      
      // Add zoom and rotation controls to the map.
      map.addControl(new mapboxgl.NavigationControl());
      </script>

 
</body>

</html>