<?php

class home extends Controllers{
    function __construct() {
        parent::__construct();
        
             
    }
	
	function index(){
		//echo "Home/Index";
		
		$this->view->pagelist=$this->model->pagelist();
		$this->view->slides=$this->model->slides();
		$this->view->promo=$this->model->promo();
		$this->view->areas=$this->model->AreaList();
		$this->view->popular=$this->model->popular();
		$this->view->HMenu=$this->model->HMenu();
		$this->view->Title="Welcome to APA Tour ";
		
		//echo "render";
		$this->view->render('header');
		
		$this->view->render('home/index');
		$this->view->render('footer');
	}
    
}