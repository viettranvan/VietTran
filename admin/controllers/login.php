<?php
	class login extends Controller{

		public function __construct(){

			parent:: __construct();

			if($_SERVER["REQUEST_METHOD"] == "POST"){
				$email = $_POST["email"];
				$password = $_POST["password"];
				
				$check = $this->Model->fetchOne("select * from admin where email='$email' LIMIT 1");
				if(isset($check["email"]) ) {
					if($password == $check["password"]) { 
						$_SESSION["account"] = $email;
						$_SESSION["name"] = $check["loginname"];
						header("location: index.php");
					}
					else{ // HIEN THI THONG BAO O DAY
						echo '<script language="javascript">';
						echo 'alert("Bạn không có quyền truy cập vào trang này!")';
						echo '</script>';
						}
				}
                else {
                    echo '<script language="javascript">';
						echo 'alert("Sai tên tài khoản hoặc mật khẩu !")';
						echo '</script>';
                }
				
			}
			include "views/login.php";

		}
	}
	new login();
?>
