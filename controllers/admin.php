<?php

class admin extends Controllers{
    function __construct() {
        parent::__construct();
        if( ! ini_get('date.timezone') )
		{
			date_default_timezone_set('GMT');
		}
             
    }
    function index(){
        Session::init();
        $loggin =  Session::get('abraham');
        $type =  Session::get('TypeID');
        $usr =  Session::get('user');
        //echo $type."--";
		//echo $loggin;
        if($loggin == FALSE){
            Session::destroy();
            $this->view->render('login/index2');
            exit;            
        }else{
           //echo $type;
           //echo $usr; 
           
            if($type==1){//admin
                $this->view->render('admin/index');
                exit;
				/*
            }elseif($type==2){//partner / hotel
                //echo 'page is under Contruction';
                $this->view->render('partner/index');
                exit;
            }elseif($type==3){
                header('location: '.URL.'agent/index');//agent
                //$this->view->render('ina/logindex');
                exit;
            }elseif($type==4){ //member
                header('location: '.URL.'ina');
                //$this->view->render('ina/logindex');
                exit;
				*/
            }else{
                Session::destroy();
                header('location: '.URL.'login/error/3');
                exit;  
            }
             
        }
    }
	/*---------------- Tour ----------------*/
    function tour(){
        Session::init();
        $loggin =  Session::get('abraham');
        $type =  Session::get('TypeID');
        $usr =  Session::get('user');
        
        //echo $type."--";
        if($loggin == FALSE){
            Session::destroy();
            //$this->view->render('login/index2');
			
			header('location: '.URL);
            exit;            
        }else{
           //echo $type;
           //echo $usr; 
           
            if($type==1){//admin
				$this->view->listtour=$this->model->listtour();
                $this->view->render('admin/tour/index1');
                exit;
            }else{
				Session::destroy();
				//$this->view->render('login/index2');
				header('location: '.URL);
				exit;
			}
			
             
        }
        //header('location: '.URL);
		//exit;
    }
	function touraddtour(){
        Session::init();
        $loggin =  Session::get('abraham');
        $type =  Session::get('TypeID');
        $usr =  Session::get('user');
        
        //echo $type."--";
        if($loggin == FALSE){
            Session::destroy();
            //$this->view->render('login/index2');
			header('location: '.URL);
            exit;            
        }else{
           //echo $type;
           //echo $usr; 
           
            if($type==1){//admin
				
				$this->view->areas=$this->model->areas();
				$this->view->country=$this->model->country();
				$this->view->tourtype=$this->model->listtourtype();
				$this->view->tourcat=$this->model->listtourcat();
                $this->view->render('admin/tour/addtour');
                exit;
            }else{
				Session::destroy();
				//$this->view->render('login/index2');
				exit;
			}
			
             
        }
    }
	function toursavetour(){
        Session::init();
        $loggin =  Session::get('abraham');
        $type =  Session::get('TypeID');
        $usr =  Session::get('user');
        
        //echo $type."--";
        if($loggin == FALSE){
            Session::destroy();
            //$this->view->render('login/index2');
			header('location: '.URL);
            exit;            
        }else{
           //echo $type;
           //echo $usr; 
           
            if($type==1){//admin
				$data=array();
				$data["TourID"]=$_POST["TourID"];
				$data["TourName"]=$_POST["TourName"];
				$data["Iten"]=$_POST["iten"];
				$data["CountryID"]=$_POST["country"];
				$data["TourType"]=$_POST["tourtype"];
				$data["TourCat"]=$_POST["tourcat"];
				$data["TourCode"]=$_POST["TourCode"];
				$data["PriceType"]=$_POST["pricetype"];
				$y=count($_POST["tag"]);
				$tags = $_POST['tag']; 
				$tag="";
				foreach($tags as $val) {					
					$tag=$tag.$val.',';
				}
				//echo $tag; q
				$data["Area"]=$tag;
				
				$data["Desk"]=str_replace("'","&#39;",$_POST["desk"]);
				$data["Inclusion"]=str_replace("'","&#39;",$_POST["Inclusion"]);
				$data["Exclusion"]=str_replace("'","&#39;",$_POST["Exclusion"]);
				$data["Term"]=str_replace("'","&#39;",$_POST["Term"]);
				$data["Cur"]=$_POST["Cur"];
				$data["Price1"]=$_POST["Price1"];
				$data["Price2"]=$_POST["Price2"];
				$this->model->CreateTour($data);
				header('location: '.URL.'admin/tour');
                exit;
            }else{
				Session::destroy();
				//$this->view->render('login/index2');
				header('location: '.URL);
				exit;
			}
			
             
        }
    }
    
	function touredittour($id){
        Session::init();
        $loggin =  Session::get('abraham');
        $type =  Session::get('TypeID');
        $usr =  Session::get('user');
        
        //echo $type."--";
        if($loggin == FALSE){
            Session::destroy();
            //$this->view->render('login/index2');
			header('location: '.URL);
            exit;            
        }else{
           //echo $type;
           //echo $usr; 
           
            if($type==1){//admin
				
				$this->view->singletour=$this->model->singletour($id);
				$this->view->areas=$this->model->areas();
				$this->view->country=$this->model->country();
				$this->view->tourtype=$this->model->listtourtype();
				$this->view->tourcat=$this->model->listtourcat();
                $this->view->render('admin/tour/edittour');
                exit;
            }else{
				Session::destroy();
				//$this->view->render('login/index2');
				exit;
			}
			
             
        }
    }
	
	function tourupdatetour(){
        Session::init();
        $loggin =  Session::get('abraham');
        $type =  Session::get('TypeID');
        $usr =  Session::get('user');
        
        //echo $type."--";
        if($loggin == FALSE){
            Session::destroy();
            //$this->view->render('login/index2');
			header('location: '.URL);
            exit;            
        }else{
           //echo $type;
           //echo $usr; 
           
            if($type==1){//admin
								$data=array();
				$data["TourID"]=$_POST["TourID"];
				$data["TourName"]=$_POST["TourName"];
				$data["Iten"]=$_POST["iten"];
				$data["CountryID"]=$_POST["country"];
				$data["TourType"]=$_POST["tourtype"];
				$data["TourCat"]=$_POST["tourcat"];
				$data["TourCode"]=$_POST["TourCode"];
				$data["PriceType"]=$_POST["pricetype"];
				$y=count($_POST["tag"]);
				$tags = $_POST['tag']; 
				$tag="";
				foreach($tags as $val) {					
					$tag=$tag.$val.',';
				}
				//echo $tag; q
				$data["Area"]=$tag;
				
				$data["Desk"]=str_replace("'","&#39;",$_POST["desk"]);
				$data["Inclusion"]=str_replace("'","&#39;",$_POST["Inclusion"]);
				$data["Exclusion"]=str_replace("'","&#39;",$_POST["Exclusion"]);
				$data["Term"]=str_replace("'","&#39;",$_POST["Term"]);
				$data["Cur"]=$_POST["Cur"];
				$data["Price1"]=$_POST["Price1"];
				$data["Price2"]=$_POST["Price2"];
				$this->model->UpdateTour($data);
				header('location: '.URL.'admin/tour');
                exit;
            }else{
				Session::destroy();
				//$this->view->render('login/index2');
				header('location: '.URL);
				exit;
			}
			
             
        }
    }
	function toursetgallery($id){
        Session::init();
        $loggin =  Session::get('abraham');
        $type =  Session::get('TypeID');
        $usr =  Session::get('user');
        
        //echo $type."--";
        if($loggin == FALSE){
            Session::destroy();
            //$this->view->render('login/index2');
			header('location: '.URL);
            exit;            
        }else{
           //echo $type;
           //echo $usr; 
           
            if($type==1){//admin
				if($id<>""){
				if (isset($_FILES['files'])){
				   $this->model->TourUpload($id);
				}
				$this->view->GalList=$this->model->GalList($id);
				$this->view->render('admin/tour/tourgallery');
				}else{
					
					header('location: '.URL);
				}
                exit;
            }else{
				Session::destroy();
				//$this->view->render('login/index2');
				header('location: '.URL);
				exit;
			}
			
             
        }
    }
	function tourdelgal(){
        Session::init();
        $loggin =  Session::get('abraham');
        $type =  Session::get('TypeID');
        $usr =  Session::get('user');
        
        //echo $type."--";
        if($loggin == FALSE){
            Session::destroy();
            //$this->view->render('login/index2');
			header('location: '.URL);
            exit;            
        }else{
           //echo $type;
           //echo $usr; 
           
            if($type==1){//admin
				$this->model->delgal();
                exit;
            }else{
				Session::destroy();
				//$this->view->render('login/index2');
				exit;
			}
        }
    }
	function toursdefg(){
        Session::init();
        $loggin =  Session::get('abraham');
        $type =  Session::get('TypeID');
        $usr =  Session::get('user');
        
        //echo $type."--";
        if($loggin == FALSE){
            Session::destroy();
            //$this->view->render('login/index2');
			header('location: '.URL);
            exit;            
        }else{
           //echo $type;
           //echo $usr; 
           
            if($type==1){//admin
				$this->model->toursdefg();
                exit;
            }else{
				Session::destroy();
				//$this->view->render('login/index2');
				exit;
			}
        }
    }
	function tourunsetg(){
        Session::init();
        $loggin =  Session::get('abraham');
        $type =  Session::get('TypeID');
        $usr =  Session::get('user');
        
        //echo $type."--";
        if($loggin == FALSE){
            Session::destroy();
            //$this->view->render('login/index2');
			header('location: '.URL);
            exit;            
        }else{
           //echo $type;
           //echo $usr; 
           
            if($type==1){//admin
				$this->model->tourunsetg();
                exit;
            }else{
				Session::destroy();
				//$this->view->render('login/index2');
				exit;
			}
        }
    }
	
