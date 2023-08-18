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

                <li class="item">
                    <a href="admin.php?type=dashboard" >
                        <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 -0.5 25 25" fill="none">
                            <path fill-rule="evenodd" clip-rule="evenodd"
                                d="M9.918 10.0005H7.082C6.66587 9.99708 6.26541 10.1591 5.96873 10.4509C5.67204 10.7427 5.50343 11.1404 5.5 11.5565V17.4455C5.5077 18.3117 6.21584 19.0078 7.082 19.0005H9.918C10.3341 19.004 10.7346 18.842 11.0313 18.5502C11.328 18.2584 11.4966 17.8607 11.5 17.4445V11.5565C11.4966 11.1404 11.328 10.7427 11.0313 10.4509C10.7346 10.1591 10.3341 9.99708 9.918 10.0005Z"
                                stroke="#000000" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round" />
                            <path fill-rule="evenodd" clip-rule="evenodd"
                                d="M9.918 4.0006H7.082C6.23326 3.97706 5.52559 4.64492 5.5 5.4936V6.5076C5.52559 7.35629 6.23326 8.02415 7.082 8.0006H9.918C10.7667 8.02415 11.4744 7.35629 11.5 6.5076V5.4936C11.4744 4.64492 10.7667 3.97706 9.918 4.0006Z"
                                stroke="#000000" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round" />
                            <path fill-rule="evenodd" clip-rule="evenodd"
                                d="M15.082 13.0007H17.917C18.3333 13.0044 18.734 12.8425 19.0309 12.5507C19.3278 12.2588 19.4966 11.861 19.5 11.4447V5.55666C19.4966 5.14054 19.328 4.74282 19.0313 4.45101C18.7346 4.1592 18.3341 3.9972 17.918 4.00066H15.082C14.6659 3.9972 14.2654 4.1592 13.9687 4.45101C13.672 4.74282 13.5034 5.14054 13.5 5.55666V11.4447C13.5034 11.8608 13.672 12.2585 13.9687 12.5503C14.2654 12.8421 14.6659 13.0041 15.082 13.0007Z"
                                stroke="#000000" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round" />
                            <path fill-rule="evenodd" clip-rule="evenodd"
                                d="M15.082 19.0006H17.917C18.7661 19.0247 19.4744 18.3567 19.5 17.5076V16.4936C19.4744 15.6449 18.7667 14.9771 17.918 15.0006H15.082C14.2333 14.9771 13.5256 15.6449 13.5 16.4936V17.5066C13.525 18.3557 14.2329 19.0241 15.082 19.0006Z"
                                stroke="#000000" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round" />
                        </svg>
                    </a>
                    <a href="admin.php?type=dashboard">Dashboard</a>
                </li>
                <li class="item">
                    <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="none">
                        <path fill-rule="evenodd" clip-rule="evenodd"
                            d="M12 2C16.714 2 19.0711 2 20.5355 3.46447C21.0394 3.96833 21.3699 4.57786 21.5867 5.3527L5.3527 21.5867C4.57786 21.3699 3.96833 21.0394 3.46447 20.5355C2 19.0711 2 16.714 2 12C2 7.28595 2 4.92893 3.46447 3.46447C4.92893 2 7.28595 2 12 2ZM5.5 8.75732C5.5 10.5422 6.61708 12.625 8.35997 13.3698C8.76626 13.5434 9.23374 13.5434 9.64003 13.3698C11.3829 12.625 12.5 10.5422 12.5 8.75732C12.5 6.95835 10.933 5.5 9 5.5C7.067 5.5 5.5 6.95835 5.5 8.75732Z"
                            fill="#1C274C" />
                        <path
                            d="M10.5 9C10.5 9.82843 9.82843 10.5 9 10.5C8.17157 10.5 7.5 9.82843 7.5 9C7.5 8.17157 8.17157 7.5 9 7.5C9.82843 7.5 10.5 8.17157 10.5 9Z"
                            fill="#1C274C" />
                        <g opacity="0.5">
                            <path
                                d="M21.8893 7.17188C22.0002 8.43338 22.0002 10.0059 22.0002 12.0002C22.0002 16.1339 22.0002 18.4552 21.0128 19.9515L15.0613 14L21.8893 7.17188Z"
                                fill="#1C274C" />
                            <path
                                d="M19.9523 21.0123L14.0006 15.0607L7.17188 21.8893C8.43338 22.0002 10.0059 22.0002 12.0002 22.0002C16.1346 22.0002 18.4559 22.0002 19.9523 21.0123Z"
                                fill="#1C274C" />
                        </g>
                    </svg>
                    <a href="admin.php?type=district">District</a>
                </li>
                <li class="item">
                    <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" id="Layer_1" data-name="Layer 1">
                        <defs>
                            <style>
                                .cls-1 {
                                    fill: none;
                                    stroke: #020202;
                                    stroke-miterlimit: 10;
                                    stroke-width: 1.91px;
                                }

                                .cls-2 {
                                    fill: #020202;
                                }
                            </style>
                        </defs>
                        <path class="cls-1"
                            d="M9.11,5.08c0,2.39-3.81,6-3.81,6s-3.82-3.58-3.82-6A3.7,3.7,0,0,1,5.3,1.5,3.7,3.7,0,0,1,9.11,5.08Z" />
                        <circle class="cls-2" cx="5.3" cy="5.32" r="0.95" />
                        <path class="cls-1"
                            d="M4.34,13h4.3A2.39,2.39,0,0,1,11,15.34h0a2.39,2.39,0,0,1-2.38,2.39H3.86a2.39,2.39,0,0,0-2.38,2.38h0A2.39,2.39,0,0,0,3.86,22.5H17.7" />
                        <line class="cls-1" x1="16.75" y1="9.14" x2="16.75" y2="20.59" />
                        <polygon class="cls-1"
                            points="16.75 14.86 21.52 14.86 20.57 12.96 21.52 11.04 16.75 11.04 16.75 14.86" />
                    </svg>
                    <div class="submenu-item" id="manage-tourism">
                        <span>Destinations</span>
                        <span class="arrow-right"></span>
                    </div>

                    <ul class="menu-items submenu">
                        <div class="menu-title">
                            <span class="arrow-left"></span>
                            Manage Tourism
                        </div>
                        <li class="item">
                            <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 32 32" version="1.1">
                                <title>compass</title>
                                <path
                                    d="M0 16q0 3.264 1.28 6.208t3.392 5.12 5.12 3.424 6.208 1.248 6.208-1.248 5.12-3.424 3.392-5.12 1.28-6.208-1.28-6.208-3.392-5.12-5.088-3.392-6.24-1.28-6.24 1.28-5.088 3.392-3.392 5.12-1.28 6.208zM4 16q0-3.264 1.6-6.016t4.384-4.352 6.016-1.632 6.016 1.632 4.384 4.352 1.6 6.016-1.6 6.048-4.384 4.352-6.016 1.6-6.016-1.6-4.384-4.352-1.6-6.048zM10.048 19.136q-0.448 1.664 0.288 2.528 0.864 0.736 2.56 0.32t3.392-1.376 2.528-1.76 1.792-2.56 1.344-3.392-0.288-2.528q-0.864-0.736-2.56-0.32t-3.392 1.376-2.528 1.76-1.792 2.56-1.344 3.392zM14.592 14.592q0.864-0.864 3.008-2.112t2.656-0.704-0.736 2.656-2.112 2.976z" />
                            </svg>
                            <a href="admin.php?type=place">Attractions</a>
                        </li>
                        <li class="item">
                            <svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink"
                                version="1.1" id="_x32_" viewBox="0 0 512 512" xml:space="preserve">
                                <style type="text/css">
                                    .st0 {
                                        fill: #000000;
                                    }
                                </style>
                                <g>
                                    <path class="st0"
                                        d="M407.788,190.202h-92.16V82.62c-0.01-45.642-36.978-82.61-82.62-82.62H104.212   C58.57,0.01,21.602,36.978,21.591,82.62V512H58.6V82.62c0.01-12.65,5.08-23.936,13.363-32.249   c8.314-8.284,19.599-13.353,32.249-13.364h128.796c12.65,0.01,23.936,5.08,32.249,13.364c8.283,8.313,13.353,19.599,13.363,32.249   V512h37.008V227.21h92.16c12.65,0.01,23.936,5.08,32.249,13.364c8.284,8.313,13.353,19.599,13.364,32.249V512h37.008V272.822   C490.398,227.18,453.43,190.212,407.788,190.202z" />
                                    <rect x="111.321" y="131.597" class="st0" width="31.808" height="53.976" />
                                    <rect x="189.975" y="131.597" class="st0" width="31.808" height="53.976" />
                                    <rect x="111.321" y="254.971" class="st0" width="31.808" height="53.976" />
                                    <rect x="189.975" y="254.971" class="st0" width="31.808" height="53.976" />
                                    <rect x="111.321" y="378.345" class="st0" width="31.808" height="53.976" />
                                    <rect x="189.975" y="378.345" class="st0" width="31.808" height="53.976" />
                                    <rect x="363.47" y="289.67" class="st0" width="31.808" height="53.976" />
                                    <rect x="363.47" y="407.903" class="st0" width="31.808" height="53.976" />
                                </g>
                            </svg>
                            <a href="admin.php?type=accommodation">Accommodations</a>
                        </li>
                        <li class="item">
                            <svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink"
                                fill="#000000" version="1.1" id="Capa_1" width="800px" height="800px"
                                viewBox="0 0 577.574 577.574" xml:space="preserve">
                                <g>
                                    <g id="Layer_1_82_">
                                        <g>
                                            <path
                                                d="M567.375,476.85L405.449,312.375c-6.375,3.824-11.475,6.375-19.125,8.924c-7.648,2.551-16.574,3.826-25.5,3.826     c-10.199,0-20.398-2.551-29.324-5.102l-52.275,54.826c6.375,5.1,15.3,7.65,24.224,8.924c11.477,0,22.951-3.824,31.875-12.75     l1.275-1.273l161.926,172.125c6.375,6.375,15.299,10.199,24.225,10.199s17.85-3.824,24.225-10.199l20.4-20.4     c6.375-6.375,10.199-15.301,10.199-24.225C577.574,488.324,573.75,481.949,567.375,476.85z" />
                                            <path
                                                d="M179.775,261.375l48.45-45.9c-2.55-8.925-3.825-17.85-3.825-26.775c0-15.3,5.1-30.6,12.75-43.35l-102-105.825     c-15.3-15.3-42.075-15.3-57.375,0C51,66.299,49.725,109.649,73.95,138.974L179.775,261.375z" />
                                            <path
                                                d="M332.775,276.674c7.65,7.65,17.85,11.475,28.049,11.475c10.201,0,20.4-3.825,28.051-11.475L517.65,147.899     c5.1-5.1,5.1-12.75,0-17.85l-2.551-2.55c-2.549-2.55-5.1-3.825-8.924-3.825c-3.826,0-6.375,1.275-8.926,3.825l-85.426,85.425     c-3.824,3.825-8.924,5.1-14.023,5.1c-5.102,0-10.201-2.55-14.025-5.1l-2.551-2.55c-7.65-7.65-7.65-19.125,0-26.775l85.426-85.425     c5.1-5.1,5.1-12.75,0-17.85l-2.551-2.55c-2.549-2.55-5.1-3.825-8.924-3.825c-3.826,0-6.375,1.275-8.926,3.825l-85.426,85.425     c-3.824,3.825-8.924,5.1-14.023,5.1c-5.102,0-10.201-2.55-14.025-5.1l-2.551-2.55c-3.824-3.825-5.1-8.925-5.1-14.025     c0-5.1,2.551-10.2,5.1-14.025l85.426-85.425c2.549-2.55,3.824-5.1,3.824-8.925c0-3.825-1.275-6.375-3.824-8.925l-2.551-2.55     c-2.551-2.55-5.1-3.825-8.926-3.825c-3.824,0,0.002,5.1-2.549,7.65L272.85,159.375c-7.65,7.65-11.475,17.85-11.475,28.05     s3.825,21.675,11.475,28.05l3.825,3.825L10.2,471.75C3.825,478.125,0,487.049,0,495.975c0,8.924,3.825,17.85,10.2,24.225     l19.125,21.676c6.375,6.375,15.3,12.75,24.225,12.75l0,0c8.925,0,17.85-6.375,24.225-12.75l251.174-269.026L332.775,276.674z" />
                                        </g>
                                    </g>
                                </g>
                            </svg>
                            <a href="admin.php?type=restaurant">Restaurants</a>
                        </li>
                        <li class="item">
                            <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="none">
                                <path fill-rule="evenodd" clip-rule="evenodd"
                                    d="M2.2509 11.8809C2.2404 12.057 2.26536 12.2706 2.3153 12.6978L2.71598 16.1258C2.89681 17.6729 3.72352 19.0714 4.99182 19.9757C5.9263 20.6419 7.04537 21 8.19303 21H11.8069C12.9546 21 14.0736 20.6419 15.0081 19.9757C15.8116 19.4028 16.4378 18.6317 16.8349 17.75H19C21.0711 17.75 22.75 16.0711 22.75 14C22.75 11.9289 21.0711 10.25 19 10.25H16.7212C16.5325 10.1455 16.3244 10.0703 16.1027 10.0309C15.929 10 15.7139 10 15.2838 10H4.71612C4.286 10 4.07094 10 3.89725 10.0309C2.98677 10.1928 2.30599 10.9577 2.2509 11.8809ZM17.7369 11.75C17.7424 11.7932 17.7464 11.8369 17.749 11.8809C17.7595 12.057 17.7346 12.2706 17.6847 12.6977L17.284 16.1258C17.2791 16.1673 17.2738 16.2087 17.268 16.25H19C20.2426 16.25 21.25 15.2426 21.25 14C21.25 12.7574 20.2426 11.75 19 11.75H17.7369Z"
                                    fill="#1C274C" />
                                <path fill-rule="evenodd" clip-rule="evenodd"
                                    d="M10.5305 1.46967C10.8234 1.76256 10.8234 2.23744 10.5305 2.53033C10.2711 2.78972 10.2711 3.21028 10.5305 3.46967C11.3757 4.31485 11.3757 5.68515 10.5305 6.53033C10.2376 6.82322 9.76271 6.82322 9.46982 6.53033C9.17693 6.23744 9.17693 5.76256 9.46982 5.46967C9.72921 5.21028 9.72921 4.78972 9.46982 4.53033C8.62464 3.68515 8.62464 2.31485 9.46982 1.46967C9.76271 1.17678 10.2376 1.17678 10.5305 1.46967Z"
                                    fill="#1C274C" />
                                <path fill-rule="evenodd" clip-rule="evenodd"
                                    d="M6.03033 2.96967C6.32322 3.26256 6.32322 3.73744 6.03033 4.03033L5.91421 4.14645C5.67096 4.3897 5.6436 4.77479 5.85 5.05C6.50429 5.92239 6.41753 7.14313 5.64645 7.91421L5.53033 8.03033C5.23744 8.32322 4.76256 8.32322 4.46967 8.03033C4.17678 7.73744 4.17678 7.26256 4.46967 6.96967L4.58579 6.85355C4.82904 6.6103 4.8564 6.22521 4.65 5.95C3.99571 5.07761 4.08247 3.85687 4.85355 3.08579L4.96967 2.96967C5.26256 2.67678 5.73744 2.67678 6.03033 2.96967Z"
                                    fill="#1C274C" />
                                <path fill-rule="evenodd" clip-rule="evenodd"
                                    d="M15.5303 2.96967C15.8232 3.26256 15.8232 3.73744 15.5303 4.03033L15.4142 4.14645C15.171 4.3897 15.1436 4.77479 15.35 5.05C16.0043 5.92239 15.9175 7.14313 15.1464 7.91421L15.0303 8.03033C14.7374 8.32322 14.2626 8.32322 13.9697 8.03033C13.6768 7.73744 13.6768 7.26256 13.9697 6.96967L14.0858 6.85355C14.329 6.6103 14.3564 6.22521 14.15 5.95C13.4957 5.07761 13.5825 3.85687 14.3536 3.08579L14.4697 2.96967C14.7626 2.67678 15.2374 2.67678 15.5303 2.96967Z"
                                    fill="#1C274C" />
                            </svg>
                            <a href="admin.php?type=cafe">Cafes</a>
                        </li>
                    </ul>
                </li>
                <li class="item">
                    <svg xmlns="http://www.w3.org/2000/svg" height="1em"
                        viewBox="0 0 448 512"><!--! Font Awesome Free 6.4.2 by @fontawesome - https://fontawesome.com License - https://fontawesome.com/license (Commercial License) Copyright 2023 Fonticons, Inc. -->
                        <path
                            d="M224 256A128 128 0 1 0 224 0a128 128 0 1 0 0 256zm-45.7 48C79.8 304 0 383.8 0 482.3C0 498.7 13.3 512 29.7 512H418.3c16.4 0 29.7-13.3 29.7-29.7C448 383.8 368.2 304 269.7 304H178.3z" />
                    </svg>
                    <a href="admin.php?type=user">Users</a>
                </li>

                <li>
                    <div class="profile-details">
                        <!-- <div class="profile-content">
                            <img src="" alt="photo">
                        </div> -->

                        <div class="admin-profile">
                            <div class="admin-icon">
                                <svg xmlns="http://www.w3.org/2000/svg" height="1em"
                                    viewBox="0 0 640 512"><!--! Font Awesome Free 6.4.2 by @fontawesome - https://fontawesome.com License - https://fontawesome.com/license (Commercial License) Copyright 2023 Fonticons, Inc. -->
                                    <path
                                        d="M224 256A128 128 0 1 0 224 0a128 128 0 1 0 0 256zm-45.7 48C79.8 304 0 383.8 0 482.3C0 498.7 13.3 512 29.7 512H418.3c1.8 0 3.5-.2 5.3-.5c-76.3-55.1-99.8-141-103.1-200.2c-16.1-4.8-33.1-7.3-50.7-7.3H178.3zm308.8-78.3l-120 48C358 277.4 352 286.2 352 296c0 63.3 25.9 168.8 134.8 214.2c5.9 2.5 12.6 2.5 18.5 0C614.1 464.8 640 359.3 640 296c0-9.8-6-18.6-15.1-22.3l-120-48c-5.7-2.3-12.1-2.3-17.8 0zM591.4 312c-3.9 50.7-27.2 116.7-95.4 149.7V273.8L591.4 312z" />
                                </svg>
                            </div>
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
    </main>



    <?php
    if (isset($_SESSION['action'])) {
        echo "<script> alert('" . $_SESSION['action'] . "') </script>";
        unset($_SESSION['action']);
    }
    ?>
    <script src="assets/script/admin_panel.js"></script>
    <script src="assets/script/attraction_table_ajax.js"></script>
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