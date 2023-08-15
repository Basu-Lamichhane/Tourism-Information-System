<?php
session_start();
if (!isset($_SESSION['uname'])) {
    $_SESSION['admin_login'] = "Please login first";
    header('Location:login.php');
}

?>

<!DOCTYPE html>

<html lang="en">

<head>
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Admin Dashboard | Traverse Nepal</title>
    <link rel="icon" href="../image/TN_favicon_white.svg" type="image/svg+xml">
    <link rel="stylesheet" href="assets/style/admin_panel.css" />
    <link rel="stylesheet" href="assets/style/dashboard.css" />
    <link rel="stylesheet" href="assets/style/pagination_style.css" />
    <link rel="stylesheet" href="assets/datatable/datatables.min.css" />
</head>

<body>
    <nav class="sidebar">
        <a href="#" class="logo">
            <span class="logo-image"></span>
            <span class="logo-name">Traverse Nepal</span>
        </a>

        <div class="menu-content">
            <ul class="menu-items">
                <div class="menu-title">Admin Panel</div>

                <li class="item" onclick="showDashboard();">
                    <a href="admin.php?type=dashboard">Dashboard</a>
                </li>

                <li class="item">
                    <div class="submenu-item" id="manage-tourism">
                        <span>Manage Tourism</span>
                        <span class="arrow-right"></span>
                    </div>

                    <ul class="menu-items submenu">
                        <div class="menu-title">
                            <span class="arrow-left"></span>
                            Manage Tourism
                        </div>
                        <li class="item">
                            <a href="admin.php?type=district">District</a>
                        </li>
                        <li class="item">
                            <a href="admin.php?type=place">Attractions</a>
                        </li>
                        <li class="item">
                            <a href="admin.php?type=accommodation">Accommodations</a>
                        </li>
                        <li class="item">
                            <a href="admin.php?type=restaurant">Restaurants</a>
                        </li>
                        <li class="item">
                            <a href="admin.php?type=cafe">Cafes</a>
                        </li>
                    </ul>
                </li>
                <li class="item">
                    <a href="admin.php?type=user">Manage User</a>
                </li>

                <li>
                    <div class="profile-details">
                        <!-- <div class="profile-content">
                            <img src="" alt="photo">
                        </div> -->

                        <div class="admin-profile">
                            <div class="admin-name">Admin</div>
                            <div class="admin-desc">Traverse Nepal</div>
                        </div>
                        <a href="logout.php" class="logout"></a>
                    </div>
                </li>
            </ul>
        </div>
    </nav>

    <nav class="navbar">
        <span class="nav-bars" id="sidebar-close"></span>
    </nav>

    <main class="main" id="main_content" <?php if (isset($_GET['type']) && $_GET['type'] != "dashboard") {
        echo 'style="height:91vh"';
    }
    ?>>
        <div id="table-content">
            <?php include "config/get_info.php"; ?>
            <?php if (isset($_GET['type']) && $_GET['type'] == "dashboard") {
                echo '<div class="chart-container">';
                include "config/chart.inc.php";
                echo '</div>';
            }
            ?>
        </div>
        <?php include "config/action.php"; ?>
    </main>



    <?php
    if (isset($_SESSION['action'])) {
        echo "<script> alert('" . $_SESSION['action'] . "') </script>";
        unset($_SESSION['action']);
    }
    ?>
    <script src="assets/script/admin_panel.js"></script>
    <script src="assets/script/attraction_table_ajax.js"></script>
    <script src="assets/script/admin_dashboard.js"></script>
    <script src="assets/script/jquery.js"></script>
    <script src="assets/datatable/datatables.min.js"></script>
    <script>
        $(document).ready(function () {
            $('#myTable').dataTable({
                "lengthMenu": [[5, 10, 25, 50, -1], [5, 10, 25, 50, "All"]]
            });
        });
    </script>
</body>

</html>