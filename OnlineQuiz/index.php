<?php

    session_start();
    if(isset($_SESSION['LOGIN_STATUS']) && !empty($_SESSION['LOGIN_STATUS'])){
        header('location:Model/welcome.php');        
    }    
?>

<!DOCTYPE html>
<html>
    <head>
        <title>Online Quiz</title>
        <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
        <link rel="stylesheet" href="Styles/Style.css"/>        
        <script type="text/javascript" src="Scripts/jquery-1.4.1.min.js"></script>
        <script type="text/javascript">
        function validLogin(){
              var uname=$('#uname').val();
              var password=$('#password').val();

              var dataString = 'uname='+ uname + '&password='+ password;
              $("#flash").show();
              $("#flash").fadeIn(400).html('<img src="Images/loading.gif" />');
              $.ajax({
              type: "POST",
              url: "loginprocess.php",
              data: dataString,
              cache: false,
              success: function(result){
                       var result=trim(result);
                       $("#flash").hide();
                       if(result=='correct'){
                             window.location='Model/welcome.php';
                       }else{
                             $("#errorMessage").html(result);
                       }
              }
              });
        }

        function trim(str){
             var str=str.replace(/^\s+|\s+$/,'');
             return str;
        }
        </script>

        
    </head>
    <body>
        <div id="mainContainer">
            <div id="header">
                <div id="logo">
                    <div style="margin-left: 60px; margin-top: 25px;">
                        <span style="color: white; font-family: verdana; font-size: 28px;">Online</span>&nbsp;&nbsp;&nbsp;
                        <span style="color: black; font-family: verdana; font-size: 28px;">Quiz</span>
                    </div>
                </div>

                <div id="menu">
                    <ul>
                        <a href="index.php"><li>Home</li></a>
                        <a href="index.php"><li>Login</li></a>
                    </ul>
                </div>
            </div>
            
            <div id="loginpane">
                <div class="paneHead" style="text-align: center">Admin Users Login</div>
                <table align="center" class="login_box">
                    <tr><td colspan="2" id="errorMessage" style="color: red; font-weight: bold;"></td></tr>
                    <tr>
                       <td>UserName</td>
                       <td><input type="text" name="uname" id="uname" class="textBox"></td>
                    </tr>
                    <tr>
                       <td>Password</td>
                       <td><input type="password" name="password" id="password" class="textBox"></td>
                    </tr>
                    <tr id="button_box">
                       <td>&nbsp</td>
                       <td><input type="button" name="submit" value="Submit" class="button" onclick="validLogin()"></td>
                    </tr>
                    <tr><td colspan="2" id="flash"></td></tr>
                    <tr><td colspan="2" align="right"><br/>
                            <a href="register.php" style="color: black; font-weight: bold">
                            Register New User
                            </a></td></tr>
               </table>
                
            </div>
            
        </div>
    </body>
</html>