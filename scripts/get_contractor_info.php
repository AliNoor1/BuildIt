<?php
/**
 * Created by PhpStorm.
 * User: matt
 * Date: 3/3/18
 * Time: 11:28 AM
 */
function update_session_info_contractor($conn, $username)
{

    $user_query = "SELECT * FROM contractors WHERE username = '" . $username . "'";
    $userinfo = mysqli_query($conn, $user_query);

    $row = mysqli_fetch_array($userinfo);

    $_SESSION['firstname'] = $row['firstName'];
    $_SESSION['lastname'] = $row['lastName'];
    $_SESSION['username'] = $row['username'];
    $_SESSION['userid'] = $row['contractorID'];
    $_SESSION['joinDate'] = $row['joinDate'];
    $_SESSION['city'] = $row['city'];
    $_SESSION['state'] = $row['state'];
    $_SESSION['email'] = $row['email'];
    $_SESSION['phone'] = $row['phone'];
    $_SESSION['address1'] = $row['address1'];
    $_SESSION['address2'] = $row['address2'];
    $_SESSION['companyName'] = $row['companyName'];
}

function get_contractor_info($conn,$username)
{
    $user_query = "SELECT * FROM contractors WHERE username = '" . $username . "'";
    $userinfo = mysqli_query($conn, $user_query);

    $row = mysqli_fetch_array($userinfo);

    $user = array('firstname'=>$row['firstName'],
        'lastname'=>$row['lastName'],
        'username'=>$row['username'],
        'userid'=>$row['contractorID'],
        'joinDate'=>$row['joinDate'],
        'city'=>$row['city'],
        'state'=>$row['state'],
        'email'=>$row['email'],
        'bio'=>$row['bio'],
        'phone'=>$row['phone'],
        'address1'=>$row['address1'],
        'address2'=>$row['address2'],
        'companyName'=>$row['companyName']);
    return $user;
}
?>