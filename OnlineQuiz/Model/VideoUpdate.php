<?php

/*
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */


$VideoID = "";
$VideoURL = "";
$VideoThumbnail = "";
$CategoryID = "";
$Description = "";
$PostedOn = date('Y-m-d');


$message = array();

if (isset($_POST['VideoId']) && !empty($_POST['VideoId'])) {
    $VideoID = $_POST['VideoId'];
}

if (isset($_POST['url']) && !empty($_POST['url'])) {
    $VideoURL = $_POST['url'];
} else {
    $message[] = "Video URL Cannot be Empty!";
}

if (isset($_POST['thumnail']) && !empty($_POST['thumnail'])) {
    $VideoThumbnail = $_POST['thumnail'];
}

if (isset($_POST['category']) && !empty($_POST['category'])) {
    $CategoryID = $_POST['category'];
} else {
    $message[] = "Please Select Video Category!";
}

if (isset($_POST['description']) && !empty($_POST['description'])) {
    $Description = $_POST['description'];
}


$query = "UPDATE VideosList SET URL='$VideoURL', Thumbnail='$VideoThumbnail', CategoryID=$CategoryID, 
    Description='$Description' WHERE VideoID=$VideoID";

if (count($message) > 0) {
    for ($i = 0; $i < count($message); $i++) {
        echo ucwords($message[$i]) . '<br/><br/>';
    }
} else {
    include 'Connection.php';
    mysql_query($query);
    $row = mysql_affected_rows();
    if ($row >= 1) {
        echo $query;
        header('Location: VideoList.php');
    } else {
        header('Location: VideoEdit.php?VideoId='.$VideoID);
    }
    //echo $query;
}
?>
