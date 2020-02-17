<?php

class contact extends Controllers{
    function __construct() {
        parent::__construct();
        
             
    }
	
	function index(){
			if (isset($_POST["name"])){
				$this->view->msg=$this->model->SendMail();
				$this->view->Info="Message Already Send ";	
			}
			$this->view->HMenu=$this->model->HMenu();
			$this->view->TourType=$this->model->TourByType();
			$this->view->TrType=$this->model->TrType();
			$this->view->WedType=$this->model->WedType();
			$this->view->pagelist=$this->model->pagelist();
			$this->view->Area=$this->model->AreaList();
			$this->view->Title="Contact Us at ";
			//$this->view->pages=$this->model->pages($id);
			$this->view->render('header');
			$this->view->render('contact/index');
			$this->view->render('footer');
		
	}
    
}