	function tourvoidtour(){
        Session::init();
        $loggin =  Session::get('abraham');
        $type =  Session::get('TypeID');
        $usr =  Session::get('user');
        
        //echo $type."--";
        if($loggin == FALSE){
            Session::destroy();
            //$this->view->render('login/index2');
			header('location: '.URL);
            exit;            
        }else{
           //echo $type;
           //echo $usr; 
           
            if($type==1){//admin
				$this->model->voidtour();
                exit;
            }else{
				Session::destroy();
				//$this->view->render('login/index2');
				exit;
			}
        }
    }
	function touracttour(){
        Session::init();
        $loggin =  Session::get('abraham');
        $type =  Session::get('TypeID');
        $usr =  Session::get('user');
        
        //echo $type."--";
        if($loggin == FALSE){
            Session::destroy();
            //$this->view->render('login/index2');
			header('location: '.URL);
            exit;            
        }else{
           //echo $type;
           //echo $usr; 
           
            if($type==1){//admin
				$this->model->acttour();
                exit;
            }else{
				Session::destroy();
				//$this->view->render('login/index2');
				exit;
			}
        }
    }
	function toursetprice($id){
        Session::init();
        $loggin =  Session::get('abraham');
        $type =  Session::get('TypeID');
        $usr =  Session::get('user');
        //echo $type."--";
        if($loggin == FALSE){
            Session::destroy();
            //$this->view->render('login/index2');
			header('location: '.URL);
            exit;            
        }else{
           //echo $type;
           //echo $usr; 
           
            if($type==1){//admin
				
                $this->view->listPrice=$this->model->listPrice($id);
				$this->view->TourID=$id;
				$this->view->CancelList=$this->model->CancelList();
				$this->view->TourName=Code::getField("tour","TourName","TourID='".$id."'");
				$this->view->render('admin/tour/setprice');
				
                exit;
            }else{
                Session::destroy();
                //header('location: '.URL.'login/index2');
				header('location: '.URL);
                exit;  
            }
             
        }
    }
	function touraddsetprice(){
        Session::init();
        $loggin =  Session::get('abraham');
        $type =  Session::get('TypeID');
        $usr =  Session::get('user');
        //echo $type."--";
        if($loggin == FALSE){
            Session::destroy();
            $this->view->render('login/index2');
            exit;            
        }else{
           //echo $type;
           //echo $usr; 
           
            if($type==1){//admin
                $data=array();
				$data['TourID']=$_GET['TourID'];
				$data['Starts']=$_GET['str'];
				$data['Ends']=$_GET['tos'];
				$data['Commision']=$_GET['Commision'];
				$data['Price']=$_GET['prices'];
				$data['Cur1']=$_GET['Cur1'];
				$data['Cur2']=$_GET['Cur2'];
				$data['SellPrice']=$_GET['SellPrice'];
				$data['Price2']=$_GET['prices2'];
				$data['SellPrice2']=$_GET['SellPrice2'];
				
				if (isset($_GET["Cancelation"])){
					$data["Cancelation"]=1;
					//echo "Cancel Yes";
				}else{
					$data["Cancelation"]=0;
					//echo "Cancel NO";
				}
				if (isset($_GET["CancelTerm"])){
					$data["CancelationTerm"]=$_GET["CancelTerm"];
					//echo "Cancel Yes";
				}else{
					$data["CancelationTerm"]=1;
					//echo "Cancel NO";
				}
				
				$this->model->CreateSetPrice($data);
				header('location: '.URL.'admin/toursetprice/'.$data['TourID']);
            }else{
                Session::destroy();
                header('location: '.URL.'login/index2');
				header('location: '.URL);
                exit;  
            }
             
        }
    }
    function touredittourprice($id){
        Session::init();
        $loggin =  Session::get('abraham');
        $type =  Session::get('TypeID');
        $usr =  Session::get('user');
        //echo $type."--";
        if($loggin == FALSE){
            Session::destroy();
            //$this->view->render('login/index2');
			header('location: '.URL);
            exit;            
        }else{
           //echo $type;
           //echo $usr; 
           
            if($type==1){//admin
			$ix=explode("_",$id);
				$this->view->TourID=$ix[0];
				$this->view->TourName=Code::getField("tour","TourName","TourID='".$ix[0]."'");
                $this->view->SinggleTourPrice=$this->model->SinggleTourPrice($id);
				$this->view->CancelList=$this->model->CancelList();
				$this->view->render('admin/tour/edittourprice');
                exit;
            }else{
                Session::destroy();
                //header('location: '.URL.'login/index2');
				header('location: '.URL);
                exit;  
            }
             
        }
    }
	function touruptourprice($id){
        Session::init();
        $loggin =  Session::get('abraham');
        $type =  Session::get('TypeID');
        $usr =  Session::get('user');
        //echo $type."--";
        if($loggin == FALSE){
            Session::destroy();
            //$this->view->render('login/index2');
			header('location: '.URL);
            exit;            
        }else{
           //echo $type;
           //echo $usr; 
           
            if($type==1){//admin
                $data=array();
				$xx=explode("_",$id);
				$data['TourID']=$xx[0];
				$data['ID']=$xx[1];
				$data['Starts']=$_POST['Starts'];
				$data['Ends']=$_POST['Ends'];
				$data['Price']=$_POST['Price'];
				$data['Price2']=$_POST['Price2'];
				$data['Cur']=$_POST['Cur1'];
				$data['Cur2']=$_POST['Cur2'];
				$data['Commision']=$_POST['Commision'];
				$data['SellPrice']=$_POST['SellPrice'];
				$data['SellPrice2']=$_POST['SellPrice2'];
				if (isset($_POST["Cancelation"])){
					$data["Cancelation"]=1;
				}else{
					$data["Cancelation"]=0;
				}
				$data["CancelationTerm"]=$_POST["CancelTerm"];
				$this->model->uptourprice($data);
				header('location: '.URL.'admin/toursetprice/'.$xx[0]);
            }else{
                Session::destroy();
                //header('location: '.URL.'login/index2');
				header('location: '.URL);
                exit;  
            }
             
        }
    }
	/*----------- End Tour -------------*/
	
	/*----------- TIKET -------------*/
	
	function tiket(){
		$id=1;
        Session::init();
        $loggin =  Session::get('abraham');
        $type =  Session::get('TypeID');
        $usr =  Session::get('user');
        
        //echo $type."--";
        if($loggin == FALSE){
            Session::destroy();
            //$this->view->render('login/index2');
			header('location: '.URL);
            exit;            
        }else{
           //echo $type;
           //echo $usr; 
           
            if($type==1){//admin
				$this->view->Single=$this->model->SingleTiket($id);
                $this->view->render('admin/tiket/edit');
                exit;
            }else{
				Session::destroy();
				//$this->view->render('login/index2');
				exit;
			}
			
             
        }
    }
	function updtiket(){
        Session::init();
        $loggin =  Session::get('abraham');
        $type =  Session::get('TypeID');
        $usr =  Session::get('user');
        
        //echo $type."--";
        if($loggin == FALSE){
            Session::destroy();
            //$this->view->render('login/index2');
			header('location: '.URL);
            exit;            
        }else{
           //echo $type;
           //echo $usr; 
           
            if($type==1){//admin
				$data["title"]=$_POST["title"];
				$data["id"]=$_POST["id"];
				
				$data["content"]=str_replace("'","&#39;",$_POST["desk"]);
                $this->model->UpdTiket($data);
				header('location: '.URL.'admin/tiket');
                exit;
            }else{
				Session::destroy();
				exit;
			}
			
             
        }
    }
	
	/*----------- End Tiket -------------*/
	
