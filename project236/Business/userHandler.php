<!--

==========================
       
        Mark Pratt
        CST-236
        Version Num: 5

        Handles and redirects all product requests

==========================

-->
<?php

// error_reporting(E_ALL);
// ini_set('display_errors', 1);

require_once('../autoloader.php');


class userHandler {
    function getAllUsers(){
        $users = new users();
        $allUsers = $users->getUsers();
        return $allUsers;
    }

    function getAdminStatus($id){
        $users = new users();
        $adminStatus = $users->getAdminStatus($id);
        return $adminStatus;
    }

    function getSingularUser($id){
        $users = new users();
        $singleUser = $users->getSingleUser($id);
        return $singleUser;
    }
    
    function addCreditCard($cc, $pin, $id){
        $users = new users();
        $users->addCreditCard($cc, $pin, $id);
    }
}

?>