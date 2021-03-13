<!--

==========================
       
        Mark Pratt
        CST-236
        Version Num: 3

        PHP Handler for new user registration

==========================

-->

<?php
    require('../autoloader.php');
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
    $role = $_POST["userRole"];

    $ID = $_GET["ID"];


    $sql = "UPDATE USERS SET FirstName='$fname', LastName='$lname', Username='$uname', Password='$pass', Email='$email', Address='$address', City='$city', State='$state', Zip='$zip' where ID='$ID'";
    $sqlRole = "UPDATE roles SET ROLENAME = '$role' where ID='$ID'";
    
    if($role == ""){
        echo"<script>
                alert('User Role needs to be defined');
                location.href='../Presentation/editUser.php?ID=$ID';
            </script>";
    }

    if($pass == $passConf){
        echo"Password good";
        
        $result = mysqli_query($util->dbConnect(), $sql);
        $resultRole = mysqli_query($util->dbConnect(), $sql);
        if($result && $resultRole){
            echo"Successfully Updated!";
            header("Location: ../Presentation/administrationPage.php");
        }
        else{
            echo "ERROR: SQL not exectued $sql" . mysqli_error($util->dbConnect());
            echo "<br>";
            echo "ERROR: SQL not exectued $sqlRole" . mysqli_error($util->dbConnect());
        }
        
        
    }
    else{
        echo $pass;
        echo $passConf;
        die("Password do not match.");
    }
        

        

?>