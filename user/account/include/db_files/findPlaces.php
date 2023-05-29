<?php
require "dbconn.inc.php";
if($_SERVER['REQUEST_METHOD']=='POST'){
    $values=array();
    $txt=$_POST['toSearch'];
    $qry="select * from tbl_place where p_name='$txt' ";
    $res=$con->query($qry);
    if($res->num_rows>0){
        $loop=$res->num_rows;
       while($row = $result->fetch_assoc()){
        array_push($values,$row);
       }
       echo $values;
    }
}
 ?>