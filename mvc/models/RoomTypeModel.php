<?php
    class RoomTypeModel extends DB{
        //get All RoomType
        public function getAllRoomType(){
            try {
                $conn = $this -> __construct();
                $sql = "SELECT * FROM `roomtype` WHERE 1 ";
                $conn->set_charset("utf8");
                if( $result = $conn -> query($sql) ) 
                {
                    if( $result -> num_rows > 0) {
                        $this -> closeConnection();
                        return $result;
                    }
                }
            }
            catch( Exception $e ){
                echo "Something was wrong".$e;
            }
        }
        //Function close connection
        public function closeConnection(){
            $conn = $this -> __construct();
            return mysqli_close($conn);
        }
        //funcion get RoomType main image
        public function getRoomType($roomtypeID){
            try {
                $conn = $this -> __construct();
                $conn->set_charset("utf8");
                $sql = "SELECT * FROM `roomtype` WHERE roomtypeid='$roomtypeID' ";
                if( $result = $conn -> query($sql) ) 
                {
                    if( $result -> num_rows > 0) {
                        $this -> closeConnection();
                        return $result;
                    }
                }
            }
            catch( Exception $e ){
                echo "Something was wrong".$e;
            }
        }
    }
?>