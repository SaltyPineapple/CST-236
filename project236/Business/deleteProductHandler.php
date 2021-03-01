<!--

==========================
       
        Mark Pratt
        CST-236
        Version Num: 3

        Page that prompts to delete a product

==========================

-->
<?php

    $id = $_GET["ID"];

    echo"<script>if (confirm('Delete Product? Product will no longer be listed for sale.'))
                 location.href='../Security/deleteProduct.php?ID=$id';
                 else
                    location.href='../Presentation/administrationPage.php';
        </script>";


?>