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

        <script type="text/javascript" src="Scripts/jquery-1.4.1.min.js"></script>
        <script type="text/javascript">
            function validVideo(){
                var videoid = $('#videoid').val();
                var url=$('#url').val();
                var thumbnail=$('#thumbnail').val();
                var category = $('#category').val();
                var description = $('#description').val();
                var tags = $('#tags').val();
                
                var form = document.forms['videopost'];                
                
                //category = form.elements['category'][0].value;
                //alert(category);
                
                var dataString = 'id='+videoid+'&URL='+ url + '&thumbnail='+ thumbnail+'&category='+category
                    +'&description='+description+'&tags='+tags;
                $("#flash").show();
                $("#flash").fadeIn(400).html('<img src="Images/loading.gif" />');
                $.ajax({
                    type: "POST",
                    url: "VideoSave.php",
                    data: dataString,
                    cache: false,
                    success: function(result){
                        var result=trim(result);
                        $("#flash").hide();
                        if(result=='success'){
                            //window.location='Model/VideoPostNew.php';
                            $("#status").html("<font color='green'>Video Posted Successfully!, waiting for approval");
                        }else{
                            $("#status").html("<font color='red'>"+result+"</font>");
                        }
                    }
                });
                //alert('Test');
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


            <div style="width: 650px; height: 400px; margin: 0 auto;">
                <br/>
                <a href="VideoList.php">
                    <input type="button" value="All Videos List" class="button" style="width: 150px;"/>
                </a>
                <p></p>
                <br/>                
                <div id="status" style="border: none thin white; 
                     margin-left: 220px; font-family: verdana; font-size: 14px; font-weight: bold">

                </div>
                <br/>
                <form name="videopost">

                    <table border="0" cellspacing="4" style="border-collapse: collapse; 
                           border-color: gainsboro; width: 100%; font-family: verdana; font-size: 13px;">
                        <tr height="35">
                            <td align="right"><strong>Video ID</strong> &nbsp;</td>
                        <input type="hidden" name="videoid" id="videoid" value="21"/>
                            <td>&nbsp;V1021</td>
                        </tr>
                        <tr height="35">
                            <td align="right"><strong>URL</strong> &nbsp;<font color="red">*</font></td>
                            <td>&nbsp;<input type="text" name="url" id="url" size="50" class="textBox2"/></td>
                        </tr>
                        <tr height="35">
                            <td align="right"><strong>Video Thumbnail URL</strong> &nbsp;</td>
                            <td>&nbsp;<input type="text" name="thumnail" id="thumbnail" size="50" class="textBox2" /></td>
                        </tr>
                        <tr height="35">
                            <td align="right"><strong>Category</strong> &nbsp;<font color="red">*</font></td>
                            <td>&nbsp;<select name="category" id="category" class="textBox2" style="width:320px; height: 25px;">
                                    <option value="">Select</option>
                                    <?php
                                    include 'Connection.php';
                                    $query = "SELECT CategoryID, CategoryName FROM Categories";

                                    $result = mysql_query($query);
                                    while ($row = mysql_fetch_array($result)) {
                                        echo "<option value='$row[0]'>$row[1]</option>";
                                    }
                                    ?>
                                </select>
                            </td>
                        </tr>
                        <tr height="35">
                            <td align="right"><strong>Video Description</strong> &nbsp;</td>
                            <td>&nbsp;<textarea name="description" id="description" rows="3" cols="37" style=" border: solid darkgray thin; border-radius: 3px;"></textarea></td>
                        </tr>
                         <tr height="35">
                            <td align="right"><strong>Tags</strong> &nbsp;</td>
                            <td>&nbsp;<textarea name="tags" id="tags" rows="3" cols="37" style=" border: solid darkgray thin; border-radius: 3px;"></textarea></td>
                        </tr>

                        <tr height="35">
                            <td align="right">&nbsp;</td>
                            <td>&nbsp;
                                <input type="button" name="submit" value="Post Video" onclick="validVideo()" class="button" style="width: 150px; height: 28px;"/>
                            </td>
                        </tr>

                    </table>
                </form>
            </div>

        </div>
    </body>
</html>
