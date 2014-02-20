<?php

/*
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */

session_start();

$VideoID = "";
$VideoURL = "";
$VideoThumbnail = "";
$CategoryID = "";
$Description = "";
$PostedOn = date('Y-m-d');
$PostedBy = $_SESSION['UNAME'];
$Tags = "";

$message = array();

if (isset($_POST['id']) && !empty($_POST['id'])) {
    $VideoID = $_POST['id'];
}

if (isset($_POST['URL']) && !empty($_POST['URL'])) {
    $VideoURL = $_POST['URL'];
} else {
    $message[] = "Video URL Cannot be Empty!";
}

if (isset($_POST['thumbnail']) && !empty($_POST['thumbnail'])) {
    $VideoThumbnail = $_POST['thumbnail'];
}

if (isset($_POST['category']) && !empty($_POST['category'])) {
    $CategoryID = $_POST['category'];
} else {
    $message[] = "Please Select Video Category!";
}

if (isset($_POST['description']) && !empty($_POST['description'])) {
    $Description = $_POST['description'];
}

if (isset($_POST['tags']) && !empty($_POST['tags'])) {
    $Tags = $_POST['tags'];
}



$query = "INSERT INTO VideosList(URL, Thumbnail, CategoryID, Description, PostedOn, PostedBy, Status, IsActive) 
    VALUES('$VideoURL', '$VideoThumbnail', $CategoryID, '$Description', '$PostedOn', '$PostedBy', 1, 0)";

if (count($message) > 0) {
    for ($i = 0; $i < count($message); $i++) {
        echo ucwords($message[$i]) . '<br/><br/>';
    }
   
} else {
    include 'Connection.php';
    mysql_query($query);
    
    $taglist = array();
    
    $taglist = explode(',', $Tags);
    
    print_r($taglist);
    
    for($i=0; $i<count($taglist); $i++){
        $query =   "INSERT INTO TagsList VALUES($VideoID,'".$taglist[$i]."')";        
        mysql_query($query);
    }
    
    echo "success";
    //echo $query;
}
?>
