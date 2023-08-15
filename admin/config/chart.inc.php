<?php

require "dbconn.inc.php";

// For the diagram for attractions/places ------------------------------------------------------------------------------------------------------------
$result_liked_places = $con->query("
SELECT p_district,p_name,like_dest_id, COUNT(*) AS frequency
    FROM tbl_user_liked_trip INNER JOIN tbl_place WHERE tbl_user_liked_trip.like_dest_id=tbl_place.p_id AND like_dest_type='place'
    GROUP BY like_dest_id
    ORDER BY frequency DESC;
    ");

$liked_places_rows = [];
while ($liked_places_row = $result_liked_places->fetch_assoc()) {
    $liked_places_rows[] = $liked_places_row;
}
$total_liked_places = count($liked_places_rows);

$total_places_like_count = 0;
foreach ($liked_places_rows as $places_like_count) {
    $total_places_like_count += $places_like_count['frequency'];
}
$liked_places = $result_liked_places->num_rows;

$LIMIT = 10; //Change this to change the number of sections in pie chart

?>

<canvas class="chart" id="chart-place" style="width:50%;max-width:600px"></canvas>


<script src="assets/chart/chart.js"></script>
<script>
    var xValues = [];
    var yValues = [];
    <?php
    $popular_places_like_count = 0;
    $other_liked_places_count = 0;
    $i = 0;
    foreach ($liked_places_rows as $places_row) {
        if ($i < $LIMIT) {
            $i++;
            $popular_places_like_count += $places_row['frequency'];
            ?>
            xValues.push(`<?= $places_row["p_name"] ?>`);
            yValues.push(<?= $places_row["frequency"] ?>);
            <?php
        } else {
            $other_liked_places_count += $places_row['frequency'];
        }
    }

    if ($LIMIT < $total_liked_places) { ?>
        xValues.push('Other Places');
        yValues.push(<?= $other_liked_places_count ?>);
        <?php
    }
    ?>
    console.log(xValues, yValues);
    const barColors = [
        "#b91d47",
        "#00aba9",
        "#2b5797",
        "#e8c3b9",
        "#1e7145",
        "#f58231",
        "#e6194B",
        "#f032e6",
        "#800000",
        "#3cb44b",
        "#911eb4"
    ];

    new Chart("chart-place", {
        type: "pie",
        data: {
            labels: xValues,
            datasets: [{
                backgroundColor: barColors,
                data: yValues
            }]
        },
        options: {
            title: {
                display: true,
                text: "Most Liked Attractions"
            }
        }
    });
</script>


<?php
// For the diagram for attractions/places ------------------------------------------------------------------------------------------------------------
?>


<?php

// For the diagram for accommodations ------------------------------------------------------------------------------------------------------------
$result_liked_accommodations = $con->query("
SELECT a_district,a_name,like_dest_id, COUNT(*) AS frequency
    FROM tbl_user_liked_trip INNER JOIN tbl_accommodation WHERE tbl_user_liked_trip.like_dest_id=tbl_accommodation.a_id AND like_dest_type='accommodation'
    GROUP BY like_dest_id
    ORDER BY frequency DESC;
    ");

$liked_accommodations_rows = [];
while ($liked_accommodations_row = $result_liked_accommodations->fetch_assoc()) {
    $liked_accommodations_rows[] = $liked_accommodations_row;
}
$total_liked_accommodations = count($liked_accommodations_rows);

$total_accommodations_like_count = 0;
foreach ($liked_accommodations_rows as $accommodations_like_count) {
    $total_accommodations_like_count += $accommodations_like_count['frequency'];
}
$liked_accommodations = $result_liked_accommodations->num_rows;

$LIMIT = 10; //Change this to change the number of sections in pie chart

?>

<canvas class="chart" id="chart-accommodation" style="width:50%;max-width:600px"></canvas>

<script src="assets/chart/chart.js"></script>
<script>
    var xValues = [];
    var yValues = [];
    <?php
    $popular_accommodations_like_count = 0;
    $other_liked_accommodations_count = 0;
    $i = 0;
    foreach ($liked_accommodations_rows as $accommodations_row) {
        if ($i < $LIMIT) {
            $i++;
            $popular_accommodations_like_count += $accommodations_row['frequency'];
            ?>
            xValues.push(`<?= $accommodations_row["a_name"] ?>`);
            yValues.push(<?= $accommodations_row["frequency"] ?>);
            <?php
        } else {
            $other_liked_accommodations_count += $accommodations_row['frequency'];
        }
    }

    if ($LIMIT < $total_liked_accommodations) { ?>
        xValues.push('Other accommodations');
        yValues.push(<?= $other_liked_accommodations_count ?>);
        <?php
    }
    ?>
    console.log(xValues, yValues);

    new Chart("chart-accommodation", {
        type: "pie",
        data: {
            labels: xValues,
            datasets: [{
                backgroundColor: barColors,
                data: yValues
            }]
        },
        options: {
            title: {
                display: true,
                text: "Most Liked Accommodations"
            }
        }
    });
</script>


<?php
// For the diagram for accommodations ------------------------------------------------------------------------------------------------------------
?>


<?php

// For the diagram for restaurants ------------------------------------------------------------------------------------------------------------
$result_liked_restaurants = $con->query("
SELECT r_district,r_name,like_dest_id, COUNT(*) AS frequency
    FROM tbl_user_liked_trip INNER JOIN tbl_restaurant WHERE tbl_user_liked_trip.like_dest_id=tbl_restaurant.r_id AND like_dest_type='restaurant'
    GROUP BY like_dest_id
    ORDER BY frequency DESC;
    ");

$liked_restaurants_rows = [];
while ($liked_restaurants_row = $result_liked_restaurants->fetch_assoc()) {
    $liked_restaurants_rows[] = $liked_restaurants_row;
}
$total_liked_restaurants = count($liked_restaurants_rows);

$total_restaurants_like_count = 0;
foreach ($liked_restaurants_rows as $restaurants_like_count) {
    $total_restaurants_like_count += $restaurants_like_count['frequency'];
}
$liked_restaurants = $result_liked_restaurants->num_rows;

$LIMIT = 10; //Change this to change the number of sections in pie chart

?>

<canvas class="chart" id="chart-restaurant" style="width:50%;max-width:600px"></canvas>

<script src="assets/chart/chart.js"></script>
<script>
    var xValues = [];
    var yValues = [];
    <?php
    $popular_restaurants_like_count = 0;
    $other_liked_restaurants_count = 0;
    $i = 0;
    foreach ($liked_restaurants_rows as $restaurants_row) {
        if ($i < $LIMIT) {
            $i++;
            $popular_restaurants_like_count += $restaurants_row['frequency'];
            ?>
            xValues.push(`<?= $restaurants_row["r_name"] ?>`);
            yValues.push(<?= $restaurants_row["frequency"] ?>);
            <?php
        } else {
            $other_liked_restaurants_count += $restaurants_row['frequency'];
        }
    }

    if ($LIMIT < $total_liked_restaurants) { ?>
        xValues.push('Other restaurants');
        yValues.push(<?= $other_liked_restaurants_count ?>);
        <?php
    }
    ?>
    console.log(xValues, yValues);

    new Chart("chart-restaurant", {
        type: "pie",
        data: {
            labels: xValues,
            datasets: [{
                backgroundColor: barColors,
                data: yValues
            }]
        },
        options: {
            title: {
                display: true,
                text: "Most Liked restaurants"
            }
        }
    });
</script>


<?php
// For the diagram for restaurants ------------------------------------------------------------------------------------------------------------
?>


<?php

// For the diagram for cafes ------------------------------------------------------------------------------------------------------------
$result_liked_cafes = $con->query("
SELECT c_district,c_name,like_dest_id, COUNT(*) AS frequency
    FROM tbl_user_liked_trip INNER JOIN tbl_cafe WHERE tbl_user_liked_trip.like_dest_id=tbl_cafe.c_id AND like_dest_type='cafe'
    GROUP BY like_dest_id
    ORDER BY frequency DESC;
    ");

$liked_cafes_rows = [];
while ($liked_cafes_row = $result_liked_cafes->fetch_assoc()) {
    $liked_cafes_rows[] = $liked_cafes_row;
}
$total_liked_cafes = count($liked_cafes_rows);

$total_cafes_like_count = 0;
foreach ($liked_cafes_rows as $cafes_like_count) {
    $total_cafes_like_count += $cafes_like_count['frequency'];
}
$liked_cafes = $result_liked_cafes->num_rows;

$LIMIT = 10; //Change this to change the number of sections in pie chart

?>

<canvas class="chart" id="chart-cafe" style="width:50%;max-width:600px"></canvas>

<script src="assets/chart/chart.js"></script>
<script>
    var xValues = [];
    var yValues = [];
    <?php
    $popular_cafes_like_count = 0;
    $other_liked_cafes_count = 0;
    $i = 0;
    foreach ($liked_cafes_rows as $cafes_row) {
        if ($i < $LIMIT) {
            $i++;
            $popular_cafes_like_count += $cafes_row['frequency'];
            ?>
            xValues.push(`<?= $cafes_row["c_name"] ?>`);
            yValues.push(<?= $cafes_row["frequency"] ?>);
            <?php
        } else {
            $other_liked_cafes_count += $cafes_row['frequency'];
        }
    }

    if ($LIMIT < $total_liked_cafes) { ?>
        xValues.push(`Other cafes`);
        yValues.push(<?= $other_liked_cafes_count ?>);
        <?php
    }
    ?>
    console.log(xValues, yValues);

    new Chart("chart-cafe", {
        type: "pie",
        data: {
            labels: xValues,
            datasets: [{
                backgroundColor: barColors,
                data: yValues
            }]
        },
        options: {
            title: {
                display: true,
                text: "Most Liked cafes"
            }
        }
    });
</script>


<?php
// For the diagram for cafes ------------------------------------------------------------------------------------------------------------
?>