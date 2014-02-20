<?php

/*
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */

if (isset($_GET['user'])) {
    include 'Connection.php';
    $query = "UPDATE Users SET IsActive=0 WHERE UserID='" . $_GET['user'] . "'";
    mysql_query($query);
    if (isset($_GET['page'])) {
        header("Location: WebUsersList.php?page=" . $_GET['page']);
    } else {
        header("Location: WebUsersList.php");
    }
}
?>
