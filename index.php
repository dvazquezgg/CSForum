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
    echo '<div><h4>The categories could not be displayed, please try again later.</h4></div>';
} else {
    if ($result->num_rows == 0) {
        echo '<div><h4>No categories defined yet.</h4></div>';
    } else {
        echo '<div><h4>Category List</h4>';
        echo '<ul class="category_list">';
        while($row = $result -> fetch_assoc())
        {
            echo '<li><a href="topics.php?id='. $row['id'] . '" class="cat_item">'. $row['name'] .'</a></li>';
        }
        echo '</ul></div>';
    }
}

include 'footer.php';   //Footer of the page
?>
