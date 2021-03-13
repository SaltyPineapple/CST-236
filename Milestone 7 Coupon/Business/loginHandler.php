<!--

==========================
       
        Mark Pratt
        CST-236
        Version Num: 3

        Handler for logging user in

==========================

-->
<?php


error_reporting(E_ALL);
ini_set('display_errors', 1);
    
    require_once('../autoloader.php');
    $util = new utility();

    // grab items from POST
    $username = $_POST["username"];
    $pass = $_POST["password"];

    // error handling and validation
    if($username == NULL){
        echo "Username cannot be blank";
    }
    else if($pass == NULL){
        echo "Password cannot be blank";
    }
    else{
        // SQL to grab from database
        $sql = "SELECT * FROM users WHERE Username='$username' AND Password='$pass'";
        
        $result = mysqli_query($util->dbConnect(), $sql);
        
        // check if any rows match user and pass
        if(mysqli_num_rows($result) > 0){
            session_start();
            //$_SESSION["USERCART"] -> reset();
            echo "Log in successful";
            
            $row = $result->fetch_assoc();
            $util->saveUser($row["ID"]);

            
            
            // reidirects to the post page
            header("Location: ../Presentation/home.php?num=0");
        }
        else {
            echo "Login failed";
            echo "<br>";
            echo "<a href='../Presentation/login.php'>Try Again</a>";
        }
        
    }

    /*function saveUserID($id){
        session_start();
        
        $_SESSION["$_USERID"] = $id;
        
    }*/



?>