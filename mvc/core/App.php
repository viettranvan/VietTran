<?php
    class App{
        protected $controller = "Home";
        protected $action = "IndexPage";
        protected $params = ["index"];
        function construct(){
            $arr = $this->URLProcess();
            unset($arr[0]); 
            //http://localhost/WebProject-2020-master/Home/SayHi/1/2/3
            //Handle controller
            $checkADMIN = false;
            if( $arr != NULL ) {
                if ( $arr[1] != NULL ) {
                    if( $arr[1] == "admin" ) {
                        $checkADMIN = true;
                        require_once ("./mvc/view/IndexPage.php");
                    }
                    else {
                        if($arr[1] == "?i=1" ) {
                            $controller = "Home";
                            $action = "IndexPage";
                            require_once("./mvc/controllers/". $this -> controller .".php");
                            $this -> controller = new $this->controller;
                            $params = ["index"];
                        }
                        else {
                            if( file_exists( "./mvc/controllers/".$arr[1].".php") ) {
                                $this-> controller = $arr[1];
                                unset($arr[1]);
                                //Handle action
                                require_once("./mvc/controllers/". $this -> controller .".php");
                                $this -> controller = new $this->controller;              
                                if ( isset($arr[2]) && method_exists( $this-> controller , $arr[2] ) ) {
                                    $this->action = $arr[2];
                                    unset($arr[2]);
                                    //Handle params
                                    $this -> params = $arr  ? array_values($arr) : [];
                                }
                                else {
                                    $this-> controller = "NotFound";
                                    $this-> action = "NotFoundPage";
                                    require_once("./mvc/controllers/". $this -> controller .".php");
                                    $this -> controller = new $this->controller;
                                }
                            }
                            else {
                                $this-> controller = "NotFound";
                                $this-> action = "NotFoundPage";
                                require_once("./mvc/controllers/". $this -> controller .".php");
                                $this -> controller = new $this->controller;
                            }
                            
                        }
                    }
                }
                else {
                    $controller = "Home";
                    $action = "IndexPage";
                    require_once("./mvc/controllers/". $this -> controller .".php");
                    $this -> controller = new $this->controller;
                    $params = ["index"];
                }
            }
            else {
                $controller = "Home";
                    $action = "IndexPage";
                    require_once("./mvc/controllers/". $this -> controller .".php");
                    $this -> controller = new $this->controller;
                    $params = ["index"];
            }
            //Initialization Class
            //[] class name and fuction name
            //params
            if( !$checkADMIN ) {
                    call_user_func_array([$this->controller, $this->action], $this->params );
            }
                
             
        }
        function URLProcess() {
            //Array ( [0] => Home [1] => SayHi [2] => 1 [3] => 2 [4] => 3 )
            $url = "$_SERVER[REQUEST_URI]";
            if ( isset($url) ) {
                return explode("/",filter_var(trim($url,"/")));
            }
        }
    }
?>