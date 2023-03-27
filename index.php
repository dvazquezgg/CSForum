<?php
//index.php
include 'dbconfig.php';  // Database setting and connection
include 'header.php';   // The header for the page


$sql = "SELECT
            id,
            name,
            description
        FROM
            categories";

$result = $mysqli->query($sql);

if (!$result) {
    echo 'The categories could not be displayed, please try again later.';
} else {
    if ($result->num_rows == 0) {
        echo 'No categories defined yet.';
    } else {
        echo '<ul class="category_list">';
        while($row = $result -> fetch_assoc())
        {
            echo '<li><a href="topics.php?id='. $row['id'] . '" class="cat_item">'. $row['name'] .'</a></li>';
        }
        echo '</ul>';
    }
}

include 'footer.php';   //Footer of the page
?>
