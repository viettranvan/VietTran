<?php  

	class editTypeRoom extends Controller{
		public function __construct(){
			parent:: __construct();
			
			$id = isset($_GET["id"])?$_GET["id"]:0;
			$data = $this->Model->fetchOne("select * from roomtype where roomtypeid='$id'");
			// $data = $this->Model->fetch("select * from roomtype ");
			include "views/roomtype/editView.php";
		}
	}
	new editTypeRoom();
?>

