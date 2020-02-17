<?php

class View{

    function __construct() {
        //echo 'This Is View';
    }
   /*
    public function render($name,$noInclude=false){
        if ($noInclude==true){
            require 'views/'.$name.'.php';
        }else{
            require 'views/header.php';
            require 'views/'.$name.'.php';
            require 'views/footer.php';
        }
    }
     */
   public function render($name){
     // echo 'Name='.$name;
        $TypeID =  Session::get('TypeID');
       // echo $TypeID;
        if ($TypeID==1){
			//echo "here";
			if ($name<>"home/index"){
            require 'views/admin/header.php';
			}
            require 'views/'.$name.'.php';
            //require 'views/footer.php';
            exit;
        }elseif ($TypeID==2){
            require 'views/header-pr.php';
            require 'views/'.$name.'.php';
            //require 'views/footer-adm.php';
            exit;
        }elseif ($TypeID==3){
            require 'views/header.php';
            require 'views/'.$name.'.php';
            //require 'views/footer.php';
            exit;
        }else{
            
            if ($name=="login"){
                //echo $name;
                require 'views/'.$name.'.php';
            }elseif ($name=="login/index2"){
                //echo $name;
                require 'views/'.$name.'.php';
            }else{
               // echo "xx=".$name;
                //require 'views/header.php';
                require 'views/'.$name.'.php';
                //require 'views/footer.php';
                    
            }
        }
        
   }
}
?>
