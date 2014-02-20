<?php
session_start();
if (isset($_SESSION['LOGIN_STATUS']) && !empty($_SESSION['LOGIN_STATUS'])) {
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
                var cpassword=$('#cpassword').val();
                var fname = $('#fname').val();
                var lname = $('#lname').val();
                var email = $('#email').val();
                var country = $('#country').val();
                var postalcode = $('#postalcode').val();
                var gender = "";
                
                var form = document.forms['regform'];                
                
                if(form.elements['gender'][0].checked==true){
                    gender="M";
                }else{
                    gender="F";
                }

               
                

                var dataString = 'uname='+ uname + '&password='+ password+'&cpassword='+ cpassword+'&fname='+fname+'&lname='+lname+'&email='+email+
                    '&country'+country+'&postalcode='+postalcode+'&gender='+gender;
                $("#flash").show();
                $("#flash").fadeIn(400).html('<img src="Images/loading.gif" />');
                $.ajax({
                    type: "POST",
                    url: "registeruser.php",
                    data: dataString,
                    cache: false,
                    success: function(result){
                        var result=trim(result);
                        $("#flash").hide();
                        if(result=='created'){
                            alert('User Account Registred Successfully!, you need to wait for approval');                              
                            window.location='index.php';
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
            <form name="regform">

                <div id="registernpane">
                    <div class="paneHead" style="text-align: center">New User Registration</div>
                    <table align="center" class="login_box">
                        <tr><td colspan="2" id="errorMessage" style="color: red; font-weight: bold;"></td></tr>
                        <tr>
                            <td>First Name</td>
                            <td><input type="text" name="fname" id="fname" class="textBox"></td>
                        </tr>
                        <tr>
                            <td>Last Name</td>
                            <td><input type="text" name="lname" id="lname" class="textBox"></td>
                        </tr>
                        <tr >
                            <td>Gender</td>
                            <td valign="middle">
                                <input type="radio" name="gender" id="gender1" value="M"> Male 
                                <input type="radio" name="gender" id="gender2" value="F"> Female
                            </td>
                        </tr>
                        <tr>
                            <td>E-Mail</td>
                            <td><input type="text" name="email" id="email" class="textBox"></td>
                        </tr>
                        <tr>
                            <td>UserName</td>
                            <td><input type="text" name="uname" id="uname" class="textBox"></td>
                        </tr>
                        <tr>
                            <td>Password</td>
                            <td><input type="password" name="password" id="password" class="textBox"></td>
                        </tr>
                        <tr>
                            <td>Confirm Password</td>
                            <td><input type="password" name="cpassword" id="cpassword" class="textBox"></td>
                        </tr>
                        <tr>
                            <td>County</td>
                            <td><input type="text" name="country" id="country" class="textBox"></td>
                        </tr>
                        <tr>
                            <td>Postal Code</td>
                            <td><input type="text" name="postalcode" id="postalcode" class="textBox"></td>
                        </tr>
                        <tr id="button_box">
                            <td>&nbsp</td>
                            <td><input type="button" name="submit" value="Register Account" class="button" style="width:150px;" onclick="validLogin()"></td>
                        </tr>
                        <tr><td colspan="2" id="flash"></td></tr>
                    </table>

                </div>
            </form>

        </div>
    </body>
</html>