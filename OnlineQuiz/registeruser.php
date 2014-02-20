<?php

session_start();
include_once('Model/Connection.php');
$message = array();

$fname = "";
$lname = "";
$gender = "";
$country = "";
$postalcode = "";

if (isset($_POST['fname']) && !empty($_POST['fname'])) {
    $fname = mysql_real_escape_string($_POST['fname']);
} else {
    $message[] = 'Please enter First Name';
}

if (isset($_POST['email']) && !empty($_POST['email'])) {
    $email = mysql_real_escape_string($_POST['email']);
} else {
    $message[] = 'Email cannot be empty!';
}

if (isset($_POST['uname']) && !empty($_POST['uname'])) {
    $uname = mysql_real_escape_string($_POST['uname']);
} else {
    $message[] = 'Please enter username';
}

if (isset($_POST['password']) && !empty($_POST['password'])) {
    $password = mysql_real_escape_string($_POST['password']);
} else {
    $message[] = 'Please enter password';
}

if (isset($_POST['cpassword']) && !empty($_POST['cpassword'])) {
    $cpass = mysql_real_escape_string($_POST['cpassword']);
} else {
    $message[] = 'Please enter Confirm Password';
}

if (isset($_POST['password']) && isset($_POST['cpassword'])) {
    if ($_POST['password'] != $_POST['cpassword']) {
        $message[] = 'Password and Confirm Password Must be same';
    }
}




if (isset($_POST['lname']))
    $lname = $_POST['lname'];
if (isset($_POST['country']))
    $country = $_POST['country'];
if (isset($_POST['postalcode']))
    $postalcode = $_POST['postalcode'];
if (isset($_POST['gender']))
    $gender = $_POST['gender'];

$countError = count($message);

if ($countError > 0) {
    for ($i = 0; $i < $countError; $i++) {
        echo ucwords($message[$i]) . '<br/><br/>';
    }
} else {
    $query = "SELECT * FROM USERS WHERE UserId='$uname' AND PAssword='$password' AND IsActive=1";

    $res = mysql_query($query);
    $checkUser = mysql_num_rows($res);
    if ($checkUser > 0) {
        echo ucwords('This Username already in use');
    } else {
        
        $password = md5($password);
        $query = "INSERT INTO Users(UserID,Password,EMail,Gender,DateOfCreated,IsActive) " .
                "VALUES('$uname','$password','$email','$gender','" . date("Y-m-d") . "',1)";
        mysql_query($query);
        echo "created";
    }
}
?>

