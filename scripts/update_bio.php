<?php
include $_SERVER['DOCUMENT_ROOT'] . "/scripts/base.php";
/**
 * Created by PhpStorm.
 * User: matt
 * Date: 3/9/18
 * Time: 11:12 AM
 */

$update_cmd = "UPDATE users SET bio='" . $_POST['bio'] . "' WHERE username = '" . $_SESSION['username'] . "'";

if ($conn->query($update_cmd) === TRUE) {
    echo "Record updated successfully";
} else {
    echo "Error updating record: " . $conn->error;
}