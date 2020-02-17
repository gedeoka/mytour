<?php

class Controllers {

    function __construct() {
        //echo 'This Is Main Controller - libs<br>';
        $this->view=new View();
    }
    public function loadModel($name){
		//echo $name;
		if(is_null($name) or $name==""){
			$name="home";
		}
        $path='models/'.$name.'_model.php';
        if(file_exists($path)){
            require 'models/'.$name.'_model.php';
            $modelName=$name.'_Model';
            $this->model=new $modelName();
        }
    }
}
?>