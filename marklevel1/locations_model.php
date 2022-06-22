<?php
require("db.php");

// Gets data from URL parameters.
if(isset($_GET['add_location'])) {
    add_location();
}


function add_location(){
    $con=mysqli_connect ("localhost", 'root', '','aicte');
    if (!$con) {
        die('Not connected : ' . mysqli_connect_error());
    }
	$college = $_GET['college'];
	$youtube = $_GET['youtube'];
	$website = $_GET['website'];
	$location = $_GET['location'];
	$state = $_GET['state'];
    $lat = $_GET['lat'];
    $lng = $_GET['lng'];
    
    // Inserts new row with place data.
    $query = sprintf("INSERT INTO locations " .
        " (id, college, youtube, website, location, state, lat, lng) " .
        " VALUES (NULL, '%s', '%s', '%s', '%s', '%s', '%s', '%s');",
        mysqli_real_escape_string($con,$college),
        mysqli_real_escape_string($con,$youtube),
        mysqli_real_escape_string($con,$website),
        mysqli_real_escape_string($con,$location),
        mysqli_real_escape_string($con,$state),
		mysqli_real_escape_string($con,$lat),
        mysqli_real_escape_string($con,$lng));
        

    $result = mysqli_query($con,$query);
    echo json_encode("Inserted Successfully");
    if (!$result) {
        die('Invalid query: ' . mysqli_error($con));
    }
}
function get_saved_locations(){
    $con=mysqli_connect ("localhost", 'root', '','aicte');
    if (!$con) {
        die('Not connected : ' . mysqli_connect_error());
    }
    // update location with location_status if admin location_status.
    $sqldata = mysqli_query($con,"select lng,lat from locations ");

    $rows = array();
    while($r = mysqli_fetch_assoc($sqldata)) {
        $rows[] = $r;

    }
    $indexed = array_map('array_values', $rows);

    //  $array = array_filter($indexed);

    echo json_encode($indexed);
    if (!$rows) {
        return null;
    }
}

?>