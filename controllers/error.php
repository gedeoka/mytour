<?php

class Error extends Controllers{

    function __construct() {
        parent::__construct();
        
       
    }
    function index(){
        Session::init();
        $loggin =  Session::get('abraham');
		//echo $loggin;
        if($loggin == FALSE){
            Session::destroy();
            //$this->view->msg='This Is Error Message.....';
            //$this->view->render('home/index');
			//header('location: '.URL);
			echo "<script>window.location.replace('".URL."');</script>";
			//echo "Errors";
            exit;            
        }else{
            $TypeID =  Session::get('TypeID');
		//echo "?????".$TypeID;
            if ($TypeID==1){
                $this->view->msg="I'm Sorry.<br> <small>we cannot find the page that you request.</small>";
                //$this->view->loggin=$loggin;
                $this->view->render('error/index2');
            }
            if ($TypeID==2){
                $this->view->msg="I'm Sorry.<br> <small>we cannot find the page that you request.</small>";
                $this->view->loggin=$loggin;
                $this->view->render('error/index2');
            }
            if ($TypeID==3){
                $this->view->msg="I'm Sorry.<br> <small>we cannot find the page that you request.</small>";
                $this->view->loggin=$loggin;
                $this->view->render('error/index2');
            }
            if ($TypeID==4){
                $this->view->msg="I'm Sorry.<br> <small>we cannot find the page that you request.</small>";
                $this->view->loggin=$loggin;
                $this->view->render('error/index2');
            }
        }
        
        
    }
}