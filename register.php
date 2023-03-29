<?php
//index.php
include 'dbconfig.php';  // Database setting and connection
include 'header.php';   // The header for the page

if($_SERVER['REQUEST_METHOD'] != 'POST')
{
    include 'register_form.php';
}
else{

    /* so, the form has been posted, we'll process the data in three steps:
		1.	Check the data
		2.	Let the user refill the wrong fields (if necessary)
		3.	Save the data
	*/
    $errors = array(); /* declare the array for later use */

    if(isset($_POST['username']))
    {
        //the user name exists
        if(!ctype_alnum($_POST['username']))
        {
            $errors[] = 'The username can only contain letters and digits.';
        }
        if(strlen($_POST['username']) > 30)
        {
            $errors[] = 'The username cannot be longer than 30 characters.';
        }
    }
    else
    {
        $errors[] = 'The username field must not be empty.';
    }

    if(isset($_POST['userpass']))
    {
        if($_POST['userpass'] != $_POST['userpasscheck'])
        {
            $errors[] = 'The two passwords did not match.';
        }
    }
    else
    {
        $errors[] = 'The password field cannot be empty.';
    }

    if(isset($_POST['gender']))
    {
        if($_POST['gender'] == "")
        {
            $errors[] = 'Please select an option for gender or not disclosure if that is your preference';
        }
    }
    else
    {
        $errors[] = 'A gender option must be selected.';
    }


    if(isset($_POST['dob']))
    {
        if(validatedate($_POST['dob'], 'm-d-Y'))
        {
            $errors[] = 'Date format is incorrect';
        }
    }
    else
    {
        $errors[] = 'You must provide a valid date to register';
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

        include 'register_form.php';

    } else {
        //the form has been posted without, so save it
        //notice the use of mysql_real_escape_string, keep everything safe!
        //also notice the sha1 function which hashes the password

        $username = $mysqli -> real_escape_string($_POST['username']);
        $userpass = sha1($_POST['userpass']);
        $gender = $mysqli -> real_escape_string($_POST['gender']);
        $dob = $mysqli -> real_escape_string($_POST['dob']);
        $sql = "INSERT INTO
					users(username, password, gender ,dob, type)
				VALUES('" . $username . "',
					   '" . $userpass . "',
					   '" . $gender . "',
					   '".  $dob ."',
						'STUDENT')";

        if (!$mysqli -> query($sql)) {
            //something went wrong, display the error
            echo $sql;
            echo 'Something went wrong while registering. Please try again later.';
            //echo mysql_error(); //debugging purposes, uncomment when needed
        }
        else {
            echo 'Successfully registered. You can now <a href="login.php">sign in</a> and start posting! :-)';

        }
    }
}

include 'footer.php';   //Footer of the page
?>