<?php
require_once('../class/customer.php');
$s_customerID = $s_password ='';
if (!empty($_POST) && isset($_POST['btn_login'])) {
    if(isset($_POST['username'])) {
        $s_username = $_POST['username'];
    }
    if(isset($_POST['password'])) {
        $s_password = $_POST['password'];
    }
    $Customer = new customer();
    $result = $Customer->executeResult("SELECT * from `customer` WHERE `Username` = '$s_username'");
    //var_dump($result->num_rows);
    if(is_array($result) || is_object($result)){
        foreach($result as $value){
        }
        if ($value['Password'] != $s_password){
            echo "<script>alert('Password is invalid !')</script>";
        } else {
            $_SESSION['Fullname'] = $value['Fullname'];
            $_SESSION['yourID']   = $value['CustomerID'];
            $_SESSION['Email']    = $value['Email'];
            $_SESSION['Phone']    = $value['Phone'];
            $_SESSION['Address']  = $value['Address'];

            header('Location: ../index.php');
        }
    } else echo "<script>alert('Username is invalid !')</script>";
} 

?>