	/*----------- Area -------------*/
	function charea(){
        Session::init();
        $loggin =  Session::get('abraham');
        $type =  Session::get('TypeID');
        $usr =  Session::get('user');
        
        //echo $type."--";
        if($loggin == FALSE){
            Session::destroy();
            //$this->view->render('login/index2');
			header('location: '.URL);
            exit;            
        }else{
           //echo $type;
           //echo $usr; 
           
            if($type==1){//admin
				$data=$this->model->charea();
				return $data;
                exit;
            }else{
				Session::destroy();
				//$this->view->render('login/index2');
				exit;
			}
        }
    }
	function area(){
        Session::init();
        $loggin =  Session::get('abraham');
        $type =  Session::get('TypeID');
        $usr =  Session::get('user');
        //echo $type."--";
        if($loggin == FALSE){
            Session::destroy();
            //$this->view->render('login/index2');
			header('location: '.URL);
            exit;            
        }else{
           //echo $type;
           //echo $usr; 
           
            if($type==1){//admin
                $this->view->listarea=$this->model->listarea();
				$this->view->country=$this->model->country();
				$this->view->render('admin/area/index1');
				
                exit;
            }else{
                Session::destroy();
                //header('location: '.URL.'login/index2');
				header('location: '.URL);
                exit;  
            }
             
        }
    }
	function addarea(){
        Session::init();
        $loggin =  Session::get('abraham');
        $type =  Session::get('TypeID');
        $usr =  Session::get('user');
        //echo $type."--";
        if($loggin == FALSE){
            Session::destroy();
            //$this->view->render('login/index2');
			header('location: '.URL);
            exit;            
        }else{
           //echo $type;
           //echo $usr; 
           
            if($type==1){//admin
                $data=array();
				$data['name']=$_POST['areaname'];
				
				$this->model->areacreate($data);
				
				header('location: '.URL.'admin/area');
            }else{
                Session::destroy();
                //header('location: '.URL.'login/index2');
				header('location: '.URL);
                exit;  
            }
             
        }
    }
    function areaEdit($id){
        Session::init();
        $loggin =  Session::get('abraham');
        $type =  Session::get('TypeID');
        $usr =  Session::get('user');
        //echo $type."--";
        if($loggin == FALSE){
            Session::destroy();
            //$this->view->render('login/index2');
			header('location: '.URL);
            exit;            
        }else{
           //echo $type;
           //echo $usr; 
           
            if($type==1){//admin
                $this->view->AreaSingle=$this->model->AreaSingle($id);
				$this->view->country=$this->model->country();
				$this->view->render('admin/area/areaedit');
                exit;
            }else{
                Session::destroy();
                //header('location: '.URL.'login/index2');
				header('location: '.URL);
                exit;  
            }
             
        }
    }
	function updarea($id){
        Session::init();
        $loggin =  Session::get('abraham');
        $type =  Session::get('TypeID');
        $usr =  Session::get('user');
        //echo $type."--";
        if($loggin == FALSE){
            Session::destroy();
            //$this->view->render('login/index2');
			header('location: '.URL);
            exit;            
        }else{
           //echo $type;
           //echo $usr; 
           
            if($type==1){//admin
                $data=array();
				$data['id']=$id;
				$data['name']=$_POST['areaname'];
				$this->model->updarea($data);
				header('location: '.URL.'admin/area');
            }else{
                Session::destroy();
                //header('location: '.URL.'login/index2');
				header('location: '.URL);
                exit;  
            }
             
        }
    }
	/*----------- End Area -------------*/
	/*---------- Set Set Area -------*/
	function setarea(){
        Session::init();
        $loggin =  Session::get('abraham');
        $type =  Session::get('TypeID');
        $usr =  Session::get('user');
        
        //echo $type."--";
        if($loggin == FALSE){
            Session::destroy();
            //$this->view->render('login/index2');
			header('location: '.URL);
            exit;            
        }else{
           //echo $type;
           //echo $usr; 
           
            if($type==1){//admin
				
				$this->view->mylist=$this->model->setarealist();
				$this->view->Title="Set Area on FronPage";
				$this->view->render('admin/setarea/index1');
				
                exit;
            }else{
				Session::destroy();
				//$this->view->render('login/index2');
				header('location: '.URL);
				exit;
			}
			
             
        }
    }
	function addsetarea(){
        Session::init();
        $loggin =  Session::get('abraham');
        $type =  Session::get('TypeID');
        $usr =  Session::get('user');
        
        //echo $type."--";
        if($loggin == FALSE){
            Session::destroy();
            //$this->view->render('login/index2');
			header('location: '.URL);
            exit;            
        }else{
           //echo $type;
           //echo $usr; 
           
            if($type==1){//admin
				$this->view->Title="Choose Package";
				$this->view->mylist=$this->model->selsetarea();
				$this->view->render('admin/setarea/addarea');
				
                exit;
            }else{
				Session::destroy();
				//$this->view->render('login/index2');
				header('location: '.URL);
				exit;
			}
			
             
        }
    }
	function savesetarea(){
        Session::init();
        $loggin =  Session::get('abraham');
        $type =  Session::get('TypeID');
        $usr =  Session::get('user');
        
        //echo $type."--";
        if($loggin == FALSE){
            Session::destroy();
            //$this->view->render('login/index2');
			header('location: '.URL);
            exit;            
        }else{
           //echo $type;
           //echo $usr; 
           
            if($type==1){//admin
				$this->model->savesetarea();
                exit;
            }else{
				Session::destroy();
				//$this->view->render('login/index2');
				exit;
			}
        }
    }
	function delsetarea(){
        Session::init();
        $loggin =  Session::get('abraham');
        $type =  Session::get('TypeID');
        $usr =  Session::get('user');
        
        //echo $type."--";
        if($loggin == FALSE){
            Session::destroy();
            //$this->view->render('login/index2');
			header('location: '.URL);
            exit;            
        }else{
           //echo $type;
           //echo $usr; 
           
            if($type==1){//admin
				$this->model->delsetarea();
                exit;
            }else{
				Session::destroy();
				//$this->view->render('login/index2');
				exit;
			}
        }
    }
	/*------ End Area ----*/
	/*----------- Country -------------*/
	function Country(){
        Session::init();
        $loggin =  Session::get('abraham');
        $type =  Session::get('TypeID');
        $usr =  Session::get('user');
        //echo $type."--";
        if($loggin == FALSE){
            Session::destroy();
            //$this->view->render('login/index2');
			header('location: '.URL);
            exit;            
        }else{
           //echo $type;
           //echo $usr; 
           
            if($type==1){//admin
				
                $this->view->listcountry=$this->model->listcountry();
				$this->view->render('admin/country/index1');
				
                exit;
            }else{
                Session::destroy();
                //header('location: '.URL.'login/index2');
				header('location: '.URL);
                exit;  
            }
             
        }
    }
	function addcountry(){
        Session::init();
        $loggin =  Session::get('abraham');
        $type =  Session::get('TypeID');
        $usr =  Session::get('user');
        //echo $type."--";
        if($loggin == FALSE){
            Session::destroy();
            //$this->view->render('login/index2');
			header('location: '.URL);
            exit;            
        }else{
           //echo $type;
           //echo $usr; 
           
            if($type==1){//admin
                
				$this->model->countrycreate();
				
				header('location: '.URL.'admin/Country');
            }else{
                Session::destroy();
                //header('location: '.URL.'login/index2');
				header('location: '.URL);
                exit;  
            }
             
        }
    }
    function countryEdit($id){
        Session::init();
        $loggin =  Session::get('abraham');
        $type =  Session::get('TypeID');
        $usr =  Session::get('user');
        //echo $type."--";
        if($loggin == FALSE){
            Session::destroy();
            //$this->view->render('login/index2');
			header('location: '.URL);
            exit;            
        }else{
           //echo $type;
           //echo $usr; 
           
            if($type==1){//admin
                $this->view->CountrySingle=$this->model->CountrySingle($id);
				$this->view->render('admin/country/countryedit');
                exit;
            }else{
                Session::destroy();
                //header('location: '.URL.'login/index2');
				header('location: '.URL);
                exit;  
            }
             
        }
    }
	function updcountry($id){
        Session::init();
        $loggin =  Session::get('abraham');
        $type =  Session::get('TypeID');
        $usr =  Session::get('user');
        //echo $type."--";
        if($loggin == FALSE){
            Session::destroy();
            //$this->view->render('login/index2');
			header('location: '.URL);
            exit;            
        }else{
           //echo $type;
           //echo $usr; 
           
            if($type==1){//admin
                $data=array();
				$data['id']=$id;
				$data['name']=$_POST['country'];
				$this->model->updcountry($data);
				header('location: '.URL.'admin/Country');
            }else{
                Session::destroy();
                //header('location: '.URL.'login/index2');
				header('location: '.URL);
                exit;  
            }
             
        }
    }
	/*----------- End Country -------------*/
	/*---------- Set Country -------*/
	function setcountry(){
        Session::init();
        $loggin =  Session::get('abraham');
        $type =  Session::get('TypeID');
        $usr =  Session::get('user');
        
        //echo $type."--";
        if($loggin == FALSE){
            Session::destroy();
            //$this->view->render('login/index2');
			header('location: '.URL);
            exit;            
        }else{
           //echo $type;
           //echo $usr; 
           
            if($type==1){//admin
				
				$this->view->mylist=$this->model->setcountrylist();
				$this->view->Title="Set Country on FronPage";
				$this->view->render('admin/setcountry/index1');
				
                exit;
            }else{
				Session::destroy();
				//$this->view->render('login/index2');
				header('location: '.URL);
				exit;
			}
			
             
        }
    }
	function addsetcountry(){
        Session::init();
        $loggin =  Session::get('abraham');
        $type =  Session::get('TypeID');
        $usr =  Session::get('user');
        
        //echo $type."--";
        if($loggin == FALSE){
            Session::destroy();
            //$this->view->render('login/index2');
			header('location: '.URL);
            exit;            
        }else{
           //echo $type;
           //echo $usr; 
           
            if($type==1){//admin
				$this->view->Title="Choose Package";
				$this->view->mylist=$this->model->selsetcountry();
				$this->view->render('admin/setcountry/addcountry');
				
                exit;
            }else{
				Session::destroy();
				//$this->view->render('login/index2');
				header('location: '.URL);
				exit;
			}
			
             
        }
    }
	function savesetcountry(){
        Session::init();
        $loggin =  Session::get('abraham');
        $type =  Session::get('TypeID');
        $usr =  Session::get('user');
        
        //echo $type."--";
        if($loggin == FALSE){
            Session::destroy();
            //$this->view->render('login/index2');
			header('location: '.URL);
            exit;            
        }else{
           //echo $type;
           //echo $usr; 
           
            if($type==1){//admin
				$this->model->savesetcountry();
                exit;
            }else{
				Session::destroy();
				//$this->view->render('login/index2');
				exit;
			}
        }
    }
	function delsetcountry(){
        Session::init();
        $loggin =  Session::get('abraham');
        $type =  Session::get('TypeID');
        $usr =  Session::get('user');
        
        //echo $type."--";
        if($loggin == FALSE){
            Session::destroy();
            //$this->view->render('login/index2');
			header('location: '.URL);
            exit;            
        }else{
           //echo $type;
           //echo $usr; 
           
            if($type==1){//admin
				$this->model->delsetcountry();
                exit;
            }else{
				Session::destroy();
				//$this->view->render('login/index2');
				exit;
			}
        }
    }
	/*------ End SetCountry ----*/
	/*---------- Cancelation Status -------*/
	function cancelation(){
        Session::init();
        $loggin =  Session::get('abraham');
        $type =  Session::get('TypeID');
        $usr =  Session::get('user');
        //echo $type."--";
        if($loggin == FALSE){
            Session::destroy();
            //$this->view->render('login/index2');
			header('location: '.URL);
            exit;            
        }else{
           //echo $type;
           //echo $usr; 
           
            if($type==1){//admin
                $this->view->listcancelation=$this->model->listcancelation();
				$this->view->render('admin/cancelation/index1');
				
                exit;
            }else{
                Session::destroy();
                //header('location: '.URL.'login/index2');
				header('location: '.URL);
                exit;  
            }
             
        }
    }
	function addcancelation(){
        Session::init();
        $loggin =  Session::get('abraham');
        $type =  Session::get('TypeID');
        $usr =  Session::get('user');
        //echo $type."--";
        if($loggin == FALSE){
            Session::destroy();
            $this->view->render('login/index2');
            exit;            
        }else{
           //echo $type;
           //echo $usr; 
           
            if($type==1){//admin
                $data=array();
				$data['name']=$_GET['name'];
				$this->model->cancelationcreate($data);
				
				header('location: '.URL.'admin/cancelation');
            }else{
                Session::destroy();
                //header('location: '.URL.'login/index2');
				header('location: '.URL);
                exit;  
            }
             
        }
    }
    function cancelationEdit($id){
        Session::init();
        $loggin =  Session::get('abraham');
        $type =  Session::get('TypeID');
        $usr =  Session::get('user');
        //echo $type."--";
        if($loggin == FALSE){
            Session::destroy();
            //$this->view->render('login/index2');
			header('location: '.URL);
            exit;            
        }else{
           //echo $type;
           //echo $usr; 
           
            if($type==1){//admin
                $this->view->cancelationSingle=$this->model->cancelationSingle($id);
				$this->view->render('admin/cancelation/cancelationedit');
                exit;
            }else{
                Session::destroy();
                //header('location: '.URL.'login/index2');
				header('location: '.URL);
                exit;  
            }
             
        }
    }
	function updcancelation($id){
        Session::init();
        $loggin =  Session::get('abraham');
        $type =  Session::get('TypeID');
        $usr =  Session::get('user');
        //echo $type."--";
        if($loggin == FALSE){
            Session::destroy();
            //$this->view->render('login/index2');
			header('location: '.URL);
            exit;            
        }else{
           //echo $type;
           //echo $usr; 
           
            if($type==1){//admin
                $data=array();
				$data['id']=$id;
				$data['name']=$_GET['name'];
				$this->model->updcancelation($data);
				header('location: '.URL.'admin/cancelation');
            }else{
                Session::destroy();
                //header('location: '.URL.'login/index2');
				header('location: '.URL);
                exit;  
            }
             
        }
    }
	/*------ End Cancelation ----*/
	/*---------- SlideShow -------*/
	function slider(){
        Session::init();
        $loggin =  Session::get('abraham');
        $type =  Session::get('TypeID');
        $usr =  Session::get('user');
        
        //echo $type."--";
        if($loggin == FALSE){
            Session::destroy();
            //$this->view->render('login/index2');
			header('location: '.URL);
            exit;            
        }else{
           //echo $type;
           //echo $usr; 
           
            if($type==1){//admin
				
				if (isset($_FILES['files'])){
				   $this->model->SliderUpload();
				}
				$this->view->GalList=$this->model->SlideList();
				$this->view->render('admin/slide/index1');
				
                exit;
            }else{
				Session::destroy();
				//$this->view->render('login/index2');
				header('location: '.URL);
				exit;
			}
			
             
        }
    }
	function delslide(){
        Session::init();
        $loggin =  Session::get('abraham');
        $type =  Session::get('TypeID');
        $usr =  Session::get('user');
        
        //echo $type."--";
        if($loggin == FALSE){
            Session::destroy();
            //$this->view->render('login/index2');
			header('location: '.URL);
            exit;            
        }else{
           //echo $type;
           //echo $usr; 
           
            if($type==1){//admin
				$this->model->delslide();
                exit;
            }else{
				Session::destroy();
				//$this->view->render('login/index2');
				exit;
			}
        }
    }
	/*------ End SlideShow ----*/
	/*---------- Set Promo -------*/
	function promo(){
        Session::init();
        $loggin =  Session::get('abraham');
        $type =  Session::get('TypeID');
        $usr =  Session::get('user');
        
        //echo $type."--";
        if($loggin == FALSE){
            Session::destroy();
            //$this->view->render('login/index2');
			header('location: '.URL);
            exit;            
        }else{
           //echo $type;
           //echo $usr; 
           
            if($type==1){//admin
				
				$this->view->mylist=$this->model->promolist();
				$this->view->Title="Set Promo";
				$this->view->render('admin/promo/index1');
				
                exit;
            }else{
				Session::destroy();
				//$this->view->render('login/index2');
				header('location: '.URL);
				exit;
			}
			
             
        }
    }
	function addpromo(){
        Session::init();
        $loggin =  Session::get('abraham');
        $type =  Session::get('TypeID');
        $usr =  Session::get('user');
        
        //echo $type."--";
        if($loggin == FALSE){
            Session::destroy();
            //$this->view->render('login/index2');
			header('location: '.URL);
            exit;            
        }else{
           //echo $type;
           //echo $usr; 
           
            if($type==1){//admin
				$this->view->Title="Choose Package";
				$this->view->mylist=$this->model->seltour();
				$this->view->render('admin/promo/addpromo');
				
                exit;
            }else{
				Session::destroy();
				//$this->view->render('login/index2');
				header('location: '.URL);
				exit;
			}
			
             
        }
    }
	function savepromo(){
        Session::init();
        $loggin =  Session::get('abraham');
        $type =  Session::get('TypeID');
        $usr =  Session::get('user');
        
        //echo $type."--";
        if($loggin == FALSE){
            Session::destroy();
            //$this->view->render('login/index2');
			header('location: '.URL);
            exit;            
        }else{
           //echo $type;
           //echo $usr; 
           
            if($type==1){//admin
				$this->model->savepromo();
                exit;
            }else{
				Session::destroy();
				//$this->view->render('login/index2');
				exit;
			}
        }
    }
	function delpromo(){
        Session::init();
        $loggin =  Session::get('abraham');
        $type =  Session::get('TypeID');
        $usr =  Session::get('user');
        
        //echo $type."--";
        if($loggin == FALSE){
            Session::destroy();
            //$this->view->render('login/index2');
			header('location: '.URL);
            exit;            
        }else{
           //echo $type;
           //echo $usr; 
           
            if($type==1){//admin
				$this->model->delpromo();
                exit;
            }else{
				Session::destroy();
				//$this->view->render('login/index2');
				exit;
			}
        }
    }
	/*------ End Promo ----*/
	/*---------- Set Popular -------*/
	function popular(){
        Session::init();
        $loggin =  Session::get('abraham');
        $type =  Session::get('TypeID');
        $usr =  Session::get('user');
        
        //echo $type."--";
        if($loggin == FALSE){
            Session::destroy();
            //$this->view->render('login/index2');
			header('location: '.URL);
            exit;            
        }else{
           //echo $type;
           //echo $usr; 
           
            if($type==1){//admin
				
				$this->view->mylist=$this->model->popularlist();
				$this->view->Title="Set Popular Package";
				$this->view->render('admin/popular/index1');
				
                exit;
            }else{
				Session::destroy();
				//$this->view->render('login/index2');
				header('location: '.URL);
				exit;
			}
			
             
        }
    }
	function addpopular(){
        Session::init();
        $loggin =  Session::get('abraham');
        $type =  Session::get('TypeID');
        $usr =  Session::get('user');
        
        //echo $type."--";
        if($loggin == FALSE){
            Session::destroy();
            //$this->view->render('login/index2');
			header('location: '.URL);
            exit;            
        }else{
           //echo $type;
           //echo $usr; 
           
            if($type==1){//admin
				$this->view->Title="Choose Package";
				$this->view->mylist=$this->model->seltourpop();
				$this->view->render('admin/popular/addpopular');
				
                exit;
            }else{
				Session::destroy();
				//$this->view->render('login/index2');
				header('location: '.URL);
				exit;
			}
			
             
        }
    }
	function savepopular(){
        Session::init();
        $loggin =  Session::get('abraham');
        $type =  Session::get('TypeID');
        $usr =  Session::get('user');
        
        //echo $type."--";
        if($loggin == FALSE){
            Session::destroy();
            //$this->view->render('login/index2');
			header('location: '.URL);
            exit;            
        }else{
           //echo $type;
           //echo $usr; 
           
            if($type==1){//admin
				$this->model->savepopular();
                exit;
            }else{
				Session::destroy();
				//$this->view->render('login/index2');
				exit;
			}
        }
    }
	function delpopular(){
        Session::init();
        $loggin =  Session::get('abraham');
        $type =  Session::get('TypeID');
        $usr =  Session::get('user');
        
        //echo $type."--";
        if($loggin == FALSE){
            Session::destroy();
            //$this->view->render('login/index2');
			header('location: '.URL);
            exit;            
        }else{
           //echo $type;
           //echo $usr; 
           
            if($type==1){//admin
				$this->model->delpopular();
                exit;
            }else{
				Session::destroy();
				//$this->view->render('login/index2');
				exit;
			}
        }
    }
	/*------ End SlideShow ----*/
	/*---------- TourType -------*/
	function tourtype(){
        Session::init();
        $loggin =  Session::get('abraham');
        $type =  Session::get('TypeID');
        $usr =  Session::get('user');
        //echo $type."--";
        if($loggin == FALSE){
            Session::destroy();
            //$this->view->render('login/index2');
			header('location: '.URL);
            exit;            
        }else{
           //echo $type;
           //echo $usr; 
           
            if($type==1){//admin
                $this->view->listtourtype=$this->model->listtourtype();
				$this->view->render('admin/tourtype/index1');
				
                exit;
            }else{
                Session::destroy();
                //header('location: '.URL.'login/index2');
				header('location: '.URL);
                exit;  
            }
             
        }
    }
	function addtourtype(){
        Session::init();
        $loggin =  Session::get('abraham');
        $type =  Session::get('TypeID');
        $usr =  Session::get('user');
        //echo $type."--";
        if($loggin == FALSE){
            Session::destroy();
            $this->view->render('login/index2');
            exit;            
        }else{
           //echo $type;
           //echo $usr; 
           
            if($type==1){//admin
                $data=array();
				$data['name']=$_GET['name'];
				$this->model->tourtypecreate($data);
				
				header('location: '.URL.'admin/tourtype');
            }else{
                Session::destroy();
                //header('location: '.URL.'login/index2');
				header('location: '.URL);
                exit;  
            }
             
        }
    }
    function tourtypeEdit($id){
        Session::init();
        $loggin =  Session::get('abraham');
        $type =  Session::get('TypeID');
        $usr =  Session::get('user');
        //echo $type."--";
        if($loggin == FALSE){
            Session::destroy();
            //$this->view->render('login/index2');
			header('location: '.URL);
            exit;            
        }else{
           //echo $type;
           //echo $usr; 
           
            if($type==1){//admin
                $this->view->Single=$this->model->tourtypeSingle($id);
				$this->view->render('admin/tourtype/tourtypeedit');
                exit;
            }else{
                Session::destroy();
                //header('location: '.URL.'login/index2');
				header('location: '.URL);
                exit;  
            }
             
        }
    }
	function updtourtype($id){
        Session::init();
        $loggin =  Session::get('abraham');
        $type =  Session::get('TypeID');
        $usr =  Session::get('user');
        //echo $type."--";
        if($loggin == FALSE){
            Session::destroy();
            //$this->view->render('login/index2');
			header('location: '.URL);
            exit;            
        }else{
           //echo $type;
           //echo $usr; 
           
            if($type==1){//admin
                $data=array();
				$data['id']=$id;
				$data['name']=$_GET['name'];
				$this->model->updtourtype($data);
				header('location: '.URL.'admin/tourtype');
            }else{
                Session::destroy();
                //header('location: '.URL.'login/index2');
				header('location: '.URL);
                exit;  
            }
             
        }
    }
	/*------ End Tourtype ----*/
	/*---------- TourCategory -------*/
	function tourcat(){
        Session::init();
        $loggin =  Session::get('abraham');
        $type =  Session::get('TypeID');
        $usr =  Session::get('user');
        //echo $type."--";
        if($loggin == FALSE){
            Session::destroy();
            //$this->view->render('login/index2');
			header('location: '.URL);
            exit;            
        }else{
           //echo $type;
           //echo $usr; 
           
            if($type==1){//admin
                $this->view->listtourtype=$this->model->listtourcat();
				$this->view->render('admin/tourcat/index1');
				
                exit;
            }else{
                Session::destroy();
                //header('location: '.URL.'login/index2');
				header('location: '.URL);
                exit;  
            }
             
        }
    }
	function addtourcat(){
        Session::init();
        $loggin =  Session::get('abraham');
        $type =  Session::get('TypeID');
        $usr =  Session::get('user');
        //echo $type."--";
        if($loggin == FALSE){
            Session::destroy();
            $this->view->render('login/index2');
            exit;            
        }else{
           //echo $type;
           //echo $usr; 
           
            if($type==1){//admin
                $data=array();
				$data['name']=$_GET['name'];
				$this->model->tourcatcreate($data);
				
				header('location: '.URL.'admin/tourcat');
            }else{
                Session::destroy();
                //header('location: '.URL.'login/index2');
				header('location: '.URL);
                exit;  
            }
             
        }
    }
    function tourcatEdit($id){
        Session::init();
        $loggin =  Session::get('abraham');
        $type =  Session::get('TypeID');
        $usr =  Session::get('user');
        //echo $type."--";
        if($loggin == FALSE){
            Session::destroy();
            //$this->view->render('login/index2');
			header('location: '.URL);
            exit;            
        }else{
           //echo $type;
           //echo $usr; 
           
            if($type==1){//admin
                $this->view->Single=$this->model->tourcatSingle($id);
				$this->view->render('admin/tourcat/edit');
                exit;
            }else{
                Session::destroy();
                //header('location: '.URL.'login/index2');
				header('location: '.URL);
                exit;  
            }
             
        }
    }
	function updtourcat($id){
        Session::init();
        $loggin =  Session::get('abraham');
        $type =  Session::get('TypeID');
        $usr =  Session::get('user');
        //echo $type."--";
        if($loggin == FALSE){
            Session::destroy();
            //$this->view->render('login/index2');
			header('location: '.URL);
            exit;            
        }else{
           //echo $type;
           //echo $usr; 
           
            if($type==1){//admin
                $data=array();
				$data['id']=$id;
				$data['name']=$_GET['name'];
				$this->model->updtourcat($data);
				header('location: '.URL.'admin/tourcat');
            }else{
                Session::destroy();
                //header('location: '.URL.'login/index2');
				header('location: '.URL);
                exit;  
            }
             
        }
    }
	/*------ End TourCategory ----*/
	/*---------- LA TourType -------*/
	function trtype(){
        Session::init();
        $loggin =  Session::get('abraham');
        $type =  Session::get('TypeID');
        $usr =  Session::get('user');
        //echo $type."--";
        if($loggin == FALSE){
            Session::destroy();
            //$this->view->render('login/index2');
			header('location: '.URL);
            exit;            
        }else{
           //echo $type;
           //echo $usr; 
           
            if($type==1){//admin
                $this->view->listtourtype=$this->model->listtrtype();
				$this->view->render('admin/trtype/index1');
				
                exit;
            }else{
                Session::destroy();
                //header('location: '.URL.'login/index2');
				header('location: '.URL);
                exit;  
            }
             
        }
    }
	function addtrtype(){
        Session::init();
        $loggin =  Session::get('abraham');
        $type =  Session::get('TypeID');
        $usr =  Session::get('user');
        //echo $type."--";
        if($loggin == FALSE){
            Session::destroy();
            $this->view->render('login/index2');
            exit;            
        }else{
           //echo $type;
           //echo $usr; 
           
            if($type==1){//admin
                $data=array();
				$data['name']=$_GET['name'];
				$this->model->trtypecreate($data);
				
				header('location: '.URL.'admin/trtype');
            }else{
                Session::destroy();
                //header('location: '.URL.'login/index2');
				header('location: '.URL);
                exit;  
            }
             
        }
    }
    function trtypeEdit($id){
        Session::init();
        $loggin =  Session::get('abraham');
        $type =  Session::get('TypeID');
        $usr =  Session::get('user');
        //echo $type."--";
        if($loggin == FALSE){
            Session::destroy();
            //$this->view->render('login/index2');
			header('location: '.URL);
            exit;            
        }else{
           //echo $type;
           //echo $usr; 
           
            if($type==1){//admin
                $this->view->Single=$this->model->trtypeSingle($id);
				$this->view->render('admin/trtype/tourtypeedit');
                exit;
            }else{
                Session::destroy();
                //header('location: '.URL.'login/index2');
				header('location: '.URL);
                exit;  
            }
             
        }
    }
	function updtrtype($id){
        Session::init();
        $loggin =  Session::get('abraham');
        $type =  Session::get('TypeID');
        $usr =  Session::get('user');
        //echo $type."--";
        if($loggin == FALSE){
            Session::destroy();
            //$this->view->render('login/index2');
			header('location: '.URL);
            exit;            
        }else{
           //echo $type;
           //echo $usr; 
           
            if($type==1){//admin
                $data=array();
				$data['id']=$id;
				$data['name']=$_GET['name'];
				$this->model->updtrtype($data);
				header('location: '.URL.'admin/trtype');
            }else{
                Session::destroy();
                //header('location: '.URL.'login/index2');
				header('location: '.URL);
                exit;  
            }
             
        }
    }
	/*------ End Tourtype ----*/
	/*---------- FrontPage -------*/
	function frontpage(){
        Session::init();
        $loggin =  Session::get('abraham');
        $type =  Session::get('TypeID');
        $usr =  Session::get('user');
        //echo $type."--";
        if($loggin == FALSE){
            Session::destroy();
            //$this->view->render('login/index2');
			header('location: '.URL);
            exit;            
        }else{
           //echo $type;
           //echo $usr; 
		   if (isset($_POST["ttl"])){
           $i=$_POST["ttl"];
		   for ($x=1;$x<$i;$x++){
			   if (isset($_POST["Chk".$x])){
					$this->model->SaveSet($x);
			   }else{
					$this->model->SaveUnSet($x);
			   }
		   }
		   }
            if($type==1){//admin
                $this->view->Settings=$this->model->Settings();
				$this->view->render('admin/settings/index1');
				
                exit;
            }else{
                Session::destroy();
                //header('location: '.URL.'login/index2');
				header('location: '.URL);
                exit;  
            }
             
        }
    }
	/*---------- End FrontPage -------*/
	/*---------- Tour Booking -------*/
	function tourbook(){
        Session::init();
        $loggin =  Session::get('abraham');
        $type =  Session::get('TypeID');
        $usr =  Session::get('user');
        //echo $type."--";
        if($loggin == FALSE){
            Session::destroy();
            //$this->view->render('login/index2');
			header('location: '.URL);
            exit;            
        }else{
           //echo $type;
           //echo $usr; 

            if($type==1){//admin
               $this->view->listarea=$this->model->ListBook();
				$this->view->render('admin/tourbook/index1');
				
                exit;
            }else{
                Session::destroy();
                //header('location: '.URL.'login/index2');
				header('location: '.URL);
                exit;  
            }
             
        }
    }
	/*---------- End tour booking -------*/
	/*---------- Pages -------*/
	function page(){
        Session::init();
        $loggin =  Session::get('abraham');
        $type =  Session::get('TypeID');
        $usr =  Session::get('user');
        //echo $type."--";
        if($loggin == FALSE){
            Session::destroy();
            //$this->view->render('login/index2');
			header('location: '.URL);
            exit;            
        }else{
           //echo $type;
           //echo $usr; 

            if($type==1){//admin
               $this->view->pages=$this->model->ListPage();
				$this->view->render('admin/page/index1');
				
                exit;
            }else{
                Session::destroy();
                //header('location: '.URL.'login/index2');
				header('location: '.URL);
                exit;  
            }
             
        }
    }
	function addpages(){
        Session::init();
        $loggin =  Session::get('abraham');
        $type =  Session::get('TypeID');
        $usr =  Session::get('user');
        
        //echo $type."--";
        if($loggin == FALSE){
            Session::destroy();
            //$this->view->render('login/index2');
			header('location: '.URL);
            exit;            
        }else{
           //echo $type;
           //echo $usr; 
           
            if($type==1){//admin
                $this->view->render('admin/page/add');
                exit;
            }else{
				Session::destroy();
				//$this->view->render('login/index2');
				exit;
			}
			
             
        }
    }
	function savepage(){
        Session::init();
        $loggin =  Session::get('abraham');
        $type =  Session::get('TypeID');
        $usr =  Session::get('user');
        
        //echo $type."--";
        if($loggin == FALSE){
            Session::destroy();
            //$this->view->render('login/index2');
			header('location: '.URL);
            exit;            
        }else{
           //echo $type;
           //echo $usr; 
           
            if($type==1){//admin
				$data["title"]=$_POST["title"];
				$data["slug"]=$_POST["slug"];
				
				$data["content"]=str_replace("'","&#39;",$_POST["desk"]);
				/*
				$content=str_replace("'","\'",$_POST["desk"]);
				$data["content"]=str_replace("\\'","\'",$content);
				*/
                $this->model->SavePage($data);
				header('location: '.URL.'admin/page');
                exit;
            }else{
				Session::destroy();
				//$this->view->render('login/index2');
				exit;
			}
			
             
        }
    }
	function editpage($id){
        Session::init();
        $loggin =  Session::get('abraham');
        $type =  Session::get('TypeID');
        $usr =  Session::get('user');
        
        //echo $type."--";
        if($loggin == FALSE){
            Session::destroy();
            //$this->view->render('login/index2');
			header('location: '.URL);
            exit;            
        }else{
           //echo $type;
           //echo $usr; 
           
            if($type==1){//admin
				$this->view->Single=$this->model->SinglePage($id);
                $this->view->render('admin/page/edit');
                exit;
            }else{
				Session::destroy();
				//$this->view->render('login/index2');
				exit;
			}
			
             
        }
    }
	function updpage(){
        Session::init();
        $loggin =  Session::get('abraham');
        $type =  Session::get('TypeID');
        $usr =  Session::get('user');
        
        //echo $type."--";
        if($loggin == FALSE){
            Session::destroy();
            //$this->view->render('login/index2');
			header('location: '.URL);
            exit;            
        }else{
           //echo $type;
           //echo $usr; 
           
            if($type==1){//admin
				$data["title"]=$_POST["title"];
				$data["id"]=$_POST["id"];
				//$data["slug"]=$_POST["slug"];
				/*
				$content=str_replace("'","\'",$_POST["desk"]);
				$data["content"]=str_replace("\\'","\'",$content);
				//$data["content"]=str_replace("'","\'",$_POST["desk"]);
				*/
				$data["content"]=str_replace("'","&#39;",$_POST["desk"]);
                $this->model->UpdPage($data);
				header('location: '.URL.'admin/page');
                exit;
            }else{
				Session::destroy();
				//$this->view->render('login/index2');
				exit;
			}
			
             
        }
    }
	function delpage($id){
        Session::init();
        $loggin =  Session::get('abraham');
        $type =  Session::get('TypeID');
        $usr =  Session::get('user');
        
        //echo $type."--";
        if($loggin == FALSE){
            Session::destroy();
            //$this->view->render('login/index2');
			header('location: '.URL);
            exit;            
        }else{
           //echo $type;
           //echo $usr; 
           
            if($type==1){//admin
                $this->model->delPage($id);
				header('location: '.URL.'admin/page');
                exit;
            }else{
				Session::destroy();
				//$this->view->render('login/index2');
				exit;
			}
			
             
        }
    }
	/*---------- End tour booking -------*/
	/*---------- Keyword -------*/
	function keyword(){
        Session::init();
        $loggin =  Session::get('abraham');
        $type =  Session::get('TypeID');
        $usr =  Session::get('user');
        //echo $type."--";
        if($loggin == FALSE){
            Session::destroy();
            //$this->view->render('login/index2');
			header('location: '.URL);
            exit;            
        }else{
           //echo $type;
           //echo $usr; 
		   if (isset($_POST["desk"])){
				$this->model->savekey();
		   }
            if($type==1){//admin
                $this->view->keys=$this->model->lskey();
				$this->view->render('admin/settings/keyword');
				
                exit;
            }else{
                Session::destroy();
                //header('location: '.URL.'login/index2');
				header('location: '.URL);
                exit;  
            }
             
        }
    }
	/*---------- End FrontPage -------*/
	/*-------------- User ------------*/
	
