<?php


session_start();
if (!isset($_SESSION['email'])) {
    $_SESSION['not_signed'] = "Plz, Log in first";
    header('location:login.php');
}

require "../dbconn.inc.php";

if(isset($_GET['type']) && $_GET['id']){
$dest_type=$_GET['type'];
$first_char = substr($dest_type, 0, 1);
$dest_id=$_GET['id'];

$result=$con->query("SELECT * FROM tbl_".$dest_type." WHERE ".$first_char."_id = ".$dest_id.";");

if($result->num_rows>0){
    $row=$result->fetch_assoc();
    $dest_name=$row[$first_char."_name"];
    $dest_address=$row[$first_char."_address"];
    $dest_district=$row[$first_char."_district"];
    $dest_lat=$row[$first_char."_latitude"];
    $dest_lon=$row[$first_char."_longitude"];
}else{
    echo '<script>alert("Cannot load the map for the desired location!")</script>';
}

}
?>
<!DOCTYPE html>
<html>
<head>
    <title><?php echo ucfirst($dest_name);?> | Traverse Nepal</title>
    <link rel="stylesheet" href="https://unpkg.com/leaflet@1.7.1/dist/leaflet.css" />
    <link rel="icon" href="../../../image/TN_favicon.svg" type="image/svg+xml">
    <style>
        #map {
            height: 850px;
            width: 100%;
        }
        html{
            overflow: hidden;
        }
    </style>
</head>

<body>

    <div id="map"></div>

    <script src="https://unpkg.com/leaflet@1.7.1/dist/leaflet.js"></script>
    <script>
        // Specify the latitude and longitude of the location
        var latitude = <?php echo $dest_lat?>;
        var longitude = <?php echo $dest_lon?>;

        // Create a map centered around the specified location
        var map = L.map('map').setView([latitude, longitude], 13);

        var markerTag=`<b><?php echo $dest_name?></b><br><i><?php echo $dest_address?>,<?php echo $dest_district?></i>`;
        // Add a tile layer from OpenStreetMap
        L.tileLayer('https://{s}.tile.openstreetmap.org/{z}/{x}/{y}.png', {
            attribution: '© OpenStreetMap contributors'
        }).addTo(map);

        // Add a marker to the map at the specified location
        L.marker([latitude, longitude]).addTo(map)
            .bindPopup(markerTag)
            .openPopup();
    </script>

</body>

</html>