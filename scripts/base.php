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

$dbhost = "localhost";
$dbname = "buildit";
$dbuser = "admin";
$dbpass = "password";

$conn = mysqli_connect($dbhost, $dbuser, $dbpass) or die("MySQL Error: " . mysqli_connect_error());
mysqli_select_db($conn, $dbname) or die("MySQL Error: " . mysqli_error($conn));