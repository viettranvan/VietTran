<?php  
	class editRoomImage extends Controller{
		public function __construct(){
			parent:: __construct();

			$id = isset($_GET["id"])?$_GET["id"]:0;
			$data = $this->Model->fetchOne("select * from roomimage where roomid='$id'");
			// $selected = $this->Model->fetchOne("select roomtypeid from room where roomid='$id'");

			include "views/roomimage/editView.php";
		}
	}
	new editRoomImage();
?>