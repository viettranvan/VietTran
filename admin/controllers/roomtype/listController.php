<?php  
	class listRoomType Extends Controller{
		public function __construct(){
			parent:: __construct();

			$data = $this->Model->fetch("SELECT * FROM roomtype ORDER BY roomtypeid ASC");


			include "views/roomtype/listView.php";
		}
	}
	new listRoomType();
?>