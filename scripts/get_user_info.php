<?php
/**
 * Created by PhpStorm.
 * User: matt
 * Date: 3/3/18
 * Time: 11:28 AM
 */
function update_session_info($conn,$username)
{

    $user_query = "SELECT * FROM users WHERE username = '" . $username . "'";
    $userinfo = mysqli_query($conn, $user_query);

    $row = mysqli_fetch_array($userinfo);

    $_SESSION['firstname'] = $row['firstName'];
    $_SESSION['lastname'] = $row['lastName'];
    $_SESSION['username'] = $row['username'];
    $_SESSION['userid'] = $row['userID'];
    $_SESSION['commonName'] = $row['commonName'];
    $_SESSION['joinDate'] = $row['joinDate'];
    $_SESSION['city'] = $row['city'];
    $_SESSION['state'] = $row['state'];
    $_SESSION['email'] = $row['email'];
    $_SESSION['admin'] = $row['admin'];
}

function get_user_info($conn,$username)
{
    $user_query = "SELECT * FROM users WHERE username = '" . $username . "';";
    $userinfo = mysqli_query($conn, $user_query) or die("error finding " . $username . ". \n". $user_query);
    if (mysqli_num_rows($userinfo) < 1) {
        die("error finding user " . $username);
    }

    $row = mysqli_fetch_array($userinfo);

    $user = array('firstname'=>$row['firstName'],
        'lastname'=>$row['lastName'],
        'username'=>$row['username'],
        'userid'=>$row['userID'],
        'commonName'=>$row['commonName'],
        'joinDate'=>$row['joinDate'],
        'city'=>$row['city'],
        'state'=>$row['state'],
        'email'=>$row['email'],
        'bio'=>$row['bio']);
    return $user;
}
?>