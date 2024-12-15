<?php
   class Pages extends Controller{
    public function __construct()
    {
        // echo "this is my name is ramesh peshala";

    }

    public function index(){
            
    }
    public function about($name, $age){
        $data = [
            'username' => $name,
            'userage' => $age
        ];
        $this->view('v_about' , $data);
    }
   }
?>