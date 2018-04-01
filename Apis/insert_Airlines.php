<?php
if(!isset($_SESSION))
{
    session_start();
}
// include db connect class
require_once __DIR__ . '/Connection.php';
class InsertDetails{
    function startInsertDetails(){
        $connection = new Connection();
        $conn = $connection->getConnection();
        //array for json response
        $response = array();
        $Name   = $_POST['Name'];
        $Cell_No   = $_POST['Cell_No'];
        try{
            echo $Name." ".$Cell_No;
            //echo !empty($Name)." ".!empty($Cell_No)." ".isset($Point)." ".isset($Comission);
            if(!empty($Name) && !empty($Cell_No)){

                $sqlInsert = "INSERT INTO airlines (id, Name, ContactNo) VALUES (0, '$Name', '$Cell_No')";
                $conn->exec($sqlInsert);
            }

        }catch (PDOException $e){
            echo "Error while inserting ".$e->getMessage();
        }
        //cek is the row was inserted or not
        if($sqlInsert){
            //success inserted
            echo '<script type="text/javascript">alert("Successfully Inserted !!!");</script>';
            echo '<script type="text/javascript"> window.open("../pages/dashboard.php","_self");</script>';
            die();
        }else{

            echo '<script type="text/javascript">alert("Error , Try Again!!!");</script>';
            echo '<script type="text/javascript"> window.open("../pages/Contacts.php","_self");</script>';
            die();
        }
    }
}
if(isset($_POST['insert_contacts_data']) && isset($_SESSION['loggedIn']))   // it checks whether the user clicked login button or not
{
    $insert = new InsertDetails();
    $insert->startInsertDetails();
}
else
{
    echo '<script type="text/javascript">alert("Bad Request !!!");</script>';
    echo '<script type="text/javascript"> window.open("../index.php","_self");</script>';
    die();
}