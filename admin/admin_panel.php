<!DOCTYPE html>

<html lang="en">

<head>
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Sidebar Menu for Admin Dashboard | Traverse Nepal</title>
    <link rel="stylesheet" href="./style/admin_panel.css" />
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
                    <a href="#">Dashboard</a>
                </li>

                <li class="item">
                    <div class="submenu-item">
                        <span>Manage Tourism</span>
                        <span class="arrow-right"></span>
                    </div>

                    <ul class="menu-items submenu">
                        <div class="menu-title">
                            <span class="arrow-left"></span>
                            Manage Tourism
                        </div>
                        <li class="item">
                            <a href="#"  onclick='attractionTable() ;'>Attractions</a>
                        </li>
                        <li class="item">
                            <a href="#">Accommodations</a>
                        </li>
                        <li class="item">
                            <a href="#">Restaurants</a>
                        </li>
                        <li class="item">
                            <a href="#">Cafes</a>
                        </li>
                    </ul>
                </li>
                <li class="item">
                    <div class="submenu-item">
                        <span>Manage Users</span>
                        <span class="arrow-right"></span>
                    </div>

                    <ul class="menu-items submenu">
                        <div class="menu-title">
                            <span class="arrow-left"></span>
                            Manage Users
                        </div>
                        <li class="item">
                            <a href="#">View user details</a>
                        </li>
                        <li class="item">
                            <a href="#">Add user</a>
                        </li>
                        <li class="item">
                            <a href="#">Update user</a>
                        </li>
                        <li class="item">
                            <a href="#">Delete user</a>
                        </li>
                    </ul>
                </li>
                <li class="item">
                    <a href="#">Manage user suggestions</a>
                </li>

                <li class="item">
                    <a href="#">Manage Inquiries</a>
                </li>

                <li>
                    <div class="profile-details">
                        <div class="profile-content">
                            <img src="" alt="photo">
                        </div>

                        <div class="admin-profile">
                            <div class="admin-name">Admin</div>
                            <div class="admin-desc">Traverse Nepal</div>
                        </div>

                        <a href="#" class="logout"></a>
                    </div>
                </li>
            </ul>
        </div>
    </nav>

    <nav class="navbar">
        <span class="nav-bars" id="sidebar-close"></span>
    </nav>

    <main class="main" id="main_content">
        <div id="table-content">

        </div>
    </main>

    <script src="./script/admin_panel.js"></script>
    <script src="./script/attraction_table_ajax.js"></script>
</body>

</html>