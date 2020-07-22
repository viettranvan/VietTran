<section style="z-index: 1;" class="col-xs-12 col-sm-4 col-md-3 col-lg-3 p-0">
    <ul class="profileTab">
        <li>
            <a href="<?php echo ( $data["Dashboard"] );?>/User/UserPage/profile"
            <?php
                if ( $data["Page"] == "profile" ) {
                    echo 'class="tabActive"';
                }
            ?>><i class="fas fa-user-alt"></i>Hồ sơ</a>
        </li>
        <li>
            <a href="<?php echo ( $data["Dashboard"] );?>/User/UserPage/booking"
            <?php
                if ( $data["Page"] == "booking" ) {
                    echo 'class="tabActive"';
                }
            ?>><i class="far fa-check-square"></i>Đặt phòng</a>
        </li>
        <li>
            <a data-confirm="Bạn có thực sự muốn đăng xuất?" href="<?php echo ( $data["Dashboard"] );?>/User/Logout"><i class="fas fa-sign-out-alt"></i>Đăng xuất</a>
        </li>
    </ul>
</section>
