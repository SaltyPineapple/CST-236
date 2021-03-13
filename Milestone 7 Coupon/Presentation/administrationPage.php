<!--

==========================
       
        Mark Pratt
        CST-236
        Version Num: 3

        Page for admins
        View all users and products
        can edit/delete/add users and products

==========================

-->

<!doctype html>
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
        <?php 
            include('header.php');  
            echo"<h2>Administration Page</h2>"  
        ?>

        <h3>Users</h3>
        <table>
            <tr>
                <th>Username</th>
                <th>Password</th>
                <th>First Name</th>
                <th>Last Name</th>
                <th>Email</th>
                <th>Address</th>
                <th>City</th>
                <th>State</th>
                <th>Zip</th>
                <th>Role</th>

            </tr>
            <?php 
                require_once('../autoloader.php');
                $uh = new userHandler();
                $allUsers = $uh->getAllUsers();

                for($x=0; $x<count($allUsers); $x++){
                    echo"<tr>";
                        echo"<td>".$allUsers[$x][1]."</td>";
                        echo"<td>".$allUsers[$x][2]."</td>";
                        echo"<td>".$allUsers[$x][3]."</td>";
                        echo"<td>".$allUsers[$x][4]."</td>";
                        echo"<td>".$allUsers[$x][5]."</td>";
                        echo"<td>".$allUsers[$x][6]."</td>";
                        echo"<td>".$allUsers[$x][7]."</td>";
                        echo"<td>".$allUsers[$x][8]."</td>";
                        echo"<td>".$allUsers[$x][9]."</td>";
                        echo"<td>".$allUsers[$x][10]."</td>";
                        echo"<td><a href='editUser.php?ID=".$allUsers[$x][0]."'>Edit</a></td>";
                        echo"<td><a href='../Business/deleteUserHandler.php?ID=".$allUsers[$x][0]."'>Delete</a></td>";
                    echo"</tr>";
                }
            ?>
        
        
        </table>

        <br>
        <br>
        <br>

        <h3>Products</h3>
        <a href="addProduct.php">Order New Products</a>
        <br>
        <table>
            <tr>
                <th>Name</th>
                <th>Description</th>
                <th>Inventory</th>
                <th>Price</th>
            </tr>
            <?php
                require("../Business/productHandler.php");
                $ph = new productHandler();
                
                $products = $ph->getAllProducts();

                for($x=0; $x<count($products); $x++){
                    echo"<tr>";
                        echo"<td>".$products[$x][1]."</td>";
                        echo"<td>".$products[$x][2]."</td>";
                        echo"<td>".$products[$x][3]."</td>";
                        echo"<td>$".$products[$x][4]."</td>";
                        echo"<td><a href='editProduct.php?ID=". $products[$x][0] ."'>Edit</a></td>";
                        echo"<td><a href='../Business/deleteProductHandler.php?ID=".$products[$x][0]."'>Delete</a></td>";
                    echo"</tr>";
                }

            ?> 


        </table>

        <br>

        <a href="home.php">Back Home</a>
        
        

    </body>

</html>