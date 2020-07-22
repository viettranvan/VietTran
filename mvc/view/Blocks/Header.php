<header id="h" class="navigation-bar">
            <div class="nav-center">
                <div class="nav-logo">
                    <a href="<?php echo ( $data["Dashboard"] );?>" class="logo"><img src="<?php echo $data["Dashboard"] ?>/public/logo.svg"></a>
                </div>
                <ul class="nav-body">
                    <li><a href="<?php echo ( $data["Dashboard"] );?>">Trang chủ</a> <a class="i" href="<?php echo ( $data["Dashboard"] );?> "> <i class="fas fa-home"></i> </a> </li>
                    <li><a href="<?php echo ( $data["Dashboard"] );?>/Room/RoomPage/totalroom">Phòng</a> <a class="i" href="<?php echo ( $data["Dashboard"] );?>/Room/RoomPage/totalroom"><i class="fas fa-door-open"></i></a></li>
                </ul>
                <div class="login-btn">
                <?php
                    if( isset($_SESSION["user"]) ) {
                        include_once "Logined.php";
                    }
                    else {
                        include_once "NotLogin.php";
                    }
                ?>
                </div>
            </div>
</header>