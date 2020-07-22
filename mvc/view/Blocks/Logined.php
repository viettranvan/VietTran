<div class="profile">
    <div class="icon_wrap">
    <span id="nameHeader"  style="margin-left: 10px; font-weight: bold;" class="name">
    <?php
         $words = preg_split('/\s+/', $_SESSION["userfullname"] , -1, PREG_SPLIT_NO_EMPTY);
         $count = count($words);
         if(isset($words[$count-2])) {
            echo $words[$count-2].' '.$words[$count-1];
         }else {
            echo $words[$count-1];
         } 
    ?>
    </span>
    <i class="fas fa-chevron-down"></i>
    </div>
    <div id="handle2" class="active2 profile_dd ">
    <ul class="profile_ul">
        <li id="headerAccOption">Tài khoản của tôi</li>
        <li><a class="address" href="<?php echo ( $data["Dashboard"] );?>/User/UserPage/profile"><span class="picon"><i class="fas fa-user-alt"></i></span>Hồ sơ</a></li>
        <li><a class="address" href="<?php echo ( $data["Dashboard"] );?>/User/UserPage/booking"><span class="picon"><i class="far fa-check-square"></i></span>Đặt phòng</a></li>
        <li><a class="logout"  data-confirm="Bạn có thực sự muốn đăng xuất?" href="<?php echo ( $data["Dashboard"] );?>/User/Logout"><span class="picon"><i class="fas fa-sign-out-alt"></i></span>Đăng xuất</a></li>
    </ul>
    </div>
</div>