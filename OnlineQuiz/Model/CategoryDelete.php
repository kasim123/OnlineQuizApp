<?php

/*
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 * 
 */

include_once 'Connection.php';

$query = "DELETE FROM Categories WHERE CategoryID=".$_GET['Id']."";
mysql_query($query);
header("Location: CategoryList.php?page=".$_GET['page']."");

?>
