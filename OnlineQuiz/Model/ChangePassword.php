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

            <div style="width: 700px; height: 400px; margin: 0 auto; float: right;">
                <br/>
               
                <p></p>

                <table border="0" cellspacing="4" style="border-collapse: collapse; border-color: gainsboro; width: 60%; font-family: verdana; font-size: 13px;">
                    <tr style="font-size: 14px; font-weight: bold; background-color: darkgray; height: 30px; border: solid thin gainsboro">
                        <td colspan="2">Change Password</td>                        
                    </tr>    
                    <tr>
                        <td colspan="2">&nbsp;&nbsp;</td>
                    </tr>
                    <tr>
                        <td align="right">Current Passowrd &nbsp;&nbsp;</td>
                        <td><input type="password" name="current" class="textBox" /></td>
                    </tr>

                    <tr>
                        <td align="right">New Passowrd &nbsp;&nbsp;</td>
                        <td><input type="password" name="newpass" class="textBox" /></td>
                    </tr>
                    <tr>
                        <td align="right">Confirm Passowrd &nbsp;&nbsp;</td>
                        <td><input type="password" name="confirm" class="textBox" /></td>
                    </tr>
                    <tr>
                        <td colspan="2">&nbsp;&nbsp;</td>
                    </tr>
                    <tr>
                        <td>&nbsp;&nbsp;</td>
                        <td><input type="submit" name="submit" value="Change Password" class="button" style="width: 150px;"/> </td>
                    </tr>
                </table>
            </div>

        </div>
    </body>
</html>
