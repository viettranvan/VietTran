<?php

	class listUsers extends Controller{
		public function __construct(){
			parent::__construct();

			$act = isset($_GET["act"])?$_GET["act"]:"";

			switch ($act) {
				case 'delete':
					$id = isset($_GET["id"])?$_GET["id"]:0;
					$this->Model->execute("delete from user where userid='$id'");
					header("Location: http://localhost/WebProject-2020/admin/index.php?controller=users/list");

					break;
			}

			// dem tong so ban ghi
			$number = $this->Model->count("select * from user");
			// So ban ghi hien thi tren mot trang
			$num_page = 10;
			// so trang can hien thi
			$page_show = ceil($number/$num_page);
			// lay trang hien thi tren thanh url
			$page = isset($_GET["p"])&&$_GET["p"]>0?$_GET["p"]:1;

			$form = ($page-1)*$num_page;

			$data = $this->Model->fetch("select * from user limit $form,$num_page");

			include "views/users/listView.php";
		}
	}
	new listUsers();
?>
 