/* 
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */

function loginFormValidation(){
    
    if(document.getElementById("userId").value==""){
        document.getElementById("errorUserId").innerHTML = "Username cannot be empty";
        document.getElementById("userId").style.borderColor="red";
        document.getElementById("errorUserId").style.color="red";
        document.getElementById("errorUserId").style.fontWeight="bold";        
        document.getElementById("userId").focus();        
        return false
    }
    else{
        document.getElementById("errorUserId").innerHTML = "";  
        document.getElementById("userId").style.borderColor="";
    }        
    
    if(document.getElementById("password").value==""){
        document.getElementById("errorPassword").innerHTML = "Password cannot be empty";
        document.getElementById("password").style.borderColor="red";
        document.getElementById("errorPassword").style.color="red";
        document.getElementById("errorPassword").style.fontWeight="bold";        
        document.getElementById("password").focus();        
        return false;
    }
}
