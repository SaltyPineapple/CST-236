<!--

==========================
       
        Mark Pratt
        CST-236
        Version Num: 3

        Page that prompts to delete a user

==========================

-->
<?php

    $id = $_GET["ID"];

    echo"<script>if (confirm('Delete User? This will fully erase the user from the database'))
                 location.href='../Security/deleteUser.php?ID=$id';
                 else
                    location.href='../Presentation/administrationPage.php';
        </script>";


?>