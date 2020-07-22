<?php
    require_once "./mvc/view/Blocks/Loading.php";
    require_once "./mvc/view/Blocks/Header.php";
?>

<div id="body-d" class="wrap">

    <section style="background: url('data:image/jpg;charset=utf8;base64,<?php echo base64_encode($data["Room"]['mainimage']); ?>') 50%/cover no-repeat;" id="navnavnav" class="wrap-banner row">
        <div class="overlay">
            <h1 class="overlay-header">
                <?php
                   echo $data["Room"]['roomame']
                ?>
            </h1>
            <div class="line"></div>
            <div class="overlay-button">
                <a href="<?php echo ( $data["Dashboard"] );?>">Trang chủ</a>
            </div>
        </div>
    </section>
    
    <section data-aos="fade-down"  class="room-detail-gallery row">
        <?php
            for( $num = 1 ; $num <=3 ; $num++ ){
        ?>
            <div class="col-xs-12 col-sm-6 col-md-4 col-lg-4 mt-2 room-detail-gallery-img">
                <img src="data:image/jpg;charset=utf8;base64,<?php echo base64_encode($data["Imgs"]["image$num"]); ?>"
                alt="b">
            </div>
        <?php   
            }
        ?>
    </section>

    <section  class="room-detail-info row">

        <div class="col-xs-12 col-sm-12 col-md-7 col-lg-7">
                <h2>Mô tả</h2>
                <p>
                    <?php
                        echo $data["Room"]["discription"];
                    ?>
                </p>
        </div>
        
        <div class="col-xs-12 col-sm-12 col-md-5 col-lg-5">
                <h2>Thông tin</h2>
                <h4>Giá: <span>$<?php echo $data["Room"]["roomprice"]; ?></span></h4>
                <h4>Loại phòng: <span><?php echo $data["Type"]["roomtypename"]; ?></span></h4>
                <h4>Số người tối đa: <span><?php echo $data["Room"]["roomquanlity"]; ?></span></h4>
                <h4>Đánh giá: <?php echo $data["Room"]["roomrate"]; ?> <i class="fas fa-star"></i></h4>
                <h4><?php if($data["Room"]["allowpet"] == 1) echo "Cho"; else echo "Không cho"; ?> phép mang thú cưng</h4>
        </div>
        <div class="rent-now">
            <button id="bookingChoose">Đặt phòng ngay!</button>
                <div id="myModal" class="modal">

                <!-- Modal content -->
                <form method="post" id="booking" enctype="multipart/form-data" class="modal-content">
                    <div class="modal-header">
                    <h2>Đặt Phòng</h2><span class="close">&times;</span>
                    </div>
                    <div class="modal-body">
                        <div class="checkDate">
                            <div style="margin-bottom: 7%;" class="dateCheckGr">
                                <label>Ngày thuê phòng</label>
                                <input id="dateAr" type="date"
                                min="<?php $date=date_create(date("Y-m-d"));
                                    echo date_format($date,"Y-m-d"); ?>"
                                value="<?php echo date("Y-m-d"); ?>" 
                                name="dateArrive" require/>
                            </div>
                            <div class="dateCheckGr">
                                <label>Ngày trả phòng</label>
                                <input min="<?php $date=date_create(date("Y-m-d"));
                                    date_add($date,date_interval_create_from_date_string("1 days"));
                                    echo date_format($date,"Y-m-d"); ?>" id="dateLe" type="date" value="<?php echo date("Y-m-d");  ?>" name="dateLeave" require/>
                            </div>
                        </div>
                        <div class="pricebk">
                            <div>Giá: <span id="gia">0$</span></div>
                        </div>
                        <p id="success">Phòng vẫn còn trống !</p>
                        <p id="fail">Phòng đã có người đặt !</p>
                    </div>
                    <div class="modal-footer">
                        <button id="btnConfirm" type="submit">Xác nhận</button>
                    </div>
                </form>

                </div>
        </div>
    </section>

    <section class="room-other">
        <h1>Phòng cùng loại</h1>
        <div class="line"></div>
        <div class="slick">
            <?php
            $roomar = $data["SameType"];
                if( count($row = $data["RanNum"]) > 0 ) {
                    for ( $i = 0 ; $i < count($row) ; $i++ ){
                       $z = $row[$i];
            ?>
                <div class="slick-card">
                    <div class="sl-body">
                        <img src="data:image/jpg;charset=utf8;base64,<?php echo base64_encode($roomar[$z]["mainimage"]); ?>"
                        alt="<?php echo $roomar[$z]["roomame"] ?>">
                        <div class="sl-content">
                            <h2>
                                <?php echo $roomar[$z]["roomame"] ?>
                            </h2>
                            <p class="r-type">Loại phòng: <span  style="color: white"
                            class=" <?php
                                if( $data["Type"]["roomtypeid"] == "PHONGTHUONG" ) {
                                    echo "PhongThuongCSS";
                                }
                                if( $data["Type"]["roomtypeid"] == "PHONGVIP"  ) {
                                    echo "PhongVIPCSS";
                                }
                                if( $data["Type"]["roomtypeid"] == "PHONGGIADINH"  ) {
                                    echo "PhongGiaDinhCSS";
                                }
                            ?>"><?php echo $data["Type"]["roomtypename"]; ?></span></p>
                            <p class="r-rate">Đánh giá: <?php echo $roomar[$z]["roomrate"]?><i class="fas fa-star"></i></p>
                            <p class="r-pr">Giá phòng: <span>$<?php echo $roomar[$z]["roomprice"] ?></span></p>
                            <a href="<?php echo ( $data["Dashboard"] );?>/Room/RoomPage/roomdetail/<?php echo $roomar[$z]["roomid"]?>">Xem chi tiết</a>
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
    var pri = <?php echo $data["Room"]["roomprice"]; ?>;
    var roomIDD = <?php echo $data["Room"]["roomid"]; ?>;
    var userIDD = '<?php if( isset($_SESSION["userid"]) ) echo $_SESSION["userid"]; ?>';
    var dateLea = '<?php echo date("Y-m")."-".(int)(date("d")+1); ?>';
    var dateArr = '<?php echo date("Y-m-d"); ?>';
    var rname = '<?php echo $data["Room"]["roomame"]; ?>';
    /*Modal booking room */
    var modal = document.getElementById("myModal");
    var btn = document.getElementById("bookingChoose");
    var span = document.getElementsByClassName("close")[0];

    // When the user clicks the button, open the modal 
    btn.onclick = function() {
    modal.style.display = "block";
    }

    // When the user clicks on <span> (x), close the modal
    span.onclick = function() {
    modal.style.display = "none";
    }

    // When the user clicks anywhere outside of the modal, close it
    window.onclick = function(event) {
    if (event.target == modal) {
        modal.style.display = "none";
    }
    }
    //Handle nav
    $(document).ready(function(){
        //Slick
        $('.slick').slick({
        infinite: false,
        slidesToShow: 2,
        slidesToScroll: 2
    });
});
</script>
<script src="https://unpkg.com/aos@2.3.1/dist/aos.js"></script>
<script type="text/javascript" src=<?php echo ( $data["Dashboard"] . "/mvc/view/slick/slick.min.js");?>></script>
<script type="text/javascript" src=<?php echo ( $data["Dashboard"] . "/mvc/view/slick/slick.js");?>></script>
<script type="text/javascript" src=<?php echo ( $data["Dashboard"] . "/mvc/view/Js/room.js");?>></script>
<script type="text/javascript" src=<?php echo ( $data["Dashboard"] . "/mvc/view/Js/Master.js");?>></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>