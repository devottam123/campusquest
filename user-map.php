<?php
include_once 'header.php';
include 'locations_model.php';
//get_unconfirmed_locations();exit;
?>
    <style>
        	body{
		    background-color: #193e4b;
    font-family: Poppins, sans-serif;
  
}

        input[type=text], select {
            width: 100%;
            padding: 12px 20px;
            margin: 8px 0;
            display: inline-block;
            border: 1px solid #ccc;
            border-radius: 4px;
            box-sizing: border-box;
        }

        input[type=submit] {
            width: 100%;
            background-color: #4CAF50;
            color: white;
            padding: 14px 20px;
            margin: 8px 0;
            border: none;
            border-radius: 4px;
            cursor: pointer;
        }

        input[type=submit]:hover {
            background-color: #45a049;
        }
         b{
             color: white;
         }
        .container {
            border-radius: 5px;
            background-color: #f2f2f2;
            padding: 20px;
            margin-left: 0%;
            width:50%
        }
        #map { position:absolute;left: 25%; top:280%;; bottom:0px;height:550px ;width:50%; margin:auto; }
        .geocoder {
            position:absolute;left: 18%; top:56%;
            /* margin-top: 64px;             */
        }
    </style>

    
		<?php
			session_start();
			echo "<center><b>University Name</b> - ".$_SESSION["uname"];
			echo "<br><b>College Name Name</b> - ".$_SESSION["cname"];
		?>
		<center><h2 style="font-size:40px;color:white"><u>-:Registration:-</u></h2>
		<hr>
		<table cellpadding="10">
			<tr>
				<td><a style="color:red;" href="user-map.php">New Registration</a>
				<td><a style="color:red;" href="updateinfo.php">Update Information</a>
		</table>
		<hr>
    <div class="container">
        <form action="" id="signupForm">
			<label for="college">College Name</label>
            <input type="text" id="college" name="college" placeholder="Your College..">

			<label for="youtube">Virtual Tour</label>	
            <input type="text" id="youtube" name="youtube" placeholder="Your Virtual Tour Link..">

			<label for="website">Website</label>
            <input type="text" id="website" name="website" placeholder="Your Website..">
			
			<label for="location">Photos</label>
            <input type="text" id="location" name="location" placeholder="Your Photos..">

            <label for="state">State</label>
            <input type="text" id="state" name="state" placeholder="Your State..">

			<label for="lat">Latitude</label>
            <input type="text" id="lat" name="lat" placeholder="Your lat..">

            <label for="lng">Longitude</label>
            <input type="text" id="lng" name="lng" placeholder="Your lng..">

            
            <input type="submit" value="Submit" >
        </form>
        <div class="geocoder">
            <div id="geocoder" ></div>
        </div>
           <div class="hiii">
               <div id="map"></div>
            </div>
    </div>



    <script src='https://api.mapbox.com/mapbox-gl-js/v2.8.1/mapbox-gl.js'></script>
<link href='https://api.mapbox.com/mapbox-gl-js/v2.8.1/mapbox-gl.css' rel='stylesheet' />

    <style>
    </style>

   <!-- Load the `mapbox-gl-geocoder` plugin. -->
<script src="https://api.mapbox.com/mapbox-gl-js/plugins/mapbox-gl-geocoder/v5.0.0/mapbox-gl-geocoder.min.js"></script>
<link rel="stylesheet" href="https://api.mapbox.com/mapbox-gl-js/plugins/mapbox-gl-geocoder/v5.0.0/mapbox-gl-geocoder.css" type="text/css">

    <script>
        
 var saved_markers = <?= get_saved_locations() ?>;
        var user_location = [77.216721,28.644800];
        mapboxgl.accessToken = 'pk.eyJ1IjoiZGV2b3R0YW0xMjMiLCJhIjoiY2w0bjE1NDlyMThqeDNobnh4aDM5Ymg1ZyJ9.zBZ5HHfsLClwUN5B-HJMgA';
        var map = new mapboxgl.Map({
            container: 'map',
            style: 'mapbox://styles/mapbox/satellite-streets-v9',
            center: user_location,
            zoom: 10
        });
        
        //  geocoder here
        map.addControl(
            new MapboxGeocoder({
                accessToken: mapboxgl.accessToken,
                mapboxgl: mapboxgl,
                countries: "in",
            })
            );
        // Add geolocate control to the map.
map.addControl(
new mapboxgl.GeolocateControl({
positionOptions: {
enableHighAccuracy: true
},
// When active the map will receive updates to the device's location as it changes.
trackUserLocation: true,
// Draw an arrow next to the location dot to indicate which direction the device is heading.
showUserHeading: true
})
);

            //Full screen controls
            map.addControl(new mapboxgl.FullscreenControl());
            // Add zoom and rotation controls to the map.

        map.addControl(new mapboxgl.NavigationControl());

        // var geocoder = new MapboxGeocoder({
        //     accessToken: mapboxgl.accessToken,
        // });
        // limit results to Australia

        var marker ;

        // After the map style has loaded on the page, add a source layer and default
        // styling for a single point.
        map.on('load', function() {
            addMarker(user_location,'load');
            add_markers(saved_markers);

            // Listen for the `result` event from the MapboxGeocoder that is triggered when a user
            // makes a selection and add a symbol that matches the result.
            // geocoder.on('result', function(ev) {
            //     alert("aaaaa");
            //     console.log(ev.result.center);

            // });
        });
        map.on('click', function (e) {
            marker.remove();
            addMarker(e.lngLat,'click');
            //console.log(e.lngLat.lat);
            document.getElementById("lat").value = e.lngLat.lat;
            document.getElementById("lng").value = e.lngLat.lng;

        });

        function addMarker(ltlng,event) {

            if(event === 'click'){
                user_location = ltlng;
            }
            marker = new mapboxgl.Marker({draggable: true,color:"#d02922"})
                .setLngLat(user_location)
                .addTo(map)
                .on('dragend', onDragEnd);
        }
        
        function add_markers(coordinates) {

            var geojson = (saved_markers == coordinates ? saved_markers : '');

            console.log(geojson);
            // add markers to map
            geojson.forEach(function (marker) {
                console.log(marker);
                // make a marker for each feature and add to the map
                new mapboxgl.Marker()
                    .setLngLat(marker)
                    .addTo(map);
            });

        }

        function onDragEnd() {
            var lngLat = marker.getLngLat();
            document.getElementById("lat").value = lngLat.lat;
            document.getElementById("lng").value = lngLat.lng;
            console.log('lng: ' + lngLat.lng + '<br />lat: ' + lngLat.lat);
        }

        $('#signupForm').submit(function(event){
            event.preventDefault();
            var college = $('#college').val();
            var youtube = $('#youtube').val();
            var website = $('#website').val();
            var location = $('#location').val();
            var state = $('#state').val();
			var lat = $('#lat').val();
            var lng = $('#lng').val();
            var url = 'locations_model.php?add_location&college='+college+' &youtube='+youtube+'&website='+website+'&location='+location+' &state='+state+' &lat=' + lat + '&lng=' + lng ;
            $.ajax({
                url: url,
                method: 'GET',
                dataType: 'json',
                success: function(data){
                    alert(data);
                    location.reload();
                }
            });
        });

        document.getElementById('geocoder').appendChild(geocoder.onAdd(map));

    </script>



<?php
include_once 'footer.php';
?>