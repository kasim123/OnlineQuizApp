<?php
session_start();
include_once('Model/Connection.php');
$message=array();
if(isset($_POST['uname']) && !empty($_POST['uname'])){
    $uname=mysql_real_escape_string($_POST['uname']);
}else{
    $message[]='Please enter username';
}

if(isset($_POST['password']) && !empty($_POST['password'])){
    $password=mysql_real_escape_string($_POST['password']);
}else{
    $message[]='Please enter password';
}

$countError=count($message);

if($countError > 0){
     for($i=0;$i<$countError;$i++){
              echo ucwords($message[$i]).'<br/><br/>';
     }
}else{
    $password = md5($password);
    $query="SELECT * FROM USERS WHERE UserId='$uname' AND PAssword='$password' AND IsActive=1";

    
    $res=mysql_query($query);
    $checkUser=mysql_num_rows($res);    
    if($checkUser > 0){
         $row = mysql_fetch_array($res);
         $_SESSION['LOGIN_STATUS'] = true;
         $_SESSION['GROUP'] = $row[9];
         $_SESSION['UNAME'] = $uname;
         echo 'correct';
    }else{
         echo ucwords('please enter correct user details');
    }
}
?>

