<?php
/**
 * Created by PhpStorm.
 * User: matt
 * Date: 3/2/18
 * Time: 9:29 AM
 */
ini_set('display_errors', 'On');
error_reporting(E_ALL | E_STRICT);
session_start();

// ========= FOR STAGING AND PRODUCTION =============
$dbhost = "fdb19.awardspace.net";
$dbname = "2642413_buildit";
$dbuser = "2642413_buildit";
$dbpass = "password1";
$dbport = "3306";

// ========= FOR LOCAL TESTING ===========
//$dbhost = "localhost";
//$dbname = "buildit";
//$dbuser = "admin";
//$dbpass = "password";

$conn = mysqli_connect($dbhost, $dbuser, $dbpass, $dbname, $dbport) or die("MySQL Error: " . mysqli_connect_error());
mysqli_select_db($conn, $dbname) or die("MySQL Error: " . mysqli_error($conn));