<?php
//topics.php
include 'dbconfig.php';  // Database setting and connection
include 'header.php';   // The header for the page

//Get Category id from url
$topic_id = $_GET['id'];

$sql = "SELECT
    topics.id as id,
    category_id,
    user_id,
    users.username as username,
    title,
    body,
    create_date
FROM
    topics
LEFT JOIN
    users
ON
    topics.user_id = users.id
WHERE
    category_id = " . $mysqli -> real_escape_string($_GET['id']);

$result = $mysqli->query($sql);

if (!$result) {
    echo 'The topics could not be displayed, please try again later.';
} else {
    if ($result->num_rows == 0) {
        echo 'No topics posted yet.';
    } else {
        while ($row = $result->fetch_assoc()) {
            ?>
            <div class="message">
                <div class="msg_head">
                    <div class="msg_title"><?php echo $row['title'] ?></div>
                    <div class="msg_author"><?php echo $row['username'] ?></div>
                    <div class="msg_date"><?php echo $row['create_date'] ?></div>
                </div>
                <div class="msg_body">
                    <?php echo $row['body'] ?>
                </div>
            </div>

<?php

        }
    }
}

include 'footer.php';
?>
