<?php
require_once "./mvc/view/Blocks/Header.php";
require_once "./mvc/view/Blocks/Loading.php";
?>

<div id="body-d" class="wrap">
    <h2 class="title">
        Lấy lại mật khẩu
    </h2>
    <div class="line"></div>
    <form id="rsPass" method="post" id="login" enctype="multipart/form-data" >
            <div id="wr-name" class="input-gr one">
                <div class="icon">
                <i class="fas fa-envelope-open-text"></i>
                </div>
                <div class="input-field">
                    <h5>Nhập email của bạn</h5>
                    <input type="text" id="tk" value=""
                     name="rsUserEmail" class="input" />
                </div>
            </div>
        <input type="submit" class="btn" value="Gửi mã xác nhận"> 
        </form>
</div>
<?php
require_once "./mvc/view/Blocks/Footer.php";
?>
<script>
  //Input animation
        const inputs = document.querySelectorAll(".input");
        function addcl(){
            let parent = this.parentNode.parentNode;
            parent.classList.add("befocus");
        }
        var tk = document.getElementById("tk");
        if ( tk.value != "" ) {  
        document.getElementById("wr-name").classList.add("befocus")
        }
        function remcl(){
            let parent = this.parentNode.parentNode;
            if(this.value == ""){
                parent.classList.remove("befocus");
            }
        }
        inputs.forEach(input => {
            input.addEventListener("focus", addcl);
            input.addEventListener("blur", remcl);
        });

</script>
<script type="text/javascript" src=<?php echo ( $data["Dashboard"] . "/mvc/view/Js/login.js");?>></script>
<script type="text/javascript" src=<?php echo ( $data["Dashboard"] . "/mvc/view/Js/Master.js");?>></script>