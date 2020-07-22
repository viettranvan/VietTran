<?php
    class User extends Controller {  
        public function UserPage($page){
            switch( $page ){
                case "profile" :
                    $model = $this -> model("UserModel");
                    $user = $model -> getUser($_SESSION["userid"]);
                    $this -> view("UserPage",["Dashboard" => $this->dashboard,"Page" => "profile", "User" => $user]);
                break;
                case "booking" :
                    $model = $this -> model("UserModel");
                    $bking = $model -> getBooking($_SESSION["userid"]);
                    $roomModel = $this -> model("RoomsModel");
                    if( $bking->num_rows > 0 ) {
                        $bookingArr = array();
                        $priceTotal = 0;
                        while( $row = $bking -> fetch_assoc() ) {
                            //echo $row["roomid"];
                            $datetimeAr = strtotime($row["datearrive"]);
                            $datetimeLe = strtotime($row["dateleave"]);
                            $secs = $datetimeLe - $datetimeAr;
                            $days = $secs / 86400;
                            $infor = $roomModel -> getRoomInfor($row["roomid"]);
                            $fetchInfor = $infor -> fetch_assoc();
                            $priceTotal += ($days * $fetchInfor["roomprice"]);

                            $push = ["Room" => $fetchInfor, "Booked" => $row, "RoomOnlyPr" => $days * $fetchInfor["roomprice"]];
                            array_push($bookingArr, $push );
                        }
                        $this -> view("UserPage",["Dashboard" => $this->dashboard,"Page" => "booking","Bookings" => $bookingArr,"TotalPrice" => $priceTotal ]);
                    }
                    else {
                        $this -> view("UserPage",["Dashboard" => $this->dashboard,"Page" => "booking","Bookings" => 0,"TotalPrice" => 0 ]);
                    }
                break;
                default:
                        require_once "./mvc/controllers/NotFound.php";
                        $NotFound = new NotFound();
                        $NotFound -> NotFoundPage();
                break;
            }
        }
        //Check Input function 
        protected function test_input($data) {
            $data = trim($data);                    //strip unnecessary characters
            $data = stripslashes($data);            //remove backslashes
            $data = htmlspecialchars($data);        //Escape htmlSpecialChar
            return $data;
        }
        
        public function Edit1(){
            if( $_SERVER["REQUEST_METHOD"] == "POST" ) {
                $data = NULL;
                $model = $this -> model("UserModel");
                if( isset($_POST["profileName"]) && $_POST["profileName"] != "" ) {
                    $a = $this -> test_input($_POST["profileName"]);
                    $exec = $model -> EditUser("fullname",$a,$_SESSION["userid"]);
                    if( $exec )
                        
                        $data = array( 'success'  => "Đổi tên thành công!");
                        
                    else 
                        $data = array( 'fail'  => "Có lỗi khi đổi thông tin!");
                }
                echo json_encode($data);
            } 
        }
        public function Edit2(){
            if( $_SERVER["REQUEST_METHOD"] == "POST" ) {
                $data = NULL;
                $model = $this -> model("UserModel");
                if( isset($_POST["profileMail"]) && $_POST["profileMail"] != "" ) {
                    if( $model -> checkExitsEmail($this -> test_input($_POST["profileMail"])) ) {
                        $a = "'".$this -> test_input($_POST["profileMail"])."'";
                        $exec = $model -> EditUser("email",$a,$_SESSION["userid"]);
                        if( $exec )
                            $data = array( 'success'  => "Đổi email thành công!");
                        else 
                            $data = array( 'fail'  => "Có lỗi khi đổi thông tin!");
                    }
                    else {
                        $data = array( 'fail'  => "Email đã được sử dụng!");
                    }
                }
                echo json_encode($data);
            } 
        }
        public function Edit3(){
            if( $_SERVER["REQUEST_METHOD"] == "POST" ) {
                $data = NULL;
                $model = $this -> model("UserModel");
                if( ( isset($_POST["profilePass"]) && $_POST["profilePass"] != "" ) && ( isset($_POST["profilePassConfirm"]) && $_POST["profilePassConfirm"] != "" ) ) {
                    if( $this -> test_input($_POST["profilePass"]) != $this -> test_input($_POST["profilePassConfirm"]) ) {
                        $data = array( 'fail'  => "Mật khẩu và mật khẩu xác nhận không giống!");
                    }
                    else {
                        $a = "'".$this -> test_input($_POST["profilePass"])."'";
                        $exec = $model -> EditUser("password",$a,$_SESSION["userid"]);
                        if( $exec )
                            $data = array( 'success'  => "Đổi mật khẩu thành công!");
                        else 
                            $data = array( 'fail'  => "Có lỗi khi đổi thông tin!");
                    }
                }
                echo json_encode($data);
            } 
        }
        public function Edit4(){
            if( $_SERVER["REQUEST_METHOD"] == "POST" ) {
                $data = NULL;
                $model = $this -> model("UserModel");
                if( isset($_POST["profileGender"]) && $_POST["profileGender"] != "" ) {
                    $a = "'".$this -> test_input($_POST["profileGender"])."'";
                    $exec = $model -> EditUser("gender",$a,$_SESSION["userid"]);
                    if( $exec )
                        $data = array( 'success'  => "Đổi giới tính thành công!");
                    else 
                        $data = array( 'fail'  => "Có lỗi khi đổi thông tin!");
                }
                echo json_encode($data);
            } 
        }
        public function Edit5(){
            if( $_SERVER["REQUEST_METHOD"] == "POST" ) {
                $data = NULL;
                $model = $this -> model("UserModel");
                if( isset($_POST["profilePhoneNum"]) && $_POST["profilePhoneNum"] != "" ) {
                    $a = "'".$this -> test_input($_POST["profilePhoneNum"])."'";
                    $exec = $model -> EditUser("phonenumber",$a,$_SESSION["userid"]);
                    if( $exec )
                        $data = array( 'success'  => "Đổi số điện thoại thành công!");
                    else 
                        $data = array( 'fail'  => "Có lỗi khi đổi thông tin!");
                }
                echo json_encode($data);
            } 
        }
        public function Edit6(){
            if( $_SERVER["REQUEST_METHOD"] == "POST" ) {
                $data = NULL;
                $model = $this -> model("UserModel");
                if( isset($_POST["profileAddress"]) && $_POST["profileAddress"] != "" ) {
                    $a = "'".$this -> test_input($_POST["profileAddress"])."'";
                    $exec = $model -> EditUser("address",$a,$_SESSION["userid"]);
                    if( $exec )
                        $data = array( 'success'  => "Đổi địa chỉ thành công!");
                    else 
                        $data = array( 'fail'  => "Có lỗi khi đổi thông tin!");
                }
                echo json_encode($data);
            } 
        }
        //Delete Room
        public function DeleteRoomBooking() {
            if( $_SERVER["REQUEST_METHOD"] == "POST" ) {
                $roomid = $dateArr = $dateLea = "";
                if( isset($_POST["roomid"]) ) $roomid = (int)($this -> test_input($_POST["roomid"]));
                if( isset($_POST["dateArr"]) ) $dateArr = (string)($this -> test_input($_POST["dateArr"]));
                if( isset($_POST["dateLea"]) ) $dateLea = (string)($this -> test_input($_POST["dateLea"]));
                
                $model = $this -> model("BookingModel");
                $data = NULL;
                if( $model -> DeleteBooking($roomid, $dateArr, $dateLea) ) {
                    $data = array( 'success'  => "Xóa phòng thành công!");
                }
                else {
                    $data = array( 'fail'  => "Xóa phòng thất bại. Lỗi không xác định!");
                }
                echo json_encode($data);
            }
        }
        public function check(){
            $model = $this -> model("BookingModel");
            $model -> DeleteBooking(3,'2020-09-09', '2020-09-10');
        }
        //Log out
        public function Logout(){
            session_destroy();
            header("Location: http://resortbeach.epizy.com/");
        }
    }
?>