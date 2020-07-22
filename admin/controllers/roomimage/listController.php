<?php 
	class booking extends Controller{
		public function __construct(){
			parent:: __construct();


			// dem tong so ban ghi
			$number = $this->Model->count("select * from roomimage");
			// So ban ghi hien thi tren mot trang
			$num_page = 3;
			// so trang can hien thi
			$page_show = ceil($number/$num_page);
			// lay trang hien thi tren thanh url
			$page = isset($_GET["p"])&&$_GET["p"]>0?$_GET["p"]:1;

			$form = ($page-1)*$num_page;

			// $data = $this->Model->fetch("select * from user limit $form,$num_page");

			$data = $this->Model->fetch("SELECT * FROM roomimage ORDER BY roomid ASC limit $form,$num_page ");

			include "views/roomimage/listView.php";
		}
	}
	new booking();
?>