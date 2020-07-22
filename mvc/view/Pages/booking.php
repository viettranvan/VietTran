<?php
require_once "./mvc/view/Blocks/Header.php";
require_once "./mvc/view/Blocks/Loading.php";
?>
<div id="body-d" class="wrap row">
<?php
    include_once "./mvc/view/Blocks/TabUser.php";
?>
<section style="z-index: 0;" class="col-xs-12 col-sm-8 col-md-9 col-lg-9 p-0">
        <div class="wrap-content-profile">
            <h2>Thông tin phòng đã đặt <?php if( $data["Bookings"] != 0) echo "( ".count($data["Bookings"])." )";  ?></h2>
            <?php
                if($data["Bookings"] == 0) {
                    echo '<div id="booking-alert">
                            <p>Bạn chưa đặt phòng nào ! Bạn có thể click   <a href="'.$data["Dashboard"].'/Room/RoomPage/totalroom"> vào đây </a>
                                để xem thêm phòng<span onclick="closeRoomAlert()">x</span></p>
                          </div>';
                }
            ?>
            <div class="booking-con-wrap">
                <div class="booking-container">
                    <!--If empty add class "empty"*/-->
                    <?php
                        if($data["Bookings"] == 0) {
                            echo '<div class="roomEmpty">
                                    <i class="far fa-sticky-note"></i>
                                    <p>Tất cả phòng đặt (0) </p>
                                </div>';
                        }
                    ?>
                    <div id="showBkDetail" class="booking-room-detail">
                        <?php if(isset($data["Bookings"])){
                                if($data["Bookings"] != 0) {
                                    for( $i = 0 ; $i < count($data["Bookings"]) ; $i++ ){
                                        $dt = $data["Bookings"][$i];
                                    ?>
                        <div class="booking-room-card">
                            <i onclick="deleteBking('<?php echo $dt['Room']['roomid'] ?>','<?php echo $dt['Booked']['datearrive'] ?>','<?php echo $dt['Booked']['dateleave'] ?>')" class="deleteR fas fa-times-circle"></i>
                            <img class="booking-img" 
                            src="data:image/jpg;charset=utf8;base64,<?php echo base64_encode($dt["Room"]['mainimage']); ?>"
                            alt="<?php echo $dt["Room"]["roomame"]; ?>"/>
                            <div class="booking-room-card-content">
                                <a href="<?php echo ( $data["Dashboard"] );?>/Room/RoomPage/roomdetail/<?php echo $dt["Room"]['roomid'] ?>">
                                <span class="
                                <?php
                                    if( $dt["Room"]["roomtypeid"] == "PHONGTHUONG" ) {
                                        echo "PhongThuongCSS";
                                    }
                                    if( $dt["Room"]["roomtypeid"] == "PHONGVIP"  ) {
                                        echo "PhongVIPCSS";
                                    }
                                    if( $dt["Room"]["roomtypeid"] == "PHONGGIADINH"  ) {
                                        echo "PhongGiaDinhCSS";
                                    }
                                ?>">  
                                    <?php
                                     
                                        if( $dt["Room"]["roomtypeid"] == "PHONGTHUONG" ) {
                                            echo "Phòng Thường";
                                        }
                                        if( $dt["Room"]["roomtypeid"] == "PHONGVIP"  ) {
                                            echo "Phòng V.I.P";
                                        }
                                        if( $dt["Room"]["roomtypeid"] == "PHONGGIADINH"  ) {
                                            echo "Phòng Gia Đình";
                                        }
                                    ?>
                                </span><?php echo $dt["Room"]["roomame"]; ?></a>
                                <div class="room-card-option">
                                    <i class="fas fa-users"></i>
                                    Số người: <span><?php echo $dt["Room"]["roomquanlity"] ?></span>
                                </div>
                                <div class="room-card-checking">
                                    <div>
                                        Check in: <span><?php echo $dt["Booked"]["datearrive"] ?></span>
                                    </div>
                                    <div>
                                        Check out: <span><?php echo $dt["Booked"]["dateleave"] ?></span>
                                    </div> 
                                </div>
                                <div class="room-card-discription">
                                    <p>
                                        <?php
                                            echo substr( $dt["Room"]["discription"], 0, 100);
                                        ?>...
                                    </p>
                                </div>
                            </div>
                            <div class="booking-room-card-price">
                                <div class="booking-card-rate">
                                    <p>Điểm đánh giá:</p> <span><?php echo $dt["Room"]["roomrate"] ?></span>
                                </div>
                                <div class="booking-card-price">
                                    <p id="bk-title">Tổng giá: </p>
                                    <p>$.<?php echo $dt["RoomOnlyPr"] ?></p>
                                </div>
                            </div>
                        </div>
                        <?php       
                                    }
                                }
                            }
                        ?>

                    </div>
                </div>
                <?php
                    if($data["Bookings"] != 0) {
                        echo '<div class="booking-cash">
                                <h3>Tổng thanh toán: </h3> <span>$.'.$data["TotalPrice"].'</span>
                                <button>Thanh toán</button>
                              </div>';
                    }
                ?>
            </div>
        </div>
</section>
    
</div>
<?php
require_once "./mvc/view/Blocks/Footer.php";
?>
<script>
</script>
<script type="text/javascript" src=<?php echo ( $data["Dashboard"] . "/mvc/view/Js/profile.js");?>></script>
<script type="text/javascript" src=<?php echo ( $data["Dashboard"] . "/mvc/view/Js/Master.js");?>></script>
