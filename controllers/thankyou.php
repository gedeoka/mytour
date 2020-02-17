<?php

class thankyou extends Controllers{
    function __construct() {
        parent::__construct();
        
             if( ! ini_get('date.timezone') )
		{
			date_default_timezone_set('GMT');
		} 
    }
	
	function index(){
		$this->view->pagelist=$this->model->pagelist();
		$ID="APA".date("ymdhi");
		if (($_GET["prod2"])=="Tour"){
			$prod=explode("|",$_GET["prod"]);
			echo $_GET["prod"];
			$ci=explode("/",$_GET["checkin"]);
			//$co=explode("/",$_GET["checkout"]);
			
			$data=array();
			$data["ID"]=$ID;
			$data["CI"]=$_GET["checkin"];
			//$data["CO"]=$_GET["checkout"];
			$data["name"]=$_GET["name"];
			$data["email"]=$_GET["email"];
			$data["mobile"]=$_GET["mobile"];
			$data["total"]=$_GET["total"];
			$data["option"]=$_GET["option"];
			$data["Guest"]=$_GET["Guest"];
			$data["checkin"]=$ci[2]."-".$ci[1]."-".$ci[0];
			//$data["checkout"]=$co[2]."-".$co[1]."-".$co[0];
			$data["adult"]=$_GET["adult"];
			$data["total"]=$_GET["total"];
			//$data["cur"]=Code::GetField('tour','Cur',"TourID='".$prod[2]."'");
			//$data["sts"]=Code::GetField('tour','sts',"TourID='".$prod[2]."'");
			$data["Price1"]=Code::GetField('tour','Price1',"TourID='".$prod[2]."'");
			$data["Price2"]=Code::GetField('tour','Price2',"TourID='".$prod[2]."'");
			//$data["Packagetype"]="1";
			$data["ProdID"]=$prod[2];
			$data["type"]="tour";
			$data["ProdName"]=$prod[1];
			if (isset($_GET["child"])){
				$data["child"]=$_GET["child"];
			}else{
				$data["child"]=0;
			}
			$this->view->single=$this->model->SingleProd($prod[2]);
			$this->view->sts="Tour";
			$this->view->NoBook=$ID;
			$this->model->SaveBooking($data);
			//$this->model->SendMail($data);
			$this->view->render('header2');
	
		$this->view->render('thankyou/index');
		$this->view->render('footer');
		}elseif(($_GET["prod2"])=="Hotel"){
			$prod=explode("|",$_GET["prod"]);
			//echo $_GET["prod"];
			$ci=explode("/",$_GET["checkin"]);
			//$co=explode("/",$_GET["checkout"]);
			
			$data=array();
			$data["ID"]=$ID;
			$data["CI"]=$_GET["checkin"];
			//$data["CO"]=$_GET["checkout"];
			$data["name"]=$_GET["name"];
			$data["email"]=$_GET["email"];
			$data["mobile"]=$_GET["mobile"];
			$data["total"]=$_GET["total"];
			$data["option"]=$_GET["option"];
			$data["Guest"]=$_GET["Guest"];
			$data["checkin"]=$ci[2]."-".$ci[1]."-".$ci[0];
			//$data["checkout"]=$co[2]."-".$co[1]."-".$co[0];
			$data["adult"]=$_GET["adult"];
			$data["total"]=$_GET["total"];
			//$data["cur"]=Code::GetField('tour','Cur',"TourID='".$prod[2]."'");
			//$data["sts"]=Code::GetField('tour','sts',"TourID='".$prod[2]."'");
			$data["Price1"]=Code::requery("select Min(Price) as Price from roomprdtl where RoomID='".$prod[0]."' ","Price");
			$data["Price2"]=Code::requery("select Min(Price) as Price from roomprdtl where RoomID='".$prod[0]."' ","Price");
			$data["Packagetype"]="2";
			$data["ProdID"]=$prod[0];
			$data["type"]="hotel";
			$data["ProdName"]=$prod[1];
			if (isset($_GET["child"])){
				$data["child"]=$_GET["child"];
			}else{
				$data["child"]=0;
			}
			//$this->view->single=$this->model->SingleProd($prod[2]);
			$this->view->single=$this->model->HotelOrder($prod[0],$prod[1]);
			$this->view->sts="Tour";
			$this->view->NoBook=$ID;
			$this->model->SaveBooking($data);
			$this->view->RoomID=$prod[0];
			$this->view->HotelID=$prod[1];
			$this->view->render('header2');
	
		$this->view->render('thankyou/hotel');
		$this->view->render('footer');
		}
		if (isset($_GET["yoga"])){
			$prod=explode(" | ",$_GET["yoga"]);
			//echo $prod[2];
			$ci=explode("/",$_GET["checkin"]);
			$co=explode("/",$_GET["checkout"]);
			
			$data=array();
			$data["ID"]=$ID;
			$data["CI"]=$_GET["checkin"];
			//$data["CO"]=$_GET["checkout"];
			$data["name"]=$_GET["name"];
			$data["email"]=$_GET["email"];
			$data["mobile"]=$_GET["mobile"];
			$data["total"]=$_GET["total"];
			$data["option"]=$_GET["option"];
			$data["Guest"]=$_GET["Guest"];
			$data["checkin"]=$ci[2]."-".$ci[1]."-".$ci[0];
			//$data["checkout"]=$co[2]."-".$co[1]."-".$co[0];
			$data["adult"]=$_GET["adult"];
			$data["total"]=$_GET["total"];
			$data["cur"]=Code::GetField('yoga','Cur',"YogaID='".$prod[2]."'");
			//$data["sts"]=Code::GetField('tour','sts',"TourID='".$prod[2]."'");
			$data["Price1"]=Code::GetField('yoga','Price1',"YogaID='".$prod[2]."'");
			$data["Price2"]=Code::GetField('yoga','Price2',"YogaID='".$prod[2]."'");
			$data["Packagetype"]="2";
			$data["ProdID"]=$prod[2];
			$data["type"]="yoga";
			$data["ProdName"]=$prod[1];
			if (isset($_GET["child"])){
				$data["child"]=$_GET["child"];
			}else{
				$data["child"]=0;
			}
			
			$this->view->sts="Yoga";
			$this->view->NoBook=$ID;
			$this->model->SaveBooking($data);
			//$this->model->SendMail($data);
			$this->view->single=$this->model->SingleYoga($prod[2]);
			$this->view->render('header2');
	
		$this->view->render('thankyou/index');
		$this->view->render('footer');
		}if (isset($_GET["wedding"])){
			$prod=explode(" | ",$_GET["wedding"]);
			//echo $prod[2];
			$ci=explode("/",$_GET["checkin"]);
			//$co=explode("/",$_GET["checkout"]);
			
			$data=array();
			$data["ID"]=$ID;
			$data["CI"]=$_GET["checkin"];
			//$data["CO"]=$_GET["checkout"];
			$data["name"]=$_GET["name"];
			$data["email"]=$_GET["email"];
			$data["mobile"]=$_GET["mobile"];
			$data["total"]=$_GET["total"];
			$data["option"]=$_GET["option"];
			$data["Guest"]=$_GET["Guest"];
			$data["checkin"]=$ci[2]."-".$ci[1]."-".$ci[0];
			//$data["checkout"]=$co[2]."-".$co[1]."-".$co[0];
			$data["adult"]="1";
			$data["total"]=$_GET["total"];
			$data["cur"]=Code::GetField('wedding','Cur',"WeddingID='".$prod[2]."'");
			//$data["sts"]=Code::GetField('wedding','sts',"WeddingID='".$prod[2]."'");
			$data["Price1"]=Code::GetField('wedding','Price1',"WeddingID='".$prod[2]."'");
			$data["Price2"]=Code::GetField('wedding','Price2',"WeddingID='".$prod[2]."'");
			$data["Packagetype"]="3";
			$data["ProdID"]=$prod[2];
			$data["type"]="wed";
			$data["ProdName"]=$prod[1];
			if (isset($_GET["child"])){
				$data["child"]=$_GET["child"];
			}else{
				$data["child"]=0;
			}
			
			$this->view->sts="Wed";
			$this->view->NoBook=$ID;
			$this->model->SaveBooking($data);
			//$this->model->SendMail($data);
			$this->view->single=$this->model->SingleWed($prod[2]);
			$this->view->render('header2');
	
		$this->view->render('thankyou/index');
		$this->view->render('footer');
		}
		if (isset($_GET["wedding"])){
			$prod=explode(" | ",$_GET["wedding"]);
			//echo $prod[2];
			$ci=explode("/",$_GET["checkin"]);
			//$co=explode("/",$_GET["checkout"]);
			
			$data=array();
			$data["ID"]=$ID;
			$data["CI"]=$_GET["checkin"];
			//$data["CO"]=$_GET["checkout"];
			$data["name"]=$_GET["name"];
			$data["email"]=$_GET["email"];
			$data["mobile"]=$_GET["mobile"];
			$data["total"]=$_GET["total"];
			$data["option"]=$_GET["option"];
			$data["Guest"]=$_GET["Guest"];
			$data["checkin"]=$ci[2]."-".$ci[1]."-".$ci[0];
			//$data["checkout"]=$co[2]."-".$co[1]."-".$co[0];
			$data["adult"]="1";
			$data["total"]=$_GET["total"];
			$data["cur"]=Code::GetField('wedding','Cur',"WeddingID='".$prod[2]."'");
			//$data["sts"]=Code::GetField('wedding','sts',"WeddingID='".$prod[2]."'");
			$data["Price1"]=Code::GetField('wedding','Price1',"WeddingID='".$prod[2]."'");
			$data["Price2"]=Code::GetField('wedding','Price2',"WeddingID='".$prod[2]."'");
			$data["Packagetype"]="3";
			$data["ProdID"]=$prod[2];
			$data["type"]="wed";
			$data["ProdName"]=$prod[1];
			if (isset($_GET["child"])){
				$data["child"]=$_GET["child"];
			}else{
				$data["child"]=0;
			}
			
			$this->view->sts="Wed";
			$this->view->NoBook=$ID;
			$this->model->SaveBooking($data);
			//$this->model->SendMail($data);
			$this->view->single=$this->model->SingleWed($prod[2]);
			$this->view->render('header2');
	
		$this->view->render('thankyou/index');
		$this->view->render('footer');
		}
		
		
	}
    
}