    function user(){
		 Session::init();
        $loggin =  Session::get('abraham');
        $type =  Session::get('TypeID');
        $usr =  Session::get('user');
		if($loggin == FALSE){
            Session::destroy();
            //$this->view->render('login/index2');
			
			header('location: '.URL);
            exit;            
        }else{
           //echo $type;
           //echo $usr; 
           
            if($type==1){//admin
				
        $this->view->msuList=$this->model->msuList();
        $this->view->render('admin/user/user');
                exit;
            }else{
				Session::destroy();
				//$this->view->render('login/index2');
				header('location: '.URL);
				exit;
			}
			
             
        }
    }
     public function useradd(){
		 Session::init();
        $loggin =  Session::get('abraham');
        $type =  Session::get('TypeID');
        $usr =  Session::get('user');
		if($loggin == FALSE){
            Session::destroy();
            //$this->view->render('login/index2');
			
			header('location: '.URL);
            exit;            
        }else{
           //echo $type;
           //echo $usr; 
           
            if($type==1){//admin
				$this->view->LvlList=$this->model->LvlList();
				$this->view->render('admin/user/useradd');
                exit;
            }else{
				Session::destroy();
				//$this->view->render('login/index2');
				header('location: '.URL);
				exit;
			}
			
             
        }
       
    }

