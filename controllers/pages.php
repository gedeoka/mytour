<?php

class pages extends Controllers{
    function __construct() {
        parent::__construct();
        
             
    }
	
	function index(){
			header('location: '.URL);
	}
    function lists($id=false){
		//echo "Home/Index";
		if ($id==""){
			header('location: '.URL);
			
		}else{
			//echo $id;
			$this->view->HMenu=$this->model->HMenu();
			$this->view->listarea=$this->model->listprod($id);
			$this->view->pagelist=$this->model->pagelist();
			$this->view->Title="All ".str_replace("-"," ",$id);
			//echo "render";
			$this->view->render('header');
			
			$this->view->render('pages/lists');
			$this->view->render('footer');
		}
		
		
	}
	function detail($id=false){
		//echo "Home/Index";
		if ($id==""){
			header('location: '.URL);
			
		}else{
			//echo $id;
			$dt=explode(",$",$id);
			$this->view->HMenu=$this->model->HMenu();
			$details=explode(",$",$id);
			//echo "Name : ".$details[0]."<br>ID : ".$details[1];
			$this->view->imglist=$this->model->imglist($details[1]);
			$this->view->single=$this->model->Single($details[1]);
				$this->view->Other=$this->model->randtour($details[1]);
			$this->view->trs="tr";
			$this->view->pagelist=$this->model->pagelist();
			$this->view->render('header1');
			$this->view->render('pages/detail');
			$this->view->render('footer');
		}
		
		
	}
	function tiket(){
		
			$this->view->HMenu=$this->model->HMenu();
			
			$this->view->pages=$this->model->SingleTiket();
			$this->view->pagelist=$this->model->pagelist();
			$this->view->Title="Promo Tiket Murah";
			$this->view->render('header');
			$this->view->render('pages/index');
			$this->view->render('footer');
		
	}
	function hotel(){
		
			$this->view->HMenu=$this->model->HMenu();
			
			$this->view->HotelList=$this->model->HotelList();
			$this->view->pagelist=$this->model->pagelist();
			$this->view->Title="Our All Hotel";
			$this->view->render('header');
			$this->view->render('pages/hotel');
			$this->view->render('footer');
		
	}
	function hoteldtl($id=false){
		if ($id==""){
			header('location: '.URL);
			
		}else{
			$dt=explode(",$",$id);
			$this->view->HMenu=$this->model->HMenu();
			$details=explode(",$",$id);
			//echo "Name : ".$details[0]."<br>ID : ".$details[1];
			$this->view->imglist=$this->model->HTimglist($details[1]);
			$this->view->single=$this->model->SingleHT($details[1]);
			$this->view->HotelRoom=$this->model->HotelRoom($details[1]);
				//$this->view->Other=$this->model->randtour($details[1]);
			$this->view->trs="ht";
			$this->view->pagelist=$this->model->pagelist();
			$this->view->render('header1');
			$this->view->render('pages/hoteldtl');
			$this->view->render('footer');
		}
	}
}