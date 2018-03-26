<?php
include $_SERVER['DOCUMENT_ROOT'] . "/scripts/base.php";
/**
 * Created by PhpStorm.
 * User: matt
 * Date: 3/9/18
 * Time: 11:12 AM
 */

if ($_SESSION['usertype'] == 'contractor'){
    $db_type = 'contractors';
}
elseif ($_SESSION['usertype'] == 'builder'){
    $db_type = 'users';
}
else{
    echo "Error updating bio.";
}

$update_cmd = "UPDATE " . $db_type . " SET bio='" . $_POST['bio'] . "' WHERE username = '" . $_SESSION['username'] . "'";

if ($conn->query($update_cmd) === TRUE) {
    echo "Record updated successfully";
} else {
    echo "Error updating record: " . $conn->error;
}

