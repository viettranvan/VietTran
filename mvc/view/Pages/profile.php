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
            <h2>Thông tin người dùng</h2>
            <div class="cardWrap">
                <div class="cardProfile first">
                    <span id="logoName">
                        <?php
                            $pieces = explode(" ", $data["User"]["fullname"]);
                            echo $pieces[count($pieces) - 1][0];
                        ?>
                    </span>
                    <div class="profileDetail">
                        <h3>Họ & Tên: </h3>
                        <span id="filed1"><?php echo $data["User"]["fullname"] ?></span>
                    </div>
                    <span id="modifyProfile">Chỉnh sửa</span>
                </div>
                <div id="content1" class="content">
                    <form method="post" enctype="multipart/form-data" >
                        <div class="form-group">
                            <label>Họ tên mới:</label>
                            <input id="nameMod" 
                            pattern="^[a-zA-Z ÀÁÂÃÈÉÊÌÍÒÓÔÕÙÚĂĐĨŨƠàáâãèéêìíòóôõùúăđĩũơƯĂẠẢẤẦẨẪẬẮẰẲẴẶẸẺẼỀỀỂưăạảấầẩẫậắằẳẵặẹẻẽềềểỄỆỈỊỌỎỐỒỔỖỘỚỜỞỠỢỤỦỨỪễệỉịọỏốồổỗộớờởỡợụủứừỬỮỰỲỴÝỶỸửữựỳỵỷỹ]+$"
                            type="text" placeholder="Nhập họ tên mới"
                            require
                            autofocus="true" name="profileName"/>
                        </div>
                        <button class="modifiedUser" type="submit">Lưu</button>
                        <a href="#" onclick="handleToggle('content1')">Hủy</a>
                    </form>
                </div>
            </div>
            <div class="cardWrap">
                <div class="cardProfile">
                    <div class="profileDetail">
                        <h3>Email: </h3>
                        <span id="filed2"><?php echo $data["User"]["email"] ?></span>
                    </div>
                    <span id="modifyProfile">Chỉnh sửa</span>
                </div>
                <div id="content2" class="content">
                    <form  method="post" enctype="multipart/form-data" >
                        <div class="form-group">
                            <label>Nhập Email mới</label>
                            <input id="mailMod"
                            required pattern="(.|\s)*\S(.|\s)*" 
                            type="email" name="profileMail"/>
                        </div>
                        <button class="modifiedUser" type="submit">Lưu</button>
                        <a href="#" onclick="handleToggle('content2')">Hủy</a>
                    </form>
                </div>
            </div>
            <div class="cardWrap">
                <div class="cardProfile">
                    <div class="profileDetail">
                        <h3>Mật khẩu: </h3>
                        <span id="filed3"><?php echo $data["User"]["password"] ?></span>
                    </div>
                    <span id="modifyProfile">Chỉnh sửa</span>
                </div>
                <div id="content3" class="content">
                    <form   method="post" enctype="multipart/form-data" >
                        <div class="form-group">
                            <label>Nhập mật khẩu mới</label>
                            <input id="userPass" type="password" name="profilePass" placeholder="Mật khẩu..."
                            value="" class="input" required
                            pattern="^(?=.*[a-z])(?=.*\d).{6,20}$" autofocus 
                            oninvalid="this.setCustomValidity('Định dạng mật khẩu không đúng! (Mật khẩu từ 6-20 kí tự, bao gồm kí tự latin chữ thường, chữ hoa, kí tự đặt biệt và số )')"
                            oninput="this.setCustomValidity('')" title="Mật khẩu bao gồm kí tự, số, kí tự đặt biệt"  />
                        </div>
                        <div id="passwordStrength" style="margin-bottom: 0px;display: none;">
                            <small>Độ mạnh mật khẩu: </small>
                            <progress value="0" max="100" id="strength" style="max-width: 100%;"></progress>
                        </div>
                        <div class="form-group">
                            <label>Nhập lại mật khẩu</label>
                            <input type="password"
                            require
                            pattern="^(?=.*[a-z])(?=.*\d)(?=.*[#$^+=!*()@%&]).{6,20}$"
                            name="profilePassConfirm"/>
                        </div>
                        <button class="modifiedUser" type="submit">Lưu</button>
                        <a href="#" onclick="handleToggle('content3')">Hủy</a>
                    </form>
                </div>
            </div>
            <div class="cardWrap">
                <div class="cardProfile">
                    <div class="profileDetail">
                        <h3>Giới tính: </h3>
                        <span id="filed4"><?php if(isset($data["User"]["gender"])) echo $data["User"]["gender"] ?></span>
                    </div>
                    <span id="modifyProfile">Chỉnh sửa</span>
                </div>
                <div id="content4" class="content">
                    <form method="post" enctype="multipart/form-data" >
                        <div class="form-group">
                            <label>Giới tính</label>
                            <select require id="selectGen" name="profileGender">
                                <option value="Nam">Nam</option>
                                <option value="Nữ">Nữ</option>
                            </select>
                        </div>
                        <button class="modifiedUser" type="submit">Lưu</button>
                        <a href="#" onclick="handleToggle('content4')">Hủy</a>
                    </form>
                </div>
            </div>
            <div class="cardWrap">
                <div class="cardProfile">
                    <div class="profileDetail">
                        <h3>Số điện thoại: </h3>
                        <span id="filed5"><?php if(isset($data["User"]["phonenumber"])) echo $data["User"]["phonenumber"] ?></span>
                    </div>
                    <span id="modifyProfile">Chỉnh sửa</span>
                </div>
                <div id="content5" class="content">
                    <form  method="post" enctype="multipart/form-data" >
                        <div class="form-group">
                            <label>Số điện thoại</label>
                            <input require pattern="([0-9]{10})\b" id="numUser" type="text" name="profilePhoneNum"/>
                        </div>
                        <button class="modifiedUser" type="submit">Lưu</button>
                        <a href="#" onclick="handleToggle('content5')">Hủy</a>
                    </form>
                </div>
            </div>
            <div class="cardWrap">
                <div class="cardProfile">
                    <div class="profileDetail">
                        <h3>Địa chỉ: </h3>
                        <span id="filed6"><?php if(isset($data["User"]["address"])) echo $data["User"]["address"] ?></span>
                    </div>
                    <span id="modifyProfile">Chỉnh sửa</span>
                </div>
                <div id="content6" class="content">
                    <form  method="post" enctype="multipart/form-data" >
                        <div class="form-group">
                            <label>Địa chỉ</label>
                            <textarea require id="addUs" name="profileAddress" rows="2"></textarea>
                        </div>
                        <button class="modifiedUser" type="submit">Lưu</button>
                        <a href="#" onclick="handleToggle('content6')">Hủy</a>
                    </form>
                </div>
            </div>
        </div>
</section>
    
</div>  
<?php
require_once "./mvc/view/Blocks/Footer.php";
?>
<script>
    //password strength
    var pass = document.getElementById("userPass")
    pass.addEventListener('keyup',function(){
        checkPassword(pass.value);
    })
</script>
<script type="text/javascript" src=<?php echo ( $data["Dashboard"] . "/mvc/view/Js/profile.js");?>></script>
<script type="text/javascript" src=<?php echo ( $data["Dashboard"] . "/mvc/view/Js/Master.js");?>></script>
