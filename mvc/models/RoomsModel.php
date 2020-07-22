<?php
    class RoomsModel extends DB{
        //get All rooms
        public function getRooms(){
            $conn = $this -> __construct();
            $conn->set_charset("utf8");
            $sql = "SELECT * FROM room";
            try {
                if ( $result = $conn -> query($sql) ) {
                    if( $result -> num_rows > 0 ) {
                        $this -> closeConnection();
                        return $result;
                    }
                }
            }
            catch( Exception $e) {
                echo "Something was wrong". $e;
            }
        }
        //get room per type
        public function getRoomsPerType( $typeid ){
            $conn = $this -> __construct();
            $conn->set_charset("utf8");
            $sql = "SELECT * FROM room WHERE room.roomtypeid = '$typeid'";
            try {
                if ( $result = $conn -> query($sql) ) {
                    if( $result -> num_rows > 0 ) {
                        $this -> closeConnection();
                        return $result;
                    }
                }
            }
            catch( Exception $e) {
                echo "Something was wrong". $e;
            }
        }
        //get Room Per Type And Per Statement Find 
        public function getRoomPerTypeStatement( $typeid,$filterName,$filterType,$inputPrice,$filterMaxNum ){
            $conn = $this -> __construct();
            $conn->set_charset("utf8");
                $sql = "SELECT * FROM room WHERE room.roomtypeid = '$typeid'";
            if( $filterName != "" ) {
                $sql .= " AND room.roomame = '".$filterName."'";  
            }
            if( $filterType != "all" && $filterType != "" ) {
                $sql .= " AND room.roomtypeid = '".$filterType."'";  
            }
            else {
                $sql .= " AND 1";  
            }
            if( $inputPrice >= 0 ) {
                $inputPrice = (int)$inputPrice;
                $sql .= " AND room.roomprice <= $inputPrice";  
            }
            if( $filterMaxNum != "all" ) {
                $filterMaxNum = (int)$filterMaxNum;
                $sql .= " AND room.roomquanlity <= $filterMaxNum";  
            }
            try {
                if ( $result = $conn -> query($sql) ) {
                    if( $result->num_rows > 0 ) {
                        $this -> closeConnection();
                        return $result;
                    }
                    else {
                        return "no query";
                    }
                }
            }
            catch( Exception $e) {
                echo "Something was wrong". $e;
            }
        }
        //get All room with statement
        public function getRoomsStatement($filterName,$filterType,$inputPrice,$filterMaxNum ){
            $conn = $this -> __construct();
            $conn->set_charset("utf8");
                $sql = "SELECT * FROM room WHERE 1";
            if( $filterName != "" ) {
                $sql .= " AND room.roomame = '".$filterName."'";  
            }
            if( $filterType != "all" && $filterType != "" ) {
                $sql .= " AND room.roomtypeid = '".$filterType."'";  
            }
            else {
                $sql .= " AND 1";  
            }
            if( $inputPrice >= 0 ) {
                $inputPrice = (int)$inputPrice;
                $sql .= " AND room.roomprice <= $inputPrice";  
            }
            if( $filterMaxNum != "all" ) {
                $filterMaxNum = (int)$filterMaxNum;
                $sql .= " AND room.roomquanlity <= $filterMaxNum";  
            }
            try {
                if ( $result = $conn -> query($sql) ) {
                    if( $result->num_rows > 0 ) {
                        $this -> closeConnection();
                        return $result;
                    }
                    else {
                        return "no query";
                    }
                }
            }
            catch( Exception $e) {
                echo "Something was wrong". $e;
            }
        }
        //get Room Type
        public function getRoomType( $roomtypeID ){
            $conn = $this -> __construct();
            $conn->set_charset("utf8");
            $sql = "SELECT * FROM `roomtype` INNER JOIN room WHERE roomtype.roomtypeid = '$roomtypeID'";
            try {
                if ( $result = $conn -> query($sql) ) {
                    if( $result -> num_rows > 0 ) {
                        $this -> closeConnection();
                        return $result;
                    }
                }
            }
            catch( Exception $e) {
                echo "Something was wrong". $e;
            }
        }
        //get Room Image
        public function getRoomImage( $roomID ){
            $conn = $this -> __construct();
            $conn->set_charset("utf8");
            $sql = "SELECT roomimage.image1,roomimage.image2,roomimage.image3 FROM `roomimage` INNER JOIN room WHERE roomimage.roomid = '$roomID'";
            try {
                if ( $result = $conn -> query($sql) ) {
                    if( $result -> num_rows > 0 ) {
                        $this -> closeConnection();
                        return $result;
                    }
                }
            }
            catch( Exception $e) {
                echo "Something was wrong". $e;
            }
        }
        //get All Room ID 
        public function getAllRoomID(){
            $conn = $this -> __construct();
            $conn->set_charset("utf8");
            $sql = "SELECT room.roomid FROM `room` WHERE 1";
            try {
                if ( $result = $conn -> query($sql) ) {
                    if( $result -> num_rows > 0 ) {
                        $this -> closeConnection();
                        return $result;
                    }
                }
            }
            catch( Exception $e) {
                echo "Something was wrong". $e;
            }
        }
        //get Room Main Image
        public function getRoomInfor( $roomID ){
            $conn = $this -> __construct();
            $conn->set_charset("utf8");
            $sql = "SELECT * FROM `room` WHERE room.roomid = '$roomID'";
            try {
                if ( $result = $conn -> query($sql) ) {
                    if( $result -> num_rows > 0 ) {
                        $this -> closeConnection();
                        return $result;
                    }
                }
            }
            catch( Exception $e) {
                echo "Something was wrong". $e;
            }
        }
        //Function close connection
        public function closeConnection(){
            $conn = $this -> __construct();
            return mysqli_close($conn);
        }
        public function getPopularRoom() {
            $conn = $this -> __construct();
            $conn->set_charset("utf8");
            $sql = "SELECT * FROM room ORDER BY room.popular DESC";
            try {
                if( $result = $conn -> query($sql) ) 
                {
                    if( $result -> num_rows > 0) {
                        $this -> closeConnection();
                        return $result;
                    }
                }
            }
            catch( Exception $e) {
                echo "Something was wrong". $e;
            }
        }
        public function insertPopularRoom($roomID) {
            $conn = $this -> __construct();
            $conn->set_charset("utf8");
            $sql = "UPDATE room SET room.popular = room.popular + 1 WHERE roomid = $roomID";
            try { 
                if ( mysqli_query($conn, $sql) ) {
                   return true;
                }
                else 
                return false;
            }
            catch( Exception $e) {
                echo "Something was wrong". $e;
            }
        }
        public function getRoomNews() {
            $conn = $this -> __construct();
            $conn->set_charset("utf8");
            $sql = "SELECT * FROM room ORDER BY room.roomnew DESC";
            try {
                if( $result = $conn -> query($sql) ) 
                {
                    if( $result -> num_rows > 0) {
                        $this -> closeConnection();
                        return $result;
                    }
                }
            }
            catch( Exception $e) {
                echo "Something was wrong". $e;
            }
        }
    }
?>