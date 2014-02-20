<?php

/*
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */
$HostName = "localhost";
$UserName = "root";
$Password = "";
$Database = "OnlineQuiz";
$con = "";

$con = mysql_connect($HostName,$UserName,$Password) or die("Database Connection Error");
mysql_select_db($Database, $con);


?>
