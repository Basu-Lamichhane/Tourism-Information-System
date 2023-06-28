<div class="breadcrumb-container">
    <div class="breadcrumb-trails">
        <ul class="breadcrumbs">

            <li class="crumb"><a href="search.php">Nepal</a>&nbsp;></li>

            <?php if (isset($_GET['district']))
                echo '<li class="crumb">&nbsp;<a href="district_page.php?district=' . $_GET['district'] . '">' . $district . '</a>&nbsp;</li>'
                    ?>

            <?php if (isset($destination)) {

                echo '<li class="crumb">&nbsp;';
                if (isset($_GET['district']))
                    echo " <a href='attractions_list.php?district=" . $_GET['district'] . "&destination=" . $destination . "'> >" . ucfirst($destination) . "s</a>";
                else
                    echo " <a href='attractions_list.php?destination=" . $destination . "'>" . ucfirst($destination) . "s</a>";
                echo '</li>';

            } ?>

            <?php if (isset($_GET['dest_id']))
                echo '<li class="crumb">>&nbsp;<a href="#">' . $destination_name . '</a></li>' ?>
            </ul>
        </div>
    </div>