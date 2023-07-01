<?php
require "dbconn.inc.php";
$str="SELECT * FROM tbl_restaurant";
$res=$con->query($str);
if($res->num_rows>0){
    while($row=$res->fetch_assoc()){}
}
?>
<table>
    <tr>
        <th>Name</th>
        <th>Address</th>
        <th>Coordinate</th>
        <th>Contact</th>
        <th>Type</th>
        <th>Services</th>
        <th>Ratings</th>
        <th>Starttime</th>
        <th>Closetime</th>
    </tr>
</table>