    public function usercreate(){
		 Session::init();
        $loggin =  Session::get('abraham');
        $type =  Session::get('TypeID');
        $usr =  Session::get('user');
		if($loggin == FALSE){
            Session::destroy();
            //$this->view->render('login/index2');
			
			header('location: '.URL);
            exit;            
        }else{
           //echo $type;
           //echo $usr; 
           
            if($type==1){//admin
			 
				$data=array();
				$data['name']=$_POST['name'];
				$data['uname']=$_POST['uname'];
				$data['password']=$_POST['password'];
				$data['id']=$_POST['id'];
				$data['TypeID']=$_POST['Type'];
				$data['dates']=date('Y-m-d H:i:s');
				//print_r($data);
				//echo $country;
				//@todo: Check Name 
				$this->model->usercreate($data);
				header('location: '.URL.'admin/user');
                exit;
            }else{
				Session::destroy();
				//$this->view->render('login/index2');
				header('location: '.URL);
				exit;
			}
			
             
        }
    }
    public function useredit($id){
		 Session::init();
        $loggin =  Session::get('abraham');
        $type =  Session::get('TypeID');
        $usr =  Session::get('user');
		if($loggin == FALSE){
            Session::destroy();
            //$this->view->render('login/index2');
			
			header('location: '.URL);
            exit;            
        }else{
           //echo $type;
           //echo $usr; 
           
            if($type==1){//admin
				$this->view->LvlList=$this->model->LvlList();
				$this->view->msuListSingle=$this->model->msuListSingle($id);
				$this->view->render('admin/user/useredit');
                exit;
            }else{
				Session::destroy();
				//$this->view->render('login/index2');
				header('location: '.URL);
				exit;
			} 
        }
		
    }
    public function usersaveEdit($id){
		 Session::init();
        $loggin =  Session::get('abraham');
        $type =  Session::get('TypeID');
        $usr =  Session::get('user');
		if($loggin == FALSE){
            Session::destroy();
            //$this->view->render('login/index2');
			
			header('location: '.URL);
            exit;            
        }else{
           //echo $type;
           //echo $usr; 
           
            if($type==1){//admin
				$data=array();
				$data['id']=$id;
				$data['name']=$_POST['name'];
				$data['password']=$_POST['password'];
				$data['password2']=$_POST['password0'];
				$data['Type']=$_POST['Type'];
				$this->model->usereditSave($data);
				header('location: '.URL.'admin/user/');
                exit;
            }else{
				Session::destroy();
				//$this->view->render('login/index2');
				header('location: '.URL);
				exit;
			}
			
             
        }
        
    }
    public function uservoid($id){
		 Session::init();
        $loggin =  Session::get('abraham');
        $type =  Session::get('TypeID');
        $usr =  Session::get('user');
        $this->model->uservoid($id);
        header('location: '.URL.'admin/user');
    } 	
	/*-------------- End User --------*/
	/*-------------- HOTEL Fasility --------*/
	function hotelfas(){
        Session::init();
        $loggin =  Session::get('abraham');
        $type =  Session::get('TypeID');
        $usr =  Session::get('user');
        //echo $type."--";
        if($loggin == FALSE){
            Session::destroy();
            //$this->view->render('login/index2');
			header('location: '.URL);
            exit;            
        }else{
           //echo $type;
           //echo $usr; 
           
            if($type==1){//admin
                $this->view->listhotelfas=$this->model->listhotelfas();
				$this->view->render('admin/hotelfas/index1');
				
                exit;
            }else{
                Session::destroy();
                //header('location: '.URL.'login/index2');
				header('location: '.URL);
                exit;  
            }
             
        }
    }
	function addhotelfas(){
        Session::init();
        $loggin =  Session::get('abraham');
        $type =  Session::get('TypeID');
        $usr =  Session::get('user');
        //echo $type."--";
        if($loggin == FALSE){
            Session::destroy();
            //$this->view->render('login/index2');
			header('location: '.URL);
            exit;            
        }else{
           //echo $type;
           //echo $usr; 
           
            if($type==1){//admin
                $data=array();
				$data['name']=$_GET['name'];
				$this->model->hotelfascreate($data);
				//echo "here";
				header('location: '.URL.'admin/hotelfas');
            }else{
                Session::destroy();
                //header('location: '.URL.'login/index2');
				header('location: '.URL);
                exit;  
            }
             
        }
    }
    function hotelfasEdit($id){
        Session::init();
        $loggin =  Session::get('abraham');
        $type =  Session::get('TypeID');
        $usr =  Session::get('user');
        //echo $type."--";
        if($loggin == FALSE){
            Session::destroy();
            $this->view->render('login/index2');
            exit;            
        }else{
           //echo $type;
           //echo $usr; 
           
            if($type==1){//admin
                $this->view->hotelfasSingle=$this->model->hotelfasSingle($id);
				$this->view->render('admin/hotelfas/hotelfasedit');
                exit;
            }else{
                Session::destroy();
                header('location: '.URL.'login/index2');
                exit;  
            }
             
        }
    }
	function updhotelfas($id){
        Session::init();
        $loggin =  Session::get('abraham');
        $type =  Session::get('TypeID');
        $usr =  Session::get('user');
        //echo $type."--";
        if($loggin == FALSE){
            Session::destroy();
            $this->view->render('login/index2');
            exit;            
        }else{
           //echo $type;
           //echo $usr; 
           
            if($type==1){//admin
                $data=array();
				$data['id']=$id;
				$data['name']=$_GET['name'];
				$this->model->updhotelfas($data);
				header('location: '.URL.'admin/hotelfas');
            }else{
                Session::destroy();
                //header('location: '.URL.'login/index2');
				header('location: '.URL);
                exit;  
            }
             
        }
    }
	/*-------------- End Hotel Faasility --------*/
	/*-------------- Hotel Category --------*/
	function hotelcat(){
        Session::init();
        $loggin =  Session::get('abraham');
        $type =  Session::get('TypeID');
        $usr =  Session::get('user');
        //echo $type."--";
        if($loggin == FALSE){
            Session::destroy();
            //$this->view->render('login/index2');
			header('location: '.URL);
            exit;            
        }else{
           //echo $type;
           //echo $usr; 
           
            if($type==1){//admin
                $this->view->listhotelcat=$this->model->listhotelcat();
				$this->view->render('admin/hotelcat/index1');
				
                exit;
            }else{
                Session::destroy();
                //header('location: '.URL.'login/index2');
				header('location: '.URL);
                exit;  
            }
             
        }
    }
	function addhotelcat(){
        Session::init();
        $loggin =  Session::get('abraham');
        $type =  Session::get('TypeID');
        $usr =  Session::get('user');
        //echo $type."--";
        if($loggin == FALSE){
            Session::destroy();
            //$this->view->render('login/index2');
			header('location: '.URL);
            exit;            
        }else{
           //echo $type;
           //echo $usr; 
           
            if($type==1){//admin
                $data=array();
				$data['name']=$_GET['name'];
				$this->model->hotelcatcreate($data);
				
				header('location: '.URL.'admin/hotelcat');
            }else{
                Session::destroy();
                //header('location: '.URL.'login/index2');
				header('location: '.URL);
                exit;  
            }
             
        }
    }
    function hotelcatEdit($id){
        Session::init();
        $loggin =  Session::get('abraham');
        $type =  Session::get('TypeID');
        $usr =  Session::get('user');
        //echo $type."--";
        if($loggin == FALSE){
            Session::destroy();
            //$this->view->render('login/index2');
			header('location: '.URL);
            exit;            
        }else{
           //echo $type;
           //echo $usr; 
           
            if($type==1){//admin
                $this->view->hotelcatSingle=$this->model->hotelcatSingle($id);
				$this->view->render('admin/hotelcat/hotelcatedit');
                exit;
            }else{
                Session::destroy();
                //header('location: '.URL.'login/index2');
				header('location: '.URL);
                exit;  
            }
             
        }
    }
	function updhotelcat($id){
        Session::init();
        $loggin =  Session::get('abraham');
        $type =  Session::get('TypeID');
        $usr =  Session::get('user');
        //echo $type."--";
        if($loggin == FALSE){
            Session::destroy();
            $this->view->render('login/index2');
            exit;            
        }else{
           //echo $type;
           //echo $usr; 
           
            if($type==1){//admin
                $data=array();
				$data['id']=$id;
				$data['name']=$_GET['name'];
				$this->model->updhotelcat($data);
				header('location: '.URL.'admin/hotelcat');
            }else{
                Session::destroy();
                //header('location: '.URL.'login/index2');
				header('location: '.URL);
                exit;  
            }
             
        }
    }
	/*-------------- End Hotel Category --------*/
	/*---------  Hotel ` ------*/
	function hotels(){
        Session::init();
        $loggin =  Session::get('abraham');
        $type =  Session::get('TypeID');
        $usr =  Session::get('user');
        
        //echo $type."--";
        if($loggin == FALSE){
            Session::destroy();
            //$this->view->render('login/index2');
			
			header('location: '.URL);
            exit;            
        }else{
           //echo $type;
           //echo $usr; 
           
            if($type==1){//admin
				$this->view->listpro=$this->model->listpro();
                $this->view->render('admin/hotel/index1');
                exit;
            }else{
				Session::destroy();
				//$this->view->render('login/index2');
				header('location: '.URL);
				exit;
			}
			
             
        }
        //header('location: '.URL);
		//exit;
    }
	function addhotel(){
        Session::init();
        $loggin =  Session::get('abraham');
        $type =  Session::get('TypeID');
        $usr =  Session::get('user');
        
        //echo $type."--";
        if($loggin == FALSE){
            Session::destroy();
            //$this->view->render('login/index2');
			header('location: '.URL);
            exit;            
        }else{
           //echo $type;
           //echo $usr; 
           
            if($type==1){//admin
				$this->view->hotelfas=$this->model->hotelfas();
				$this->view->country=$this->model->country();
				$this->view->hotelclas=$this->model->hotelclas();
				//$this->view->stars=$this->model->stars();
				$this->view->areas=$this->model->areas();
                $this->view->render('admin/hotel/addhotel');
                exit;
            }else{
				Session::destroy();
				//$this->view->render('login/index2');
				exit;
			}
			
             
        }
    }
	function savehotel(){
        Session::init();
        $loggin =  Session::get('abraham');
        $type =  Session::get('TypeID');
        $usr =  Session::get('user');
        
        //echo $type."--";
        if($loggin == FALSE){
            Session::destroy();
            //$this->view->render('login/index2');
			header('location: '.URL);
            exit;            
        }else{
           //echo $type;
           //echo $usr; 
           
            if($type==1){//admin
				$data=array();
				$data["HotelID"]=Code::profileid();
				$data["Name"]=$_POST["Name"];
				$data["Alamat"]=$_POST["addr"];
				$data["Phone"]=$_POST["Phone"];
				$data["Fax"]=$_POST["fax"];
				$data["email"]=$_POST["email"];
				$data["StarID"]=0;
				$data["CountryID"]=$_POST["country"];
				$data["Province"]=$_POST["Province"];
				$data["City"]=$_POST["city"];
				$x=count($_POST["proclas"]);
				$home = $_POST['proclas']; 
				$cat="";
				foreach($home as $value) {					
					$cat=$cat.$value.',';
				}
				//echo $cat;
				$data["CategoryID"]=$cat;
				$data["CheckIn"]=$_POST["cin"];
				$data["CheckOut"]=$_POST["cout"];
				$y=count($_POST["tag"]);
				$tags = $_POST['tag']; 
				$tag="";
				foreach($tags as $val) {					
					$tag=$tag.$val.',';
				}
				//echo $tag;
				$data["Area"]=$tag;
				$data["LatMap"]=$_POST["lat"];
				$data["LongMap"]=$_POST["long"];
				$data["commision"]=$_POST["commo"];
				$data["startPrice"]=$_POST["minprice"];
				$data["PICName"]=$_POST["picname"];
				$data["PICdisignation"]=$_POST["picdis"];
				$data["PICMobile"]=$_POST["picmobile"];
				$data["Deskripsi"]=str_replace("'","\'",$_POST["desk"]);
				$this->model->Createhotel($data);
				header('location: '.URL.'admin/hotels');
                exit;
            }else{
				Session::destroy();
				//$this->view->render('login/index2');
				header('location: '.URL);
				exit;
			}
			
             
        }
    }
    function listing(){
        Session::init();
        $loggin =  Session::get('abraham');
        $type =  Session::get('TypeID');
        $usr =  Session::get('user');
        
        //echo $type."--";
        if($loggin == FALSE){
            Session::destroy();
            //$this->view->render('login/index2');
			header('location: '.URL);
            exit;            
        }else{
           //echo $type;
           //echo $usr; 
           
            if($type==1){//admin
				$this->model->listing();
                exit;
            }else{
				Session::destroy();
				//$this->view->render('login/index2');
				exit;
			}
			
             
        }
    }
	function edithotel($id){
        Session::init();
        $loggin =  Session::get('abraham');
        $type =  Session::get('TypeID');
        $usr =  Session::get('user');
        
        //echo $type."--";
        if($loggin == FALSE){
            Session::destroy();
            //$this->view->render('login/index2');
			header('location: '.URL);
            exit;            
        }else{
           //echo $type;
           //echo $usr; 
           
            if($type==1){//admin
				$this->view->hotelfas=$this->model->hotelfas();
				$this->view->singlehotel=$this->model->singlehotel($id);
				$this->view->country=$this->model->country();
				$this->view->hotelclas=$this->model->hotelclas();
				//$this->view->stars=$this->model->stars();
				$this->view->areas=$this->model->areas();
                $this->view->render('admin/hotel/edithotel');
                exit;
            }else{
				Session::destroy();
				//$this->view->render('login/index2');
				exit;
			}
			
             
        }
    }
	function hoteldelgal(){
        Session::init();
        $loggin =  Session::get('abraham');
        $type =  Session::get('TypeID');
        $usr =  Session::get('user');
        
        //echo $type."--";
        if($loggin == FALSE){
            Session::destroy();
            //$this->view->render('login/index2');
			header('location: '.URL);
            exit;            
        }else{
           //echo $type;
           //echo $usr; 
           
            if($type==1){//admin
				$this->model->hoteldelgal();
                exit;
            }else{
				Session::destroy();
				//$this->view->render('login/index2');
				exit;
			}
        }
    }
	function updatehotel(){
        Session::init();
        $loggin =  Session::get('abraham');
        $type =  Session::get('TypeID');
        $usr =  Session::get('user');
        
        //echo $type."--";
        if($loggin == FALSE){
            Session::destroy();
            //$this->view->render('login/index2');
			header('location: '.URL);
            exit;            
        }else{
           //echo $type;
           //echo $usr; 
           
            if($type==1){//admin
				$data=array();
				$data["HotelID"]=$_POST["HotelID"];
				$data["Name"]=$_POST["Name"];
				$data["Alamat"]=$_POST["addr"];
				$data["Phone"]=$_POST["Phone"];
				$data["Fax"]=$_POST["fax"];
				$data["email"]=$_POST["email"];
				//$data["StarID"]=$_POST["star"];
				$data["StarID"]=0;
				$data["CountryID"]=$_POST["country"];
				$data["Province"]=$_POST["Province"];
				$data["City"]=$_POST["city"];
				$x=count($_POST["proclas"]);
				$home = $_POST['proclas']; 
				$cat="";
				foreach($home as $value) {					
					$cat=$cat.$value.',';
				}
				echo $cat;
				$data["CategoryID"]=$cat;
				$data["CheckIn"]=$_POST["cin"];
				$data["CheckOut"]=$_POST["cout"];
				$y=count($_POST["tag"]);
				$tags = $_POST['tag']; 
				$tag="";
				foreach($tags as $val) {					
					$tag=$tag.$val.',';
				}
				echo $tag;
				$data["Area"]=$tag;
				$data["LatMap"]=$_POST["lat"];
				$data["LongMap"]=$_POST["long"];
				$data["commision"]=$_POST["commo"];
				$data["startPrice"]=$_POST["minprice"];
				$data["PICName"]=$_POST["picname"];
				$data["PICdisignation"]=$_POST["picdis"];
				$data["PICMobile"]=$_POST["picmobile"];
				$data["Deskripsi"]=str_replace("'","\'",$_POST["desk"]);
				$this->model->Updatehotel($data);
				header('location: '.URL.'admin/hotels');
                exit;
            }else{
				Session::destroy();
				//$this->view->render('login/index2');
				header('location: '.URL);
				exit;
			}
			
             
        }
    }
	function hotgallery($id){
        Session::init();
        $loggin =  Session::get('abraham');
        $type =  Session::get('TypeID');
        $usr =  Session::get('user');
        
        //echo $type."--";
        if($loggin == FALSE){
            Session::destroy();
            //$this->view->render('login/index2');
			header('location: '.URL);
            exit;            
        }else{
           //echo $type;
           //echo $usr; 
           
            if($type==1){//admin
				if($id<>""){
				if (isset($_FILES['files'])){
				   $this->model->hotUpload($id);
				}
				$this->view->HotGalList=$this->model->HotGalList($id);
				$this->view->render('admin/hotel/gallery');
				}else{
					
					header('location: '.URL);
				}
                exit;
            }else{
				Session::destroy();
				//$this->view->render('login/index2');
				header('location: '.URL);
				exit;
			}
			
             
        }
    }
	function roomlist($id){
        Session::init();
        $loggin =  Session::get('abraham');
        $type =  Session::get('TypeID');
        $usr =  Session::get('user');
        
        //echo $type."--";
        if($loggin == FALSE){
            Session::destroy();
            //$this->view->render('login/index2');
			
			header('location: '.URL);
            exit;            
        }else{
           //echo $type;
           //echo $usr; 
           
            if($type==1){//admin
				$this->view->hotelName=Code::GetField('hotel','Name',"HotelID='".$id."'");
				$this->view->HotelID=$id;
				$this->view->listroom=$this->model->listroom($id);
                $this->view->render('admin/hotel/listroom');
                exit;
            }else{
				Session::destroy();
				//$this->view->render('login/index2');
				header('location: '.URL);
				exit;
			}
			
             
        }
        //header('location: '.URL);
		//exit;
    }
	function rooms(){
        Session::init();
        $loggin =  Session::get('abraham');
        $type =  Session::get('TypeID');
        $usr =  Session::get('user');
        
        //echo $type."--";
        if($loggin == FALSE){
            Session::destroy();
            //$this->view->render('login/index2');
			
			header('location: '.URL);
            exit;            
        }else{
           //echo $type;
           //echo $usr; 
           
            if($type==1){//admin
				//$this->view->hotelName=Code::GetField('hotel','Name',"HotelID='".$id."'");
				//$this->view->HotelID=$id;
				$this->view->listroom=$this->model->allroom();
                $this->view->render('admin/hotel/listrooms');
                exit;
            }else{
				Session::destroy();
				//$this->view->render('login/index2');
				header('location: '.URL);
				exit;
			}
			
             
        }
        //header('location: '.URL);
		//exit;
    }
	
