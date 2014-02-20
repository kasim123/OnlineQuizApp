<?php
session_start();
if (!isset($_SESSION['UNAME'])) {
    header('Location: ../index.php');
}
//if(isset($_SESSION['LOGIN_STATUS']) && !empty($_SESSION['LOGIN_STATUS'])){
//}    

if (isset($_POST['category']) && isset($_POST['submit'])) {
    include 'Connection.php';
    $query = "INSERT INTO Categories(CategoryName) VALUES('" . $_POST['category'] . "')";
    mysql_query($query);
    echo "<script>alert('Category Details Saved Successfully!');</script>";
}
?>

<!DOCTYPE html>
<html>
    <head>
        <title>Online Quiz</title>
        <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
        <link rel="stylesheet" href="Styles/Style.css"/>
        <script>
            function validateForm(){
                if(document.forms[0].category.value==""){
                    alert('Enter Category Name');
                    return false;
                }
                return true;
            }
        </script>
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
                        <a href="VideoPostNew.php"><li>Videos</li></a>
                        <a href="VideoList.php"><li>Web Users</li></a>
                        <a href="Users.php"><li>Android Users</li></a>
                        <a href="logout.php"><li>Notifications</li></a>
                        <a href="logout.php"><li>Logout</li></a>
                    </ul>
                </div>
            </div>

            <div id="newCategory" style="margin-top: 50px;">

                <form name="categoryNew" method="post" action="">
                    <span>Select User Type</span>
                    <input type="radio" name="type" value="LH">Lecturer Head <input type="radio" name="type" value="LC">Lecturer<br>     
                    <input type="submit" name="submit" value="Save" class="button"/>                    
                </form>

            </div>            
        </div>
    </body>
</html>

<?php

if(isset($_POST['submit'])){
    include 'Connection.php';
    $query = "UPDATE Users SET IsActive=1 WHERE UserID='". $_GET['user'] ."'";
    mysql_query($query);
    echo "<script>alert('User Activated Successfully');</script>";
    header("Location: WebUsersList.php?page=". $_GET['page']);
}
?>
