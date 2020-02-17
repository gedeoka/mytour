<?php

class page extends Controllers{
    function __construct() {
        parent::__construct();
        
             
    }
	
	function index(){
		if (isset($_GET["pages"])){
			$id=$_GET["pages"];
			$this->view->TourType=$this->model->TourByType();
			$this->view->TrType=$this->model->TrType();
			$this->view->WedType=$this->model->WedType();
			$this->view->pagelist=$this->model->pagelist();
			$this->view->Area=$this->model->AreaList();
			$this->view->pages=$this->model->pages($id);
			$this->view->HMenu=$this->model->HMenu();
			$this->view->Title=$id;
			$this->view->render('header');
			$this->view->render('page/index');
			$this->view->render('footer');
		}else{
			header('location: '.URL);
		}
	}
    
}