	function roomadd($id){
        Session::init();
        $loggin =  Session::get('abraham');
        $type =  Session::get('TypeID');
        $usr =  Session::get('user');
        
        //echo $type."--";
        if($loggin == FALSE){
            Session::destroy();
            //$this->view->render('login/index2');
			header('location: '.URL);
            exit;            
        }else{
           //echo $type;
           //echo $usr; 
           
            if($type==1){//admin
				$this->view->roomfas=$this->model->roomfas();
				$this->view->roomtype=$this->model->roomtype();
				$this->view->HotelID=$id;
                $this->view->render('admin/hotel/roomadd');
                exit;
            }else{
				Session::destroy();
				//$this->view->render('login/index2');
				exit;
			}
			
             
        }
    }
	function saveroom(){
        Session::init();
        $loggin =  Session::get('abraham');
        $type =  Session::get('TypeID');
        $usr =  Session::get('user');
        
        //echo $type."--";
        if($loggin == FALSE){
            Session::destroy();
            //$this->view->render('login/index2');
			header('location: '.URL);
            exit;            
        }else{
           //echo $type;
           //echo $usr; 
           
            if($type==1){//admin
				$data=array();
				$data["HotelID"]=$_POST["HotelID"];
				$data["RoomID"]=Code::profileid();
				$data["RoomName"]=$_POST["Name"];
				$data["RoomSize"]=$_POST["rsize"];
				//$tp="";
				/*
				if (isset($_POST["tp1"])){
				$tp=$tp."1";
				}
				if (isset($_POST["tp2"])){
				$tp=$tp.",2";
				}
				if (isset($_POST["tp3"])){
				$tp=$tp.",3";
				}
				
				$tps="";
				$x=count($_POST["tp"]);
				$home = $_POST['tp'];
				 //print_r($home);
				//for($i=0;$i<=x;$i++) {					
					//$tp= $home[i].',';
				foreach($home as $val){
					//$tp=$val.",";
					$tps=$tps.$val.",";
				}
				echo $tps;
				
				$data["RoomType"]=$tps;
				*/
				$data["AdlPax"]=$_POST["adl"];
				$data["ChdPax"]=$_POST["chl"];
				$data["Deskripsi"]=str_replace("'","\'",$_POST["desk"]);
				$this->model->CreateRoom($data);
				//header('location: '.URL.'admin/roomlist/'.$_POST["HotelID"]);
                exit;
            }else{
				Session::destroy();
				//$this->view->render('login/index2');
				header('location: '.URL);
				exit;
			}
			
             
        }
    }
	function editroom($id){
        Session::init();
        $loggin =  Session::get('abraham');
        $type =  Session::get('TypeID');
        $usr =  Session::get('user');
        
        //echo $type."--";
        if($loggin == FALSE){
            Session::destroy();
            //$this->view->render('login/index2');
			header('location: '.URL);
            exit;            
        }else{
           //echo $type;
           //echo $usr; 
           
            if($type==1){//admin
				$this->view->roomfas=$this->model->roomfas();
				$this->view->singleRoom=$this->model->singleRoom($id);
				$this->view->roomtype=$this->model->roomtype();
                $this->view->render('admin/hotel/editroom');
                exit;
            }else{
				Session::destroy();
				//$this->view->render('login/index2');
				exit;
			}
			
             
        }
    }
	function updateroom($id){
        Session::init();
        $loggin =  Session::get('abraham');
        $type =  Session::get('TypeID');
        $usr =  Session::get('user');
        
        //echo $type."--";
        if($loggin == FALSE){
            Session::destroy();
            //$this->view->render('login/index2');
			header('location: '.URL);
            exit;            
        }else{
           //echo $type;
           //echo $usr; 
           
            if($type==1){//admin
				$data=array();
				$data["HotelID"]=$_POST["HotelID"];
				$data["RoomID"]=$id;
				$data["RoomName"]=$_POST["Name"];
				$data["RoomSize"]=$_POST["rsize"];
				/*
				$tp="";
				if (isset($_POST["tp1"])){
				$tp=$tp."1";
				}
				if (isset($_POST["tp2"])){
				$tp=$tp.",2";
				}
				if (isset($_POST["tp3"])){
				$tp=$tp.",3";
				}
				*/
				$tps="";
				$x=count($_POST["tp"]);
				$home = $_POST['tp'];
				 //print_r($home);
				//for($i=0;$i<=x;$i++) {					
					//$tp= $home[i].',';
				foreach($home as $val){
					//$tp=$val.",";
					$tps=$tps.$val.",";
				}
				echo $tps;
				
				$data["RoomType"]=$tps;
				//$data["RoomType"]=$tp;
				$data["AdlPax"]=$_POST["adl"];
				$data["ChdPax"]=$_POST["chl"];
				$data["Deskripsi"]=str_replace("'","\'",$_POST["desk"]);
				$this->model->UpdateRoom($data);
				header('location: '.URL.'admin/roomlist/'.$_POST["HotelID"]);
                exit;
            }else{
				Session::destroy();
				//$this->view->render('login/index2');
				header('location: '.URL);
				exit;
			}
			
             
        }
    }
	function roomgallery($id){
        Session::init();
        $loggin =  Session::get('abraham');
        $type =  Session::get('TypeID');
        $usr =  Session::get('user');
        
        //echo $type."--";
        if($loggin == FALSE){
            Session::destroy();
            //$this->view->render('login/index2');
			header('location: '.URL);
            exit;            
        }else{
           //echo $type;
           //echo $usr; 
           
            if($type==1){//admin
				if($id<>""){
				if (isset($_FILES['files'])){
				   $this->model->UploadRoom($id);
				}
				$this->view->GalList=$this->model->RoomGalList($id);
				$this->view->render('admin/hotel/roomgallery');
				}else{
					
					header('location: '.URL);
				}
                exit;
            }else{
				Session::destroy();
				//$this->view->render('login/index2');
				header('location: '.URL);
				exit;
			}
			
             
        }
    }
	function roomdelgal(){
        Session::init();
        $loggin =  Session::get('abraham');
        $type =  Session::get('TypeID');
        $usr =  Session::get('user');
        
        //echo $type."--";
        if($loggin == FALSE){
            Session::destroy();
            //$this->view->render('login/index2');
			header('location: '.URL);
            exit;            
        }else{
           //echo $type;
           //echo $usr; 
           
            if($type==1){//admin
				$this->model->roomdelgal();
                exit;
            }else{
				Session::destroy();
				//$this->view->render('login/index2');
				exit;
			}
			
             
        }
    }
	
	
	
