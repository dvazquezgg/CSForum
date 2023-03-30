<?php

include 'dbconfig.php';  // Database setting and connection
include 'header.php';   // The header for the page

//first, check if the user is already signed in. If that is the case, there is no need to display this page
if(isset($_SESSION['signed_in']) && $_SESSION['signed_in'] == true)
{
    echo 'You are already signed in, you can <a href="exit.php">sign out</a> if you want.';
}
else
{
    if($_SERVER['REQUEST_METHOD'] != 'POST')
    {
        /*the form hasn't been posted yet, display it
          note that the action="" will cause the form to post to the same page it is on */
        include 'login_form.php';
    }
    else
    {
        /* so, the form has been posted, we'll process the data in three steps:
            1.	Check the data
            2.	Let the user refill the wrong fields (if necessary)
            3.	Varify if the data is correct and return the correct response
        */
        $errors = array(); /* declare the array for later use */

        if(!isset($_POST['username']))
        {
            $errors[] = 'The username field must not be empty.';
        }

        if(!isset($_POST['userpass']))
        {
            $errors[] = 'The password field must not be empty.';
        }

        if(!empty($errors)) /*check for an empty array, if there are errors, they're in this array (note the ! operator)*/
        {
            echo 'Uh-oh.. a couple of fields are not filled in correctly..';
            echo '<ul>';
            foreach($errors as $key => $value) /* walk through the array so all the errors get displayed */
            {
                echo '<li>' . $value . '</li>'; /* this generates a nice error list */
            }
            echo '</ul>';
            include 'login_form.php';

        }
        else
        {
            //the form has been posted without errors, so save it
            //notice the use of mysql_real_escape_string, keep everything safe!
            //also notice the sha1 function which hashes the password

            $username = $mysqli -> real_escape_string($_POST['username']);
            $userpass = sha1($_POST['userpass']);
            $sql = "SELECT 
						id,
						username,
						type
					FROM
						users
					WHERE
						username = '" . $username . "'
					AND
						password = '" . $userpass . "'";

            $result = $mysqli -> query($sql);
            if (!$result) {
                //something went wrong, display the error
                echo 'Something went wrong while signing in. Please try again later.';
                echo $mysqli->error; //debugging purposes, uncomment when needed
            }
            else {
                //the query was successfully executed, there are 2 possibilities
                //1. the query returned data, the user can be signed in
                //2. the query returned an empty result set, the credentials were wrong
                if($result -> num_rows == 0)
                {
                    echo 'You have supplied a wrong user/password combination. Please try again.';
                }
                else
                {
                    //set the $_SESSION['signed_in'] variable to TRUE
                    $_SESSION['signed_in'] = true;

                    //we also put the user_id and user_name values in the $_SESSION, so we can use it at various pages
                    while($row = $result -> fetch_row())
                    {
                        $_SESSION['user_id'] 	= $row[0];
                        $_SESSION['user_name'] 	= $row[1];
                        $_SESSION['user_level'] = $row[2];
                    }

                    echo 'Welcome, ' . $_SESSION['user_name'] . ' <a href="index.php">Proceed to the topic list</a>.';
                }
            }
        }
    }
}

include 'footer.php';
?>
