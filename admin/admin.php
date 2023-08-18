<?php
session_start();
if (!isset($_SESSION['uname'])) {
    $_SESSION['admin_login'] = "Please login first";
    header('Location:login.php');
}
if(!isset($_GET['type'])){
    header('Location:'.$_SERVER['PHP_SELF'].'?type=dashboard');
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Admin Dashboard | Traverse Nepal</title>
    <link rel="icon" href="../image/TN_favicon_white.svg" type="image/svg+xml" />
    <link rel="stylesheet" href="assets/style/dashboard.css" />
    <link rel="stylesheet" href="assets/style/noti.css" />
    <link rel="stylesheet" href="assets/style/pagination_style.css" />
    <link rel="stylesheet" href="assets/datatable/datatables.min.css" />
    <link rel="stylesheet" href="assets/style/admin.css" />
    <!-- Boxicons CSS -->
    <link flex href="assets/boxicons/css/boxicons.min.css" rel="stylesheet" />
</head>

<body>
    <?php
    if(isset($_SESSION['action_msg']) && $_GET['type']=="dashboard"){
        echo'<div id="noti">'.$_SESSION["action_msg"].'</div>';
        unset($_SESSION["action_msg"]);
    }
    ?>
    <nav class="sidebar locked">
        <div class="logo_items flex">
            <a href="admin.php" class="logo-image-name flex">
                <span class="nav_image">
                    <img src="assets/img/traverse-nepal-website-favicon-white.png" alt="logo_img" />
                </span>
                <span class="logo_name">Traverse Nepal</span>
            </a>
            <i class="bx bx-lock-alt" id="lock-icon" title="Unlock Sidebar"></i>
            <i class="bx bx-x" id="sidebar-close"></i>
        </div>

        <div class="menu_container">
            <div class="menu_items">
                <ul class="menu_item">
                    <div class="menu_title flex">
                        <span class="title">Dashboard</span>
                        <span class="line"></span>
                    </div>
                    <li class="item">
                        <a href="admin.php?type=dashboard" class="link flex">
                            <i class='bx bxs-dashboard'></i>
                            <span>Overview</span>
                        </a>
                    </li>
                </ul>

                <ul class="menu_item">
                    <div class="menu_title flex">
                        <span class="title">Manage Districts</span>
                        <span class="line"></span>
                    </div>
                    <li class="item">
                        <a href="admin.php?type=district" class="link flex">
                            <i class='bx bxs-map-alt'></i>
                            <span>Districts</span>
                        </a>
                </ul>

                <ul class="menu_item">
                    <div class="menu_title flex">
                        <span class="title">Manage Destinations</span>
                        <span class="line"></span>
                    </div>
                    <li class="item">
                        <a href="admin.php?type=place" class="link flex">
                            <i class='bx bxs-map'></i>
                            <span>Places/Attractions</span>
                        </a>
                    </li>
                    <li class="item">
                        <a href="admin.php?type=accommodation" class="link flex">
                            <i class='bx bxs-hotel'></i>
                            <span>Accommodations/Hotels</span>
                        </a>
                    </li>
                    <li class="item">
                        <a href="admin.php?type=restaurant" class="link flex">
                            <i class='bx bx-restaurant'></i>
                            <span>Restaurants/Diner</span>
                        </a>
                    </li>
                    <li class="item">
                        <a href="admin.php?type=cafe" class="link flex">
                            <i class='bx bx-coffee'></i>
                            <span>Cafes/Bakeries</span>
                        </a>
                    </li>
                </ul>

                <ul class="menu_item">
                    <div class="menu_title flex">
                        <span class="title">Manage Users</span>
                        <span class="line"></span>
                    </div>
                    <li class="item">
                        <a href="admin.php?type=user" class="link flex">
                            <i class='bx bxs-user'></i>
                            <span>Users</span>
                        </a>
                    </li>
                </ul>
            </div>
            <div class="sidebar_profile flex">
                <a href="logout.php" class="link">
                    <i class='bx bxs-log-out'></i>
                </a>
                <div class="data_text">
                    <span class="name">Administrator</span>
                    <span class="email">admin.tn@gmail.com</span>
                </div>
            </div>
        </div>
    </nav>

    <div id="main-content" class="main" style="display:none;">
        <!-- Navbar -->
        <nav class="navbar flex">
            <i class="bx bx-menu" id="sidebar-open"></i>
            <input type="text" list="search-contents" id="search-bar" placeholder="Go to..." class="search_box" autocomplete="on" />

            <datalist id="search-contents">
                <option value="Overview">Dashboard</option>
                <option value="Districts">Manage Districts</option>
                <option value="Places/Attractions">Manage Destinations</option>
                <option value="Accommodations/Hotels">Manage Destinations</option>
                <option value="Restaurants/Diner">Manage Destinations</option>
                <option value="Cafes/Bakeries">Manage Destinations</option>
                <option value="Users">Manage Users</option>
            </datalist>
            <span class="nav_image">
            <i class='bx bxs-right-arrow-circle' id="search-btn"></i>
            </span>
        </nav>
        <div class="main-chart">
            <?php include "config/get_info.php"; ?>
            <?php if (isset($_GET['type']) && $_GET['type'] == "dashboard") { ?>
                <div class="chart-main">
                    <div class="chart-title">
                        Most liked destinations by the users:
                    </div>
                    <div class="chart-container">
                        <?php include "config/chart.inc.php"; ?>
                    </div>
                </div>
                <?php
            }
            ?>
        </div>
        <?php include "config/action.php"; ?>
    </div>

    <?php
    if (isset($_SESSION['action'])) {
        echo "<script> alert('" . $_SESSION['action'] . "') </script>";
        unset($_SESSION['action']);
    }
    ?>
    <!-- <script src="assets/script/admin_panel.js"></script> -->
    <script src="assets/script/attraction_table_ajax.js"></script>
    <script src="assets/script/noti.js"></script>
    <script src="assets/script/jquery.js"></script>
    <script src="assets/datatable/datatables.min.js"></script>
    <script>
        $(document).ready(function () {
            $('#myTable').dataTable({
                "lengthMenu": [[5, 10, 25, 50, -1], [5, 10, 25, 50, "All"]]
            });
        });
    </script>
    <script src="assets/script/admin.js"></script>
</body>

</html>