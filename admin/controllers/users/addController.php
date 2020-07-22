<?php
	class addUsers extends Controller{
		public function __construct(){
			parent:: __construct();
			
			include "views/users/addView.php";
		}
	}
	new addUsers();
?>