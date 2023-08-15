<?php
require "dbconn.inc.php";

if (isset($_GET['name'])) {
    $district_name = $_GET['name'];
    $result1 = $con->query("SELECT * FROM tbl_district WHERE d_name='{$district_name}';");
    if ($result1->num_rows > 0) {
        $row = $result1->fetch_assoc();
        $name = $row['d_name'];
        $desc = $row['d_desc'];
        $image = $row['d_image'];
        $type = $row['d_type'];
    } else {
        echo '<script>alert("Sorry no the district datas coulnot be fetched!")</script>';
        echo '<script>window.location.href="../admin.php?type=district"</script>';
    }
} else {
    echo '<script>alert("Sorry no district get parameter provided")</script>';
    echo '<script>window.location.href="../admin.php?type=district"</script>';
}

?>


<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>
        <?= $name ?> | Traverse Nepal
    </title>
    <link rel="stylesheet" href="../assets/style/view_district_style.css">
</head>

<body>
    <div class="picture-info-container">
        <div class="info-container">
            <div class="info-grid">
                <div class="geo-desc">
                    <div class="like-info-about">
                        <div class="info-about">About
                            <?php echo $name; ?>
                        </div>
                    </div>
                    <div class="info-desc">
                        <?php echo $desc ?>
                    </div>
                </div>
            </div>
            <div class="type-desc">
                <br>
                <h2><?= $name ?> is mostly popular for :<br></h2>
                <div class="info-about">
                    <?=$type?>
                </div>
            </div>
        </div>
        <div class="picture-container">
            <div class="picture-box">
                <img class="picture" src="../.<?php echo $image ?>"
                    alt="This is <?php echo $name ?> district's picture" />
            </div>
        </div>
    </div>
</body>

</html>