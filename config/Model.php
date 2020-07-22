<?php
	
	class Model {
		private function DB(){
		 $con; //connection
         $servername = "localhost";
         $username = "root";
         $password = ""; 
         $dbname = "resortProject";
            $conn = mysqli_connect($servername, $username, $password, $dbname);
            // Check connection
            if (!$conn) {
                die("Connection failed: " . mysqli_connect_error());
            }
            else {
                return $conn;
            }
		}
		//mysqli_set_charset($con,"UTF8");
		public function fetch($sql){
			
			$con = $this -> DB();
			$result = mysqli_query($con,$sql);
			$arr = array();
			while($rows = mysqli_fetch_array($result))
				$arr[] = $rows;
			return $arr;
		}
		
		public function fetchOne($sql){
			 $con =  $this -> DB();
			$result = mysqli_query($con,$sql);
			$rows = mysqli_fetch_array($result);
			return $rows;
		}

		public function checkExist($sql){
			$con =  $this -> DB();
			$result = mysqli_query($con,$sql);
			if(mysqli_num_rows( $result )){
				return true;
			}
			else{
				return false;
			}
			
		}

		public function execute($sql){
			 $con=  $this -> DB();
			if( mysqli_query($con,$sql)) {
				return true;
			}
			return false;
		}

		public function count($sql){
			 $con = $this -> DB();
			$result = mysqli_query($con,$sql);
			return mysqli_num_rows($result);
		}

		public function getId($idName, $tblName){
			 $con=  $this -> DB();
			$result = mysqli_query($con,"select $idName from $tblName order by $idName desc limit 0,1");
			$rows = mysqli_fetch_array($reulst);
			return $rows;
		}
	}
	