	function voidroom(){
        Session::init();
        $loggin =  Session::get('abraham');
        $type =  Session::get('TypeID');
        $usr =  Session::get('user');
        
        //echo $type."--";
        if($loggin == FALSE){
            Session::destroy();
            //$this->view->render('login/index2');
			header('location: '.URL);
            exit;            
        }else{
           //echo $type;
           //echo $usr; 
           
            if($type==1){//admin
				$this->model->voidroom();
                exit;
            }else{
				Session::destroy();
				//$this->view->render('login/index2');
				exit;
			}
        }
    }
	function actroom(){
        Session::init();
        $loggin =  Session::get('abraham');
        $type =  Session::get('TypeID');
        $usr =  Session::get('user');
        
        //echo $type."--";
        if($loggin == FALSE){
            Session::destroy();
            //$this->view->render('login/index2');
			header('location: '.URL);
            exit;            
        }else{
           //echo $type;
           //echo $usr; 
           
            if($type==1){//admin
				$this->model->actroom();
                exit;
            }else{
				Session::destroy();
				//$this->view->render('login/index2');
				exit;
			}
        }
    }
	function voidhotel(){
        Session::init();
        $loggin =  Session::get('abraham');
        $type =  Session::get('TypeID');
        $usr =  Session::get('user');
        
        //echo $type."--";
        if($loggin == FALSE){
            Session::destroy();
            //$this->view->render('login/index2');
			header('location: '.URL);
            exit;            
        }else{
           //echo $type;
           //echo $usr; 
           
            if($type==1){//admin
				$this->model->voidhotel();
                exit;
            }else{
				Session::destroy();
				//$this->view->render('login/index2');
				exit;
			}
        }
    }
	function acthotel(){
        Session::init();
        $loggin =  Session::get('abraham');
        $type =  Session::get('TypeID');
        $usr =  Session::get('user');
        
        //echo $type."--";
        if($loggin == FALSE){
            Session::destroy();
            //$this->view->render('login/index2');
			header('location: '.URL);
            exit;            
        }else{
           //echo $type;
           //echo $usr; 
           
            if($type==1){//admin
				$this->model->acthotel();
                exit;
            }else{
				Session::destroy();
				//$this->view->render('login/index2');
				exit;
			}
        }
    }
	function roomrate($id){
        Session::init();
        $loggin =  Session::get('abraham');
        $type =  Session::get('TypeID');
        $usr =  Session::get('user');
        
        //echo $type."--";
        if($loggin == FALSE){
            Session::destroy();
            //$this->view->render('login/index2');
			
			header('location: '.URL);
            exit;            
        }else{
           //echo $type;
           //echo $usr; 
           
            if($type==1){//admin
				$this->view->RoomRate=$this->model->RoomRate($id);
				$this->view->roomID=$id;
				$this->view->roomName=Code::GetField("room","RoomName"," RoomID='".$id."'");
				$hotelid=Code::GetField("room","HotelID"," RoomID='".$id."'");
				$this->view->HotelName=Code::GetField("hotel","Name"," HotelID='".$hotelid."'");
				$this->view->HotelID=$hotelid;
                
                $this->view->render('admin/hotel/roomrate');
                exit;
            }else{
				Session::destroy();
				//$this->view->render('login/index2');
				header('location: '.URL);
				exit;
			}
			
             
        }
        
    }
	function addroomrate($id){
        Session::init();
        $loggin =  Session::get('abraham');
        $type =  Session::get('TypeID');
        $usr =  Session::get('user');
        
        //echo $type."--";
        if($loggin == FALSE){
            Session::destroy();
            //$this->view->render('login/index2');
			
			header('location: '.URL);
            exit;            
        }else{
           //echo $type;
           //echo $usr; 
           
            if($type==1){//admin
				$this->view->roomID=$id;
				$this->view->roomName=Code::GetField("room","RoomName"," RoomID='".$id."'");
				$hotelid=Code::GetField("room","HotelID"," RoomID='".$id."'");
				$this->view->HotelName=Code::GetField("hotel","Name"," HotelID='".$hotelid."'");
				$this->view->HotelID=$hotelid;
                
                $this->view->render('admin/hotel/addroomrate');
                exit;
            }else{
				Session::destroy();
				//$this->view->render('login/index2');
				header('location: '.URL);
				exit;
			}
			
             
        }
        
    }
	function saveroomrate(){
        Session::init();
        $loggin =  Session::get('abraham');
        $type =  Session::get('TypeID');
        $usr =  Session::get('user');
        
        //echo $type."--";
        if($loggin == FALSE){
            Session::destroy();
            //$this->view->render('login/index2');
			header('location: '.URL);
            exit;            
        }else{
           //echo $type;
           //echo $usr; 
           
            if($type==1){//admin
				$data=array();
				$data["RoomID"]=$_GET["roomID"];
				$data["Publish"]=$_GET["adl"];
				$data["Price"]=$_GET["SellRate"];
				
				$data["Desk"]=$_GET["desk"];
				$data["Start"]=date('Y-m-d', strtotime($_GET["txtstart"]));
				$data["End"]=date('Y-m-d', strtotime($_GET["txtend"]));
				
				$this->model->CreateRoomRate($data);
				header('location: '.URL.'admin/roomrate/'.$data["RoomID"]);
                exit;
            }else{
				Session::destroy();
				//$this->view->render('login/index2');
				header('location: '.URL);
				exit;
			}
			
             
        }
    }
	/*--------- End Hotel ` ------*/
}