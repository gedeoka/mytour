<?php

class reservasi extends Controllers{
    function __construct() {
        parent::__construct();
        
             
    }
	
	function index(){
		if (isset($_GET["Tour"])){
		$this->view->pagelist=$this->model->pagelist();
		
			$prod=explode(" | ",$_GET["Tour"]);
			//echo $prod[2];
			$this->view->single=$this->model->SingleProd($prod[2]);
			$this->view->sts="Tour";
	
		
		$this->view->render('header2');
		$this->view->render('reservasi/index');
		$this->view->render('footer');
		}
		if (isset($_GET["Hotel"])){
		$this->view->pagelist=$this->model->pagelist();
		
			$prod=explode("|",$_GET["Hotel"]);
			//echo $prod[1];
			$this->view->single=$this->model->HotelOrder($prod[0],$prod[1]);
			$this->view->sts="Hotel";
			$this->view->RoomID=$prod[0];
			$this->view->HotelID=$prod[1];
		
		$this->view->render('header2');
		$this->view->render('reservasi/hotel');
		$this->view->render('footer');
		}
	}
    
}