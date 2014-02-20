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
                    </ul>
                </div>
            </div>

            <div style="margin-top: 75px; border: none thin white;">
                <div style="margin: 0 auto; width: 50%">
                    <form name="question" method="post" action="<?php echo $_SERVER['PHP_SELF']; ?>">
                        <input type="hidden" name="VideoID" value="<?php echo $_GET['VideoId']; ?>"/>
                        <input type="hidden" name="page" value="<?php if(isset($_GET['page'])) echo $_GET['page']; else echo null; ?>"/>
                            
                        <table border="0" style="width: 100%; font-family: verdana; font-size: 13px;">
                            <tr>
                                <td><strong>Video ID</strong></td>
                                <td><strong><?php echo "VID" . $_GET['VideoId']; ?></strong></td>
                            </tr>
                            <tr>
                                <td><strong>Question</strong></td>
                                <td><input type="text" name="question" class="textBox2" size="50" /></td>
                            </tr>
                            <tr>
                                <td><strong>Answer A</strong></td>
                                <td><input type="text" name="answerA" class="textBox" /></td>
                            </tr>
                            <tr>
                                <td><strong>Answer B</strong></td>
                                <td><input type="text" name="answerB" class="textBox"/></td>
                            </tr>
                            <tr>
                                <td><strong>Answer C</strong></td>
                                <td><input type="text" name="answerC" class="textBox"/></td>
                            </tr>
                            <tr>
                                <td><strong>Answer D</strong></td>
                                <td><input type="text" name="answerD" class="textBox"/></td>
                            </tr>
                            <tr>
                                <td><strong>Correct Answer</strong></td>
                                <td>
                                    <input type="text" name="correctAnswer" class="textBox"/>                                    
                                </td>                           
                            </tr>
                            <tr>
                                <td>&nbsp;</td>
                                <td>
                                    <input type="submit" name="submit" value="Save to List"/>
                                    <input type="reset" value="Cancel"/>
                                </td>                            
                            </tr>
                        </table>
                    </form>
                </div>                
            </div>
        </div>
    </body>
</html>

<?php
if (isset($_POST['submit'])) {
    $VideoID = "";
    $Question = "";
    $AnswerA = "";
    $AnswerB = "";
    $AnswerC = "";
    $AnswerD = "";
    $CorrectAnswer = "";

    if (isset($_POST['VideoID']) && !empty($_POST['VideoID'])) {
        $VideoID = $_POST['VideoID'];
    }

    if (isset($_POST['question']) && !empty($_POST['question'])) {
        $Question = $_POST['question'];
    } else {
        echo "<script>alert('Question Cannot be Empty!');</script>";
    }
    if (isset($_POST['answerA']) && !empty($_POST['answerA'])) {
        $AnswerA = $_POST['answerA'];
    } else {
        echo "<script>alert('Answer A Cannot be Empty!');</script>";
    }
    if (isset($_POST['answerB']) && !empty($_POST['AnswerB'])) {
        $AnswerB = $_POST['answerB'];
    } else {
        echo "<script>alert('Answer B Cannot be Empty!');</script>";
    }
    if (isset($_POST['answerC']) && !empty($_POST['answerC'])) {
        $AnswerC = $_POST['answerC'];
    } else {
        echo "<script>alert('Answer C Cannot be Empty!');</script>";
    }
    if (isset($_POST['answerD']) && !empty($_POST['answerD'])) {
        $AnswerD = $_POST['answerD'];
    } else {
        echo "<script>alert('Answer D Cannot be Empty!');</script>";
    }
    if (isset($_POST['correctAnswer']) && !empty($_POST['correctAnswer'])) {
        $CorrectAnswer = $_POST['correctAnswer'];
    } else {
        echo "<script>alert('Correct Answer Cannot be Empty!');</script>";
    }

    if (isset($_POST['page'])) {
        header('Location: VideoList.php?page=' . $_POST['page']);
    } else {
        header('Location: VideoList.php');
    }
}
?>