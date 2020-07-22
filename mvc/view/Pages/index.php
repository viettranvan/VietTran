

<?php
require_once "./mvc/view/Blocks/Header.php";
?>
<div id="body-d" class="wrap">
    <!--Phần body-->            
    <section id="vid" class="bgIndex wrap-banner">
        <div class="overlay">
            <h1 class="overlay-header">
                Beach Resort
            </h1>
            <div class="line"></div>

            <div class="overlay-content">
                Chọn loại phòng yêu thích của bạn
            </div>

            <div class="overlay-button">
                <a href="<?php echo ( $data["Dashboard"] );?>/Room/RoomPage/totalroom">Tất cả phòng</a>
            </div>

        </div>
    </section>
    <section data-aos="fade-down" class="gallery row">
        <!--Phần này là show ra bộ sưu tập hình và phòng mới     Trung làm -->
        <!--Màu của mấy dấu gạch dưới mấy chữ như bộ sưu tập là màu #CFCFCF -->
        <div class="col-xs-8 col-sm-8 col-md-8 col-lg-8">
                <h1>Bộ sưu tập</h1>
                <div class="line"></div>
                <div class="gallery-body">
                    <div id="galleryCarousel" class="carousel slide" data-ride="carousel">
                        <!-- Indicators -->
                        <ol class="carousel-indicators">
                            <li data-target="#galleryCarousel" data-slide-to="0" class="active"></li>
                            <li data-target="#galleryCarousel" data-slide-to="1"></li>
                            <li data-target="#galleryCarousel" data-slide-to="2"></li>
                            <li data-target="#galleryCarousel" data-slide-to="3"></li>
                            <li data-target="#galleryCarousel" data-slide-to="4"></li>
                            <li data-target="#galleryCarousel" data-slide-to="5"></li>
                        </ol>
                    
                        <!-- Wrapper for slides -->
                        <div class="carousel-inner">
                            <div class="item active">
                            <img src="<?php echo $data["Dashboard"] ?>/public/gallery/073a5b73-z-cr-800x450.jpg" alt="a" style="width:100%;">
                            </div>
                    
                            <div class="item">
                            <img src="<?php echo $data["Dashboard"] ?>/public/gallery/0fde4ea6-z-cr-800x450.jpg" alt="b" style="width:100%;">
                            </div>
                            <div class="item">
                            <img src="<?php echo $data["Dashboard"] ?>/public/gallery/4056cbae-z-cr-800x450.jpg" alt="c" style="width:100%;">
                            </div>
                            <div class="item">
                            <img src="<?php echo $data["Dashboard"] ?>/public/gallery/2a000495-z-cr-800x450.jpg" alt="c" style="width:100%;">
                            </div>
                            <div class="item">
                            <img src="<?php echo $data["Dashboard"] ?>/public/gallery/2cb2535e-z-cr-800x450.jpg" alt="c" style="width:100%;">
                            </div>
                            <div class="item">
                            <img src="<?php echo $data["Dashboard"] ?>/public/gallery/2e187a4c-z-cr-800x450.jpg" alt="c" style="width:100%;">
                            </div>
                        </div>
                    
                        <!-- Left and right controls -->
                        <a class="left carousel-control" href="#galleryCarousel" data-slide="prev">
                            <span class="glyphicon glyphicon-chevron-left"></span>
                            <span class="sr-only">Previous</span>
                        </a>
                        <a class="right carousel-control" href="#galleryCarousel" data-slide="next">
                            <span class="glyphicon glyphicon-chevron-right"></span>
                            <span class="sr-only">Next</span>
                        </a>
                        </div>
                </div>
        </div>
    </section>
    <section data-aos="fade-down" class="hot-room row">
        <div class="col-xs-12 col-sm-12 col-md-6 col-lg-6">
            <h1>Thuê nhiều nhất</h1>
            <div class="line"></div>
            <div class="slickThue slick">
                <?php
                    if( isset($data["RoomPopular"]) ) {
                        for ( $i = 0 ; $i < 4 ; $i++ ) {
                            $dt = $data["RoomPopular"][$i];
                ?>
                <div class="slick-card row">
                    <div style="padding: 0;" class="col-xs-6 col-sm-6 col-md-6 col-lg-6 card-item">  
                    <img src="data:image/jpg;charset=utf8;base64,<?php echo base64_encode($dt["mainimage"]); ?>" alt="<?php echo ($dt["roomame"]); ?>">
                    </div>

                    <div class="col-xs-6 col-sm-6 col-md-6 col-lg-6 slick-card-content">
                        <h2><?php echo $dt["roomame"] ?></h2>
                        <p>Loại phòng: <span class="
                        <?php
                            if( $dt["roomtypeid"] =="PHONGGIADINH" ) {
                                echo "PhongGiaDinhCSS";
                            }
                            if( $dt["roomtypeid"] =="PHONGVIP" ) {
                                echo "PhongVIPCSS";
                            }
                            if( $dt["roomtypeid"] =="PHONGTHUONG" ) {
                                echo "PhongThuongCSS";
                            }
                        ?>" style="color:white" ><?php 
                            if( $dt["roomtypeid"] =="PHONGGIADINH" ) {
                                echo "Phòng Gia Đình";
                            }
                            if( $dt["roomtypeid"] =="PHONGVIP" ) {
                                echo "Phòng V.I.P";
                            }
                            if( $dt["roomtypeid"] =="PHONGTHUONG" ) {
                                echo "Phòng Thường";
                            }
                        ?></span></p>
                        <p>Giá phòng: <span>$<?php echo $dt["roomprice"] ?></span></p>
                        <a href="<?php echo ( $data["Dashboard"] );?>/Room/RoomPage/roomdetail/<?php echo $dt["roomid"]  ?>">Xem chi tiết</a>
                    </div>
                </div>
                <?php
                    }
                }
                ?>
            </div>
        </div>
        
        <div class="col-xs-12 col-sm-12 col-md-6 col-lg-6">
            <h1>Phòng mới</h1>
            <div class="line"></div>
            <div class="new-room">

                <?php
                    if( isset($data["RommNew"]) ) {
                        for ( $i = 0 ; $i < 2 ; $i++ ) {
                            $dt = $data["RommNew"][$i];
                ?>
                <div class="room-card row">
                    <div class="col-xs-5 col-sm-5 col-md-5 col-lg-5 imgmid">
                        <img src="data:image/jpg;charset=utf8;base64,<?php echo base64_encode($dt["mainimage"]); ?>" alt="<?php echo ($dt["roomame"]); ?>">
                    </div>
                    <div class="col-xs-7 col-sm-7 col-md-7 col-lg-7">
                        <div class="room-card-content">
                            <h2><?php echo $dt["roomame"] ?></h2>
                            <p>Loại phòng: 
                                <span class="
                                <?php
                                    if( $dt["roomtypeid"] =="PHONGGIADINH" ) {
                                        echo "PhongGiaDinhCSS";
                                    }
                                    if( $dt["roomtypeid"] =="PHONGVIP" ) {
                                        echo "PhongVIPCSS";
                                    }
                                    if( $dt["roomtypeid"] =="PHONGTHUONG" ) {
                                        echo "PhongThuongCSS";
                                    }
                                ?>" style="color:white" ><?php 
                                    if( $dt["roomtypeid"] =="PHONGGIADINH" ) {
                                        echo "Phòng Gia Đình";
                                    }
                                    if( $dt["roomtypeid"] =="PHONGVIP" ) {
                                        echo "Phòng V.I.P";
                                    }
                                    if( $dt["roomtypeid"] =="PHONGTHUONG" ) {
                                        echo "Phòng Thường";
                                    }
                                ?></span
                            </p>
                            <p>Giá phòng: <span>$<?php echo $dt["roomprice"] ?></span></p>
                            <a href="<?php echo ( $data["Dashboard"] );?>/Room/RoomPage/roomdetail/<?php echo $dt["roomid"]  ?>">Xem chi tiết</a>
                        </div>
                    </div>
                </div>
                <?php
                        }
                    }
                ?>

            </div>
        </div>
    </section>
    <section data-aos="zoom-in-down" class="room-type row">
        <div class="room-type-header">
            <h1>Loại phòng</h1>
            <div class="line"></div>
        </div>
        <div  class="type-wrap">
            <?php
                if( $data["RoomTypes"] != NULL ) {
                    for ( $i = 0 ; $i < count($data["RoomTypes"]) ; $i ++ ) {
                        $row = $data["RoomTypes"];
            ?>
                <div class="col-xs-12 col-sm-6 col-md-4 col-lg-4 mt-3">
                    <div class="type-card">
                        <div class="type-body">
                            <img src="data:image/jpg;charset=utf8;base64,<?php echo base64_encode($row[$i]["roomtypeimg"]); ?>" alt="<?php echo ($row[$i]["roomtypename"]); ?>">
                            <div class="type-price-top">
                                <h6>
                                    <?php echo $row[$i]["roomprice_range"]; ?>
                                </h6>
                                <p>mỗi đêm</p>
                            </div>
                            <div class="type-overlay">
                                <a href="<?php echo ( $data["Dashboard"] );?>/Room/RoomPage/totalroom/<?php echo $row[$i]['roomtypeid'] ?>" >Xem chi tiết</a>
                            </div>
                        </div>
                        <div class="type-foot">
                            <?php echo $row[$i]["roomtypename"]; 
                                if( $row[$i]["roomtypeid"] == "PHONGVIP" ) {
                                    echo '<i style="color: red;" class="far fa-gem"></i>';
                                }
                            ?>
                        </div>
                    </div>
                </div>
            <?php
                    }
                }
            ?>
        </div>
    </section>
    <section data-aos="zoom-in-up" class="service">
        <!--Phần dịch vụ     Văn làm-->
        <div class="service-header row">
            <h1>Dịch vụ</h1>
        </div>
        <div class="service-line">
            <div class="line"></div>
        </div>
        <div class="service-body row">
                <div class="col-xs-12 col-sm-6 col-md-4 col-lg-4">
                    <div class="service-card">
                        <h2 class="service-card-header">
                            <i class="fas fa-swimmer"></i>
                        </h2>
                        <div class="service-card-body">
                            <h4>Hồ bơi/Fitness</h4>
                            <p>
                                Đến với Resort Beach, quý khách sẽ được trải nghiệm hệ thống 
                                hồ bơi, phòng gym hiện đại và sang trọng bật nhất Việt Nam với khung cảnh hài 
                                hòa với thiên nhiên chắc chắn sẽ mang đến những trải nghiệm tuyệt vời.
                            </p>
                        </div>
                    </div>
                </div>
                <div class="col-xs-12 col-sm-6 col-md-4 col-lg-4">
                    <div class="service-card">
                        <h2 class="service-card-header">
                            <i class="fas fa-glass-cheers"></i>
                        </h2>
                        <div class="service-card-body">
                            <h4>Quầy bar/Lounge</h4>
                            <p>Ngoài cung cấp các món đồ uống chất lượng cho khách,
                                quầy bar / lounge ở các khách sạn,
                                resort còn mang đến cho khách những sự trải nghiệm kèm theo việc thưởng thức đồ uống.
                            </p>
                        </div>
                    </div>
                </div>
                <div class="col-xs-12 col-sm-6 col-md-4 col-lg-4">
                    <div class="service-card">
                        <h2 class="service-card-header">
                            <i class="fas fa-bus-alt"></i>
                        </h2>
                        <div class="service-card-body">
                            <h4>Xe đưa đón</h4>
                            <p>
                                Quý khách sẽ được hoàn toàn miễn phí giá cước xe khi tham quan những địa điểm trong thành phố.
                                Chúng tôi có một đội ngũ tài xế hùng hậu luôn đặt sự hài lòng của khách hàng lên hàng đầu.
                            </p>
                        </div>
                    </div>
                </div>
        </div>
    </section>           
</div>
<!--Modal-->
    <?php
       
            include_once "./mvc/view/Blocks/Ads.php";
        
    ?>
<div class="scrollToTop toTop-scrolled"><i id="toTop" class="fas fa-arrow-alt-circle-up"></i></div>
<a target="_blank" href="https://www.facebook.com/huu.van.20x" class="messenger"><i  class="fab fa-facebook-messenger"></i></a>

<?php
require_once "./mvc/view/Blocks/Footer.php";
?>
<script>
 
</script>

<script src="https://unpkg.com/aos@2.3.1/dist/aos.js"></script>
<script type="text/javascript" src=<?php echo ( $data["Dashboard"] . "/mvc/view/slick/slick.min.js");?>></script>
<script type="text/javascript" src=<?php echo ( $data["Dashboard"] . "/mvc/view/slick/slick.js");?>></script>
<script type="text/javascript" src=<?php echo ( $data["Dashboard"] . "/mvc/view/Js/index.js");?>></script>
<script type="text/javascript" src=<?php echo ( $data["Dashboard"] . "/mvc/view/Js/Master.js");?>></script>

