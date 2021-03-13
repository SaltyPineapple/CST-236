<!--

==========================
       
        Mark Pratt
        CST-236
        Version Num: 3

        Handles and redirects searches

==========================

-->

<?php
require_once("../autoloader.php");

$searchResults = $_GET["search"];


header("Location: ../Presentation/searchResults.php?num=0&value=$searchResults");

?>