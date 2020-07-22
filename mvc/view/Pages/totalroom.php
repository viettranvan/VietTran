<?php
    require_once "./mvc/view/Blocks/Loading.php";
    require_once "./mvc/view/Blocks/Header.php";
?>
<?php   
    $result = $data["Rooms"];
?>
<div id="body-d" class="wrap">

    <section id="navnavnav"
    style="background: url('<?php
        if(isset($data["RoomType"])){
            echo 'data:image/jpg;charset=utf8;base64,'.base64_encode($data["RoomType"]["roomtypeimg"]).'';
        } else echo $data["Dashboard"] ."/public/bg1.jpg"; ?>') 50%/cover no-repeat;"
    class="wrap-banner row">
        <div class="overlay">
            <h1 class="overlay-header"><?php
                if( $data["PageType"] != "all" ) {
                    switch($data["PageType"]){
                        case "PHONGTHUONG" :
                            echo "Phòng Thường";
                        break;
                        case "PHONGVIP" :
                            echo "Phòng V.I.P";
                        break;
                        case "PHONGGIADINH" :
                            echo "Phòng Gia Đình";
                        break;
                    }
                }
                else {
                    echo "Tất Cả Phòng";
                }
            ?></h1>
            <div class="line"></div>
            <div class="overlay-button">
                <a href="<?php echo ( $data["Dashboard"] );?>">Trang chủ</a>
            </div>
        </div>
    </section>

    <section data-aos="fade-down" class="search-room row">
        <div class="search-room-header">
            <h1>Tìm phòng</h1>
            <div class="line"></div>
        </div>
        <div class="search-room-body">
                <div class="col-xs-12 col-sm-6 col-md-4 col-lg-3">
                    <div class="frm-group">
                        <label for = "name">Tìm theo tên: </label>
                        <input id = "filterName" type="text" placeholder="Tên phòng...">
                    </div>
                </div>
                
                <div class="col-xs-12 col-sm-6 col-md-4 col-lg-3">
                    <div class="frm-group">
                        <label for = "type">Tìm theo loại: </label>
                        <select 
                        <?php
                            if($data["PageType"] == "PHONGVIP" || $data["PageType"] == "PHONGTHUONG" || $data["PageType"] == "PHONGGIADINH")
                            echo "disabled"; 
                        ?> 
                        class="common_selector" id="filterType">
                            <?php
                                $vip = $gd = $thuong = "";
                                if($data["PageType"] == "PHONGVIP") $vip = "selected";
                                if($data["PageType"] == "PHONGTHUONG") $thuong = "selected";
                                if($data["PageType"] == "PHONGGIADINH") $gd = "selected";
                            ?>
                            <option value="all">Tất cả</option>
                            <option <?php echo $vip; ?> value="PHONGVIP">Phòng V.I.P</option>
                            <option <?php echo $gd; ?> value="PHONGGIADINH">Phòng gia đình</option>
                            <option <?php echo $thuong; ?> value="PHONGTHUONG">Phòng thường</option>
                        </select>
                    </div>
                </div>
                
                <div class="col-xs-12 col-sm-6 col-md-4 col-lg-3">
                    <div class="frm-group">
                        <label for = "name">Tìm theo giá: <span id="labelPrice"></span></label>
                        <input class="common_selector" id="inputPrice" name = "price" value="2000" type="range" max="2000" min="0">
                    </div>
                </div>
                <div class="col-xs-12 col-sm-6 col-md-4 col-lg-3">
                    <div class="frm-group">
                        <label for ="rating">Số người tối đa: </label>
                        <select class="common_selector" id="filterMaxNum">
                            <option value="all">Tất cả</option>
                            <option value="1">1 người</option>
                            <option value="2">2 người</option>
                            <option value="5">5 người</option>
                            <option value="10">10 người</option>
                            <option value="20">20 người</option>
                        </select>
                    </div>
                </div>
        </div>
    </section>
    
    <section data-aos="fade-down" class="room-list row">
        <div class="room-list-header ">
            <h1>Tất cả phòng</h1>
            <div class="line"></div>
        </div>


        <div class="room-sort-view ">
                <div class="room-sort">
                    <h4>Sắp xếp: </h4>
                    <span>
                    <select id="Rsort">
                        <option value="AZ">
                            Theo tên A-Z
                        </option>
                        <option  value="ZA">
                            Theo tên Z-A
                        </option>
                        <option value="priceDownUp">
                            Theo giá thấp lên cao
                        </option>
                        <option value="priceUpDown">
                            Theo giá cao xuống thấp
                        </option>
                        <option value="rate">
                            Theo đánh giá
                        </option>
                        </select>
                    </span>
                </div>
                <div class="room-view">
                    <h4>Xem: </h4>
                    <span>
                    <i id="listViewbtn" class="fas fa-th-list"></i>
                    <i id="gridViewbtn" class="viewActive  fas fa-th-large"></i>
                    </span>
                </div>
        </div>

        <div id="view" class=" room-list-body">
            <?php  
                if( $data["Rooms"] != NULL ) {
                    for ( $i = 0 ; $i < count($data["Rooms"]) ; $i ++ ) {
                        $row = $data["Rooms"];
                         
            ?>
            
            <div class="col-xs-12 col-sm-6 col-md-4 col-lg-4 mt-4">
                <div class="room-list-card">
                    <div class="room-list-card-body">
                    <img class="imgV" alt="<?php echo $row[$i]['roomame'] ?>"
                    src="data:image/jpg;charset=utf8;base64,<?php echo base64_encode($row[$i]['mainimage']); ?>" /> 
                        <div class="room-list-top">
                            <div class="room-list-price-top">
                                <h6>$<?php echo $row[$i]["roomprice"] ?></h6>
                                <p>mỗi đêm</p>
                            </div>
                            <div class="room-list-rate-top">
                               <?php echo $row[$i]["roomrate"]; ?>  <i class="fas fa-star"></i>
                            </div>
                        </div>
                        <div class="room-list-overlay">
                            <a href="<?php echo ( $data["Dashboard"] );?>/Room/RoomPage/roomdetail/<?php echo $row[$i]['roomid'] ?>" >Xem chi tiết</a>
                        </div>
                    </div>
                    <div class="room-list-foot">
                        <span class="<?php
                            if( $row[$i]["roomtypeid"] == "PHONGTHUONG" ) {
                                echo "PhongThuongCSS";
                            }
                            if( $row[$i]["roomtypeid"] == "PHONGVIP"  ) {
                                echo "PhongVIPCSS";
                            }
                            if( $row[$i]["roomtypeid"] == "PHONGGIADINH"  ) {
                                echo "PhongGiaDinhCSS";
                            }
                        ?>">
                            <?php 
                                if( $row[$i]["roomtypeid"]  == "PHONGVIP") echo "Phòng V.I.P";
                                if( $row[$i]["roomtypeid"]  == "PHONGTHUONG") echo "Phòng Thường";
                                if( $row[$i]["roomtypeid"]  == "PHONGGIADINH") echo "Phòng Gia Đình"; 
                            ?>
                        </span><?php echo $row[$i]["roomame"] ?>
                    </div>
                </div>
            </div>
            <?php     
                    }
                }
            ?>

    


        </div>
        
    </section>
</div>
<a target="_blank" href="https://www.facebook.com/huu.van.20x" class="messenger"><i  class="fab fa-facebook-messenger"></i></a>
<?php
require_once "./mvc/view/Blocks/Footer.php";
?>
<script>
    typeTotal = '<?php echo $data["PageType"] ?>';
</script>
<script src="https://unpkg.com/aos@2.3.1/dist/aos.js"></script>
<script type="text/javascript" src=<?php echo ( $data["Dashboard"] . "/mvc/view/Js/room.js");?>></script>
<script type="text/javascript" src=<?php echo ( $data["Dashboard"] . "/mvc/view/Js/Master.js");?>></script>