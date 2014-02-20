<?php

/*
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of User
 *
 * @author Administrator
 */
class User {
    //put your code here
    
    private $user;
    private $pass;    
    private $con;

    public function __construct($user, $pass) {
        $this->user = $user;
        $this->pass = $pass;                
    }
    
    public function isAuthorized(){        
        include 'Connection.php';  
        
        mysql_close();
    }    
    
    public function __destruct() {
        mysql_close();
    }
}

?>
