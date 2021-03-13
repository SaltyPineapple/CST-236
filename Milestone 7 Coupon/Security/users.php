<!--

==========================
       
        Mark Pratt
        CST-236
        Version Num: 5

        Data layer for retrieving product info

==========================

-->

<?php

// error_reporting(E_ALL);
// ini_set('display_errors', 1);

require_once('../autoloader.php');


class users{
    function getUsers(){
        $util = new utility();
        $sql = "SELECT users.ID, Username, Password, FirstName, LastName, Email, Address, City, State, Zip, Rolename FROM USERS inner join Roles on users.ID = roles.USER_ID";
        
        $con = $util->dbConnect();

        $result = mysqli_query($con, $sql);

        $users = array();

        $index = 0;
        

        if(mysqli_num_rows($result) > 0){

            while($row = mysqli_fetch_assoc($result)){

                $users[$index] = array(
                    $row["ID"], $row["Username"], $row["Password"], $row["FirstName"], $row["LastName"], $row["Email"], $row["Address"], $row["City"], $row["State"], $row["Zip"], $row["Rolename"]
                );

                ++$index;
            }
            
        }
        
        

        return $users;
    }


    function getAdminStatus($id){
        $util = new utility();
        $sql = "SELECT Username, Rolename from Users inner join roles on users.id = roles.USER_ID where USERS.ID='$id'";

        $con = $util ->dbConnect();

        $result = mysqli_query($con, $sql);

        $user = "";

        if(mysqli_num_rows($result) > 0){
            $row = mysqli_fetch_assoc($result);
            $user = $row["Rolename"];
        }
        

        return $user;
    }

    function getSingleUser($id){
        $util = new utility();
        $sql = "SELECT * FROM USERS WHERE ID='$id'";
        $con = $util->dbConnect();

        $result = mysqli_query($con, $sql);

        $user = array();

        if(mysqli_num_rows($result) > 0){

            while($row = mysqli_fetch_assoc($result)){

                $user[0] = $row["ID"];
                $user[1] = $row["Username"];
                $user[2] = $row["Password"];
                $user[3] = $row["FirstName"];
                $user[4] = $row["LastName"];
                $user[5] = $row["Email"];
                $user[6] = $row["Address"];
                $user[7] = $row["City"];
                $user[8] = $row["State"];
                $user[9] = $row["Zip"];
                $user[10] = $row["CreditCard"];
                $user[11] = $row["CardPin"];
                $user[12] = $row["Role"];
                

                
            }
        }

        return $user;
    }

    // adds credit card to users data in table
    function addCreditCard($cc, $pin, $id){
        $util = new utility();
        $sql = "UPDATE USERS set CreditCard = '$cc', cardPin = $pin where ID=$id";
        $con = $util->dbConnect();

        $result = mysqli_query($con, $sql);

        if($result){
            echo"Success";
        }

    }

    function getSalesReportTable($id){
        $util = new utility();
        $sql = "SELECT ORDERS.ORDER_ID, USER_ID, ORDER_DATE, QUANTITY, PRODUCT_ID, ORDER_PRICE FROM ORDERS 
                inner join ORDER_DETAILS 
                on ORDER_DETAILS.ORDER_ID = ORDERS.ORDER_ID
                WHERE USER_ID = $id";

        $con = $util->dbConnect();
        $result = mysqli_query($con, $sql);

        $report = array();

        $index = 0;
        if(mysqli_num_rows($result) > 0){

            while($row = mysqli_fetch_assoc($result)){
                $report[$index] = array(
                    $row['ORDER_ID'],
                    $row['USER_ID'],
                    $row['ORDER_DATE'],
                    $row['QUANTITY'],
                    $row['PRODUCT_ID'],
                    $row['ORDER_PRICE']
                );
                ++$index; 
            }
        }

        return $report;

    }
    
}


?>