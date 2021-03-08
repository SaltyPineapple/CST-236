<!--

==========================
       
        Mark Pratt
        CST-236
        Version Num: 3

        Handler for utility.php

==========================

-->
<?php

require_once("../autoloader.php");

class utilityHandler{
    function getUser(){
        $util = new utility();
        $user = $util->getUser();
        return $user;
    }
}

?>