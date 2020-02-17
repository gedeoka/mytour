<?php

class detail extends Controllers{
    function __construct() {
        parent::__construct();
        
             
    }
	
	function index(){
		//$this->view->slides=$this->model->slides();
		//$this->view->promo=$this->model->promo();
		//$this->view->areas=$this->model->AreaList();
		//$this->view->popular=$this->model->popular();
		$this->view->TourType=$this->model->TourByType();
		$this->view->TrType=$this->model->TrType();
		$this->view->WedType=$this->model->WedType();
		$this->view->pagelist=$this->model->pagelist();
		if (isset($_GET["details"])){
		$details=explode(",$",$_GET["details"]);
		//echo "Name : ".$details[0]."<br>ID : ".$details[1];
		$this->view->imglist=$this->model->imglist($details[1]);
		$this->view->single=$this->model->Single($details[1]);
		$this->view->Tour=$this->model->TourDetail($details[1]);
			$this->view->Other=$this->model->randtour($details[1]);
		$this->view->trs="tr";
		$this->view->ByArea=$this->model->TourByArea();
		$this->view->ByCountry=$this->model->TourByCountry();
		$this->view->ByType=$this->model->TourByType();
		$this->view->render('header1');
		$this->view->render('detail/index');
		$this->view->render('footer');
		}elseif (isset($_GET["honeymoon"])){
		$details=explode(",$",$_GET["honeymoon"]);
		//echo "Name : ".$details[0]."<br>ID : ".$details[1];
		$this->view->imglist=$this->model->imglist($details[1]);
		$this->view->single=$this->model->SingleHm($details[1]);
		$this->view->Tour=$this->model->TourDetail($details[1]);
			$this->view->Other=$this->model->randhm($details[1]);
		$this->view->trs="hm";
		$this->view->ByArea=$this->model->TourByArea();
		$this->view->ByCountry=$this->model->TourByCountry();
		$this->view->ByType=$this->model->TourByType();
		$this->view->render('header1');
		$this->view->render('detail/index');
		$this->view->render('footer');
		}elseif (isset($_GET["yoga"])){
		$details=explode(",$",$_GET["yoga"]);
		//echo "Name : ".$details[0]."<br>ID : ".$details[1];
		$this->view->imglist=$this->model->YogaimgLs($details[1]);
		$this->view->single=$this->model->SingleYoga($details[1]);
			$this->view->Other=$this->model->randyg($details[1]);
			$this->view->trs="yg";
		$this->view->ByArea=$this->model->TourByArea();
		$this->view->ByCountry=$this->model->TourByCountry();
		$this->view->ByType=$this->model->TourByType();
		$this->view->render('header1');
		$this->view->render('detail/yoga');
		$this->view->render('footer');
		}elseif (isset($_GET["wedding"])){
		$details=explode(",$",$_GET["wedding"]);
		//echo "Name : ".$details[0]."<br>ID : ".$details[1];
		$this->view->imglist=$this->model->WeddingimgLs($details[1]);
		$this->view->single=$this->model->SingleWedding($details[1]);
			$this->view->Other=$this->model->randwd($details[1]);
			$this->view->trs="wd";
		$this->view->ByArea=$this->model->TourByArea();
		$this->view->ByCountry=$this->model->TourByCountry();
		$this->view->ByType=$this->model->TourByType();
		$this->view->render('header1');
		$this->view->render('detail/wedding');
		$this->view->render('footer');
		}else{
			header('location: '.URL);
		}
		
	}
    
}