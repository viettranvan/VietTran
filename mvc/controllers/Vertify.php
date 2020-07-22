<?php
class Vertify extends Controller {
  public function VertifyHandle( $vkey ) {
    if(isset($vkey)){
      //Các bước cbi xác nhận email
      $a = new DB();
      $conn = $a -> __construct();
      $result = mysqli_query($conn,"SELECT confirm,vkey FROM user WHERE confirm = 0 AND vkey = '$vkey' LIMIT 1");
      if($result -> num_rows == 1){
        //Xác nhận Email
        $update = mysqli_query($conn,"UPDATE user SET confirm = 1 WHERE vkey = '$vkey' LIMIT 1");
        if($update){
          echo "Tài khoản của bạn đã được xác nhận! <br> Chuyển hướng sau 5s...";
    
          header( "refresh:5;url=/WebProject-2020/Login/LoginPage/login" );
        }
        else{
          echo "Có lỗi xảy ra";
        }
      }else{
    
      }
    }else{
      die("Có gì đó sai sai??");
    }
  }
}

?>