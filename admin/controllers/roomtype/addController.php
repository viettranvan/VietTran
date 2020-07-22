<?php  

	class addTypeRoom extends Controller{
		public function __construct(){
			parent:: __construct();

			// $data = $this->Model->fetch("select * from roomtype ");
			include "views/roomtype/addView.php";
		}
	}
	new addTypeRoom();
?>

