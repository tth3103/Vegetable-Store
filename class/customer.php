<?php
    require_once($_SERVER['DOCUMENT_ROOT'].'/vegetablestore/connection.php');
    class customer extends DBConnection{
        public function __construct(){
            parent::connect();
        }
       
        public function getAll() {
            $sql = "SELECT * 
                    FROM customer";
            $result = $this->executeResult($sql);
            if($result == false){
                return false;
            } else {
                return $result;
            }
        }
        // Phương thức lấy thông tin khách hàng theo ID
        public function getByID($cusid){
            $sql = "select * from customer where CustomerID = $cusid";
            $result = $this->executeResult($sql);
            if($result == false){
                return false;
            } else {
                return $result;
            }
        }
        
        // Phương thức thêm mới thông tin khách hàng
        public function add_cus($cus){
            $full_name = $cus[0];
            $email = $cus[1];
            $username = $cus[2];
            $password = $cus[3];
            $phone = $cus[4];
            $address = $cus[5];
            $sql = "insert into customer(Fullname,Email,Username,Password,Phone,Address) VALUES('$full_name', '$email', '$username', '$password', '$phone', '$address')";
            $result = $this->execute($sql);
            if($result == false){
                return false;
            } else {
                return $result;
            }
        }

        
    }

?>