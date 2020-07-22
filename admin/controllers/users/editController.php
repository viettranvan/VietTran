<?php 
	class editUsers extends Controller{
		public function __construct(){
			parent:: __construct();
			
			$id = isset($_GET["id"])?$_GET["id"]:0;
			$data = $this->Model->fetchOne("select * from user where userid='$id'");

			include "views/users/editView.php";
		}
	}
	new editUsers();
?>