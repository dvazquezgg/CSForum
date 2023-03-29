<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN"
    "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="nl" lang="nl">
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
    <meta name="description" content="Computer Sceinec topics forum" />
    <meta name="keywords" content="Computers, programmming, Technology" />
    <title>Computer Science forum</title>
    <link rel="stylesheet" href="style.css" type="text/css">
</head>
<body>
<h1>Computer Science Exchange</h1>
<div id="wrapper">

    <div class="userbar">
        <?php
        session_start();
        //  If the session variable has ben set a welcome message wil appear in the page
        if (isset($_SESSION['signed_in'])) {
            echo 'Hello ' . $_SESSION['user_name'] . '. Not you? <a href="exit.php">Sign out</a>';
        } else {
            echo '<a href="login.php">Sign in</a> or <a href="register.php">Create an account</a>.';
        }
        ?>
    </div>
    <div id="content">
