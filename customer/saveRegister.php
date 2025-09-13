<?php
require_once('../class/customer.php');

function test_input($data) {    
  $data = trim($data);    
  $data = stripslashes($data);    
  $data = htmlspecialchars($data);    
  return $data;    
}    

if (!empty([$_POST]) && isset($_POST['btn_register'])){
    $s_username = test_input($_POST['username']);
    $s_fullname = test_input($_POST['fullname']);
    $s_pwd = test_input($_POST['password']);
    $s_address = test_input($_POST['address']);
    $s_phone = test_input($_POST['phone']);
    $s_email = test_input($_POST['email']);
    $cus = array($s_fullname,$s_email,$s_username,$s_pwd,$s_phone,$s_address);
    // Xử lý Full Name (chỉ được sử dụng chữ & khoảng trắng)
      $customer = new customer();
      $result = $customer->add_cus($cus);
      if($result == false){
        echo "<script>alert('Invalid registration !')</script>";
      } else {
          echo "<script>alert('Sign Up Success !')
                window.location ='login.php' </script>";
        }
}
?>  