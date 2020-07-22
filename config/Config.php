
	<?php
    class DB {
        public $con; //connection
        protected $servername = "localhost";
        protected $username = "root";
        protected $password = ""; 
        protected $dbname = "resortproject";
        public function __construct()
        {
            $conn = mysqli_connect($this->servername, $this->username, $this->password, $this->dbname);
            // Check connection
            if (!$conn) {
                die("Connection failed: " . mysqli_connect_error());
            }
            else {
                return $conn;
            }
        }
    }
?>
