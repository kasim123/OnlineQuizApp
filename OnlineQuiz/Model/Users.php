<?php
session_start();
if (!isset($_SESSION['UNAME'])) {
    header('Location: ../index.php');
}
if (isset($_SESSION['LOGIN_STATUS']) && !empty($_SESSION['LOGIN_STATUS'])) {
    
}
?>

<!DOCTYPE html>
<html>
    <head>
        <title>Online Quiz</title>
        <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
        <link rel="stylesheet" href="Styles/Style.css"/>
    </head>
    <body>
        <div id="mainContainer">
            <div id="header">
                <div id="logo">
                    <div style="margin-left: 40px; margin-top: 10px;">
                        <span style="color: white; font-family: verdana; font-size: 28px;">Online</span>&nbsp;&nbsp;&nbsp;
                        <span style="color: black; font-family: verdana; font-size: 28px;">Quiz</span>
                    </div>
                </div>

                <div id="menu">
                       <ul>
                        <a href="welcome.php"><li>Home</li></a>
                        <a href="CategoryList.php"><li>Category</li></a>
                        <a href="VideoList.php"><li>Videos</li></a>
                        <a href="WebUsersList.php"><li>Web Users</li></a>
                        <a href="AndroidUsers.php"><li>Android Users</li></a>
                        <a href="Notifications.php"><li>Notifications</li></a>
                        <a href="logout.php"><li>Logout</li></a>
                    </ul>              </div>
            </div>

            <div style="width: 900px; height: 400px; margin: 0 auto; float: right;">
                <br/>
                <a href="CategoryNew.php">
                    <input type="button" value="Add New User" class="button" style="width: 150px;"/>
                </a>
                <p></p>

                <table border="1" cellspacing="4" style="border-collapse: collapse; border-color: gainsboro; width: 100%; font-family: verdana;">
                    <tr style="font-size: 14px; font-weight: bold; background-color: darkgray; height: 30px; border: solid thin gainsboro">
                        <td width="30px">&nbsp;Sl.No</td>
                        <td width="200px">&nbsp;User ID</td>                        
                        <td width="250px">&nbsp;E-Mail</td>
                        <td width="50px">&nbsp;Group</td>
                        <td width="100px" align="center">Active Status</td>
                        <td width="100px" align="center">Control</td>
                    </tr> 

                    <?php
                    include('Connection.php'); // include your code to connect to DB.

                    $tbl_name = "Users";  //your table name
                    // How many adjacent pages should be shown on each side?
                    $adjacents = 2;
                    /*
                      First get total number of rows in data table.
                      If you have a WHERE clause in your query, make sure you mirror it here.
                     */
                    $query = "SELECT COUNT(*) as num FROM $tbl_name";
                    $total_pages = mysql_fetch_array(mysql_query($query));
                    $total_pages = $total_pages['num'];
                    //echo $total_pages;
                    /* Setup vars for query. */
                    $targetpage = "Users.php";  //your file name  (the name of this file)
                    $limit = 5;    //how many items to show per page

                    if (isset($_GET['page']))
                        $page = $_GET['page'];
                    else
                        $page = "";
                    if ($page > 0)
                        $start = ($page - 1) * $limit;    //first item to display on this page
                    else
                        $start = 0;     //if no page var is given, set start to 0
                    /* Get data. */
                    $sql = "SELECT * FROM $tbl_name ORDER BY DateOfCreated DESC LIMIT $start, $limit";
                    $result = mysql_query($sql);
                    

                    /* Setup page vars for display. */
                    if ($page == 0)
                        $page = 1;     //if no page var is given, default to 1.
                    $prev = $page - 1;      //previous page is page - 1
                    $next = $page + 1;      //next page is page + 1
                    $lastpage = ceil($total_pages / $limit);                          //lastpage is = total pages / items per page, rounded up.
                    $lpm1 = $lastpage - 1;      //last page minus 1
                    /*
                      Now we apply our rules and draw the pagination object.
                      We're actually saving the code to a variable in case we want to draw it more than once.
                     */
                    $pagination = "";
                    if ($lastpage > 1) {
                        $pagination .= "<div class=\"pagination\">";
                        //previous button
                        if ($page > 1)
                            $pagination.= " <a href=\"$targetpage?page=$prev\" class='avail'> Previous</a>";
                        else
                            $pagination.= " <span class=\"disabled\"> Previous</span>";

                        //pages	
                        if ($lastpage < 7 + ($adjacents * 2)) {           //not enough pages to bother breaking it up
                            for ($counter = 1; $counter <= $lastpage; $counter++) {
                                if ($counter == $page)
                                    $pagination.= " <span class=\"current\" class='avail'>$counter</span>";
                                else
                                    $pagination.= " <a href=\"$targetpage?page=$counter\" class='avail'>$counter</a>";
                            }
                        }
                        elseif ($lastpage > 5 + ($adjacents * 2)) { //enough pages to hide some
                            //close to beginning; only hide later pages
                            if ($page < 1 + ($adjacents * 2)) {
                                for ($counter = 1; $counter < 4 + ($adjacents * 2); $counter++) {
                                    if ($counter == $page)
                                        $pagination.= " <span class=\"current\">$counter</span>";
                                    else
                                        $pagination.= " <a href=\"$targetpage?page=$counter\" class=\"disabled\">$counter</a>";
                                }
                                $pagination.= "...";
                                $pagination.= " <a href=\"$targetpage?page=$lpm1\" class=\"avail\">$lpm1</a>";
                                $pagination.= " <a href=\"$targetpage?page=$lastpage\" class=\"avail\">$lastpage</a>";
                            }
                            //in middle; hide some front and some back
                            elseif ($lastpage - ($adjacents * 2) > $page && $page > ($adjacents * 2)) {
                                $pagination.= " <a href=\"$targetpage?page=1\" class='avail'>1</a>";
                                $pagination.= " <a href=\"$targetpage?page=2\" class='avail'>2</a>";
                                $pagination.= "...";
                                for ($counter = $page - $adjacents; $counter <= $page + $adjacents; $counter++) {
                                    if ($counter == $page)
                                        $pagination.= " <span class=\"current\" class=\"avail\">$counter</span>";
                                    else
                                        $pagination.= " <a href=\"$targetpage?page=$counter\" class=\"avail\">$counter</a>";
                                }
                                $pagination.= "...";
                                $pagination.= " <a href=\"$targetpage?page=$lpm1\" class=\"avail\">$lpm1</a>";
                                $pagination.= " <a href=\"$targetpage?page=$lastpage\" class=\"avail\">$lastpage</a>";
                            }
                            //close to end; only hide early pages
                            else {
                                $pagination.= " <a href=\"$targetpage?page=1\" class=\"avail\">1</a>";
                                $pagination.= " <a href=\"$targetpage?page=2\" class=\"avail\">2</a>";
                                $pagination.= "...";
                                for ($counter = $lastpage - (2 + ($adjacents * 2)); $counter <= $lastpage; $counter++) {
                                    if ($counter == $page)
                                        $pagination.= " <span class=\"current\">$counter</span>";
                                    else
                                        $pagination.= " <a href=\"$targetpage?page=$counter\" class=\"avail\">$counter</a>";
                                }
                            }
                        }
                        //next button
                        if ($page < $counter - 1)
                            $pagination.= " <a href=\"$targetpage?page=$next\" class='avail'> Next </a>";
                        else
                            $pagination.= " <span class=\"disabled\"> Next </span>";

                        $pagination.= "</div>\n";
                    }

                    $i = (($page - 1) * $limit) + 1;
                    while ($row = mysql_fetch_array($result)) {
                        echo "<tr style='font-size:13px; border: solid thin gainsboro'>";
                        echo "<td >&nbsp;$i</td>";
                        echo "<td >&nbsp;$row[1]</td>";
                        echo "<td>&nbsp;$row[3]</td>";
                        echo "<td>&nbsp;$row[9]</td>";
                        echo "<td>&nbsp;$row[8]</td>";
                        echo "<td align='center'>
                            <a href='CategoryDelete.php?page=$page&Id=$row[0]'><input type='button' value='Change Pass' class='button' style='height:20px; width:100px;'/></a>
                                <a href='CategoryDelete.php?page=$page&Id=$row[0]'><input type='button' value='Deactivate' class='button' style='height:20px; width:100px;'/></a>
                                </td>";                       
                        $i++;                        
                        echo "</tr>";
                        echo "<tr style='font-size:13px; border: solid thin gainsboro; height:10px;'><td colspan='7'></td></tr>";
                    }
                    ?>


                    <?php
                    echo "<tr style='height:35px; border: solid thin gainsboro'>";
                    echo "<td colspan='6' align='center'>";
                    echo $pagination;
                    echo "</td></tr>";
                    ?>

                </table>
            </div>

        </div>
    </body>
</html>
