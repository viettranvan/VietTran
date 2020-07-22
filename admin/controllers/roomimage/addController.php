<?php  
	class addImage extends Controller{
		public function __construct(){
			parent:: __construct();

			$data = $this->Model->fetch("select * from room where roomid not in
					(select roomid from roomimage)
				");

			include "views/roomimage/addView.php";
		}
	}
	new addImage();
?>