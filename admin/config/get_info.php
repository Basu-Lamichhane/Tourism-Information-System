<?php
require "dbconn.inc.php";
if (isset($_GET['type'])) {
    if ($_GET['type'] == "dashboard") {
        $str1 = "select * from tbl_user";
        $str2 = "select * from tbl_place";
        $str3 = "select * from tbl_accommodation";
        $str4 = "select * from tbl_restaurant";
        $str5 = "select * from tbl_cafe";
        $res1 = $con->query($str1);
        $res2 = $con->query($str2);
        $res3 = $con->query($str3);
        $res4 = $con->query($str4);
        $res5 = $con->query($str5);
        echo "<table class='dashboard' border='2' cellspacing='0'>
        <tr>
        <td>Users</td><td>" . $res1->num_rows . "</td>
        </tr>
        <tr>
        <td>Place</td><td>" . $res2->num_rows . "</td>
        </tr>
        <tr>
        <td>Accomodation</td><td>" . $res3->num_rows . "</td>
        </tr>
        <tr>
        <td>Restaurant</td><td>" . $res4->num_rows . "</td>
        </tr>
        <tr>
        <td>Cafe</td><td>" . $res5->num_rows . "</td>
        </tr>
        </table>";
    } else if ($_GET['type'] == "place") {
        $str1 = "select * from tbl_place";
        $res1 = $con->query($str1);
        $start = 0;
        $contents_per_page = 10;
        $no_of_rows = $res1->num_rows;
        $pages = ceil($no_of_rows / $contents_per_page);
        if (isset($_GET['page'])) {
            $page = $_GET['page'] - 1;
            $start = $page * $contents_per_page;
        }
        $str2 = "select * from tbl_place limit " . $start . "," . $contents_per_page;
        $res2 = $con->query($str2);
        if ($res2->num_rows > 0) {
            echo "<table class='attraction'  cellspacing='0'>
            <tr>
            <th>S.N</th>
            <th>Name</th>
            <th>Address</th>
            <th>District</th>
            <th>Type</th>
            <th>Ratings</th>
            <th>Update</th>
            <th>Delete</th>
            <th>View</th>
            </tr>
            ";
            while ($row = $res2->fetch_assoc()) {
                echo "<tr>
                <td>" . ++$start . "</td>
                <td>" . $row['p_name'] . "</td>
                <td>" . $row['p_address'] . "</td>
                <td>" . $row['p_district'] . "</td>
                <td>" . $row['p_type'] . "</td>
                <td>" . $row['p_rating'] . "</td>
                <td ><a href='update.php?type=" . $_GET['type'] . "&id=" . $row['p_id'] . "' ><svg style='fill:blue;' xmlns='http://www.w3.org/2000/svg' height='1em' viewBox='0 0 512 512'><!--! Font Awesome Free 6.4.0 by @fontawesome - https://fontawesome.com License - https://fontawesome.com/license (Commercial License) Copyright 2023 Fonticons, Inc. --><path d='M471.6 21.7c-21.9-21.9-57.3-21.9-79.2 0L362.3 51.7l97.9 97.9 30.1-30.1c21.9-21.9 21.9-57.3 0-79.2L471.6 21.7zm-299.2 220c-6.1 6.1-10.8 13.6-13.5 21.9l-29.6 88.8c-2.9 8.6-.6 18.1 5.8 24.6s15.9 8.7 24.6 5.8l88.8-29.6c8.2-2.7 15.7-7.4 21.9-13.5L437.7 172.3 339.7 74.3 172.4 241.7zM96 64C43 64 0 107 0 160V416c0 53 43 96 96 96H352c53 0 96-43 96-96V320c0-17.7-14.3-32-32-32s-32 14.3-32 32v96c0 17.7-14.3 32-32 32H96c-17.7 0-32-14.3-32-32V160c0-17.7 14.3-32 32-32h96c17.7 0 32-14.3 32-32s-14.3-32-32-32H96z'/></svg></a></td>

                <td><a href='#'><svg style='fill:red;' xmlns='http://www.w3.org/2000/svg' height='1em' viewBox='0 0 448 512'><!--! Font Awesome Free 6.4.0 by @fontawesome - https://fontawesome.com License - https://fontawesome.com/license (Commercial License) Copyright 2023 Fonticons, Inc. --><path d='M135.2 17.7L128 32H32C14.3 32 0 46.3 0 64S14.3 96 32 96H416c17.7 0 32-14.3 32-32s-14.3-32-32-32H320l-7.2-14.3C307.4 6.8 296.3 0 284.2 0H163.8c-12.1 0-23.2 6.8-28.6 17.7zM416 128H32L53.2 467c1.6 25.3 22.6 45 47.9 45H346.9c25.3 0 46.3-19.7 47.9-45L416 128z'/></svg></a></td>

                <td>
                <a href='view_destination.php?district=" . $row['p_district'] . "&destination=place&dest_id=" . $row['p_id'] . "' target='_blank'>
                <svg style='fill:grey;' xmlns='http://www.w3.org/2000/svg' height='1em' viewBox='0 0 576 512'><!--! Font Awesome Free 6.4.0 by @fontawesome - https://fontawesome.com License - https://fontawesome.com/license (Commercial License) Copyright 2023 Fonticons, Inc. --><path d='M288 32c-80.8 0-145.5 36.8-192.6 80.6C48.6 156 17.3 208 2.5 243.7c-3.3 7.9-3.3 16.7 0 24.6C17.3 304 48.6 356 95.4 399.4C142.5 443.2 207.2 480 288 480s145.5-36.8 192.6-80.6c46.8-43.5 78.1-95.4 93-131.1c3.3-7.9 3.3-16.7 0-24.6c-14.9-35.7-46.2-87.7-93-131.1C433.5 68.8 368.8 32 288 32zM144 256a144 144 0 1 1 288 0 144 144 0 1 1 -288 0zm144-64c0 35.3-28.7 64-64 64c-7.1 0-13.9-1.2-20.3-3.3c-5.5-1.8-11.9 1.6-11.7 7.4c.3 6.9 1.3 13.8 3.2 20.7c13.7 51.2 66.4 81.6 117.6 67.9s81.6-66.4 67.9-117.6c-11.1-41.5-47.8-69.4-88.6-71.1c-5.8-.2-9.2 6.1-7.4 11.7c2.1 6.4 3.3 13.2 3.3 20.3z'/></svg></a></td>
                </tr>
                ";
            }
            echo "</table>";
            include "config/pagination.inc.php";
        }


    } else if ($_GET['type'] == "accommodation") {
        $str1 = "select * from tbl_accommodation";
        $res1 = $con->query($str1);
        $start = 0;
        $contents_per_page = 10;
        $no_of_rows = $res1->num_rows;
        $pages = ceil($no_of_rows / $contents_per_page);
        if (isset($_GET['page'])) {
            $page = $_GET['page'] - 1;
            $start = $page * $contents_per_page;
        }
        $str2 = "select * from tbl_accommodation limit " . $start . "," . $contents_per_page;
        $res2 = $con->query($str2);
        if ($res2->num_rows > 0) {
            echo "<table class='attraction'  cellspacing='0'>
            <tr>
            <th>S.N</th>
            <th>Name</th>
            <th>Address</th>
            <th>District</th>
            <th>Type</th>
            <th>Ratings</th>
            <th>Update</th>
            <th>Delete</th>
            <th>View</th>
            </tr>
            ";
            while ($row = $res2->fetch_assoc()) {
                echo "<tr>
                <td>" . ++$start . "</td>
                <td>" . $row['a_name'] . "</td>
                <td>" . $row['a_address'] . "</td>
                <td>" . $row['a_district'] . "</td>
                <td>" . $row['a_type'] . "</td>
                <td>" . $row['a_rating'] . "</td>
                <td><a href='update.php?type=" . $_GET['type'] . "&id=" . $row['a_id'] . "' ><svg style='fill:blue;' xmlns='http://www.w3.org/2000/svg' height='1em' viewBox='0 0 512 512'><!--! Font Awesome Free 6.4.0 by @fontawesome - https://fontawesome.com License - https://fontawesome.com/license (Commercial License) Copyright 2023 Fonticons, Inc. --><path d='M471.6 21.7c-21.9-21.9-57.3-21.9-79.2 0L362.3 51.7l97.9 97.9 30.1-30.1c21.9-21.9 21.9-57.3 0-79.2L471.6 21.7zm-299.2 220c-6.1 6.1-10.8 13.6-13.5 21.9l-29.6 88.8c-2.9 8.6-.6 18.1 5.8 24.6s15.9 8.7 24.6 5.8l88.8-29.6c8.2-2.7 15.7-7.4 21.9-13.5L437.7 172.3 339.7 74.3 172.4 241.7zM96 64C43 64 0 107 0 160V416c0 53 43 96 96 96H352c53 0 96-43 96-96V320c0-17.7-14.3-32-32-32s-32 14.3-32 32v96c0 17.7-14.3 32-32 32H96c-17.7 0-32-14.3-32-32V160c0-17.7 14.3-32 32-32h96c17.7 0 32-14.3 32-32s-14.3-32-32-32H96z'/></svg></a></td>

                <td><a href='config/delete.php?type=" . $_GET['type'] . "&id=" . $row['a_id'] . "' ><svg style='fill:red;' xmlns='http://www.w3.org/2000/svg' height='1em' viewBox='0 0 448 512'><!--! Font Awesome Free 6.4.0 by @fontawesome - https://fontawesome.com License - https://fontawesome.com/license (Commercial License) Copyright 2023 Fonticons, Inc. --><path d='M135.2 17.7L128 32H32C14.3 32 0 46.3 0 64S14.3 96 32 96H416c17.7 0 32-14.3 32-32s-14.3-32-32-32H320l-7.2-14.3C307.4 6.8 296.3 0 284.2 0H163.8c-12.1 0-23.2 6.8-28.6 17.7zM416 128H32L53.2 467c1.6 25.3 22.6 45 47.9 45H346.9c25.3 0 46.3-19.7 47.9-45L416 128z'/></svg></a></td>

                <td>
                <a href='view_destination.php?district=" . $row['a_district'] . "&destination=accommodation&dest_id=" . $row['a_id'] . "' target='_blank'>
                <svg style='fill:grey;' xmlns='http://www.w3.org/2000/svg' height='1em' viewBox='0 0 576 512'><!--! Font Awesome Free 6.4.0 by @fontawesome - https://fontawesome.com License - https://fontawesome.com/license (Commercial License) Copyright 2023 Fonticons, Inc. --><path d='M288 32c-80.8 0-145.5 36.8-192.6 80.6C48.6 156 17.3 208 2.5 243.7c-3.3 7.9-3.3 16.7 0 24.6C17.3 304 48.6 356 95.4 399.4C142.5 443.2 207.2 480 288 480s145.5-36.8 192.6-80.6c46.8-43.5 78.1-95.4 93-131.1c3.3-7.9 3.3-16.7 0-24.6c-14.9-35.7-46.2-87.7-93-131.1C433.5 68.8 368.8 32 288 32zM144 256a144 144 0 1 1 288 0 144 144 0 1 1 -288 0zm144-64c0 35.3-28.7 64-64 64c-7.1 0-13.9-1.2-20.3-3.3c-5.5-1.8-11.9 1.6-11.7 7.4c.3 6.9 1.3 13.8 3.2 20.7c13.7 51.2 66.4 81.6 117.6 67.9s81.6-66.4 67.9-117.6c-11.1-41.5-47.8-69.4-88.6-71.1c-5.8-.2-9.2 6.1-7.4 11.7c2.1 6.4 3.3 13.2 3.3 20.3z'/></svg></a></td>
                </tr>
                ";
            }
            echo "</table>";
            include "config/pagination.inc.php";
        }
    } else if ($_GET['type'] == "restaurant") {
        $str1 = "select * from tbl_restaurant";
        $res1 = $con->query($str1);
        $start = 0;
        $contents_per_page = 10;
        $no_of_rows = $res1->num_rows;
        $pages = ceil($no_of_rows / $contents_per_page);
        if (isset($_GET['page'])) {
            $page = $_GET['page'] - 1;
            $start = $page * $contents_per_page;
        }
        $str2 = "select * from tbl_restaurant limit " . $start . "," . $contents_per_page;
        $res2 = $con->query($str2);
        if ($res2->num_rows > 0) {
            echo "<table class='attraction'  cellspacing='0'>
            <tr>
            <th>S.N</th>
            <th>Name</th>
            <th>Address</th>
            <th>District</th>
            <th>Type</th>
            <th>Ratings</th>
            <th>Update</th>
            <th>Delete</th>
            <th>View</th>
            </tr>
            ";
            while ($row = $res2->fetch_assoc()) {
                echo "<tr>
                <td>" . ++$start . "</td>
                <td>" . $row['r_name'] . "</td>
                <td>" . $row['r_address'] . "</td>
                <td>" . $row['r_district'] . "</td>
                <td>" . $row['r_type'] . "</td>
                <td>" . $row['r_rating'] . "</td>
                <td><a href='update.php?type=". $_GET['type'] ."&id=" . $row['r_id'] . "' ><svg style='fill:blue;' xmlns='http://www.w3.org/2000/svg' height='1em' viewBox='0 0 512 512'><!--! Font Awesome Free 6.4.0 by @fontawesome - https://fontawesome.com License - https://fontawesome.com/license (Commercial License) Copyright 2023 Fonticons, Inc. --><path d='M471.6 21.7c-21.9-21.9-57.3-21.9-79.2 0L362.3 51.7l97.9 97.9 30.1-30.1c21.9-21.9 21.9-57.3 0-79.2L471.6 21.7zm-299.2 220c-6.1 6.1-10.8 13.6-13.5 21.9l-29.6 88.8c-2.9 8.6-.6 18.1 5.8 24.6s15.9 8.7 24.6 5.8l88.8-29.6c8.2-2.7 15.7-7.4 21.9-13.5L437.7 172.3 339.7 74.3 172.4 241.7zM96 64C43 64 0 107 0 160V416c0 53 43 96 96 96H352c53 0 96-43 96-96V320c0-17.7-14.3-32-32-32s-32 14.3-32 32v96c0 17.7-14.3 32-32 32H96c-17.7 0-32-14.3-32-32V160c0-17.7 14.3-32 32-32h96c17.7 0 32-14.3 32-32s-14.3-32-32-32H96z'/></svg></a></td>

                <td><a href='config/delete.php?type=" . $_GET['type'] . "&id=" . $row['a_id'] . "' ><svg style='fill:red;' xmlns='http://www.w3.org/2000/svg' height='1em' viewBox='0 0 448 512'><!--! Font Awesome Free 6.4.0 by @fontawesome - https://fontawesome.com License - https://fontawesome.com/license (Commercial License) Copyright 2023 Fonticons, Inc. --><path d='M135.2 17.7L128 32H32C14.3 32 0 46.3 0 64S14.3 96 32 96H416c17.7 0 32-14.3 32-32s-14.3-32-32-32H320l-7.2-14.3C307.4 6.8 296.3 0 284.2 0H163.8c-12.1 0-23.2 6.8-28.6 17.7zM416 128H32L53.2 467c1.6 25.3 22.6 45 47.9 45H346.9c25.3 0 46.3-19.7 47.9-45L416 128z'/></svg></a></td>

                <td>
                <a href='view_destination.php?district=" . $row['r_district'] . "&destination=restaurant&dest_id=" . $row['r_id'] . "' target='_blank'>
                <svg style='fill:grey;' xmlns='http://www.w3.org/2000/svg' height='1em' viewBox='0 0 576 512'><!--! Font Awesome Free 6.4.0 by @fontawesome - https://fontawesome.com License - https://fontawesome.com/license (Commercial License) Copyright 2023 Fonticons, Inc. --><path d='M288 32c-80.8 0-145.5 36.8-192.6 80.6C48.6 156 17.3 208 2.5 243.7c-3.3 7.9-3.3 16.7 0 24.6C17.3 304 48.6 356 95.4 399.4C142.5 443.2 207.2 480 288 480s145.5-36.8 192.6-80.6c46.8-43.5 78.1-95.4 93-131.1c3.3-7.9 3.3-16.7 0-24.6c-14.9-35.7-46.2-87.7-93-131.1C433.5 68.8 368.8 32 288 32zM144 256a144 144 0 1 1 288 0 144 144 0 1 1 -288 0zm144-64c0 35.3-28.7 64-64 64c-7.1 0-13.9-1.2-20.3-3.3c-5.5-1.8-11.9 1.6-11.7 7.4c.3 6.9 1.3 13.8 3.2 20.7c13.7 51.2 66.4 81.6 117.6 67.9s81.6-66.4 67.9-117.6c-11.1-41.5-47.8-69.4-88.6-71.1c-5.8-.2-9.2 6.1-7.4 11.7c2.1 6.4 3.3 13.2 3.3 20.3z'/></svg></a></td>
                </tr>
                ";
            }
            echo "</table>";
            include "config/pagination.inc.php";
        }
    } else if ($_GET['type'] == "cafe") {
        $str1 = "select * from tbl_cafe";
        $res1 = $con->query($str1);
        $start = 0;
        $contents_per_page = 10;
        $no_of_rows = $res1->num_rows;
        $pages = ceil($no_of_rows / $contents_per_page);
        if (isset($_GET['page'])) {
            $page = $_GET['page'] - 1;
            $start = $page * $contents_per_page;
        }
        $str2 = "select * from tbl_cafe limit " . $start . "," . $contents_per_page;
        $res2 = $con->query($str2);
        if ($res2->num_rows > 0) {
            echo "<table class='attraction'  cellspacing='0'>
            <tr>
            <th>S.N</th>
            <th>Name</th>
            <th>Address</th>
            <th>District</th>
            <th>Type</th>
            <th>Ratings</th>
            <th>Update</th>
            <th>Delete</th>
            <th>View</th>
            </tr>
            ";
            while ($row = $res2->fetch_assoc()) {
                echo "<tr>
                <td>" . ++$start . "</td>
                <td>" . $row['c_name'] . "</td>
                <td>" . $row['c_address'] . "</td>
                <td>" . $row['c_district'] . "</td>
                <td>" . $row['c_type'] . "</td>
                <td>" . $row['c_rating'] . "</td>
                <td><a href='update.php?type=" . $_GET['type'] . "&id=" . $row['c_id'] . "' ><svg style='fill:blue;' xmlns='http://www.w3.org/2000/svg' height='1em' viewBox='0 0 512 512'><!--! Font Awesome Free 6.4.0 by @fontawesome - https://fontawesome.com License - https://fontawesome.com/license (Commercial License) Copyright 2023 Fonticons, Inc. --><path d='M471.6 21.7c-21.9-21.9-57.3-21.9-79.2 0L362.3 51.7l97.9 97.9 30.1-30.1c21.9-21.9 21.9-57.3 0-79.2L471.6 21.7zm-299.2 220c-6.1 6.1-10.8 13.6-13.5 21.9l-29.6 88.8c-2.9 8.6-.6 18.1 5.8 24.6s15.9 8.7 24.6 5.8l88.8-29.6c8.2-2.7 15.7-7.4 21.9-13.5L437.7 172.3 339.7 74.3 172.4 241.7zM96 64C43 64 0 107 0 160V416c0 53 43 96 96 96H352c53 0 96-43 96-96V320c0-17.7-14.3-32-32-32s-32 14.3-32 32v96c0 17.7-14.3 32-32 32H96c-17.7 0-32-14.3-32-32V160c0-17.7 14.3-32 32-32h96c17.7 0 32-14.3 32-32s-14.3-32-32-32H96z'/></svg></a></td>

                <td><a href='config/delete.php?type=" . $_GET['type'] . "&id=" . $row['a_id'] . "' ><svg style='fill:red;' xmlns='http://www.w3.org/2000/svg' height='1em' viewBox='0 0 448 512'><!--! Font Awesome Free 6.4.0 by @fontawesome - https://fontawesome.com License - https://fontawesome.com/license (Commercial License) Copyright 2023 Fonticons, Inc. --><path d='M135.2 17.7L128 32H32C14.3 32 0 46.3 0 64S14.3 96 32 96H416c17.7 0 32-14.3 32-32s-14.3-32-32-32H320l-7.2-14.3C307.4 6.8 296.3 0 284.2 0H163.8c-12.1 0-23.2 6.8-28.6 17.7zM416 128H32L53.2 467c1.6 25.3 22.6 45 47.9 45H346.9c25.3 0 46.3-19.7 47.9-45L416 128z'/></svg></a></td>

                <td>
                <a href='view_destination.php?district=" . $row['c_district'] . "&destination=cafe&dest_id=" . $row['c_id'] . "' target='_blank'>
                <svg style='fill:grey;' xmlns='http://www.w3.org/2000/svg' height='1em' viewBox='0 0 576 512'><!--! Font Awesome Free 6.4.0 by @fontawesome - https://fontawesome.com License - https://fontawesome.com/license (Commercial License) Copyright 2023 Fonticons, Inc. --><path d='M288 32c-80.8 0-145.5 36.8-192.6 80.6C48.6 156 17.3 208 2.5 243.7c-3.3 7.9-3.3 16.7 0 24.6C17.3 304 48.6 356 95.4 399.4C142.5 443.2 207.2 480 288 480s145.5-36.8 192.6-80.6c46.8-43.5 78.1-95.4 93-131.1c3.3-7.9 3.3-16.7 0-24.6c-14.9-35.7-46.2-87.7-93-131.1C433.5 68.8 368.8 32 288 32zM144 256a144 144 0 1 1 288 0 144 144 0 1 1 -288 0zm144-64c0 35.3-28.7 64-64 64c-7.1 0-13.9-1.2-20.3-3.3c-5.5-1.8-11.9 1.6-11.7 7.4c.3 6.9 1.3 13.8 3.2 20.7c13.7 51.2 66.4 81.6 117.6 67.9s81.6-66.4 67.9-117.6c-11.1-41.5-47.8-69.4-88.6-71.1c-5.8-.2-9.2 6.1-7.4 11.7c2.1 6.4 3.3 13.2 3.3 20.3z'/></svg></a></td>
                </tr>
                ";
            }
            echo "</table>";
            include "config/pagination.inc.php";
        }
    } else if ($_GET['type'] == "user") {
        $str1 = "select * from tbl_user";
        $res1 = $con->query($str1);
        $start = 0;
        $contents_per_page = 10;
        $no_of_rows = $res1->num_rows;
        $pages = ceil($no_of_rows / $contents_per_page);
        if (isset($_GET['page'])) {
            $page = $_GET['page'] - 1;
            $start = $page * $contents_per_page;
        }
        $str2 = "select * from tbl_user limit " . $start . "," . $contents_per_page;
        $res2 = $con->query($str2);
        if ($res2->num_rows > 0) {
            echo "<table class='attraction'  cellspacing='0'>
            <tr>
            <th>S.N</th>
            <th>Name</th>
            <th>Email</th>
            <th>City</th>
            <th>District</th>
            <th>Gender</th>
            <th>Delete</th>
            </tr>
            ";
            while ($row = $res2->fetch_assoc()) {
                echo "<tr>
                <td>" . ++$start . "</td>
                <td>" . $row['u_name'] . "</td>
                <td>" . $row['u_email'] . "</td>
                <td>" . $row['u_city'] . "</td>
                <td>" . $row['u_district'] . "</td>
                <td>" . $row['u_gender'] . "</td>
                <td><a href='#'><svg style='fill:red;' xmlns='http://www.w3.org/2000/svg' height='1em' viewBox='0 0 448 512'><!--! Font Awesome Free 6.4.0 by @fontawesome - https://fontawesome.com License - https://fontawesome.com/license (Commercial License) Copyright 2023 Fonticons, Inc. --><path d='M135.2 17.7L128 32H32C14.3 32 0 46.3 0 64S14.3 96 32 96H416c17.7 0 32-14.3 32-32s-14.3-32-32-32H320l-7.2-14.3C307.4 6.8 296.3 0 284.2 0H163.8c-12.1 0-23.2 6.8-28.6 17.7zM416 128H32L53.2 467c1.6 25.3 22.6 45 47.9 45H346.9c25.3 0 46.3-19.7 47.9-45L416 128z'/></svg></a></td>
                </tr>
                ";
            }
            echo "</table>";
            include "config/pagination.inc.php";
        }
    } else if ($_GET['type'] == "suggestion") {
        $str1 = "select * from tbl_suggestion";
        $res1 = $con->query($str1);
        $start = 0;
        $contents_per_page = 10;
        $no_of_rows = $res1->num_rows;
        $pages = ceil($no_of_rows / $contents_per_page);
        if (isset($_GET['page'])) {
            $page = $_GET['page'] - 1;
            $start = $page * $contents_per_page;
        }
        $str2 = "select * from tbl_user limit " . $start . "," . $contents_per_page;
        $res2 = $con->query($str2);
        if ($res2->num_rows > 0) {
            echo "<table class='attraction'  cellspacing='0'>
            <tr>
            <th>S.N</th>
            <th>Name</th>
            <th>Type</th>
            <th>City</th>
            <th>District</th>
            <th>Gender</th>
            <th>Delete</th>
            </tr>
            ";
            while ($row = $res2->fetch_assoc()) {
                echo "<tr>
                <td>" . ++$start . "</td>
                <td>" . $row['s_name'] . "</td>
                <td>" . $row['s_type'] . "</td>
                <td>" . $row['s_address'] . "</td>
                <td>" . $row['s_district'] . "</td>
                <td>" . $row['s_gender'] . "</td>
                <td><a href='#'><svg style='fill:red;' xmlns='http://www.w3.org/2000/svg' height='1em' viewBox='0 0 448 512'><!--! Font Awesome Free 6.4.0 by @fontawesome - https://fontawesome.com License - https://fontawesome.com/license (Commercial License) Copyright 2023 Fonticons, Inc. --><path d='M135.2 17.7L128 32H32C14.3 32 0 46.3 0 64S14.3 96 32 96H416c17.7 0 32-14.3 32-32s-14.3-32-32-32H320l-7.2-14.3C307.4 6.8 296.3 0 284.2 0H163.8c-12.1 0-23.2 6.8-28.6 17.7zM416 128H32L53.2 467c1.6 25.3 22.6 45 47.9 45H346.9c25.3 0 46.3-19.7 47.9-45L416 128z'/></svg></a></td>
                </tr>
                ";
            }
            echo "</table>";
            include "config/pagination.inc.php";
        }
    }

} else {
    $str1 = "select * from tbl_user";
    $str2 = "select * from tbl_place";
    $str3 = "select * from tbl_accommodation";
    $str4 = "select * from tbl_restaurant";
    $str5 = "select * from tbl_cafe";
    $res1 = $con->query($str1);
    $res2 = $con->query($str2);
    $res3 = $con->query($str3);
    $res4 = $con->query($str4);
    $res5 = $con->query($str5);
    echo "<table class='dashboard' border='2' cellspacing='0'>
        <tr>
        <td>Users</td><td>" . $res1->num_rows . "</td>
        </tr>
        <tr>
        <td>Place</td><td>" . $res2->num_rows . "</td>
        </tr>
        <tr>
        <td>Accomodation</td><td>" . $res3->num_rows . "</td>
        </tr>
        <tr>
        <td>Restaurant</td><td>" . $res4->num_rows . "</td>
        </tr>
        <tr>
        <td>Cafe</td><td>" . $res5->num_rows . "</td>
        </tr>
        </table>";
}


// $str1 = "select * from tbl_user";
// $str2 = "select * from tbl_place";
// $str3 = "select * from tbl_accommodation";
// $str4 = "select * from tbl_restaurant";
// $str5 = "select * from tbl_cafe";
// $res1 = $con->query($str1);
// $res2 = $con->query($str2);
// $res3 = $con->query($str3);
// $res4 = $con->query($str4);
// $res5 = $con->query($str5);
// echo "<table class='dashboard' border='2' cellspacing='0'>
// <tr>
// <td>Users</td><td>".$res1->num_rows."</td>
// </tr>
// <tr>
// <td>Place</td><td>".$res2->num_rows."</td>
// </tr>
// <tr>
// <td>Accomodation</td><td>".$res3->num_rows."</td>
// </tr>
// <tr>
// <td>Restaurant</td><td>".$res4->num_rows."</td>
// </tr>
// <tr>
// <td>Cafe</td><td>".$res5->num_rows."</td>
// </tr>

?>