<?php  
	class addRoom extends Controller{
		public function __construct(){
			parent:: __construct();

			$data = $this->Model->fetch("select * from roomtype ");
			include "views/room/addView.php";
		}
	}
	new addRoom();
?>