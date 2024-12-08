<?php
   class Core {
     // URL format: /controller/method/params
        protected $currentController = 'Pages';
        protected $currentMethod = 'index';
        protected $param = [];

        public function __construct()
        {
            // print_r($this->getURL());
            $url = $this->getURL();
            // Look in controllers for first value
            if(file_exists('../app/controllers/'.ucwords($url[0]).'.php')){
                //if the controller exists , then load it 
                $this->currentController = ucwords($url[0]);
                //unset the controller in the url
                unset($url[0]);
                //call the controller 
                require_once '../app/controllers/'.$this->currentController.'.php';
                //instentiate the controller
                $this->currentController = new $this->currentController;
                

            }
        }
        public function getURL(){
             
            if(isset($_GET['url'])){
                $url = rtrim($_GET['url'], '/');
                $url = filter_var($url, FILTER_SANITIZE_URL);
                $url = explode('/', $url);

                return $url;
            }
            
        }
   }
?>