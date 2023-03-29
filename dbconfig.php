<?php
//DB Params
$DB_HOST = "localhost";
$DB_USER = "root";
$DB_PASS = "";
$DB_NAME = "csforum";

define("SITE_TITLE", "Computer Science Forum!");

$mysqli = new mysqli($DB_HOST, $DB_USER,  $DB_PASS, $DB_NAME);
$mysqli->set_charset("utf8");

date_default_timezone_set('America/Mexico_City');

function validateDate($date, $format = 'Y-m-d'){
    $d = DateTime::createFromFormat($format, $date);
    return $d && $d->format($format) === $date;
}

?>
