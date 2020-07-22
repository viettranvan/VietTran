
<?php
	session_start();
	include "../config/Config.php";
	include "../config/Model.php";
	include "../config/Controller.php";
	include "../config/RemoveUnicode.php";
	include "../config/Token.php";

        //Check Input function 
    function test_input($data) {
        $data = trim($data);                    //strip unnecessary characters
        $data = stripslashes($data);            //remove backslashes
        $data = htmlspecialchars($data);        //Escape htmlSpecialChar
        return $data;
    }

	if( isset($_POST["action"]) ) {
		// ------------User---------------
		// xóa 1 user
		if ( $_POST["action"]=="delete" ) {
			$id = $_POST["id"];
			$model = new Model();
			$a = $model->execute("delete from booking where userid=$id");		
            $b = $model->execute("delete from user where userid=$id");	
			if( $a && $b ) {
				echo "thanh cong";
			}
		}
		// thêm mới 1 user
		if ( $_POST["action"]=="add" ) {
			$username = $fullname = $email = $password = $repass = $gender = $phone = $address ="";
			// echo "thanh cong";
			if( isset($_POST["fullname"]) ) {
				
				$fullname = test_input($_POST["fullname"]);
				$username = $_POST["username"];
				$email =  $_POST["email"];
				$password =  $_POST["password"];
				$repass =  $_POST["repass"];
				$gender =  $_POST["gender"];
				$phone =  $_POST["userPhoneNumber"];
				$address = $_POST["userAddress"];
				$vkey = new Token();
	 			$strVkey = $vkey->generate(32);

	 			$model = new Model();

	 			if($password == $repass){
					
                    $emailCheckUS = $model->count("SELECT * FROM user WHERE email='$email'");
                    if( $emailCheckUS == 0 ) {
                        $a = $model->execute("insert into user(fullname, loginname, password, email, gender, phonenumber, vkey, address, confirm)
			 				value('$fullname', '$username', '$password', '$email', '$gender', '$phone', '$strVkey', '$address', 1) ");
						if( $a ){
                            echo "thanh cong";
						}
						else {
							echo "Them user that bai!";
						}
                    }
	 				else {
                         echo "Email đã được đăng kí!";
                    }
				 }
				 else {
					 echo "Mat khau va mat khau xac nhan phai giong nhau";
				 }
	 			
			}
			else {
				echo "Khong co ten!";
			}
		}
		// chỉnh sửa thông tin user
		if( $_POST["action"]=="edit"){
			if( isset($_POST["email"]) ) {
				$id = $_POST["id"];
				$fullname = test_input($_POST["fullname"]);
				$password =  $_POST["password"];
				$gender =  $_POST["gender"];
				$phone =  $_POST["userPhoneNumber"];
				$address = $_POST["userAddress"];

				$model = new Model();
				$a1 = $model->execute("update user set fullname='$fullname' where userid='$id'");
				$a2 = $model->execute("update user set gender='$gender' where userid='$id'");
				$a3 = $model->execute("update user set phonenumber='$phone' where userid='$id'");
				$a4 = $model->execute("update user set address='$address ' where userid='$id'");
				if($password != ''){
					$model->execute("update user set password='$password' where userid='$id'");
				}
				if( $a1 == true && $a2 == true && $a3 == true && $a4 == true ){
					echo "thanh cong";
				}
			}	
		}
		// -----------End User-------------

		// ------------Room----------------	
		// xóa phòng
		if ( $_POST["action"]=="delRoom" ) {
			$id = $_POST["id"];
			$model = new Model();
            $c = $model->execute("delete from booking where roomid=$id");	
            $b = $model->execute("delete from roomimage where roomid=$id");	
			$a = $model->execute("delete from room where roomid=$id");		
			if( $a && $b && $c ) {
				echo "thanh cong";
			}
		}
		// thêm mới 1 phòng
		if ( $_POST["action"]=="addNewRoom" ) {
			$roomame = $roomtypeid = $roomprice = $roomquanlity = $roomrate = $discription = $allowpet = $popular = $roomnew = "";

			if( isset($_POST["roomame"]) ) {
				$roomid = $_POST["roomid"];
				$roomame = test_input($_POST["roomame"]);
				$roomtypeid = $_POST["roomtypeid"];
				$roomprice =  $_POST["roomprice"];
				$roomquanlity =  $_POST["roomquanlity"];
				$roomrate =  $_POST["roomrate"];
				$discription =  $_POST["discription"];
				$allowpet =  $_POST["allowpet"];
				// lấy ngày h hiện tại
				date_default_timezone_set('Asia/Ho_Chi_Minh');
			    $datenow = date('Y-m-d');
			    $timenow =  date('H:i:s');
			    $roomnew = $datenow.' '.$timenow;
			  
				if(!empty($_FILES)){
					// thêm ảnh			
					$img = addslashes(file_get_contents($_FILES["fileToUpload"]["tmp_name"])); //dung de chuyen hinh thanh nhi phan

	 			}

	 			$model = new Model();
 				$check = $model->fetch("select * from room where roomid='$roomid'");
 				if(!empty($check)){
 					echo "khong thanh cong";
 				}
 				else{
 					$a = $model->execute("insert into room(roomid, roomame, mainimage, roomtypeid, roomprice, roomquanlity, roomrate, discription, allowpet, popular, roomnew) value('$roomid', '$roomame', '$img', '$roomtypeid', '$roomprice', '$roomquanlity', '$roomrate', '$discription', b'$allowpet', '0', '$roomnew') ");
		 			if( $a ){
		 				echo "thanh cong" ;
		 			}	
 				}	 						
			}
		}
		// Chỉnh sửa 1 phòng
		if ( $_POST["action"]=="edit_Room" ) {
			

			if( isset($_POST["roomame"]) ) {
				$id = $_POST["roomid"];
				$roomid = $_POST["roomid"];
				$roomame = test_input($_POST["roomame"]);
				$roomtypeid = $_POST["roomtypeid"];
				$roomprice =  $_POST["roomprice"];
				$roomquanlity =  $_POST["roomquanlity"];
				$roomrate =  $_POST["roomrate"];
				$discription =  $_POST["discription"];
				$allowpet =  $_POST["allowpet"];
				

	 			$model = new Model();

				$a1 = $model->execute("update room set roomame='$roomame' where roomid='$id'");
				$a2 = $model->execute("update room set roomtypeid='$roomtypeid' where roomid='$id'");
				$a3 = $model->execute("update room set roomprice='$roomprice' where roomid='$id'");
				$a4 = $model->execute("update room set roomquanlity='$roomquanlity' where roomid='$id'");
				$a5 = $model->execute("update room set roomrate='$roomrate' where roomid='$id'");
				$a6 = $model->execute("update room set discription='$discription' where roomid='$id'");
				$a7 = $model->execute("update room set allowpet=b'$allowpet' where roomid='$id'");
                $a8 = $model->execute("update booking set price='$roomprice' where roomid='$id'");

				if(!empty($_FILES)){
					// thêm ảnh			
					$img = addslashes(file_get_contents($_FILES["fileToUpload"]["tmp_name"])); //dung de chuyen hinh thanh nhi phan
	 				$a8 = $model->execute("update room set mainimage='$img' where roomid='$id'");

	 			}


				if( $a1 == true && $a2 == true && $a3 == true && $a4 == true && $a5 == true && $a6 == true && $a7 == true ){
					echo "thanh cong";
				}	
			}
		}
		// ------------End Room--------------

		// xóa ảnh phòng
		if ( $_POST["action"]=="delImg" ) {
			$id = $_POST["id"];
			$model = new Model();
			$a = $model->execute("delete from roomimage where roomid=$id");		
			if( $a ) {
				echo "thanh cong";
			}
		}
		// thêm ảnh phòng
		if ( $_POST["action"]=="addNewImage" ) {
			$roomame = $roomtypeid = $roomprice = $roomquanlity = $roomrate = $discription = $allowpet = $popular = $roomnew = "";

			if( isset($_POST["roomid"]) ) {
				$roomid = $_POST["roomid"];

				if(!empty($_FILES)){
					// thêm ảnh			
					$img1 = addslashes(file_get_contents($_FILES["image1"]["tmp_name"])); //dung de chuyen hinh thanh nhi phan
					$img2 = addslashes(file_get_contents($_FILES["image2"]["tmp_name"])); //dung de chuyen hinh thanh nhi phan
					$img3 = addslashes(file_get_contents($_FILES["image3"]["tmp_name"])); //dung de chuyen hinh thanh nhi phan

	 			}

	 			$model = new Model();

	 				$a = $model->execute("insert into roomimage(roomid, image1, image2, image3) value('$roomid', '$img1', '$img2', '$img3') ");
		 			if( $a ){
		 				echo "thanh cong" ;
		 			}
		 			else {
		 				echo "insert into roomimage(roomid, image1, image2, image3) value('$roomid', '$img1', '$img2', '$img3')";
		 			}	

	 				
			}
				// echo $roomid;
		}
		// Chỉnh sửa ảnh phòng
		if ( $_POST["action"]=="edit_Image" ) {
			if( isset($_POST["roomid"]) ) {
				$roomid = $_POST["roomid"];

	 			$model = new Model();
	
	 			$a = $b =$c ="";
	 			if(empty($_FILES)){
	 				echo "khong thanh cong";
	 			}
	 			else{ 
	 				if(!empty($_FILES["image1"])){
	 					$img1 = addslashes(file_get_contents($_FILES["image1"]["tmp_name"])); //dung de chuyen hinh thanh nhi phan
	 					$a = $model->execute("update roomimage set image1='$img1' where roomid='$roomid'");
	 				}
	 				if(!empty($_FILES["image2"])){
	 					$img2 = addslashes(file_get_contents($_FILES["image2"]["tmp_name"])); //dung de chuyen hinh thanh nhi phan
	 					$b = $model->execute("update roomimage set image2='$img2' where roomid='$roomid'");
	 				}
	 				if(!empty($_FILES["image3"])){
	 					$img3 = addslashes(file_get_contents($_FILES["image3"]["tmp_name"])); //dung de chuyen hinh thanh nhi phan
	 					$c = $model->execute("update roomimage set image3='$img3' where roomid='$roomid'");
	 				}
	 			}

	 			if($a == true || $b == true || $c == true){
	 				echo "thanh cong";
	 			}

	 				
			}

		}
		// xóa loại phòng
		if ( $_POST["action"]=="deleteRoomType" ) {
			$id = $_POST["id"];
			$model = new Model();
			$a = $model->execute("delete from roomtype where roomtypeid='$id'");		
			if( $a ) {
				echo "thanh cong";//dc chua?, chua xoa dc xoa thu xem
			}
		}
		// thêm loại phòng
		if ( $_POST["action"]=="addNewRoomType" ) {
			$roomame = $roomtypeid = $roomprice = $roomquanlity = $roomrate = $discription = $allowpet = $popular = $roomnew = "";

			if( isset($_POST["roomtypename"]) ) {
				$roomtypeid = $_POST["roomtypeid"];
				$roomtypename = test_input($_POST["roomtypename"]);
				$roomprice_range1 = $_POST["roomprice_range1"];
				$roomprice_range2 = $_POST["roomprice_range2"];
				$roomprice_range = '$'.$roomprice_range1.' - $'.$roomprice_range2;

				if(!empty($_FILES)){
					// thêm ảnh			
					$img = addslashes(file_get_contents($_FILES["roomtypeimg"]["tmp_name"])); //dung de chuyen hinh thanh nhi phan

	 			}

	 			$model = new Model();

 				$a = $model->execute("insert into roomtype(roomtypeid, roomtypename, roomtypeimg, roomprice_range) 
 					value('$roomtypeid', '$roomtypename', '$img', '$roomprice_range')");
	 			if( $a ){
	 				echo "thanh cong" ;
	 			}
	 			else {
	 				echo "loi!";
	 			}	

	 				
			}
		}
		// chỉnh sửa loại phòng
		if ( $_POST["action"]=="editRoomType" ) {
			if( isset($_POST["roomtypename"]) ) {
				$roomtypeid = $_POST["roomtypeid"];
				$roomtypename = test_input($_POST["roomtypename"]);
				$roomprice_range1 = $_POST["roomprice_range1"];
				$roomprice_range2 = $_POST["roomprice_range2"];
				$roomprice_range = '$'.$roomprice_range1.' - $'.$roomprice_range2;
				

	 			$model = new Model();

				$a1 = $model->execute("update roomtype set roomtypename='$roomtypename' where roomtypeid='$roomtypeid'");
				$a2 = $model->execute("update roomtype set roomprice_range='$roomprice_range' where roomtypeid='$roomtypeid'");





				if(!empty($_FILES)){
					// thêm ảnh			
					$img = addslashes(file_get_contents($_FILES["roomtypeimg"]["tmp_name"])); //dung de chuyen hinh thanh nhi phan
	 				$a3 = $model->execute("update roomtype set roomtypeimg='$img' where roomtypeid='$roomtypeid'");

	 			}


				if( $a1 == true && $a2 == true){
					echo "thanh cong";
				}	
			}
		}	

        		// xóa booking
		if ( $_POST["action"]=="deleteBooking" ) {
			$id = $_POST["id"];
			$dateAR = $_POST["dateAR"];
			$dateLE = $_POST["dateLE"];
			$model = new Model();
		
 			$a = $model->execute("delete from booking where userid=$id AND datearrive='$dateAR' AND dateleave='$dateLE' ");	
			if( $a ) {
				echo "thanh cong";
			}
		}

	}
	else {
			if(isset($_GET["act"]) && $_GET["act"]=="logout"){
					unset($_SESSION["account"]);
				}

				if(isset($_SESSION['account'])) {
					$controller = isset($_GET["controller"])?"controllers/".$_GET["controller"]."Controller.php":"controllers/home.php";
					include "../layout/admin.php";
				}
				else{
					include "controllers/login.php";
				}
	}

?>
