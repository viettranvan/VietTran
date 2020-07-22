<?php
include_once("./mvc/models/BookingModel.php");
class Room extends Controller {  
    public $test;
    //Room main page
    public function RoomPage($page,$id = NULL ){
        switch( $page ){
            case "totalroom":
                    if ( $id != NULL ) {
                        $this -> TotalRoom($id);
                    } 
                    else {
                        $this -> TotalRoom("all");
                    }
                break;
            case "roomdetail":
                    if ( $id != NULL ) {
                        $this -> Roomdetail($id);
                    } 
                    else {
                        require_once "./mvc/controllers/NotFound.php";
                        $NotFound = new NotFound();
                        $NotFound -> NotFoundPage();
                    }
                break;
        }
    }    
    //Page total all room
    public function TotalRoom($id){  
        try{
            switch( $id ) {
                case 'PHONGTHUONG':
                    $this -> RoomPerType($id);
                    break;
                case 'PHONGVIP':
                    $this -> RoomPerType($id);
                    break;
                case 'PHONGGIADINH':
                    $this -> RoomPerType($id);
                    break;
                case 'all':
                        $model = $this -> model("RoomsModel");
                        $room = $model -> getRooms();
                        $rooms = array();
                        while($row = $room->fetch_assoc())  {
                            array_push($rooms,$row);
                        }
                        $tmp = array_column($rooms, 'roomame');
                        array_multisort($tmp, SORT_ASC, $rooms);
                        $this -> view("RoomPage",["Dashboard" => $this->dashboard,"Page" => "totalroom", "Rooms" => $rooms, "PageType" => "all"]);
                    break;
                default:
                    require_once "./mvc/controllers/NotFound.php";
                    $NotFound = new NotFound();
                    $NotFound -> NotFoundPage();            
                    break;
                
            }
        }
        catch( Exception $e ) {
            echo "Some thing was wrong: ". $e;
        }
    }
    //Page total room PER TYPE
    protected function RoomPerType($id){
        try {
            $model = $this -> model("RoomsModel");
            $roomTypeModel = $this -> model("RoomTypeModel");
            $room = $model -> getRoomsPerType($id);
            $rooms = array();
            while($row = $room->fetch_assoc())  {
                array_push($rooms,$row);
            }
            $tmp = array_column($rooms, 'roomame');
            array_multisort($tmp, SORT_DESC, $rooms);
            $TypeImage = $roomTypeModel -> getRoomType($id);
            $RoomTypeIMG = $TypeImage -> fetch_assoc(); 
            $this -> view("RoomPage",["Dashboard" => $this->dashboard,"Page" => "totalroom", "Rooms" => $rooms,"PageType" => $id, "RoomType" => $RoomTypeIMG]);
        }
        catch( Exception $e ) {
            echo "Some thing was wrong:".$e;
        }
    }
    //Page room detail
    protected function Roomdetail($id){   
        $check = false;
        try {
            $model = $this -> model("RoomsModel");
            //check exits room
            $allID = $model -> getAllRoomID();
            while($row = $allID -> fetch_assoc() ) {
                if( (int)$id == (int)$row["roomid"] ) {
                    $check = true;
                }
            }
            if( $check ) {
                //get room information
                $roominfor = $model -> getRoomInfor($id);
                $roomInformation = $roominfor -> fetch_assoc();
                //get room type name
                $roomtypename = $model -> getRoomType($roomInformation["roomtypeid"]);
                $type = $roomtypename -> fetch_assoc();
                //get room list images
                $img = $model -> getRoomImage($id);
                $imgs = NULL;
                while($row = $img -> fetch_assoc() ) {
                    $imgs = $row;
                }
                //get the same Room
                
                $RTypeArray = array();
                //var_dump($type);
                $allRoom = $model -> getRoomsPerType($roomInformation["roomtypeid"]);
                $i = 0;
                $a = NULL;
                while ( $roomtyperow = $allRoom -> fetch_assoc() ) {
                    if( $roomInformation["roomid"] == $roomtyperow["roomid"] ) {
                        $a = $i;
                    }
                    $i++;
                    array_push($RTypeArray, $roomtyperow);
                }
                unset($RTypeArray[$a]);
                $ar = array_values($RTypeArray);
                $randomNum=array_rand($ar,4);
                $this -> view("RoomPage",["Dashboard" => $this->dashboard,"Page" => "roomdetail","Room" => $roomInformation,"Imgs" => $imgs,"Type" => $type ,"SameType" => $ar, "RanNum" => $randomNum]);
            }
            else {
                require_once "./mvc/controllers/NotFound.php";
                $NotFound = new NotFound();
                $NotFound -> NotFoundPage();
            }
        }
        catch(Exception $e) {
            echo "Something was wrong";
        }
    }
    //test input
    protected function test_input($data) {
        $data = trim($data);                    //strip unnecessary characters
        $data = stripslashes($data);            //remove backslashes
        $data = htmlspecialchars($data);        //Escape htmlSpecialChar
        return $data;
    }
    //Insert Booking
    public function InsertBooking(){
        try {
            $data = NULL;
            $dateArrive = $dateLeave = $userID = $roomID = $price ="";
            if ($_SERVER["REQUEST_METHOD"] == "POST") {
                if( isset($_SESSION["user"]) ) {
                    $dateArrive = $this -> test_input($_POST["dateArrive"]);
                    $dateLeave = $this -> test_input($_POST["dateLeave"]);
                    $userID = $this -> test_input($_POST["userID"]);
                    $roomID = $this -> test_input($_POST["roomID"]);
                    $price = $this -> test_input($_POST["price"]);
                    $model = new BookingModel();
                    $check = $model -> checkDateValidate($roomID, $dateArrive, $dateLeave);
                        if ( $check == true   ) {
                            $bool = $model -> insertBooking($dateArrive, $dateLeave, $userID, $roomID, $price);
                            if ( $bool ){
                                require_once "./mvc/models/RoomsModel.php";
                                $m = new RoomsModel();
                                $m -> insertPopularRoom($roomID);
                                $data = array( 'success'  => "Đã đặt phòng");
                            }
                            else {
                                $data = array( 'fail'  => "Có lỗi khi đặt phòng");
                            }
                        }
                        else {
                            $data = array( "fail" => "Sai định dạng ngày hoặc đã phòng đã được đặt");
                        }
                }
                else {
                    $data = array( "fail" => "Bạn chưa đăng nhập! Hãy đăng nhập để đặt phòng");
                }
                echo json_encode($data);
            }
        }
        catch( Exception $e) {
            echo "Something was wrong".$e;
        }
    }
    public function CheckRoomDate() {
        try {
            $data = NULL ;
            if ($_SERVER["REQUEST_METHOD"] == "POST") {
                $dateArrive = $this -> test_input($_POST["dateArrive"]);
                $dateLeave = $this -> test_input($_POST["dateLeave"]);
                $roomID = $this -> test_input($_POST["roomID"]);
                $model = new BookingModel();
                $check = $model -> checkDateValidate($roomID, $dateArrive, $dateLeave);
                if ( $check ){
                    $data = array( 'success'  => "Da them");
                }
                else {
                    $data = array( 'fail'  => $check);
                }
            }
            echo json_encode($data);
        }
        catch ( Exception $e ) {
            echo "Some thing was wrong! ".$e;
        }
    }
    private function sortQuery( $page,$filterName,$filterType,$inputPrice,$filterMaxNum) {
        $model = $this -> model("RoomsModel");
        if ( $page != "all" ) {
            return $model -> getRoomPerTypeStatement($page,$filterName,$filterType,$inputPrice,$filterMaxNum);
        }
        else {
            return $model -> getRoomsStatement($filterName,$filterType,$inputPrice,$filterMaxNum);
        }
    }
    private function displaySort($display, $arr ){
        for ( $i = 0 ; $i < count($arr) ; $i++ ) {
            $typeR = NULL;
            $cssR = "";
                if( $arr[$i]['roomtypeid'] == "PHONGTHUONG" ){
                    $typeR = "Phòng Thường";
                    $cssR = "PhongThuongCSS";
                }
                if( $arr[$i]['roomtypeid'] == "PHONGVIP" ){
                    $typeR = "Phòng V.I.P";
                    $cssR = "PhongVIPCSS";
                }
                if( $arr[$i]['roomtypeid'] == "PHONGGIADINH" ){
                    $typeR = "Phòng Gia Đình";
                    $cssR = "PhongGiaDinhCSS";
                }
            if( $display == "grid" ) {
                echo '<div class="col-xs-12 col-sm-6 col-md-4 col-lg-4 mt-4">
                <div class="room-list-card">
                    <div class="room-list-card-body">
                    <img class="imgV" alt="'.$arr[$i]['roomame'].'"
                    src="data:image/jpg;charset=utf8;base64,'.base64_encode($arr[$i]['mainimage']).'" /> 
                        <div class="room-list-top">
                            <div class="room-list-price-top">
                                <h6>$'.$arr[$i]['roomprice'].'</h6>
                                <p>mỗi đêm</p>
                            </div>
                            <div class="room-list-rate-top">
                                '.$arr[$i]['roomrate'].' <i class="fas fa-star"></i>
                            </div>
                        </div>
                        <div class="room-list-overlay">
                            <a href="'.$this -> dashboard.'/Room/RoomPage/roomdetail/'.$arr[$i]['roomid'].'" >Xem chi tiết</a>
                        </div>
                    </div>
                    <div class="room-list-foot">
                        <span class="'.$cssR.'">'.$typeR.'</span>'.$arr[$i]['roomame'].'
                    </div>
                </div>
                </div>';
            }
            if ( $display == "list" ) {
                echo '<a class="btnListV" href="'.$this -> dashboard.'/Room/RoomPage/roomdetail/'.$arr[$i]['roomid'].'">
                <div class="room-list-body-listview">
                    <img class="room-img" src="data:image/jpg;charset=utf8;base64,'.base64_encode($arr[$i]['mainimage']).'" 
                    alt="'.$arr[$i]['roomame'].'"/>
                    <div class="room-card-content">
                        <h3><span class="'.$cssR.'">'.$typeR.'</span>'.$arr[$i]['roomame'].'</h3>
                        <div class="room-card-option">
                            <i class="fas fa-users"></i>
                            Số người: <span>'.$arr[$i]['roomquanlity'].'</span>
                        </div>
                        <div class="room-card-discription">
                            <p>
                            '.substr($arr[$i]['discription'], 0, 1000).'
                            </p>
                        </div>
                    </div>
                    <div class="room-card-price">
                                <div class="room-card-rate">
                                    <p>Đánh giá:</p> <span>'.$arr[$i]['roomrate'].'</span>
                                </div>
                                <div class="room-card-price">
                                    <p id="bk-title">Giá: </p>
                                    <p>$.'.$arr[$i]['roomprice'].'</p>
                                </div>
                            </div>
                        </div>
                    </a>' ;
            }
        }
    }
    public function RoomSort(){
        try {
            if( $_SERVER["REQUEST_METHOD"] == "POST" ) {
                $filterName = $filterType = $inputPrice = $filterMaxNum = "";
                if(isset($_POST["filterName"])) {
                    $filterName = $_POST["filterName"];
                }
                if(isset($_POST["filterType"])) {
                    $filterType = $_POST["filterType"];
                }
                if(isset($_POST["inputPrice"])) {
                    $inputPrice = $_POST["inputPrice"];
                }
                if(isset($_POST["filterMaxNum"])) {
                    $filterMaxNum = $_POST["filterMaxNum"];
                }
                $this -> onSort($_POST["action"], $_POST["type"], $_POST["display"],$filterName,$filterType,$inputPrice,$filterMaxNum);
            }
        }
        catch(Exception $e) {
            echo "Something was wrong!".$e;
        }
    }
    public function onSort($action,$type,$display,$filterName,$filterType,$inputPrice,$filterMaxNum){
        switch( $action ) {
            case "AZ":
                $rs = $this -> sortQuery( $type,$filterName,$filterType,$inputPrice,$filterMaxNum );
                $arr = array();
                if( $rs == "no query" ) {
                    echo '<div id="nodtaa" style="" ></div>
                            <br>
                          <h2>Không có dữ liệu</h2>';
                }
                else {
                    while($row = $rs->fetch_assoc())  {
                        array_push($arr, $row);
                    }
                    $price = array_column($arr, 'roomame');
                    array_multisort($price, SORT_ASC, $arr);
                    $this -> displaySort($display, $arr);
                }
                break;
            case "ZA":
                $rs = $this -> sortQuery( $type,$filterName,$filterType,$inputPrice,$filterMaxNum );
                $arr = array();
                if( $rs == "no query" ) {
                    echo '<div id="nodtaa" style="" ></div>
                            <br>
                          <h2>Không có dữ liệu</h2>';
                }
                else {
                    while($row = $rs->fetch_assoc())  { 
                        array_push($arr, $row);
                    }
                    $price = array_column($arr, 'roomame');
                    array_multisort($price, SORT_DESC, $arr);
                    $this -> displaySort($display, $arr);
                }
                
                break;
            case "priceDownUp" :    
                $rs = $this -> sortQuery( $type,$filterName,$filterType,$inputPrice,$filterMaxNum );
                $arr = array();
                if( $rs == "no query" ) {
                    echo '<div id="nodtaa" style="" ></div>
                            <br>
                          <h2>Không có dữ liệu</h2>';
                }
                else {
                    while($row = $rs->fetch_assoc())  {
                        array_push($arr, $row);
                    }
                    $price = array_column($arr, 'roomprice');
                    array_multisort($price, SORT_ASC, $arr);
                    $this -> displaySort($display, $arr);
                }
                break;
            case "priceUpDown":
                $rs = $this -> sortQuery( $type,$filterName,$filterType,$inputPrice,$filterMaxNum );
                $arr = array();
                if( $rs == "no query" ) {
                    echo '<div id="nodtaa" style="" ></div>
                            <br>
                          <h2>Không có dữ liệu</h2>';
                }
                else {
                    while($row = $rs->fetch_assoc())  {
                        array_push($arr, $row);
                    }
                    $price = array_column($arr, 'roomprice');
                    array_multisort($price, SORT_DESC, $arr);
                    $this -> displaySort($display, $arr);
                }
                break;
            case "rate":
                $rs = $this -> sortQuery( $type,$filterName,$filterType,$inputPrice,$filterMaxNum );
                $arr = array();
                if( $rs == "no query" ) {
                    echo '<div id="nodtaa" style="" ></div>
                            <br>
                          <h2>Không có dữ liệu</h2>';
                }
                else {
                    while($row = $rs->fetch_assoc())  {
                        array_push($arr, $row);
                    }
                    $price = array_column($arr, 'roomrate');
                    array_multisort($price, SORT_DESC, $arr);
                    $this -> displaySort($display, $arr);
                }
                break;
        }
    }
    public function check($a){
        echo $a;
    }
}
?>