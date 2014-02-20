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
              $("#flash").fadeIn(400).html('<img src="image/loading.gif" />');
              $.ajax({
              type: "POST",
              url: "loginprocess.php",
              data: dataString,
              cache: false,
              success: function(result){
                       var result=trim(result);
                       $("#flash").hide();
                       if(result=='correct'){
                             window.location='index.php';
                       }else{
                             $("#loginStatus").html(result);
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
                        <a href="#"><li>Home</li></a>
                        <a href="#"><li>Login</li></a>
                    </ul>
                </div>
            </div>
            
            <div id="loginpane">
                <div class="paneHead" style="text-align: center">Admin Login</div>

                <form name="login">
                    <table align="center">

                        <tr style="height: 35px;">
                            <td></td>
                            <td><div id="loginStatus"></div></td>
                        </tr>
                        <tr style="height: 35px;">
                            <td>Username</td>
                            <td><input type="text" id="userId" name="userid" class="textBox" onchange=""/></td>
                        </tr>
                        <tr>
                            <td></td>
                            <td><div id="errorUserId"></div></td>
                        </tr>
                        <tr style="height: 35px;">
                            <td>Password</td>
                            <td><input type="password" id="password" name="userid" class="textBox"/></td>
                        </tr>
                        <tr>
                            <td></td>
                            <td><div id="errorPassword"></div></td>
                        </tr>
                        <tr style="height: 35px;">
                            <td></td>
                            <td>
                                <input type="submit" name="submit" value="Login" class="button" onclick="validLogin()"/>
                                <input type="reset" name="submit" value="Clear" class="button"/>
                            </td>
                        </tr>
                    </table>
                </form>
            </div>
            
        </div>
    </body>
</html>