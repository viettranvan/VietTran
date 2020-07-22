<?php
    class UserModel extends DB{
        //Function inserUser to database
        public function insertUser($userFullName, $userName, $userPass, $userEmail,$vkey, $userGender, $userPhoneNumber, $userAddress) {
           try {
                $conn = $this -> __construct();
                $conn->set_charset("utf8");
                $sql = "INSERT INTO user(userid, fullname, loginname, password, email,vkey, gender, phonenumber, address,confirm) 
                        VALUES (NULL,'$userFullName','$userName','$userPass','$userEmail','$vkey','$userGender',$userPhoneNumber,'$userAddress',0)";    
                if ( mysqli_query($conn, $sql) ) {
                    mysqli_set_charset($conn,'utf8');
                    mysqli_query($conn,"SET NAMES 'UTF8'");
                    return true;
                    $this -> closeConnection();
                }
                else {
                    $this -> closeConnection();
                    return false;
                }         
           }
           catch( Exception $e ) {
               echo "Something was wrong".$e;
           }
        }
        //Function close connection
        public function closeConnection(){
            $conn = $this -> __construct();
            return mysqli_close($conn);
        }
        //Function check exits Email
        public function checkExitsEmail($userEmail){
            try {
                $conn = $this -> __construct();
                $conn->set_charset("utf8");
                $sql = "SELECT * FROM user WHERE email ='$userEmail'";
                $checkMail = mysqli_query($conn,$sql);
                if ( mysqli_num_rows($checkMail) == 0 ){
                    $this -> closeConnection();
                    return true;
                }
                else {
                    $this -> closeConnection();
                    return false;
                }
            }
            catch( Exception $e) {
                echo "Something was wrong ".$e;
            }
        }
        //Function check login name
        public function checkExitsLoginName($userName){
            try {
                $conn = $this -> __construct();
                $conn->set_charset("utf8");
                $sql = "SELECT * FROM user WHERE loginname ='$userName'";
                $checkName = mysqli_query($conn,$sql);
                if ( mysqli_num_rows($checkName) == 0 ) {
                    $this ->closeConnection();
                    return true;
                }
                else {
                    $this -> closeConnection();
                    return false;
                } 
            }
            catch( Exception $e ) {
                echo "Something was wrong".$e;
            }
        }
        //Function login
        public function Login( $name, $pass ) {
            try {
                $conn = $this -> __construct();
                $conn->set_charset("utf8");
                $sql = "SELECT * from user WHERE loginname='$name' AND password='$pass' LIMIT 1";
                if ( $result = mysqli_query($conn, $sql) ) {
                    if( mysqli_num_rows($result) > 0 ) {
                        $row = $result -> fetch_assoc();
                        $this -> closeConnection();
                        return $row;
                    }
                }
            }
            catch( Exception $e ) {
                echo "Some thing was wrong".$e;
            }
        }
        //function get user infor
        public function getUser($id) {
            try {
                $conn = $this -> __construct();
                $conn->set_charset("utf8");
                $sql = "SELECT * from user WHERE userid=$id LIMIT 1";
                if ( $result = mysqli_query($conn, $sql) ) {
                    if( mysqli_num_rows($result) > 0 ) {
                        $row = $result -> fetch_assoc();
                        $this -> closeConnection();
                        return $row;
                    }
                }
            }
            catch( Exception $e ) {
                echo "Some thing was wrong".$e;
            }
        }
        //function Handle Edit User
        public function EditUser($row, $value, $id) {
            try {
                $conn = $this -> __construct();
                $conn->set_charset("utf8");
                $sql = "UPDATE user SET user.$row = '$value' WHERE user.userid=$id LIMIT 1";
                if (mysqli_query($conn, $sql)) {
                    $_SESSION["userfullname"] = $value;
                    $this -> closeConnection();
                    return true;
                }
                else {
                    return false;
                }
            }
            catch( Exception $e ) {
                echo "Some thing was wrong".$e;
            }
        }
        //func get Booking
        public function getBooking($userID) {
            try {
                $conn = $this -> __construct();
                $conn->set_charset("utf8");
                $sql = "SELECT * from booking WHERE userid=$userID";
                if ( $result = mysqli_query($conn, $sql) ) {
                    if( mysqli_num_rows($result) >= 0 ) {
                        $this -> closeConnection();
                        return $result;
                    }
                }
            }
            catch( Exception $e ) {
                echo "Some thing was wrong".$e;
            }
        }
        //reset Password
        public function resetPass($email, $newPW){
            try {
                $email = (string)$email;
                $conn = $this -> __construct();
                $conn->set_charset("utf8");
                $randomPass = (string)$newPW;
                $sql = "UPDATE user SET password = '$randomPass' WHERE email='$email'";
                $resetPass = mysqli_query($conn,$sql);
                if ( $resetPass ){
                    $this -> closeConnection();
                    return true;
                }
                else {
                    $this -> closeConnection();
                    return false;
                }
            }
            catch( Exception $e) {
                echo "Something was wrong ".$e;
            }
        }
    }
?>