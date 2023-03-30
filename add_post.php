<?php
//index.php
include 'dbconfig.php';  // Database setting and connection
include 'header.php';   // The header for the page

//first, check if the user is already signed in. If that is the case, there is no need to display this page
if(isset($_SESSION['signed_in']) && $_SESSION['signed_in'] == true)
{
    if($_SERVER['REQUEST_METHOD'] != 'POST')
    {
        include 'post_form.php';
    } else {
        /* so, the form has been posted, we'll process the data in three steps:
                    1.	Check the data
                    2.	Let the user refill the wrong fields (if necessary)
                    3.	Varify if the data is correct and return the correct response
                */
        $errors = array(); /* declare the array for later use */

        if(!isset($_POST['title']) || $_POST['title'] == "")
        {
            $errors[] = 'A title is required';
        }

        if(!isset($_POST['body']) || $_POST['body'] == "")
        {
            $errors[] = 'Your post can not be empty.';
        }

        if(!empty($errors)) /*check for an empty array, if there are errors, they're in this array (note the ! operator)*/
        {
            echo 'Please check all the fields before posting to the site.';
            echo '<ul>';
            foreach($errors as $key => $value) /* walk through the array so all the errors get displayed */
            {
                echo '<li>' . $value . '</li>'; /* this generates a nice error list */
            }
            echo '</ul>';

            include "post_form.php";
        } else {

            $category_id = $mysqli -> real_escape_string($_POST['category_id']);
            $user_id = $mysqli -> real_escape_string($_SESSION['user_id']);
            $title = $mysqli -> real_escape_string($_POST['title']);
            $body = $mysqli -> real_escape_string($_POST['body']);

            $sql = "INSERT INTO topics (category_id, user_id, title, body, create_date)           
                    VALUES(". $category_id . ", " . $user_id.", '". $title."',
                    '" . $body. "', now())";

            // echo $sql;
            if (!$mysqli -> query($sql)) {
                //something went wrong, display the error
                echo 'Something went wrong while posting. Please try again later.';
                //echo mysql_error(); //debugging purposes, uncomment when needed
            }
            else {
                echo 'Successfully posted to the site.';
            }
        }

    }

} else {
    echo 'You are already signed in, you can <a href="signout.php">sign out</a> if you want.';
}



?>


<?php
include 'footer.php';   //Footer of the page
?>