<?php
session_start();
if (!isset($_SESSION['uname'])) {
    $_SESSION['admin_login'] = "Please login first";
    header('Location:login.php');
}
require "dbconn.inc.php";
function getDestinationInfo(mysqli $db, $type, $id)
{
    $firstChar = substr($type, 0, 1);
    if ($type == "district") {
        $district_exec = $db->query("SELECT * FROM tbl_district WHERE d_id=" . $id . ";");
        $row = $district_exec->fetch_assoc();

        $like_district = array(
            "dest_type" => $type,
            "name" => $row["d_name"],
            "type" => $row["d_type"],
            "address" => "-",
            "district" => "-"
        );

        return $like_district;
    } else {
        $dest_exec = $db->query("SELECT * FROM tbl_" . $type . " INNER JOIN tbl_district ON " . $firstChar . "_district=d_id WHERE " . $firstChar . "_id=" . $id . ";");
        $row = $dest_exec->fetch_assoc();

        $like_dest = array(
            "dest_type" => $type,
            "name" => $row[$firstChar . "_name"],
            "type" => $row[$firstChar . "_type"],
            "address" => $row[$firstChar . "_address"],
            "district" => $row["d_name"]
        );

        return $like_dest;
    }
}

if (isset($_GET['uid'])) {
    $user_id = $_GET['uid'];
    $user_exec = $con->query("SELECT * FROM tbl_user WHERE u_id = '$user_id';");
    $row = $user_exec->fetch_assoc();
    $user_email = $row['u_email'];
    $user_name = $row['u_name'];
    $user_city = $row['u_city'];
    $user_district = $row['u_district'];
    $user_gender = $row['u_gender'];
    $user_dob = $row['u_dob'];
    $user_image = $row['u_image'];

    $like_exec = $con->query("SELECT * FROM tbl_user_liked_trip WHERE like_user_id =" . $user_id . " ;");
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <title>
        <?= $user_name ?> | Traverse Nepal
    </title>
    <link rel="icon" href="../../image/TN_favicon_white.svg" type="image/svg+xml">
    <link rel="stylesheet" href="../assets/style/view_user.css">
    <link rel="stylesheet" href="../assets/style/reload_animation_style.css">
    <link rel="stylesheet" href="../assets/datatable/datatables.min.css" />
</head>

<body>
    <!-- Reload Animation -->
    <div id="loader-overlay">
        <img src="../assets/img/TN-reload-page-animation.gif" alt="Loading...">
    </div>
    <!-- Reload Animation -->
    <main>
        <div class="profile-details-container">
            <div class="details-title">
                User's Information:
            </div>
            <div class="information">
                <div class="user-pp-container">
                    <div class="pp" id="profile-pic">
                        <?php if ($user_image == "") { ?>
                            <img src="../../image/default-pp.jpg" id="user-pp" alt="Your profile picture...">
                        <?php } else { ?>
                            <img src="<?php echo "../." . $user_image; ?>" id="user-pp" alt="Your profile picture...">
                        <?php } ?>
                    </div>
                </div>
                <div class="user-information-container">
                    <div class="user-details">
                        <div class="user-name detail">
                            <div class="detail-icon">
                                <svg xmlns="http://www.w3.org/2000/svg" height="24px" viewBox="0 0 448 512">
                                    <path
                                        d="M224 256A128 128 0 1 0 224 0a128 128 0 1 0 0 256zm-45.7 48C79.8 304 0 383.8 0 482.3C0 498.7 13.3 512 29.7 512H418.3c16.4 0 29.7-13.3 29.7-29.7C448 383.8 368.2 304 269.7 304H178.3z" />
                                </svg>
                            </div>
                            <div class="detail-value">
                                <?php echo $user_name; ?>
                            </div>
                        </div>
                        <div class="user-email detail">
                            <div class="detail-icon">
                                <svg xmlns="http://www.w3.org/2000/svg" height="1em" viewBox="0 0 512 512">
                                    <path
                                        d="M48 64C21.5 64 0 85.5 0 112c0 15.1 7.1 29.3 19.2 38.4L236.8 313.6c11.4 8.5 27 8.5 38.4 0L492.8 150.4c12.1-9.1 19.2-23.3 19.2-38.4c0-26.5-21.5-48-48-48H48zM0 176V384c0 35.3 28.7 64 64 64H448c35.3 0 64-28.7 64-64V176L294.4 339.2c-22.8 17.1-54 17.1-76.8 0L0 176z" />
                                </svg>
                            </div>
                            <div class="detail-value">
                                <?php echo $user_email; ?>
                            </div>
                        </div>
                        <div class="user-city detail">
                            <div class="detail-icon">
                                <svg xmlns="http://www.w3.org/2000/svg" height="1em" viewBox="0 0 640 512">
                                    <path
                                        d="M480 48c0-26.5-21.5-48-48-48H336c-26.5 0-48 21.5-48 48V96H224V24c0-13.3-10.7-24-24-24s-24 10.7-24 24V96H112V24c0-13.3-10.7-24-24-24S64 10.7 64 24V96H48C21.5 96 0 117.5 0 144v96V464c0 26.5 21.5 48 48 48H304h32 96H592c26.5 0 48-21.5 48-48V240c0-26.5-21.5-48-48-48H480V48zm96 320v32c0 8.8-7.2 16-16 16H528c-8.8 0-16-7.2-16-16V368c0-8.8 7.2-16 16-16h32c8.8 0 16 7.2 16 16zM240 416H208c-8.8 0-16-7.2-16-16V368c0-8.8 7.2-16 16-16h32c8.8 0 16 7.2 16 16v32c0 8.8-7.2 16-16 16zM128 400c0 8.8-7.2 16-16 16H80c-8.8 0-16-7.2-16-16V368c0-8.8 7.2-16 16-16h32c8.8 0 16 7.2 16 16v32zM560 256c8.8 0 16 7.2 16 16v32c0 8.8-7.2 16-16 16H528c-8.8 0-16-7.2-16-16V272c0-8.8 7.2-16 16-16h32zM256 176v32c0 8.8-7.2 16-16 16H208c-8.8 0-16-7.2-16-16V176c0-8.8 7.2-16 16-16h32c8.8 0 16 7.2 16 16zM112 160c8.8 0 16 7.2 16 16v32c0 8.8-7.2 16-16 16H80c-8.8 0-16-7.2-16-16V176c0-8.8 7.2-16 16-16h32zM256 304c0 8.8-7.2 16-16 16H208c-8.8 0-16-7.2-16-16V272c0-8.8 7.2-16 16-16h32c8.8 0 16 7.2 16 16v32zM112 320H80c-8.8 0-16-7.2-16-16V272c0-8.8 7.2-16 16-16h32c8.8 0 16 7.2 16 16v32c0 8.8-7.2 16-16 16zm304-48v32c0 8.8-7.2 16-16 16H368c-8.8 0-16-7.2-16-16V272c0-8.8 7.2-16 16-16h32c8.8 0 16 7.2 16 16zM400 64c8.8 0 16 7.2 16 16v32c0 8.8-7.2 16-16 16H368c-8.8 0-16-7.2-16-16V80c0-8.8 7.2-16 16-16h32zm16 112v32c0 8.8-7.2 16-16 16H368c-8.8 0-16-7.2-16-16V176c0-8.8 7.2-16 16-16h32c8.8 0 16 7.2 16 16z" />
                                </svg>
                            </div>
                            <div class="detail-value">
                                <?php echo $user_city; ?>
                            </div>
                        </div>
                        <div class="user-district detail">
                            <div class="detail-icon">
                                <svg xmlns="http://www.w3.org/2000/svg" height="1em" viewBox="0 0 384 512">
                                    <path
                                        d="M215.7 499.2C267 435 384 279.4 384 192C384 86 298 0 192 0S0 86 0 192c0 87.4 117 243 168.3 307.2c12.3 15.3 35.1 15.3 47.4 0zM192 128a64 64 0 1 1 0 128 64 64 0 1 1 0-128z" />
                                </svg>
                            </div>
                            <div class="detail-value">
                                <?php echo $user_district; ?>
                            </div>
                        </div>
                        <div class="user-gender detail">
                            <div class="detail-icon">
                                <svg xmlns="http://www.w3.org/2000/svg" height="1em" viewBox="0 0 640 512">
                                    <path
                                        d="M176 288a112 112 0 1 0 0-224 112 112 0 1 0 0 224zM352 176c0 86.3-62.1 158.1-144 173.1V384h32c17.7 0 32 14.3 32 32s-14.3 32-32 32H208v32c0 17.7-14.3 32-32 32s-32-14.3-32-32V448H112c-17.7 0-32-14.3-32-32s14.3-32 32-32h32V349.1C62.1 334.1 0 262.3 0 176C0 78.8 78.8 0 176 0s176 78.8 176 176zM271.9 360.6c19.3-10.1 36.9-23.1 52.1-38.4c20 18.5 46.7 29.8 76.1 29.8c61.9 0 112-50.1 112-112s-50.1-112-112-112c-7.2 0-14.3 .7-21.1 2c-4.9-21.5-13-41.7-24-60.2C369.3 66 384.4 64 400 64c37 0 71.4 11.4 99.8 31l20.6-20.6L487 41c-6.9-6.9-8.9-17.2-5.2-26.2S494.3 0 504 0H616c13.3 0 24 10.7 24 24V136c0 9.7-5.8 18.5-14.8 22.2s-19.3 1.7-26.2-5.2l-33.4-33.4L545 140.2c19.5 28.4 31 62.7 31 99.8c0 97.2-78.8 176-176 176c-50.5 0-96-21.3-128.1-55.4z" />
                                </svg>
                            </div>
                            <div class="detail-value">
                                <?php echo $user_gender; ?>
                            </div>
                        </div>
                        <div class="user-dob detail">
                            <div class="detail-icon">
                                <svg xmlns="http://www.w3.org/2000/svg" height="1em" viewBox="0 0 448 512">
                                    <path
                                        d="M128 0c17.7 0 32 14.3 32 32V64H288V32c0-17.7 14.3-32 32-32s32 14.3 32 32V64h48c26.5 0 48 21.5 48 48v48H0V112C0 85.5 21.5 64 48 64H96V32c0-17.7 14.3-32 32-32zM0 192H448V464c0 26.5-21.5 48-48 48H48c-26.5 0-48-21.5-48-48V192zm64 80v32c0 8.8 7.2 16 16 16h32c8.8 0 16-7.2 16-16V272c0-8.8-7.2-16-16-16H80c-8.8 0-16 7.2-16 16zm128 0v32c0 8.8 7.2 16 16 16h32c8.8 0 16-7.2 16-16V272c0-8.8-7.2-16-16-16H208c-8.8 0-16 7.2-16 16zm144-16c-8.8 0-16 7.2-16 16v32c0 8.8 7.2 16 16 16h32c8.8 0 16-7.2 16-16V272c0-8.8-7.2-16-16-16H336zM64 400v32c0 8.8 7.2 16 16 16h32c8.8 0 16-7.2 16-16V400c0-8.8-7.2-16-16-16H80c-8.8 0-16 7.2-16 16zm144-16c-8.8 0-16 7.2-16 16v32c0 8.8 7.2 16 16 16h32c8.8 0 16-7.2 16-16V400c0-8.8-7.2-16-16-16H208zm112 16v32c0 8.8 7.2 16 16 16h32c8.8 0 16-7.2 16-16V400c0-8.8-7.2-16-16-16H336c-8.8 0-16 7.2-16 16z" />
                                </svg>
                            </div>
                            <div class="detail-value">
                                <?php echo $user_dob; ?>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="like-details-container">
            <div class="like-details-title">
                <?= $user_name ?> has liked following destinations :
            </div>
            <div class="like-details-table">
                <?php
                if ($like_exec->num_rows > 0) { ?>
                    <table id="like-table">
                        <thead>
                            <tr>
                                <th>S.N</th>
                                <th>Destination Name</th>
                                <th>Destination Type</th>
                                <th>Address</th>
                                <th>District</th>
                            </tr>
                        </thead>
                        <tbody>
                        <?php
                        $sn = 0;
                        // $type = "";
                        $type = 0;
                        while ($like_dest_row = $like_exec->fetch_assoc()) {
                            $type = (string) $like_dest_row['like_dest_type'];
                            $id = (int) $like_dest_row['like_dest_id'];
                            $like_destination = getDestinationInfo($con, $type, $id);
                            $sn++;?>
                            <tr>
                                <td>
                                    <?= $sn ?>
                                </td>
                                <td>
                                    <?= $like_destination["name"] ?>
                                </td>
                                <td>
                                    <?= $like_destination["dest_type"]." - ".$like_destination["type"] ?>
                                </td>
                                <td>
                                    <?= $like_destination["address"] ?>
                                </td>
                                <td>
                                    <?= $like_destination["district"] ?>
                                </td>
                            </tr>
                        <?php
                    } 
                    ?>
                        </tbody>
                    </table>
                    <?php
                } else {
                    echo "No liked trips found!!!";
                } ?>
            </div>
        </div>
    </main>

    <script src="../assets/script/reload_animation.js"></script>
    <script src="../assets/script/jquery.js"></script>
    <script src="../assets/datatable/datatables.min.js"></script>
    <script>
        $(document).ready(function () {
            $('#like-table').dataTable({
                "lengthMenu": [[5], [5]]
            });
        });
    </script>
</body>

</html>