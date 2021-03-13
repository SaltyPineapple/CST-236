<!--

==========================
       
        Mark Pratt
        CST-236
        Version Num: 2

        Header for each page, has username and welcome

==========================

-->

<?php
    require_once('../autoloader.php');
    $uh = new utilityHandler();
    $u = new userHandler();

    $userID = $uh->getUser();
    $username = $u->getSingularUser($userID);

    $userID = $uh->getUser();
    $adminStatus = $u->getAdminStatus($userID);

?>
<!doctype html>

<html>

    <div class="nav">

        <?php echo"<h1>Welcome ".$username[1]."</h1>"; ?>
        <div class="SearchForm">
            <form method="get" action="../Business/searchHandler.php">
                <label for="search">Search: </label>
                <input type="text" name="search">
                <input type="submit" value="Search">
            </form>
        </div>
        <ul>
            <li><a href="../Presentation/home.php?num=0">Home</a></li>
            <?php
                if($adminStatus == "admin"){
                    echo"<li><a href='../Presentation/administrationPage.php'>Admin Home</a></li>";
                }
            ?>
            <li><a href="../Presentation/salesReport.php">Purchase History</a></li>
            <li><a href="../Presentation/viewCart.php">View Cart</a></li>
            <li><a href="../Presentation/index.php">Log Out</a></li>
        </ul>
    
    </div>

</html>






