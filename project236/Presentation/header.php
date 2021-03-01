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

    echo"<h1>Welcome ".$username[1]."</h1>";
?>





