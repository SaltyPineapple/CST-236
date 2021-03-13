<!--

==========================
       
        Mark Pratt
        CST-236
        Version Num: 3

        Utility file for database connections

==========================

-->

<?php

//session_start();

class utility{
    function dbConnect(){
        $con = mysqli_connect('localhost', 'root', 'root', 'project236');
        
        if(!$con){
            die("Database not connected" . mysqli_connect_error);
        }
        
        return $con;
    }


    
    function saveUser($userID){
        session_start();
        
        $_SESSION["userid"] = $userID;
        echo $_SESSION["userid"];
        
    }

    function getUser(){
        session_start();
        
        return $_SESSION["userid"];
    }

   
}

    

    

    


?>