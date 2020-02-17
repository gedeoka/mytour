<?php

class lists extends Controllers{
   
    function __construct() {
        parent::__construct();
        
             
    }
	
	function index($id=false){
		if ($id==""){
			header('location: '.URL);
			
		}else{
			echo $id;
		$this->view->HMenu=$this->model->HMenu();
		if(isset($_GET["area"])){
			//echo $_GET["area"];
			$this->view->listarea=$this->model->listarea($_GET["area"]);
			$this->view->ByCountry=$this->model->ByCountry();
			$this->view->tps="tr";
			$this->view->Title="Tour At ".$_GET["area"];
			$this->view->Desk=Code::getField('area','Desk',"AreaName like '%".$_GET["area"]."%'");
			$this->view->render('header');
			$this->view->render('lists/index');
			$this->view->render('footer');
		}elseif(isset($_GET["country"])){
			//echo $_GET["area"];
			$this->view->listcountry=$this->model->listcountry($_GET["country"]);
			$this->view->ByCountry=$this->model->ByCountry();
			$this->view->Title="Tour At".$_GET["country"];
			$this->view->tps="tr";
			$this->view->Desk=Code::getField('country','Desk',"CountryName like '%".$_GET["country"]."%'");
			$this->view->render('header');
			$this->view->render('lists/country');
			$this->view->render('footer');
		}elseif(isset($_GET["tour"])){
			//echo $_GET["tour"];
			$this->view->listarea=$this->model->listtype($_GET["tour"]);
			
			$this->view->Title="All ".$_GET["tour"];
			$this->view->tps="tr";
			$this->view->render('header');
			$this->view->render('lists/index');
			$this->view->render('footer');
		}elseif(isset($_GET["honeymoon"])){
			//echo $_GET["area"];
			$this->view->listarea=$this->model->lshoneymoon();
			//$this->view->TourType=$this->model->TourType();
			$this->view->Title="All Honeymoon Package";
			$this->view->tps="hm";
			$this->view->render('header');
			$this->view->render('lists/index');
			$this->view->render('footer');
		}elseif(isset($_GET["yoga"])){
			//echo $_GET["area"];
			
			$this->view->listarea=$this->model->lsyoga();
			//$this->view->TourType=$this->model->TourType();
			$this->view->Title="All Yoga Package";
			$this->view->render('header');
			$this->view->render('lists/yoga');
			$this->view->render('footer');
		}elseif(isset($_GET["eo"])){
			//echo $_GET["eo"];
			
			$this->view->listarea=$this->model->lswedding($_GET["eo"]);
			$this->view->TourType=$this->model->TourType();
			$this->view->Title="All Wedding Package";
			$this->view->render('header');
			$this->view->render('lists/wedding');
			$this->view->render('footer');
		}elseif(isset($_GET["umroh"])){
			//echo $_GET["area"];
			
			//$this->view->listarea=$this->model->lswedding();
			//$this->view->TourType=$this->model->TourType();
			//$this->view->Title="Tours :";
			$this->view->render('header');
			$this->view->render('lists/umroh');
			$this->view->render('footer');
		}else{
			header('location: '.URL);
		}
		//$this->view->slides=$this->model->slides();
		//$this->view->promo=$this->model->promo();
		//$this->view->areas=$this->model->AreaList();
		//$this->view->popular=$this->model->popular();
		//$this->view->render('lists/index');
		}
	}
	
}