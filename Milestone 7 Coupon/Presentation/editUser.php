<!--

==========================
       
        Mark Pratt
        CST-236
        Version Num: 3

        Form to edit users

==========================

-->

<?php
    require_once('../autoloader.php');
    $u = new userHandler();
    
    $user = $_GET["ID"];
    $userData = $u->getSingleUser($user);

?>


<!DOCTYPE html>

<html>
    <head>
        <!-- Required meta tags -->
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
        
        <link rel="stylesheet" href="../CSS/styles.css?v=<?php echo time(); ?>" type="text/css">
        
        <!-- Font Awesome -->
        <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.6.3/css/all.css">
        

        <title>CS236 Project</title>
    </head>
    <body>
        <h2>Edit User Form</h2>

        <form action="../Business/editUserHandler.php?ID=<?php echo $user; ?>" method="post">
            <label for="fname">First Name: </label>
            <input type="text" name="fname" value="<?php echo $userData[3]; ?>">
            
            <br>
            <label for="lname">Last Name: </label>
            <input type="text" name="lname" value="<?php echo $userData[4]; ?>">
            
            <br>
            <label for="email">Email: </label>
            <input type="text" name="email" value="<?php echo $userData[5]; ?>">
            
            <br>
            <label for="uname">Username: </label>
            <input type="text" name="uname" value="<?php echo $userData[1]; ?>">
            
            <br>
            <label for="password">Password: </label>
            <input type="text" name="password" value="<?php echo $userData[2]; ?>">
            
            <br>
            <label for="passwordConfirm">Confirm Password: </label>
            <input type="text" name="passwordConfirm" value="<?php echo $userData[2]; ?>">
            
            <br>
            <label for="address">Address: </label>
            <input type="text" name="address" value="<?php echo $userData[6]; ?>">
            
            <br>
            <label for="city">City: </label>
            <input type="text" name="city" value="<?php echo $userData[7]; ?>">
            
            <br>
            <label for="state">State: </label>
            <input type="text" name="state" value="<?php echo $userData[8]; ?>">
            
            <br>
            <label for="zip">Zip: </label>
            <input type="text" name="zip" value="<?php echo $userData[9]; ?>">

            <br>
            <label for="userRole">User Role:</label>
            <select name="userRole" selected="<?php echo $userData[12];?>">
                <option value=""></option>
                <option value="admin">admin</option>
                <option value="user">user</option>

            </select>
            
            <br>
            <br>
            
            <input type="submit" value="Update User">

        </form>
    </body>
    




</html>