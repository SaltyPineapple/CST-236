<!--

==========================
       
        Mark Pratt
        CST-236
        Version Num: 3

        Page with form to order new products

==========================

-->
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
        <h2>Product Order Form</h2>

        <form action="../Business/addProductHandler.php" method="post">
            <label for="prodName">Product Name: </label>
            <input type="text" name="prodName">
            <br>

            <label for="prodDesc">Product Description</label>
            <br>
            <textarea name="prodDesc" rows="5" cols="30"></textarea>
            <br>

            <label for="prodInv">Inventory: </label>
            <input type="number" min="1" max="50" name="prodInv">
            <br>

            <label for="prodPrice">Price: </label>
            <input type="number" name="prodPrice">
            <br>
            <br>
            <input type="submit" value="Order Product">

        </form>
    </body>
    




</html>