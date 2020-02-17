<?php

class Bootstarp {

    function __construct() {
        $url = isset($_GET["url"])? $_GET['url']:NULL;
        
        $url = rtrim($url, '/');
        
        $url = explode('/', $url);
		
		
      
        
        if ($url[0]=="error"){
			if (isset($url[1])){
				//echo "Error1";
				$this->CError();
				
				//return FALSE;
			}
		}
		
		if (empty($url[0])){
            //require 'controllers/home.php';
            //$controller= new home();
            //$controller->index();
			$url[0]="home";
            //return false;
        }
		//echo $url[0];
        $file='controllers/' . $url[0] . '.php';
        
        
        if (file_exists($file)){
            require $file;
			//echo $file;
        }  else {
           $this->CError();
            return FALSE;
            
        }
		
        
        $controller = new $url[0];
		
        $controller->loadModel($url[0]);
        
           //Calling Method
        if (isset($url[2])) {
            if(method_exists($controller, $url[1])){
                $controller->{$url[1]}($url[2]);
            }else{
                $this->CError();
				return FALSE;
            }            
        } else {
            if (isset($url[1])) {
                if(method_exists($controller, $url[1])){
                    $controller->{$url[1]}();
                }else{
                    $this->CError();
					return FALSE;
                }
            }else{
                $controller->index();
            }
        }
         
         
    }
    public function CError(){
        require 'controllers/error.php';
        $controller = new Error();
		//echo "1Error";
        $controller->index();
        return FALSE;
    }
}
?>