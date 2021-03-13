<!--

==========================
       
        Mark Pratt
        CST-236
        Version Num: 3

        Registration page

==========================

-->
<!DOCTYPE html>
<html>
    <head>
        <!-- Required meta tags -->
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
        
        <link rel="stylesheet" href="../CSS/styles.css" type="text/css">
        
        <title>CS236 Project</title>
        
    </head>
    <body>
        <form method="post" action="../Business/registerHandler.php">
            <label for="fname">First Name: </label>
            <input type="text" name="fname">
            
            <br>
            <label for="lname">Last Name: </label>
            <input type="text" name="lname">
            
            <br>
            <label for="email">Email: </label>
            <input type="text" name="email">
            
            <br>
            <label for="uname">Username: </label>
            <input type="text" name="uname">
            
            <br>
            <label for="password">Password: </label>
            <input type="text" name="password">
            
            <br>
            <label for="passwordConfirm">Confirm Password: </label>
            <input type="text" name="passwordConfirm">
            
            <br>
            <label for="address">Address: </label>
            <input type="text" name="address">
            
            <br>
            <label for="city">City: </label>
            <input type="text" name="city">
            
            <br>
            <label for="state">State: </label>
            <input type="text" name="state">
            
            <br>
            <label for="zip">Zip: </label>
            <input type="text" name="zip">
            
            <br>
            <br>
            
            <input type="submit" value="Register">
        
        
        </form>
    
    
    </body>

</html>