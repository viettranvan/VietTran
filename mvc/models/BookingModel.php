<?php
    class BookingModel extends DB {
        public function insertBooking($dateArrive, $dateLeave, $userID, $roomID, $price) {
            $conn = $this -> __construct();
            $conn->set_charset("utf8");
            $hours = (string)date("h");
            $dateTime = date("Y-m-d")."  ".$hours[0].(int)($hours[1] + 5).":".date("i:s") ;
            $sql = "INSERT INTO `booking`(`userid`, `roomid`, `datearrive`, `dateleave`, `price`,`bookingdetail`) VALUES ($userID,$roomID,'$dateArrive','$dateLeave',$price,'$dateTime')";
            try {
                if ( mysqli_query($conn, $sql) ) {
                    $this -> closeConnection();
                    return true;
                }
                else {
                    $this -> closeConnection();
                    return false;
                }
            }
            catch( Exception $e) {
                echo "Something was wrong". $e;
            }
        }
        //get all room's date was booked by user
        private function getAllRoomBooking($roomID) {
            $conn = $this -> __construct();
            $conn->set_charset("utf8");
            $sql = "SELECT datearrive, dateleave FROM booking WHERE roomid = $roomID";
            try {
                if ( $result = mysqli_query($conn, $sql) ){
                    if( mysqli_num_rows($result) > 0 ) {
                        $array = array();
                        while($row = $result -> fetch_assoc()) {
                            array_push($array,$row);
                        }
                        return $array;
                    }
                    if( mysqli_num_rows($result) == 0 ) {
                       return "validate";
                    }
                }
            }
            catch ( Exception $e ) {
                $this -> closeConnection();
                echo "Some thing was wrong! ".$e;
            }
        }
        //Function Compare date to check validate date
        private function CompareValidateDate( $dateArray, $dateArrive, $dateLeave ){
            $num = count($dateArray);
            $numCheck = 0 ;
            for ( $i = 0; $i < $num ; $i++ ) {
                if ( (strtotime($dateArrive) < strtotime($dateArray[$i]["datearrive"]) 
                && strtotime($dateLeave) < strtotime($dateArray[$i]["datearrive"]) ) 
                || 
                (strtotime($dateArrive) > strtotime($dateArray[$i]["dateleave"]) 
                && strtotime($dateLeave) > strtotime($dateArray[$i]["dateleave"])) ){
                    $numCheck++;
                }
            }
            if( strtotime($dateArrive) == strtotime($dateLeave)  ) {
                return false;
            }
            if( $numCheck == $num ) {
                return true;
            }
            else {
                return false;
            }
        }
        public function checkDateValidate($roomID, $dateArrive, $dateLeave){
            $validate = $this -> getAllRoomBooking($roomID);
            if ( $validate == "validate" ) {
                return true;
            }
            else {
                return $this->CompareValidateDate($validate,$dateArrive,$dateLeave);
            }
        }
        //Function close connection
        public function closeConnection(){
            $conn = $this -> __construct();
            return mysqli_close($conn);
        }
        //Delete Booking Room
        public function DeleteBooking($roomID,$dateArr,$dateLea) {
            $conn = $this -> __construct();
            $conn->set_charset("utf8");
            $sql = "DELETE FROM booking WHERE roomid = $roomID AND datearrive = '$dateArr' AND dateleave = '$dateLea' LIMIT 1";
            try {
                if ( $result = mysqli_query($conn, $sql) ){
                    if( $result ) {
                        return true;
                    }
                    else return false;
                }
                else return false;
            }
            catch( Exception $e ) {
                echo "Some thing was wrong!".$e;
            }
        }

    }
?>