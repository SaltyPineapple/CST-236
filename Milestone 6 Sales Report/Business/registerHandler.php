<!--

==========================
       
        Mark Pratt
        CST-236
        Version Num: 3

        PHP Handler for new user registration

==========================

-->

<?php
    require_once('../autoloader.php');
    $util = new utility();

    $fname = $_POST["fname"];
    $lname = $_POST["lname"];
    $email = $_POST["email"];
    $uname = $_POST["uname"];
    $pass = $_POST["password"];
    $passConf = $_POST["passwordConfirm"];
    $address = $_POST["address"];
    $city = $_POST["city"];
    $state = $_POST["state"];
    $zip = $_POST["zip"];


    $sqlUsernameCheck = "SELECT * FROM users WHERE Username = $uname";
    $sqlEmailCheck = "SELECT * FROM users WHERE Email = $email";
    
    $resultUsername = mysqli_query($util->dbConnect(), $sqlUsernameCheck);
    $resultEmail = mysqli_query($util->dbConnect(), $sqlEmailCheck);

    if(mysqli_num_rows($resultUsername) > 0){
        die("That username is already in use.");
    }
    if(mysqli_num_rows($resultEmail) > 0){
        die("That Email is already in use.");
    }
    
    if($pass == $passConf){
        echo"Password good";
        $sqlInsert = "INSERT INTO users (FirstName, LastName, Username, Password, Email, Address, City, State, Zip) VALUES ('$fname', '$lname', '$uname', '$pass', '$email', '$address', '$city', '$state', '$zip')";
        
        $result = mysqli_query($util->dbConnect(), $sqlInsert);
        if($result){
            echo"Successfully Registered!";
            header("Location: ../Presentation/login.php");
        }
        else{
            echo "ERROR: SQL not exectued $sqlInsert" . mysqli_error($util->dbConnect());
        }
        
        
    }
    else{
        echo $pass;
        echo $passConf;
        die("Password do not match.");
    }
        

        

?>