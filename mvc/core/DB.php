<?php
    class DB {
        //DB infor
        /*
        public $con; //connection
        protected $servername = "sql302.epizy.com";
        protected $username = "epiz_26165405";
        protected $password = "cdqfwqjLnzon9"; 
        protected $dbname = "epiz_26165405_resortbeach";
        */
        public $con; //connection
        protected $servername = "localhost";
        protected $username = "root";
        protected $password = ""; 
        protected $dbname = "resortProject";
        function __construct()
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