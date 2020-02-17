<?php

class admin_Model extends Model {

    public function __construct() {
        parent::__construct();
    }
    /*------ Tour --------*/
	public function listtour(){
		$sql="Select tour.*,country.CountryName,tourtype.Name as Type,tourcategory.Name as Categori From tour inner join country on tour.CountryID=country.CountryID inner join tourtype on tourtype.ID=tour.TourType inner join tourcategory on tourcategory.ID=tour.TourCat where Status=1";
		//echo $sql;
        $sts=$this->db->prepare($sql);
        $sts->execute();
        return $sts->fetchAll();
    }
	public function areas(){        
        $sts=$this->db->prepare("SELECT * FROM `area`");
        $sts->execute();
		$data=$sts->fetchAll(PDO::FETCH_ASSOC);
        return $data;
        
    }
	public function country(){        
        $sts=$this->db->prepare("SELECT * FROM `country`");
        $sts->execute();
		$data=$sts->fetchAll(PDO::FETCH_ASSOC);
        return $data;
        
    }
	
	public function CreateTour($data){  
		
		$sql="insert into tour(TourID,TourName,Area,Desk,Inclusion,Exclusion,CountryID,Itenery,TourCat,TourType,Cur,Price1,Price2,sts,TourCode,Term,PriceType) values ( '".$data["TourID"]."', '".$data["TourName"]."',  '".$data["Area"]."',  '".$data["Desk"]."', '".$data["Inclusion"]."', '".$data["Exclusion"]."', ".$data["CountryID"].", '".$data["Iten"]."', ".$data["TourCat"].", ".$data["TourType"].", '".$data["Cur"]."', ".$data["Price1"].", ".$data["Price2"].",1, '".$data["TourCode"]."', '".$data["Term"]."',".$data["PriceType"].")";
		echo $sql;
        $sts=$this->db->prepare($sql);
        $sts->execute();
		
    }
	public function singleTour($id){        
        $sts=$this->db->prepare("SELECT * FROM `tour` where TourID='".$id."'");
        $sts->execute();
		$data=$sts->fetchAll(PDO::FETCH_ASSOC);
        return $data;
    }
	
	public function UpdateTour($data){  
		
		$sql="Update  tour set TourName='".$data["TourName"]."',TourCode='".$data["TourCode"]."',Term='".$data["Term"]."', Itenery='".$data["Iten"]."', TourCat=".$data["TourCat"].", Desk='".$data["Desk"]."', Inclusion='".$data["Inclusion"]."', Exclusion='".$data["Exclusion"]."', Area= '".$data["Area"]."', Cur= '".$data["Cur"]."', Price1= ".$data["Price1"].", Price2= ".$data["Price2"].", CountryID= ".$data["CountryID"].", TourType=".$data["TourType"].", PriceType=".$data["PriceType"]." where TourID='".$data["TourID"]."'";
		echo $sql;
        $sts=$this->db->prepare($sql);
        $sts->execute();
		
    }
	public function GalList($id){
        $sts=$this->db->prepare("SELECT * FROM tourgallery where TourID='".$id."'");
        $sts->execute();
        return $sts->fetchAll();
    }
	public function TourUpload($id){ 
        
        switch(strtolower($_FILES['files']['type'])){
            //buat image            
        case 'image/jpeg':
            $image = imagecreatefromjpeg($_FILES['files']['tmp_name']);
			$ext="jpg";
            break;
        case 'image/png':
            $image = imagecreatefrompng($_FILES['files']['tmp_name']);
			$ext="png";
            break;
        case 'image/gif':
            $image = imagecreatefromgif($_FILES['files']['tmp_name']);
			$ext="gif";
            break;
        
        } 
        // Target dimensions Big File
        $max_width = 800;
        $max_height = 400;

        // Get current dimensions
        $old_width  = imagesx($image);
        $old_height = imagesy($image);

        // Calculate the scaling we need to do to fit the image inside our frame
        $scale      = min($max_width/$old_width, $max_height/$old_height);

        // Get the new dimensions
        $new_width  = ceil($scale*$old_width);
        $new_height = ceil($scale*$old_height);
        // Create new empty image
        $new = imagecreatetruecolor($new_width, $new_height);

        // Resize old image into new
        imagecopyresampled($new, $image, 0, 0, 0, 0, $new_width, $new_height, $old_width, $old_height);
        $filename = __DIR__."/../tourgallery/".$id."-".time().".".$ext;
        $SaveName = "tourgallery/".$id."-".time().".".$ext;
		switch($ext){
			case 'jpg':
            imagejpeg($new,$filename,100);
            break;
			case 'png':
            imagepng($new,$filename,9);
			break;
			case 'gif':
            imagegif($new,$filename);
            break;
		}
        
        
        // Target dimensions Thumbs
        $max_width2 = 200;
        $max_height2 = 200;

        // Get current dimensions
        $old_width2  = imagesx($image);
        $old_height2 = imagesy($image);

        // Calculate the scaling we need to do to fit the image inside our frame
        $scale2      = min($max_width2/$old_width2, $max_height2/$old_height2);

        // Get the new dimensions
        $new_width2  = ceil($scale2*$old_width2);
        $new_height2 = ceil($scale2*$old_height2);
        // Create new empty image
        $new2 = imagecreatetruecolor($new_width2, $new_height2);

        // Resize old image into new
        imagecopyresampled($new2, $image, 0, 0, 0, 0, $new_width2, $new_height2, $old_width2, $old_height2);
        $filename2 = __DIR__."/../tourgallery/".$id."_".time()."_Thumb".".".$ext;
        $ThumbName = "tourgallery/".$id."_".time()."_Thumb".".".$ext;
        //imagejpeg($new2,$filename2,100);
        switch($ext){
			case 'jpg':
            imagejpeg($new2,$filename2,100);
            break;
			case 'png':
            imagepng($new2,$filename2,9);
			break;
			case 'gif':
            imagegif($new2,$filename);
            break;
		}
        //save to database
		$sql="insert into `tourgallery` (GalleryID,TourID,Image,Thumb,Name) values ('".Code::random_string()."','".$id."','".$SaveName."','".$ThumbName."','".$_POST['name']."')";
		//echo $sql;
        $sts2=$this->db->prepare($sql);
        $sts2->execute();
    }
	public function delgal(){
        //select Link Image
        $sql = "select * from tourgallery where GalleryID='".$_POST['gid']."' and TourID='".$_POST['prid']."'";
        $q = $this->db->prepare($sql);
        $q->execute();
        $q->setFetchMode(PDO::FETCH_BOTH);	
	while($r = $q->fetch()){
          $img=$r['Image'];
	  unlink($img);
          $thumb=$r['thumb'];
          unlink($thumb);
	}
        
        // remove dari database         
        $sts=$this->db->prepare("delete from tourgallery where GalleryID='".$_POST['gid']."' and TourID='".$_POST['prid']."'");
        $sts->execute();
        
    }
	public function toursdefg(){
        //unset all
        $sql = "update tourgallery set Def='0' where TourID='".$_POST['prid']."'";
        $q = $this->db->prepare($sql);
        $q->execute();
        
        
        // set default
        $sts=$this->db->prepare("update tourgallery set Def='1' where GalleryID='".$_POST['gid']."' and TourID='".$_POST['prid']."'");
        $sts->execute();
		//set to tour
		$sql = "select * from tourgallery where GalleryID='".$_POST['gid']."' and TourID='".$_POST['prid']."'";
        $q = $this->db->prepare($sql);
        $q->execute();
        $q->setFetchMode(PDO::FETCH_BOTH);	
	while($r = $q->fetch()){
          $img=$r['Image'];
	}
		//set link def 
        $sts=$this->db->prepare("update tour set defaultImg='".$img."' where TourID='".$_POST['prid']."'");
        $sts->execute();
    }
	public function tourunsetg(){
        
        // set default
        $sts=$this->db->prepare("update tourgallery set Def='0' where GalleryID='".$_POST['gid']."' and TourID='".$_POST['prid']."'");
        $sts->execute();
		
		//set link def 
        $sts=$this->db->prepare("update tour set defaultImg='".$img."' where TourID='".$_POST['prid']."'");
        $sts->execute();
    }
	public function listPrice($id){        
        $sts=$this->db->prepare("SELECT tourprice.*, cancelation.CancelName FROM `tourprice` inner join cancelation on tourprice.CancelationTerm=cancelation.CancelID where TourID='".$id."' order by ID");
        $sts->execute();
		$data=$sts->fetchAll(PDO::FETCH_ASSOC);
        return $data;
    }
	public function CreateSetPrice($data){
		if (Code::CFields('tourprice','ID',"TourID='".$data["TourID"]."'")==0 ){
			$x=1;
		}else{	
			$x=Code::GetField('tourprice','ID',"TourID='".$data["TourID"]."' Order By ID Desc limit 0,1") +1;
		}
		$sql="insert into tourprice(ID, TourID, Starts, Ends, Price, Cur, Cur2, Price2, Commision, SellPrice, SellPrice2, Cancelation, CancelationTerm) values ( ".$x.",'".$data["TourID"]."', ".$data["Starts"].", ".$data["Ends"].", ".$data["Price"].", '".$data["Cur1"]."', '".$data["Cur2"]."', ".$data["Price2"].", ".$data["Commision"].", ".$data["SellPrice"].", ".$data["SellPrice2"].", ".$data["Cancelation"].", ".$data["CancelationTerm"].")";
		echo $sql;
        $sts=$this->db->prepare($sql);
        $sts->execute();
		
    }
	
	public function SinggleTourPrice($id){ 
		$x=explode("_",$id);
		$sql="SELECT * FROM `tourprice` where TourID='".$x[0]."' and ID=".$x[1];
		//echo $sql;
        $sts=$this->db->prepare($sql);
        $sts->execute();
		$data=$sts->fetchAll(PDO::FETCH_ASSOC);
        return $data;
    }
	public function CancelList(){ 
		
		$sql="SELECT * FROM `cancelation` ";
		//echo $sql;
        $sts=$this->db->prepare($sql);
        $sts->execute();
		$data=$sts->fetchAll(PDO::FETCH_ASSOC);
        return $data;
    }
	public function uptourprice($data){  
		 
		$sql="Update  tourprice set Cur='".$data["Cur"]."', Cur2='".$data["Cur2"]."', Starts=".$data["Starts"].", Ends=".$data["Ends"].", Price=".$data["Price"]." , Price2=".$data["Price2"]." , Commision=".$data["Commision"]." , SellPrice=".$data["SellPrice"].", SellPrice2=".$data["SellPrice2"].", Cancelation=".$data["Cancelation"].", CancelationTerm=".$data["CancelationTerm"]." where TourID='".$data["TourID"]."' and ID=".$data["ID"];
		echo $sql;
        $sts=$this->db->prepare($sql);
        $sts->execute();
		
    }
	
	public function voidtour(){  
		 $id=$_POST["gid"];
		$sql="Update  tour set Status=0 where TourID='".$id."'";
		echo $sql;
        $sts=$this->db->prepare($sql);
        $sts->execute();
		
    }
	public function acttour(){  
		 $id=$_POST["gid"];
		$sql="Update  tour set Status=1 where TourID='".$id."'";
		echo $sql;
        $sts=$this->db->prepare($sql);
        $sts->execute();
		
    }
	/*------------ End Tour ----------*/
	/*------ Travel --------*/
	public function listtr(){
		$sql="Select tour.*,country.CountryName From tour inner join country on tour.CountryID=country.CountryID where sts=3";
		//echo $sql;
        $sts=$this->db->prepare($sql);
        $sts->execute();
        return $sts->fetchAll();
    }

	
	public function Createtr($data){  
		$tour = $_POST['tour']; 
		$i=1;
		foreach($tour as $val) {	
			$vals=str_replace("'","&#39;",$val);
			$sql="insert into tourdtl(ID,TourID,DayNo,Deskripsi) values ( ".$i.",'".$data["TourID"]."',  ".$i.", '".$vals."')";
			//echo $sql."<br>";
			$sts=$this->db->prepare($sql);
			$sts->execute();
			$i++;
		}
		$sql="insert into tour(TourID,TourName,Day,Night,Area,StartDate,EndDate,Desk,Inclusion,Exclusion,CountryID,TourType,Cur,Price1,Price2,sts,TourCode,Term) values ( '".$data["TourID"]."', '".$data["TourName"]."', ".$data["Day"].", ".$data["Night"].", '".$data["Area"]."','".$data["StartDate"]."','".$data["EndDate"]."', '".$data["Desk"]."', '".$data["Inclusion"]."', '".$data["Exclusion"]."', ".$data["CountryID"].", ".$data["TourType"].", '".$data["Cur"]."', ".$data["Price1"].", ".$data["Price2"].",3, '".$data["TourCode"]."', '".$data["Term"]."')";
		//echo $sql;
        $sts=$this->db->prepare($sql);
        $sts->execute();
		
    }
	public function singletr($id){        
        $sts=$this->db->prepare("SELECT * FROM `tour` where TourID='".$id."'");
        $sts->execute();
		$data=$sts->fetchAll(PDO::FETCH_ASSOC);
        return $data;
    }
	public function listItentr($id){        
		//$sql= "SELECT * FROM `tourdtl` where TourID='".$id."' order by DayNo";
		$sql="SELECT * FROM `tourdtl` where TourID='".$id."' order by DayNo";
        $sts=$this->db->prepare($sql);
        $sts->execute();
		$data=$sts->fetchAll(PDO::FETCH_ASSOC);
        return $data;
    }
	public function Updatetr($data){  
		$sql="delete from tourdtl where TourID='".$data["TourID"]."'";
		//echo $sql;
        $sts=$this->db->prepare($sql);
        $sts->execute();
		$tour = $_POST['tour']; 
		$i=1;
		foreach($tour as $val) {	
			$vals=str_replace("'","&#39;",$val);		
			$sql="insert into tourdtl(ID,TourID,DayNo,Deskripsi) values ( ".$i.",'".$data["TourID"]."',  ".$i.", '".$vals."')";
			//echo $sql."<br>";
			$sts=$this->db->prepare($sql);
			$sts->execute();
			$i++;
		}
		$sql="Update  tour set TourName='".$data["TourName"]."',TourCode='".$data["TourCode"]."',Term='".$data["Term"]."', Day=".$data["Day"].", Night=".$data["Night"].", Desk='".$data["Desk"]."', Inclusion='".$data["Inclusion"]."', Exclusion='".$data["Exclusion"]."', Area= '".$data["Area"]."', StartDate= '".$data["StartDate"]."', EndDate= '".$data["EndDate"]."', Cur= '".$data["Cur"]."', Price1= ".$data["Price1"].", Price2= ".$data["Price2"].", CountryID= ".$data["CountryID"].", TourType=".$data["TourType"]." where TourID='".$data["TourID"]."'";
		echo $sql;
        $sts=$this->db->prepare($sql);
        $sts->execute();
		
    }
	public function GalListtr($id){
        $sts=$this->db->prepare("SELECT * FROM tourgallery where TourID='".$id."'");
        $sts->execute();
        return $sts->fetchAll();
    }
	public function TrUpload($id){ 
        
        switch(strtolower($_FILES['files']['type'])){
            //buat image            
        case 'image/jpeg':
            $image = imagecreatefromjpeg($_FILES['files']['tmp_name']);
			$ext="jpg";
            break;
        case 'image/png':
            $image = imagecreatefrompng($_FILES['files']['tmp_name']);
			$ext="png";
            break;
        case 'image/gif':
            $image = imagecreatefromgif($_FILES['files']['tmp_name']);
			$ext="gif";
            break;
        
        } 
        // Target dimensions Big File
        $max_width = 800;
        $max_height = 400;

        // Get current dimensions
        $old_width  = imagesx($image);
        $old_height = imagesy($image);

        // Calculate the scaling we need to do to fit the image inside our frame
        $scale      = min($max_width/$old_width, $max_height/$old_height);

        // Get the new dimensions
        $new_width  = ceil($scale*$old_width);
        $new_height = ceil($scale*$old_height);
        // Create new empty image
        $new = imagecreatetruecolor($new_width, $new_height);

        // Resize old image into new
        imagecopyresampled($new, $image, 0, 0, 0, 0, $new_width, $new_height, $old_width, $old_height);
        $filename = __DIR__."/../tourgallery/TR-".$id."-".time().".".$ext;
        $SaveName = "tourgallery/TR-".$id."-".time().".".$ext;
		switch($ext){
			case 'jpg':
            imagejpeg($new,$filename,100);
            break;
			case 'png':
            imagepng($new,$filename,9);
			break;
			case 'gif':
            imagegif($new,$filename);
            break;
		}
        
        
        // Target dimensions Thumbs
        $max_width2 = 200;
        $max_height2 = 200;

        // Get current dimensions
        $old_width2  = imagesx($image);
        $old_height2 = imagesy($image);

        // Calculate the scaling we need to do to fit the image inside our frame
        $scale2      = min($max_width2/$old_width2, $max_height2/$old_height2);

        // Get the new dimensions
        $new_width2  = ceil($scale2*$old_width2);
        $new_height2 = ceil($scale2*$old_height2);
        // Create new empty image
        $new2 = imagecreatetruecolor($new_width2, $new_height2);

        // Resize old image into new
        imagecopyresampled($new2, $image, 0, 0, 0, 0, $new_width2, $new_height2, $old_width2, $old_height2);
        $filename2 = __DIR__."/../tourgallery/TR-".$id."_".time()."_Thumb".".".$ext;
        $ThumbName = "tourgallery/TR-".$id."_".time()."_Thumb".".".$ext;
        //imagejpeg($new2,$filename2,100);
        switch($ext){
			case 'jpg':
            imagejpeg($new2,$filename2,100);
            break;
			case 'png':
            imagepng($new2,$filename2,9);
			break;
			case 'gif':
            imagegif($new2,$filename);
            break;
		}
        //save to database
		$sql="insert into `tourgallery` (GalleryID,TourID,Image,Thumb,Name) values ('".Code::random_string()."','".$id."','".$SaveName."','".$ThumbName."','".$_POST['name']."')";
		//echo $sql;
        $sts2=$this->db->prepare($sql);
        $sts2->execute();
    }
	public function delgaltr(){
        //select Link Image
        $sql = "select * from tourgallery where GalleryID='".$_POST['gid']."' and TourID='".$_POST['prid']."'";
        $q = $this->db->prepare($sql);
        $q->execute();
        $q->setFetchMode(PDO::FETCH_BOTH);	
	while($r = $q->fetch()){
          $img=$r['Image'];
	  unlink($img);
          $thumb=$r['thumb'];
          unlink($thumb);
	}
        
        // remove dari database         
        $sts=$this->db->prepare("delete from tourgallery where GalleryID='".$_POST['gid']."' and TourID='".$_POST['prid']."'");
        $sts->execute();
        
    }
	public function trsdefg(){
        //unset all
        $sql = "update tourgallery set Def='0' where TourID='".$_POST['prid']."'";
        $q = $this->db->prepare($sql);
        $q->execute();
        
        
        // set default
        $sts=$this->db->prepare("update tourgallery set Def='1' where GalleryID='".$_POST['gid']."' and TourID='".$_POST['prid']."'");
        $sts->execute();
		//set to tour
		$sql = "select * from tourgallery where GalleryID='".$_POST['gid']."' and TourID='".$_POST['prid']."'";
        $q = $this->db->prepare($sql);
        $q->execute();
        $q->setFetchMode(PDO::FETCH_BOTH);	
	while($r = $q->fetch()){
          $img=$r['Image'];
	}
		//set link def 
        $sts=$this->db->prepare("update tour set defaultImg='".$img."' where TourID='".$_POST['prid']."'");
        $sts->execute();
    }
	public function trunsetg(){
        
        // set default
        $sts=$this->db->prepare("update tourgallery set Def='0' where GalleryID='".$_POST['gid']."' and TourID='".$_POST['prid']."'");
        $sts->execute();
		
		//set link def 
        $sts=$this->db->prepare("update tour set defaultImg='".$img."' where TourID='".$_POST['prid']."'");
        $sts->execute();
    }
	public function listPricetr($id){        
        $sts=$this->db->prepare("SELECT tourprice.*, cancelation.CancelName FROM `tourprice` inner join cancelation on tourprice.CancelationTerm=cancelation.CancelID where TourID='".$id."' order by ID");
        $sts->execute();
		$data=$sts->fetchAll(PDO::FETCH_ASSOC);
        return $data;
    }
	public function CreateSetPricetr($data){
		if (Code::CFields('tourprice','ID',"TourID='".$data["TourID"]."'")==0 ){
			$x=1;
		}else{	
			$x=Code::GetField('tourprice','ID',"TourID='".$data["TourID"]."' Order By ID Desc limit 0,1") +1;
		}
		$sql="insert into tourprice(ID, TourID, Starts, Ends, Price, Cur, Cur2, Price2, Commision, SellPrice, SellPrice2, Cancelation, CancelationTerm) values ( ".$x.",'".$data["TourID"]."', ".$data["Starts"].", ".$data["Ends"].", ".$data["Price"].", '".$data["Cur1"]."', '".$data["Cur2"]."', ".$data["Price2"].", ".$data["Commision"].", ".$data["SellPrice"].", ".$data["SellPrice2"].", ".$data["Cancelation"].", ".$data["CancelationTerm"].")";
		echo $sql;
        $sts=$this->db->prepare($sql);
        $sts->execute();
		
    }
	
	public function SinggletrPrice($id){ 
		$x=explode("_",$id);
		$sql="SELECT * FROM `tourprice` where TourID='".$x[0]."' and ID=".$x[1];
		//echo $sql;
        $sts=$this->db->prepare($sql);
        $sts->execute();
		$data=$sts->fetchAll(PDO::FETCH_ASSOC);
        return $data;
    }

	public function uptrprice($data){  
		 
		$sql="Update  tourprice set Cur='".$data["Cur"]."', Cur2='".$data["Cur2"]."', Starts=".$data["Starts"].", Ends=".$data["Ends"].", Price=".$data["Price"]." , Price2=".$data["Price2"]." , Commision=".$data["Commision"]." , SellPrice=".$data["SellPrice"].", SellPrice2=".$data["SellPrice2"].", Cancelation=".$data["Cancelation"].", CancelationTerm=".$data["CancelationTerm"]." where TourID='".$data["TourID"]."' and ID=".$data["ID"];
		echo $sql;
        $sts=$this->db->prepare($sql);
        $sts->execute();
		
    }
	
	public function voidtr(){  
		 $id=$_POST["gid"];
		$sql="Update  tour set Status=0 where TourID='".$id."'";
		echo $sql;
        $sts=$this->db->prepare($sql);
        $sts->execute();
		
    }
	public function acttr(){  
		 $id=$_POST["gid"];
		$sql="Update  tour set Status=1 where TourID='".$id."'";
		echo $sql;
        $sts=$this->db->prepare($sql);
        $sts->execute();
		
    }
	/*------------ End Travel ----------*/
	
	/*------ Honeymoon --------*/
	public function listHm(){
		$sql="Select tour.*,country.CountryName From tour inner join country on tour.CountryID=country.CountryID where sts=2";
		//echo $sql;
        $sts=$this->db->prepare($sql);
        $sts->execute();
        return $sts->fetchAll();
    }
	
	
	public function CreateHm($data){  
		$tour = $_POST['tour']; 
		$i=1;
		foreach($tour as $val) {	
			$vals=str_replace("'","\'",$val);
			$sql="insert into tourdtl(ID,TourID,DayNo,Deskripsi) values ( ".$i.",'".$data["TourID"]."',  ".$i.", '".$vals."')";
			echo $sql."<br>";
			$sts=$this->db->prepare($sql);
			$sts->execute();
			$i++;
		}
		$sql="insert into tour(TourID,TourName,Day,Night,Area,StartDate,EndDate,Desk,Inclusion,Exclusion,CountryID,TourCode,Cur,Price1,Price2,sts,Term) values ( '".$data["TourID"]."', '".$data["TourName"]."', ".$data["Day"].", ".$data["Night"].", '".$data["Area"]."','".$data["StartDate"]."','".$data["EndDate"]."', '".$data["Desk"]."', '".$data["Inclusion"]."', '".$data["Exclusion"]."', ".$data["CountryID"].", '".$data["TourCode"]."', '".$data["Cur"]."', ".$data["Price1"].", 0,2, '".$data["Term"]."')";
		echo $sql;
        $sts=$this->db->prepare($sql);
        $sts->execute();
		
    }
	public function singleHm($id){        
        $sts=$this->db->prepare("SELECT * FROM `tour` where TourID='".$id."'");
        $sts->execute();
		$data=$sts->fetchAll(PDO::FETCH_ASSOC);
        return $data;
    }
	public function listHmIten($id){        
		//echo "SELECT * FROM `tourdtl` where TourID='".$id."' order by DayNo";
        $sts=$this->db->prepare("SELECT * FROM `tourdtl` where TourID='".$id."' order by DayNo");
        $sts->execute();
		$data=$sts->fetchAll(PDO::FETCH_ASSOC);
        return $data;
    }
	public function UpdateHM($data){  
		$sql="delete from tourdtl where TourID='".$data["TourID"]."'";
		echo $sql;
        $sts=$this->db->prepare($sql);
        $sts->execute();
		$tour = $_POST['tour']; 
		$i=1;
		foreach($tour as $val) {	
			$vals=str_replace("'","\'",$val);		
			$sql="insert into tourdtl(ID,TourID,DayNo,Deskripsi) values ( ".$i.",'".$data["TourID"]."',  ".$i.", '".$vals."')";
			echo $sql."<br>";
			$sts=$this->db->prepare($sql);
			$sts->execute();
			$i++;
		}
		$sql="Update  tour set TourName='".$data["TourName"]."', Day=".$data["Day"].", Night=".$data["Night"].", Desk='".$data["Desk"]."', Inclusion='".$data["Inclusion"]."', Exclusion='".$data["Exclusion"]."', Area= '".$data["Area"]."', StartDate= '".$data["StartDate"]."', EndDate= '".$data["EndDate"]."', Cur= '".$data["Cur"]."', Price1= ".$data["Price1"].", TourCode= '".$data["TourCode"]."', Term='".$data["Term"]."', CountryID= ".$data["CountryID"]." where TourID='".$data["TourID"]."'";
		echo $sql;
        $sts=$this->db->prepare($sql);
        $sts->execute();
		
    }
	public function GalHm($id){
        $sts=$this->db->prepare("SELECT * FROM tourgallery where TourID='".$id."'");
        $sts->execute();
        return $sts->fetchAll();
    }
	public function HmUpload($id){ 
        
        switch(strtolower($_FILES['files']['type'])){
            //buat image            
        case 'image/jpeg':
            $image = imagecreatefromjpeg($_FILES['files']['tmp_name']);
			$ext="jpg";
            break;
        case 'image/png':
            $image = imagecreatefrompng($_FILES['files']['tmp_name']);
			$ext="png";
            break;
        case 'image/gif':
            $image = imagecreatefromgif($_FILES['files']['tmp_name']);
			$ext="gif";
            break;
        
        } 
        // Target dimensions Big File
        $max_width = 800;
        $max_height = 400;

        // Get current dimensions
        $old_width  = imagesx($image);
        $old_height = imagesy($image);

        // Calculate the scaling we need to do to fit the image inside our frame
        $scale      = min($max_width/$old_width, $max_height/$old_height);

        // Get the new dimensions
        $new_width  = ceil($scale*$old_width);
        $new_height = ceil($scale*$old_height);
        // Create new empty image
        $new = imagecreatetruecolor($new_width, $new_height);

        // Resize old image into new
        imagecopyresampled($new, $image, 0, 0, 0, 0, $new_width, $new_height, $old_width, $old_height);
        $filename = __DIR__."/../tourgallery/HM-".$id."-".time().".".$ext;
        $SaveName = "tourgallery/HM-".$id."-".time().".".$ext;
		switch($ext){
			case 'jpg':
            imagejpeg($new,$filename,100);
            break;
			case 'png':
            imagepng($new,$filename,9);
			break;
			case 'gif':
            imagegif($new,$filename);
            break;
		}
        
        
        // Target dimensions Thumbs
        $max_width2 = 200;
        $max_height2 = 200;

        // Get current dimensions
        $old_width2  = imagesx($image);
        $old_height2 = imagesy($image);

        // Calculate the scaling we need to do to fit the image inside our frame
        $scale2      = min($max_width2/$old_width2, $max_height2/$old_height2);

        // Get the new dimensions
        $new_width2  = ceil($scale2*$old_width2);
        $new_height2 = ceil($scale2*$old_height2);
        // Create new empty image
        $new2 = imagecreatetruecolor($new_width2, $new_height2);

        // Resize old image into new
        imagecopyresampled($new2, $image, 0, 0, 0, 0, $new_width2, $new_height2, $old_width2, $old_height2);
        $filename2 = __DIR__."/../tourgallery/HM-".$id."_".time()."_Thumb".".".$ext;
        $ThumbName = "tourgallery/HM-".$id."_".time()."_Thumb".".".$ext;
        //imagejpeg($new2,$filename2,100);
        switch($ext){
			case 'jpg':
            imagejpeg($new2,$filename2,100);
            break;
			case 'png':
            imagepng($new2,$filename2,9);
			break;
			case 'gif':
            imagegif($new2,$filename);
            break;
		}
        //save to database
		$sql="INSERT INTO `tourgallery` (GalleryID,TourID,Image,Thumb,Name) VALUES ('".Code::random_string()."','".$id."','".$SaveName."','".$ThumbName."','".$_POST['name']."')";
		//echo $sql;
        $sts2=$this->db->prepare($sql);
        $sts2->execute();
    }
	public function hmdelgal(){
        //select Link Image
        $sql = "select * from tourgallery where GalleryID='".$_POST['gid']."' and TourID='".$_POST['prid']."'";
        $q = $this->db->prepare($sql);
        $q->execute();
        $q->setFetchMode(PDO::FETCH_BOTH);	
	while($r = $q->fetch()){
          $img=$r['Image'];
	  unlink($img);
          $thumb=$r['thumb'];
          unlink($thumb);
	}
        
        // remove dari database         
        $sts=$this->db->prepare("Delete from tourgallery where GalleryID='".$_POST['gid']."' and TourID='".$_POST['prid']."'");
        $sts->execute();
        
    }
	public function hmdefg(){
        //unset all
        $sql = "update tourgallery set Def='0' where TourID='".$_POST['prid']."'";
        $q = $this->db->prepare($sql);
        $q->execute();
        
        
        // set default
        $sts=$this->db->prepare("update tourgallery set Def='1' where GalleryID='".$_POST['gid']."' and TourID='".$_POST['prid']."'");
        $sts->execute();
		//set to tour
		$sql = "select * from tourgallery where GalleryID='".$_POST['gid']."' and TourID='".$_POST['prid']."'";
        $q = $this->db->prepare($sql);
        $q->execute();
        $q->setFetchMode(PDO::FETCH_BOTH);	
	while($r = $q->fetch()){
          $img=$r['Image'];
	}
		//set link def 
        $sts=$this->db->prepare("update tour set defaultImg='".$img."' where TourID='".$_POST['prid']."'");
        $sts->execute();
    }
	public function hmunsetg(){
        
        // set default
        $sts=$this->db->prepare("update tourgallery set Def='0' where GalleryID='".$_POST['gid']."' and TourID='".$_POST['prid']."'");
        $sts->execute();
		
		//set link def 
        $sts=$this->db->prepare("update tour set defaultImg='".$img."' where TourID='".$_POST['prid']."'");
        $sts->execute();
    }
	
	
	
	
	public function voidhm(){  
		 $id=$_POST["gid"];
		$sql="Update  tour set Status=0 where TourID='".$id."'";
		echo $sql;
        $sts=$this->db->prepare($sql);
        $sts->execute();
		
    }
	public function acthm(){  
		 $id=$_POST["gid"];
		$sql="Update  tour set Status=1 where TourID='".$id."'";
		echo $sql;
        $sts=$this->db->prepare($sql);
        $sts->execute();
		
    }
	/*------------ End Honeymoon ----------*/
	/*------ yOGA --------*/
	public function listyoga(){
		$sql="Select yoga.*,country.CountryName From yoga inner join country on yoga.CountryID=country.CountryID";
		//echo $sql;
        $sts=$this->db->prepare($sql);
        $sts->execute();
        return $sts->fetchAll();
    }
	
	
	public function Createyoga($data){  
		
		$sql="insert into yoga(YogaID,yogaName,StartDate,EndDate,Desk,Inclusion,Exclusion,CountryID,YogaCode,Cur,Price1,Term) values ( '".$data["YogaID"]."', '".$data["YogaName"]."','".$data["StartDate"]."','".$data["EndDate"]."', '".$data["Desk"]."', '".$data["Inclusion"]."', '".$data["Exclusion"]."', ".$data["CountryID"].", '".$data["YogaCode"]."', '".$data["Cur"]."', ".$data["Price1"].", '".$data["Term"]."')";
		echo $sql;
        $sts=$this->db->prepare($sql);
        $sts->execute();
		
    }
	public function singleyoga($id){        
        $sts=$this->db->prepare("SELECT * FROM `yoga` where YogaID='".$id."'");
        $sts->execute();
		$data=$sts->fetchAll(PDO::FETCH_ASSOC);
        return $data;
    }
	public function Updateyoga($data){  
		
		$sql="Update  yoga set YogaName='".$data["YogaName"]."',  Desk='".$data["Desk"]."', Term='".$data["Term"]."', Inclusion='".$data["Inclusion"]."', Exclusion='".$data["Exclusion"]."', StartDate= '".$data["StartDate"]."', EndDate= '".$data["EndDate"]."', Cur= '".$data["Cur"]."', Price1= ".$data["Price1"].", YogaCode= '".$data["YogaCode"]."', CountryID= ".$data["CountryID"]." where YogaID='".$data["YogaID"]."'";
		echo $sql;
        $sts=$this->db->prepare($sql);
        $sts->execute();
		
    }
	public function GalYoga($id){
        $sts=$this->db->prepare("SELECT * FROM yogagallery where YogaID='".$id."'");
        $sts->execute();
        return $sts->fetchAll();
    }
	public function YogaUpload($id){ 
        
        switch(strtolower($_FILES['files']['type'])){
            //buat image            
        case 'image/jpeg':
            $image = imagecreatefromjpeg($_FILES['files']['tmp_name']);
			$ext="jpg";
            break;
        case 'image/png':
            $image = imagecreatefrompng($_FILES['files']['tmp_name']);
			$ext="png";
            break;
        case 'image/gif':
            $image = imagecreatefromgif($_FILES['files']['tmp_name']);
			$ext="gif";
            break;
        
        } 
        // Target dimensions Big File
        $max_width = 800;
        $max_height = 400;

        // Get current dimensions
        $old_width  = imagesx($image);
        $old_height = imagesy($image);

        // Calculate the scaling we need to do to fit the image inside our frame
        $scale      = min($max_width/$old_width, $max_height/$old_height);

        // Get the new dimensions
        $new_width  = ceil($scale*$old_width);
        $new_height = ceil($scale*$old_height);
        // Create new empty image
        $new = imagecreatetruecolor($new_width, $new_height);

        // Resize old image into new
        imagecopyresampled($new, $image, 0, 0, 0, 0, $new_width, $new_height, $old_width, $old_height);
        $filename = __DIR__."/../tourgallery/YG-".$id."-".time().".".$ext;
        $SaveName = "tourgallery/YG-".$id."-".time().".".$ext;
		switch($ext){
			case 'jpg':
            imagejpeg($new,$filename,100);
            break;
			case 'png':
            imagepng($new,$filename,9);
			break;
			case 'gif':
            imagegif($new,$filename);
            break;
		}
        
        
        // Target dimensions Thumbs
        $max_width2 = 200;
        $max_height2 = 200;

        // Get current dimensions
        $old_width2  = imagesx($image);
        $old_height2 = imagesy($image);

        // Calculate the scaling we need to do to fit the image inside our frame
        $scale2      = min($max_width2/$old_width2, $max_height2/$old_height2);

        // Get the new dimensions
        $new_width2  = ceil($scale2*$old_width2);
        $new_height2 = ceil($scale2*$old_height2);
        // Create new empty image
        $new2 = imagecreatetruecolor($new_width2, $new_height2);

        // Resize old image into new
        imagecopyresampled($new2, $image, 0, 0, 0, 0, $new_width2, $new_height2, $old_width2, $old_height2);
        $filename2 = __DIR__."/../tourgallery/YG-".$id."_".time()."_Thumb".".".$ext;
        $ThumbName = "tourgallery/YG-".$id."_".time()."_Thumb".".".$ext;
        //imagejpeg($new2,$filename2,100);
        switch($ext){
			case 'jpg':
            imagejpeg($new2,$filename2,100);
            break;
			case 'png':
            imagepng($new2,$filename2,9);
			break;
			case 'gif':
            imagegif($new2,$filename);
            break;
		}
        //save to database
		$sql="INSERT INTO `yogagallery` (GalleryID,YogaID,Image,Thumb,Name) VALUES ('".Code::random_string()."','".$id."','".$SaveName."','".$ThumbName."','".$_POST['name']."')";
		//echo $sql;
        $sts2=$this->db->prepare($sql);
        $sts2->execute();
    }
	public function yogadelgal(){
        //select Link Image
        $sql = "select * from yogagallery where GalleryID='".$_POST['gid']."' and YogaID='".$_POST['prid']."'";
        $q = $this->db->prepare($sql);
        $q->execute();
        $q->setFetchMode(PDO::FETCH_BOTH);	
	while($r = $q->fetch()){
          $img=$r['Image'];
	  unlink($img);
          $thumb=$r['thumb'];
          unlink($thumb);
	}
        
        // remove dari database         
        $sts=$this->db->prepare("Delete from yogagallery where GalleryID='".$_POST['gid']."' and YogaID='".$_POST['prid']."'");
        $sts->execute();
        
    }
	public function yogadefg(){
        //unset all
        $sql = "update yogagallery set Def='0' where YogaID='".$_POST['prid']."'";
        $q = $this->db->prepare($sql);
        $q->execute();
        
        
        // set default
        $sts=$this->db->prepare("update yogagallery set Def='1' where GalleryID='".$_POST['gid']."' and YogaID='".$_POST['prid']."'");
        $sts->execute();
		//set to tour
		$sql = "select * from yogagallery where GalleryID='".$_POST['gid']."' and YogaID='".$_POST['prid']."'";
        $q = $this->db->prepare($sql);
        $q->execute();
        $q->setFetchMode(PDO::FETCH_BOTH);	
	while($r = $q->fetch()){
          $img=$r['Image'];
	}
		//set link def 
        $sts=$this->db->prepare("update yoga set defaultImg='".$img."' where YogaID='".$_POST['prid']."'");
        $sts->execute();
    }
	public function yogaunsetg(){
        
        // set default
        $sts=$this->db->prepare("update yogagallery set Def='0' where GalleryID='".$_POST['gid']."' and YogaID='".$_POST['prid']."'");
        $sts->execute();
		
		//set link def 
        $sts=$this->db->prepare("update yoga set defaultImg='' where YogaID='".$_POST['prid']."'");
        $sts->execute();
    }
	
	
	
	
	public function voidyoga(){  
		 $id=$_POST["gid"];
		$sql="Update  yoga set Status=0 where YogaID='".$id."'";
		echo $sql;
        $sts=$this->db->prepare($sql);
        $sts->execute();
		
    }
	public function actyoga(){  
		 $id=$_POST["gid"];
		$sql="Update  yoga set Status=1 where YogaID='".$id."'";
		echo $sql;
        $sts=$this->db->prepare($sql);
        $sts->execute();
		
    }
	/*------------ End Yoga ----------*/
	/*------ Wedding --------*/
	public function listwedding(){
		$sql="Select wedding.*,country.CountryName From wedding inner join country on wedding.CountryID=country.CountryID";
		//echo $sql;
        $sts=$this->db->prepare($sql);
        $sts->execute();
        return $sts->fetchAll();
    }
	
	
	public function Createwedding($data){  
		
		$sql="insert into wedding(WeddingID,WeddingName,StartDate,EndDate,Desk,Inclusion,Exclusion,CountryID,weddingCode,Cur,Price1,Term,area,WedType) values ( '".$data["weddingID"]."', '".$data["weddingName"]."','".$data["StartDate"]."','".$data["EndDate"]."', '".$data["Desk"]."', '".$data["Inclusion"]."', '".$data["Exclusion"]."', ".$data["CountryID"].", '".$data["weddingCode"]."', '".$data["Cur"]."', ".$data["Price1"].", '".$data["Term"]."', '".$data["Area"]."', '".$data["WedType"]."')";
		echo $sql;
        $sts=$this->db->prepare($sql);
        $sts->execute();
		
    }
	public function singlewedding($id){        
        $sts=$this->db->prepare("SELECT * FROM `wedding` where WeddingID='".$id."'");
        $sts->execute();
		$data=$sts->fetchAll(PDO::FETCH_ASSOC);
        return $data;
    }
	public function Updatewedding($data){  
		
		$sql="Update  wedding set WeddingName='".$data["WeddingName"]."',  WedType='".$data["WedType"]."',  Desk='".$data["Desk"]."', Term='".$data["Term"]."', Inclusion='".$data["Inclusion"]."', Exclusion='".$data["Exclusion"]."', StartDate= '".$data["StartDate"]."', EndDate= '".$data["EndDate"]."', Cur= '".$data["Cur"]."', Price1= ".$data["Price1"].", WeddingCode= '".$data["weddingCode"]."', Area= '".$data["Area"]."', CountryID= ".$data["CountryID"]." where WeddingID='".$data["WeddingID"]."'";
		echo $sql;
        $sts=$this->db->prepare($sql);
        $sts->execute();
		
    }
	public function Galwedding($id){
        $sts=$this->db->prepare("SELECT * FROM weddinggallery where WeddingID='".$id."'");
        $sts->execute();
        return $sts->fetchAll();
    }
	public function weddingUpload($id){ 
        
        switch(strtolower($_FILES['files']['type'])){
            //buat image            
        case 'image/jpeg':
            $image = imagecreatefromjpeg($_FILES['files']['tmp_name']);
			$ext="jpg";
            break;
        case 'image/png':
            $image = imagecreatefrompng($_FILES['files']['tmp_name']);
			$ext="png";
            break;
        case 'image/gif':
            $image = imagecreatefromgif($_FILES['files']['tmp_name']);
			$ext="gif";
            break;
        
        } 
        // Target dimensions Big File
        $max_width = 800;
        $max_height = 400;

        // Get current dimensions
        $old_width  = imagesx($image);
        $old_height = imagesy($image);

        // Calculate the scaling we need to do to fit the image inside our frame
        $scale      = min($max_width/$old_width, $max_height/$old_height);

        // Get the new dimensions
        $new_width  = ceil($scale*$old_width);
        $new_height = ceil($scale*$old_height);
        // Create new empty image
        $new = imagecreatetruecolor($new_width, $new_height);

        // Resize old image into new
        imagecopyresampled($new, $image, 0, 0, 0, 0, $new_width, $new_height, $old_width, $old_height);
        $filename = __DIR__."/../tourgallery/WD-".$id."-".time().".".$ext;
        $SaveName = "tourgallery/WD-".$id."-".time().".".$ext;
		switch($ext){
			case 'jpg':
            imagejpeg($new,$filename,100);
            break;
			case 'png':
            imagepng($new,$filename,9);
			break;
			case 'gif':
            imagegif($new,$filename);
            break;
		}
        
        
        // Target dimensions Thumbs
        $max_width2 = 200;
        $max_height2 = 200;

        // Get current dimensions
        $old_width2  = imagesx($image);
        $old_height2 = imagesy($image);

        // Calculate the scaling we need to do to fit the image inside our frame
        $scale2      = min($max_width2/$old_width2, $max_height2/$old_height2);

        // Get the new dimensions
        $new_width2  = ceil($scale2*$old_width2);
        $new_height2 = ceil($scale2*$old_height2);
        // Create new empty image
        $new2 = imagecreatetruecolor($new_width2, $new_height2);

        // Resize old image into new
        imagecopyresampled($new2, $image, 0, 0, 0, 0, $new_width2, $new_height2, $old_width2, $old_height2);
        $filename2 = __DIR__."/../tourgallery/WD-".$id."_".time()."_Thumb".".".$ext;
        $ThumbName = "tourgallery/WD-".$id."_".time()."_Thumb".".".$ext;
        //imagejpeg($new2,$filename2,100);
        switch($ext){
			case 'jpg':
            imagejpeg($new2,$filename2,100);
            break;
			case 'png':
            imagepng($new2,$filename2,9);
			break;
			case 'gif':
            imagegif($new2,$filename);
            break;
		}
        //save to database
		$sql="INSERT INTO `weddinggallery` (GalleryID,WeddingID,Image,Thumb,Name) VALUES ('".Code::random_string()."','".$id."','".$SaveName."','".$ThumbName."','".$_POST['name']."')";
		//echo $sql;
        $sts2=$this->db->prepare($sql);
        $sts2->execute();
    }
	public function weddingdelgal(){
        //select Link Image
        $sql = "select * from weddinggallery where GalleryID='".$_POST['gid']."' and WeddingID='".$_POST['prid']."'";
        $q = $this->db->prepare($sql);
        $q->execute();
        $q->setFetchMode(PDO::FETCH_BOTH);	
	while($r = $q->fetch()){
          $img=$r['Image'];
	  unlink($img);
          $thumb=$r['thumb'];
          unlink($thumb);
	}
        
        // remove dari database         
        $sts=$this->db->prepare("Delete from weddinggallery where GalleryID='".$_POST['gid']."' and WeddingID='".$_POST['prid']."'");
        $sts->execute();
        
    }
	public function weddingdefg(){
        //unset all
        $sql = "update weddinggallery set Def='0' where WeddingID='".$_POST['prid']."'";
        $q = $this->db->prepare($sql);
        $q->execute();
        
        
        // set default
        $sts=$this->db->prepare("update weddinggallery set Def='1' where GalleryID='".$_POST['gid']."' and WeddingID='".$_POST['prid']."'");
        $sts->execute();
		//set to tour
		$sql = "select * from weddinggallery where GalleryID='".$_POST['gid']."' and WeddingID='".$_POST['prid']."'";
        $q = $this->db->prepare($sql);
        $q->execute();
        $q->setFetchMode(PDO::FETCH_BOTH);	
	while($r = $q->fetch()){
          $img=$r['Image'];
	}
		//set link def 
        $sts=$this->db->prepare("update wedding set defaultImg='".$img."' where WeddingID='".$_POST['prid']."'");
        $sts->execute();
    }
	public function weddingunsetg(){
        
        // set default
        $sts=$this->db->prepare("update weddinggallery set Def='0' where GalleryID='".$_POST['gid']."' and WeddingID='".$_POST['prid']."'");
        $sts->execute();
		
		//set link def 
        $sts=$this->db->prepare("update wedding set defaultImg='' where WeddingID='".$_POST['prid']."'");
        $sts->execute();
    }
	
	
	
	
	public function voidwedding(){  
		 $id=$_POST["gid"];
		$sql="Update  wedding set Status=0 where WeddingID='".$id."'";
		echo $sql;
        $sts=$this->db->prepare($sql);
        $sts->execute();
		
    }
	public function actwedding(){  
		 $id=$_POST["gid"];
		$sql="Update  wedding set Status=1 where WeddingID='".$id."'";
		//echo $sql;
        $sts=$this->db->prepare($sql);
        $sts->execute();
		
    }
	/*------------ End Wedding ----------*/
	/*---------- Area --------------*/
	public function charea(){        
        $id=$_POST["gid"];
		$sql="select * from area where CountryID='".$id."'";
		$sts=$this->db->prepare($sql);
		//echo $sql;
		$sts->execute();
		
		$data="";
		
		foreach($sts->fetchAll(PDO::FETCH_ASSOC) as $key => $value){
			$data=$data."<option>".$value['AreaName']."</option>";
		}
		
        echo $data;
    }
	public function listarea(){      
		$sql="SELECT area.*,country.CountryName FROM `area` inner join country on area.CountryID=country.CountryID";
		//echo $sql;
        $sts=$this->db->prepare($sql);
        $sts->execute();
		$data=$sts->fetchAll(PDO::FETCH_ASSOC);
        return $data;
        print_r($data);
    }
	public function areacreate($data){        
        //$sts=$this->db->prepare("insert into `area`(AreaName)values(:area)");
        //$sts->execute(array(':area'=>$data["name"]));
		$ext="";
		$sql="";
		switch(strtolower($_FILES['files']['type'])){
            //buat image            
        case 'image/jpeg':
            $image = imagecreatefromjpeg($_FILES['files']['tmp_name']);
			$ext="jpg";
            break;
        case 'image/png':
            $image = imagecreatefrompng($_FILES['files']['tmp_name']);
			$ext="png";
            break;
        case 'image/gif':
            $image = imagecreatefromgif($_FILES['files']['tmp_name']);
			$ext="gif";
            break;
        
        } 
		if ($ext<>""){
			// Target dimensions Big File
			$max_width = 400;
			$max_height = 200;

			// Get current dimensions
			$old_width  = imagesx($image);
			$old_height = imagesy($image);

			// Calculate the scaling we need to do to fit the image inside our frame
			$scale      = min($max_width/$old_width, $max_height/$old_height);

			// Get the new dimensions
			$new_width  = ceil($scale*$old_width);
			$new_height = ceil($scale*$old_height);
			// Create new empty image
			$new = imagecreatetruecolor($new_width, $new_height);
			$id=$_POST["areaname"];
			// Resize old image into new
			imagecopyresampled($new, $image, 0, 0, 0, 0, $new_width, $new_height, $old_width, $old_height);
			$filename = __DIR__."/../areagallery/".$id."-".time().".".$ext;
			$SaveName = "areagallery/".$id."-".time().".".$ext;
			switch($ext){
				case 'jpg':
				imagejpeg($new,$filename,100);
				break;
				case 'png':
				imagepng($new,$filename,9);
				break;
				case 'gif':
				imagegif($new,$filename);
				break;
			}
			$sql="INSERT INTO `area` (AreaName,Images,Desk,CountryID,slugs) VALUES ('".$_POST["areaname"]."','".$SaveName."','".$_POST['desk']."',".$_POST['country'].",'".$slug."')";
		}	
		
		$slug=str_replace(" ","_",$_POST["areaname"]);
		if ($sql==""){
			$sql="INSERT INTO `area` (AreaName,Desk,CountryID,slugs) VALUES ('".$_POST["areaname"]."','".$_POST['desk']."',".$_POST['country'].",'".$slug."')";
		}
        //save to database
		
		echo $sql;
        $sts2=$this->db->prepare($sql);
        $sts2->execute();
    }
	public function AreaSingle($id){
        $sts=$this->db->prepare('select * from area where areaID=:id');
        $sts->execute(array(
            ':id'=>$id
        ));
       
        return $sts->fetch();
    }
	public function updarea($data){
		/*
        $sts=$this->db->prepare("Update `area` set AreaName=:name where AreaID=:id");
        $sts->execute(array(
            ':id'=>$data['id'],
            ':name'=>$data['name']
            ));
			*/
			$ext="";
		switch(strtolower($_FILES['files']['type'])){
            //buat image            
        case 'image/jpeg':
            $image = imagecreatefromjpeg($_FILES['files']['tmp_name']);
			$ext="jpg";
            break;
        case 'image/png':
            $image = imagecreatefrompng($_FILES['files']['tmp_name']);
			$ext="png";
            break;
        case 'image/gif':
            $image = imagecreatefromgif($_FILES['files']['tmp_name']);
			$ext="gif";
            break;
        
        } 
	if ($ext<>""){
        // Target dimensions Big File
        $max_width = 400;
        $max_height = 200;

        // Get current dimensions
        $old_width  = imagesx($image);
        $old_height = imagesy($image);

        // Calculate the scaling we need to do to fit the image inside our frame
        $scale      = min($max_width/$old_width, $max_height/$old_height);

        // Get the new dimensions
        $new_width  = ceil($scale*$old_width);
        $new_height = ceil($scale*$old_height);
        // Create new empty image
        $new = imagecreatetruecolor($new_width, $new_height);
		$id=$_POST["areaname"];
        // Resize old image into new
        imagecopyresampled($new, $image, 0, 0, 0, 0, $new_width, $new_height, $old_width, $old_height);
        $filename = __DIR__."/../areagallery/".$id."-".time().".".$ext;
        $SaveName = "areagallery/".$id."-".time().".".$ext;
		switch($ext){
			case 'jpg':
            imagejpeg($new,$filename,100);
            break;
			case 'png':
            imagepng($new,$filename,9);
			break;
			case 'gif':
            imagegif($new,$filename);
            break;
		}
        
	}	
	//echo "This :".$SaveName;
	
		if($SaveName<>"" or isset($SaveName)){		
			$x=Code::GetField('area','Images',"areaID='".$data["id"]."'");
			//echo $x;
			if($x<>""){unlink($x);}			
			$sql="Update `area` set AreaName='".$_POST["areaname"]."', Desk='".$_POST["desk"]."', Images='".$SaveName."',CountryID=".$_POST['country']." where AreaID=".$data["id"];
		}else{
			$sql="Update `area` set AreaName='".$_POST["areaname"]."', Desk='".$_POST["desk"]."',CountryID=".$_POST['country']." where AreaID=".$data["id"];
		}
		
        $sts=$this->db->prepare($sql);
        $sts->execute();
    }
	/*----------- End Area -----------*/
	/*---------- Country --------------*/
	public function listcountry(){        
        $sts=$this->db->prepare("SELECT * FROM `country`");
        $sts->execute();
		$data=$sts->fetchAll(PDO::FETCH_ASSOC);
        return $data;
        print_r($data);
    }
	public function countrycreate(){    
	$ext="";
		switch(strtolower($_FILES['files']['type'])){
            //buat image            
        case 'image/jpeg':
            $image = imagecreatefromjpeg($_FILES['files']['tmp_name']);
			$ext="jpg";
            break;
        case 'image/png':
            $image = imagecreatefrompng($_FILES['files']['tmp_name']);
			$ext="png";
            break;
        case 'image/gif':
            $image = imagecreatefromgif($_FILES['files']['tmp_name']);
			$ext="gif";
            break;
        
        } 
	if ($ext<>""){
        // Target dimensions Big File
        $max_width = 400;
        $max_height = 200;

        // Get current dimensions
        $old_width  = imagesx($image);
        $old_height = imagesy($image);

        // Calculate the scaling we need to do to fit the image inside our frame
        $scale      = min($max_width/$old_width, $max_height/$old_height);

        // Get the new dimensions
        $new_width  = ceil($scale*$old_width);
        $new_height = ceil($scale*$old_height);
        // Create new empty image
        $new = imagecreatetruecolor($new_width, $new_height);
		$id=$_POST["country"];
        // Resize old image into new
        imagecopyresampled($new, $image, 0, 0, 0, 0, $new_width, $new_height, $old_width, $old_height);
        $filename = __DIR__."/../countrygallery/".$id."-".time().".".$ext;
        $SaveName = "countrygallery/".$id."-".time().".".$ext;
		switch($ext){
			case 'jpg':
            imagejpeg($new,$filename,100);
            break;
			case 'png':
            imagepng($new,$filename,9);
			break;
			case 'gif':
            imagegif($new,$filename);
            break;
		}
        
	}	
		
		
        //save to database
		$sql="INSERT INTO `country` (CountryName,Images,Desk) VALUES ('".$_POST["country"]."','".$SaveName."','".$_POST['desk']."')";
		//echo $sql;
        $sts2=$this->db->prepare($sql);
        $sts2->execute();
		
	
    }
	public function CountrySingle($id){
        $sts=$this->db->prepare('select * from country where CountryID=:id');
        $sts->execute(array(
            ':id'=>$id
        ));
       
        return $sts->fetch();
    }
	public function updcountry($data){
		$ext="";
		switch(strtolower($_FILES['files']['type'])){
            //buat image            
        case 'image/jpeg':
            $image = imagecreatefromjpeg($_FILES['files']['tmp_name']);
			$ext="jpg";
            break;
        case 'image/png':
            $image = imagecreatefrompng($_FILES['files']['tmp_name']);
			$ext="png";
            break;
        case 'image/gif':
            $image = imagecreatefromgif($_FILES['files']['tmp_name']);
			$ext="gif";
            break;
        
        } 
	if ($ext<>""){
        // Target dimensions Big File
        $max_width = 400;
        $max_height = 200;

        // Get current dimensions
        $old_width  = imagesx($image);
        $old_height = imagesy($image);

        // Calculate the scaling we need to do to fit the image inside our frame
        $scale      = min($max_width/$old_width, $max_height/$old_height);

        // Get the new dimensions
        $new_width  = ceil($scale*$old_width);
        $new_height = ceil($scale*$old_height);
        // Create new empty image
        $new = imagecreatetruecolor($new_width, $new_height);
		$id=$_POST["country"];
        // Resize old image into new
        imagecopyresampled($new, $image, 0, 0, 0, 0, $new_width, $new_height, $old_width, $old_height);
        $filename = __DIR__."/../countrygallery/".$id."-".time().".".$ext;
        $SaveName = "countrygallery/".$id."-".time().".".$ext;
		switch($ext){
			case 'jpg':
            imagejpeg($new,$filename,100);
            break;
			case 'png':
            imagepng($new,$filename,9);
			break;
			case 'gif':
            imagegif($new,$filename);
            break;
		}
        
	}	
	//echo "This :".$SaveName;
	
		if($SaveName<>"" or isset($SaveName)){		
			$x=Code::GetField('country','Images',"CountryID='".$data["id"]."'");
			echo $x;
			if($x<>""){unlink($x);}			
			$sql="Update `country` set CountryName='".$_POST["country"]."', Desk='".$_POST["desk"]."', Images='".$SaveName."' where CountryID=".$data["id"];
		}else{
			$sql="Update `country` set CountryName='".$_POST["country"]."', Desk='".$_POST["desk"]."' where CountryID=".$data["id"];
		}
		
        $sts=$this->db->prepare($sql);
        $sts->execute();
			
    }
	/*----------- End Country -----------*/
	/*----------- Cancelation --------*/
	public function listcancelation(){        
        $sts=$this->db->prepare("SELECT * FROM `cancelation`");
        $sts->execute();
		$data=$sts->fetchAll(PDO::FETCH_ASSOC);
		
        return $data;
		
    }
	public function cancelationcreate($data){        
        $sts=$this->db->prepare("insert into `cancelation`(CancelName)values(:cancelation)");
        $sts->execute(array(':cancelation'=>$data["name"]));
	
    }
	public function cancelationSingle($id){
        $sts=$this->db->prepare('select * from cancelation where CancelID=:id');
        $sts->execute(array(
            ':id'=>$id
        ));
       
        return $sts->fetch();
    }
	public function updcancelation($data){
        $sts=$this->db->prepare("Update `cancelation` set CancelName=:name where CancelID=:id");
        $sts->execute(array(
            ':id'=>$data['id'],
            ':name'=>$data['name']
            ));
    }
	/*--------- End Cancelation ------*/
	/*------ Slider ------------*/
	public function SlideList(){
        $sts=$this->db->prepare("SELECT * FROM slide");
        $sts->execute();
        return $sts->fetchAll();
    }
	public function SliderUpload(){ 
        $id=Code::random_string();
        switch(strtolower($_FILES['files']['type'])){
            //buat image            
        case 'image/jpeg':
            $image = imagecreatefromjpeg($_FILES['files']['tmp_name']);
			$ext="jpg";
            break;
        case 'image/png':
            $image = imagecreatefrompng($_FILES['files']['tmp_name']);
			$ext="png";
            break;
        case 'image/gif':
            $image = imagecreatefromgif($_FILES['files']['tmp_name']);
			$ext="gif";
            break;
        
        } 
        // Target dimensions Big File
        $max_width = 2000;
        $max_height = 666;

        // Get current dimensions
        $old_width  = imagesx($image);
        $old_height = imagesy($image);

        // Calculate the scaling we need to do to fit the image inside our frame
        $scale      = min($max_width/$old_width, $max_height/$old_height);

        // Get the new dimensions
        $new_width  = ceil($scale*$old_width);
        $new_height = ceil($scale*$old_height);
        // Create new empty image
        $new = imagecreatetruecolor($new_width, $new_height);

        // Resize old image into new
        imagecopyresampled($new, $image, 0, 0, 0, 0, $new_width, $new_height, $old_width, $old_height);
        $filename = __DIR__."/../slidegallery/".$id."-".time().".".$ext;
        $SaveName = "slidegallery/".$id."-".time().".".$ext;
		switch($ext){
			case 'jpg':
            imagejpeg($new,$filename,100);
            break;
			case 'png':
            imagepng($new,$filename,9);
			break;
			case 'gif':
            imagegif($new,$filename);
            break;
		}
        
        
        // Target dimensions Thumbs
        $max_width2 = 200;
        $max_height2 = 200;

        // Get current dimensions
        $old_width2  = imagesx($image);
        $old_height2 = imagesy($image);

        // Calculate the scaling we need to do to fit the image inside our frame
        $scale2      = min($max_width2/$old_width2, $max_height2/$old_height2);

        // Get the new dimensions
        $new_width2  = ceil($scale2*$old_width2);
        $new_height2 = ceil($scale2*$old_height2);
        // Create new empty image
        $new2 = imagecreatetruecolor($new_width2, $new_height2);

        // Resize old image into new
        imagecopyresampled($new2, $image, 0, 0, 0, 0, $new_width2, $new_height2, $old_width2, $old_height2);
        $filename2 = __DIR__."/../slidegallery/".$id."_".time()."_Thumb".".".$ext;
        $ThumbName = "slidegallery/".$id."_".time()."_Thumb".".".$ext;
        //imagejpeg($new2,$filename2,100);
        switch($ext){
			case 'jpg':
            imagejpeg($new2,$filename2,100);
            break;
			case 'png':
            imagepng($new2,$filename2,9);
			break;
			case 'gif':
            imagegif($new2,$filename);
            break;
		}
        //save to database
		$desk=str_replace("'","\'",$_POST['desk']);
		$sql="INSERT INTO `slide` (SlideID,image,thumb,title,desk,uri) VALUES ('".$id."','".$SaveName."','".$ThumbName."','".$_POST['title']."','".$desk."','".$_POST['uri']."')";
		//echo $sql;
        $sts2=$this->db->prepare($sql);
        $sts2->execute();
    }
	public function delslide(){
            //select Link Image
        $sql = "select * from slide where SlideID='".$_POST['gid']."' ";
        $q = $this->db->prepare($sql);
        $q->execute();
        $q->setFetchMode(PDO::FETCH_BOTH);	
	while($r = $q->fetch()){
          $img=$r['image'];
	  unlink($img);
          $thumb=$r['thumb'];
          unlink($thumb);
	}
        
        // remove dari database         
        $sts=$this->db->prepare("Delete from slide where SlideID='".$_POST['gid']."'");
        $sts->execute();
        
    
	}
	/*------- End Slide ------------------*/
	
	/*-------- SetPromo -------------*/
	public function promolist(){        
        $sts=$this->db->prepare("SELECT promo.*,tour.* FROM `promo` inner join tour on(promo.TourID=tour.TourID) where promo.status=1");
        $sts->execute();
		$data=$sts->fetchAll(PDO::FETCH_ASSOC);
		
        return $data;
		
    }
	public function seltour(){
		$sql="SELECT * FROM tour WHERE Status=1 and TourID not in(select TourID from promo where status=1)";
		//echo $sql;
        $sts=$this->db->prepare($sql);
        $sts->execute();
        return $sts->fetchAll();
    }
	public function savepromo(){  
		 $id=$_POST["gid"];
		$sql="insert into promo(TourID,status)values('".$id."',1)";
		echo $sql;
        $sts=$this->db->prepare($sql);
        $sts->execute();
		
    }
	public function delpromo(){  
		 $id=$_POST["gid"];
		$sql="delete from promo where ID=".$id." ";
		echo $sql;
        $sts=$this->db->prepare($sql);
        $sts->execute();
		
    }
	/*-------- End SetPromo -------------*/
	/*-------- Set Popular -------------*/
	public function popularlist(){        
        $sts=$this->db->prepare("SELECT promo.*,tour.* FROM `promo` inner join tour on(promo.TourID=tour.TourID) where promo.status=2 ");
        $sts->execute();
		$data=$sts->fetchAll(PDO::FETCH_ASSOC);
		
        return $data;
		
    }
	public function seltourpop(){
		$sql="SELECT * FROM tour WHERE Status=1 and sts=1 and TourID not in(select TourID from promo where status=2)";
		//echo $sql;
        $sts=$this->db->prepare($sql);
        $sts->execute();
        return $sts->fetchAll();
    }
	public function savepopular(){  
		 $id=$_POST["gid"];
		$sql="insert into promo(TourID,status)values('".$id."',2)";
		echo $sql;
        $sts=$this->db->prepare($sql);
        $sts->execute();
		
    }
	public function delpopular(){  
		 $id=$_POST["gid"];
		$sql="delete from promo where ID=".$id." ";
		echo $sql;
        $sts=$this->db->prepare($sql);
        $sts->execute();
		
    }
	/*-------- End SetPromo -------------*/
	/*-------- SetCountry -------------*/
	public function setcountrylist(){        
        $sts=$this->db->prepare("SELECT * from country where SetF=1");
        $sts->execute();
		$data=$sts->fetchAll(PDO::FETCH_ASSOC);
		
        return $data;
		
    }
	public function selsetcountry(){
		$sql="SELECT * FROM country where SetF=0";
		//echo $sql;
        $sts=$this->db->prepare($sql);
        $sts->execute();
        return $sts->fetchAll();
    }
	public function savesetcountry(){  
		 $id=$_POST["gid"];
		$sql="update country set SetF=1 where CountryID=".$id;
		echo $sql;
        $sts=$this->db->prepare($sql);
        $sts->execute();
		
    }
	public function delsetcountry(){  
		 $id=$_POST["gid"];
		$sql="update country set SetF=0 where CountryID=".$id;
		echo $sql;
        $sts=$this->db->prepare($sql);
        $sts->execute();
		
    }
	/*-------- End SetCountry -------------*/
	/*-------- SetArea -------------*/
	public function setarealist(){        
        $sts=$this->db->prepare("SELECT * from area where SetF=1");
        $sts->execute();
		$data=$sts->fetchAll(PDO::FETCH_ASSOC);
		
        return $data;
		
    }
	public function selsetarea(){
		$sql="SELECT * FROM area where SetF=0";
		//echo $sql;
        $sts=$this->db->prepare($sql);
        $sts->execute();
        return $sts->fetchAll();
    }
	public function savesetarea(){  
		 $id=$_POST["gid"];
		$sql="update area set SetF=1 where AreaID=".$id;
		echo $sql;
        $sts=$this->db->prepare($sql);
        $sts->execute();
		
    }
	public function delsetarea(){  
		 $id=$_POST["gid"];
		$sql="update area set SetF=0 where AreaID=".$id;
		echo $sql;
        $sts=$this->db->prepare($sql);
        $sts->execute();
		
    }
	/*-------- End SetCountry -------------*/
	/*----------- TourType --------*/
	public function listtourtype(){        
        $sts=$this->db->prepare("SELECT * FROM `tourtype`");
        $sts->execute();
		$data=$sts->fetchAll(PDO::FETCH_ASSOC);
		
        return $data;
		
    }
	public function tourtypecreate($data){        
        $sts=$this->db->prepare("insert into `tourtype`(Name)values(:name)");
        $sts->execute(array(':name'=>$data["name"]));
	
    }
	public function tourtypeSingle($id){
        $sts=$this->db->prepare('select * from tourtype where ID=:id');
        $sts->execute(array(
            ':id'=>$id
        ));
       
        return $sts->fetch();
    }
	public function updtourtype($data){
        $sts=$this->db->prepare("Update `tourtype` set Name=:name where ID=:id");
        $sts->execute(array(
            ':id'=>$data['id'],
            ':name'=>$data['name']
            ));
    }
	/*--------- End TourType ------*/
	/*----------- TourCategory --------*/
	public function listtourcat(){        
        $sts=$this->db->prepare("SELECT * FROM `tourcategory`");
        $sts->execute();
		$data=$sts->fetchAll(PDO::FETCH_ASSOC);
		
        return $data;
		
    }
	public function tourcatcreate($data){        
        $sts=$this->db->prepare("insert into `tourcategory`(Name)values(:name)");
        $sts->execute(array(':name'=>$data["name"]));
	
    }
	public function tourcatSingle($id){
        $sts=$this->db->prepare('select * from tourcategory where ID=:id');
        $sts->execute(array(
            ':id'=>$id
        ));
       
        return $sts->fetch();
    }
	public function updtourcat($data){
        $sts=$this->db->prepare("Update `tourcategory` set Name=:name where ID=:id");
        $sts->execute(array(
            ':id'=>$data['id'],
            ':name'=>$data['name']
            ));
    }
	/*--------- End TourCategory ------*/
	/*----------- TrType --------*/
	public function listtrtype(){        
        $sts=$this->db->prepare("SELECT * FROM `tourtype` where type='2'");
        $sts->execute();
		$data=$sts->fetchAll(PDO::FETCH_ASSOC);
		
        return $data;
		
    }
	public function trtypecreate($data){        
        $sts=$this->db->prepare("insert into `tourtype`(Name,type)values(:name,:type)");
        $sts->execute(array(':name'=>$data["name"],':type'=>"2"));
	
    }
	public function trtypeSingle($id){
        $sts=$this->db->prepare('select * from tourtype where ID=:id');
        $sts->execute(array(
            ':id'=>$id
        ));
       
        return $sts->fetch();
    }
	public function updtrtype($data){
        $sts=$this->db->prepare("Update `tourtype` set Name=:name where ID=:id");
        $sts->execute(array(
            ':id'=>$data['id'],
            ':name'=>$data['name']
            ));
    }
	/*--------- End TrType ------*/
	/*--------- frontpage ------*/
	public function Settings(){
        $sts=$this->db->prepare("SELECT * FROM `settings` where Type=1");
        $sts->execute();
		$data=$sts->fetchAll(PDO::FETCH_ASSOC);
		
        return $data;
    }
	public function SaveSet($id){
		$sql="Update `settings` set `Value`='show' where ID=".$id;
		//echo $sql;
        $sts=$this->db->prepare($sql);
        $sts->execute();
    }
	public function SaveUnSet($id){
		$sql="Update `settings` set `Value`='no' where ID=".$id;
		//echo $sql;
        $sts=$this->db->prepare($sql);
        $sts->execute();
    }
	/*--------- End Cancelation ------*/
	
	/*--------- tourbook ------*/
	public function ListBook(){
        $sts=$this->db->prepare("select `order`.* from `order` order by bookdate ");
        $sts->execute();
		$data=$sts->fetchAll(PDO::FETCH_ASSOC);
		
        return $data;
    }
	
	/*--------- End Cancelation ------*/
	
	/*--------- Page ------*/
	public function ListPage(){
        $sts=$this->db->prepare("select `contents`.* from `contents` order by ContentTitle ");
        $sts->execute();
		$data=$sts->fetchAll(PDO::FETCH_ASSOC);
		
        return $data;
    }
	public function SavePage($data){
		$sql="insert into contents(ContentTitle,slugs,Content)value('".$data["title"]."','".$data["slug"]."','".$data["content"]."')";
		echo $sql;
        $sts=$this->db->prepare($sql);
        $sts->execute();
		$data=$sts->fetchAll(PDO::FETCH_ASSOC);
		
        return $data;
    }
	public function SinglePage($id){
        $sts=$this->db->prepare("select `contents`.* from `contents` where ContentID=".$id);
        $sts->execute();
		$data=$sts->fetchAll(PDO::FETCH_ASSOC);
		
        return $data;
    }
	public function UpdPage($data){
		$sql="Update contents set ContentTitle='".$data["title"]."', Content='".$data["content"]."' where ContentID=".$data["id"];
		echo $sql;
        $sts=$this->db->prepare($sql);
        $sts->execute();
		$data=$sts->fetchAll(PDO::FETCH_ASSOC);
		
        return $data;
    }
	public function delPage($id){
		$sql="Delete from contents  where ContentID=".$id;
		echo $sql;
        $sts=$this->db->prepare($sql);
        $sts->execute();
		$data=$sts->fetchAll(PDO::FETCH_ASSOC);
		
        return $data;
    }
	/*--------- End Cancelation ------*/
	/*--------- Page ------*/
	
	public function SingleTiket($id){
		$sql="select `tiket`.* from `tiket` where ContentID=".$id;
		//echo $sql;
        $sts=$this->db->prepare($sql);
        $sts->execute();
		$data=$sts->fetchAll(PDO::FETCH_ASSOC);
		
        return $data;
    }
	public function UpdTiket($data){
		$sql="Update tiket set ContentTitle='".$data["title"]."', Content='".$data["content"]."' where ContentID=".$data["id"];
		//echo $sql;
        $sts=$this->db->prepare($sql);
        $sts->execute();
		$data=$sts->fetchAll(PDO::FETCH_ASSOC);
		
        return $data;
    }
	
	/*--------- End Cancelation ------*/
	/*--------- Keyword ------*/
	public function lskey(){
        $sts=$this->db->prepare("select * from `settings` where ID=5");
        $sts->execute();
		$data=$sts->fetchAll(PDO::FETCH_ASSOC);
		
        return $data;
    }
	public function savekey(){
		$sql="update `settings` set `Value`='".$_POST["desk"]."' where ID=5";
		//echo $sql;
        $sts=$this->db->prepare($sql);
        $sts->execute();
		$data=$sts->fetchAll(PDO::FETCH_ASSOC);
		
        return $data;
    }
	/*--------- End Cancelation ------*/
	/*--------- User ------*/
	public function msuList(){
        $sts=$this->db->prepare('select user.*,usertype.TypeName from user inner join usertype on user.TypeID=usertype.TypeID');
        $sts->execute();
        return $sts->fetchAll();
    }
    public function msuListSingle($id){
        $sts=$this->db->prepare('select * from user where userID=:id');
        $sts->execute(array(
            ':id'=>$id
        ));
       
        return $sts->fetch();
    }
	public function LvlList(){
        $sts=$this->db->prepare('select * from usertype');
        $sts->execute();
        return $sts->fetchAll();
    }
    public function usercreate($data){
        $sts=$this->db->prepare("INSERT INTO `user`(`userID`, `username`, `password`, `Name`, `TypeID`, `Date_Created`, `aktif`)            
                VALUES (:id,:user,md5(:password),:name,:type,:dates,1)");
        $sts->execute(array(
            ':id'=>$data['id'],
            ':user'=>$data['uname'],
            ':password'=>$data['password'],
            ':name'=>$data['name'],
			':type'=>$data['TypeID'],
            ':dates'=>$data['dates']
            ));
        
    }
    
    public function usereditSave($data){
        $sql="Update `user` set ";
        if($data['password']<>""){
            $sql=$sql." password=md5(:password) ";
            $pass=$data['password'];
        }else{
            $sql=$sql." password=:password ";
            $pass=$data['password2'];
        }
        $sql=$sql." , Name=:name ";
		$sql=$sql." , TypeID=:type ";
        $sql=$sql." where userID=:id ";
        echo $sql;
        $sts=$this->db->prepare($sql);
        $sts->execute(array(
            ':id'=>$data['id'],
            ':name'=>$data['name'],
			':type'=>$data['Type'],
            ':password'=>$pass
            ));
            print_r($data);
    }
    public function uservoid($id){
        $sql="update `user` set aktif=0 where userID='".$id."'";
        $sts=$this->db->prepare($sql);
        $sts->execute();
        
    }
	
	/*--------- End User ------*/
	/*----------- EO Type --------*/
	public function listwedtype(){        
        $sts=$this->db->prepare("SELECT * FROM `wedtype`");
        $sts->execute();
		$data=$sts->fetchAll(PDO::FETCH_ASSOC);
		
        return $data;
		
    }
	public function wedtypecreate($data){        
        $sts=$this->db->prepare("insert into `wedtype`(Name)values(:name)");
        $sts->execute(array(':name'=>$data["name"]));
	
    }
	public function wedtypeSingle($id){
        $sts=$this->db->prepare('select * from wedtype where ID=:id');
        $sts->execute(array(
            ':id'=>$id
        ));
       
        return $sts->fetch();
    }
	public function updwedtype($data){
        $sts=$this->db->prepare("Update `wedtype` set Name=:name where ID=:id");
        $sts->execute(array(
            ':id'=>$data['id'],
            ':name'=>$data['name']
            ));
    }
	/*--------- End EO Type ------*/
	/*--------- Hotel Fasility ------*/
	public function listhotelfas(){        
        $sts=$this->db->prepare("SELECT * FROM `hotelfas`");
        $sts->execute();
		$data=$sts->fetchAll(PDO::FETCH_ASSOC);
        return $data;
        print_r($data);
    }
	public function hotelfascreate($data){        
        $sts=$this->db->prepare("insert into `hotelfas`(hotelfasName)values(:hotelfas)");
        $sts->execute(array(':hotelfas'=>$data["name"]));
	
    }
	public function hotelfasSingle($id){
        $sts=$this->db->prepare('select * from hotelfas where hotelfasID=:id');
        $sts->execute(array(
            ':id'=>$id
        ));
       
        return $sts->fetch();
    }
	public function updhotelfas($data){
        $sts=$this->db->prepare("Update `hotelfas` set hotelfasName=:name where hotelfasID=:id");
        $sts->execute(array(
            ':id'=>$data['id'],
            ':name'=>$data['name']
            ));
    }
	/*--------- End Hotel Fasility` ------*/
	/*--------- Hotel Category` ------*/
	public function listhotelcat(){        
        $sts=$this->db->prepare("SELECT * FROM `category`");
        $sts->execute();
		$data=$sts->fetchAll(PDO::FETCH_ASSOC);
        return $data;
        print_r($data);
    }
	public function hotelcatcreate($data){        
        $sts=$this->db->prepare("insert into `category`(categoryName)values(:category)");
        $sts->execute(array(':category'=>$data["name"]));
	
    }
	public function hotelcatSingle($id){
        $sts=$this->db->prepare('select * from category where CategoryID=:id');
        $sts->execute(array(
            ':id'=>$id
        ));
       
        return $sts->fetch();
    }
	public function updhotelcat($data){
        $sts=$this->db->prepare("Update `category` set categoryName=:name where CategoryID=:id");
        $sts->execute(array(
            ':id'=>$data['id'],
            ':name'=>$data['name']
            ));
    }
	/*--------- End Hotel Category` ------*/
	/*---------  Hotel ` ------*/
	public function hotelfas(){        
        $sts=$this->db->prepare("SELECT * FROM `hotelfas`");
        $sts->execute();
		$data=$sts->fetchAll(PDO::FETCH_ASSOC);
        return $data;
        
    }
	public function hotelclas(){        
        $sts=$this->db->prepare("SELECT * FROM `category`");
        $sts->execute();
		$data=$sts->fetchAll(PDO::FETCH_ASSOC);
        return $data;
        
    }
	
	public function Createhotel($data){  
		
		//$sql="insert into hotel(HotelID,Name,Address,Phone,Fax,email,starID,CountryID,Province,City,CategoryID,CheckIn,CheckOut,Area,Latmap,LongMap,Commision,startPrice,PicName,Picdisignation,PicMobile,Deskripsi) values ( '".$data["HotelID"]."', '".$data["Name"]."', '".$data["Alamat"]."', '".$data["Phone"]."', '".$data["Fax"]."', '".$data["email"]."', ".$data["StarID"].", ".$data["CountryID"].", '".$data["Province"]."', '".$data["City"]."', '".$data["CategoryID"]."', '".$data["CheckIn"]."', '".$data["CheckOut"]."', '".$data["Area"]."', '".$data["LatMap"]."', '".$data["LongMap"]."', ".$data["commision"].", ".$data["startPrice"].", '".$data["PICName"]."', '".$data["PICdisignation"]."','".$data["PICMobile"]."', '".$data["Deskripsi"]."' )";
		//$sql="insert into property(Propertyid, Name, Address, Phone, Fax, email, starID, CountryID, Province, City, CategoryID, CheckIn, CheckOut, Area, Latmap, LongMap, Commision, startPrice, PicName, Picdisignation, PicMobile, Deskripsi) values (':Propertyid', ':Name', ':Address', ':Phone', ':Fax', ':email', :starID, :CountryID, ':Province',':City',':CategoryID' ,':CheckIn', ':CheckOut', ':Area', ':Latmap', ':LongMap', :Commision, :startPrice, ':PicName', ':Picdisignation', ':PicMobile', ':Deskripsi')";
		//echo $sql;
		$sql="insert into hotel(HotelID,Name,Address,Phone,Fax,email,starID,CountryID,Province,City,CategoryID,CheckIn,CheckOut,Area,Latmap,LongMap,Commision,startPrice,PicName,Picdisignation,PicMobile,Deskripsi) values (:HotelID,:Name,:Address,:Phone,:Fax,:email,:starID,:CountryID,:Province,:City,:CategoryID,:CheckIn,:CheckOut,:Area,:Latmap,:LongMap,:Commision,:startPrice,:PicName,:Picdisignation,:PicMobile,:Deskripsi)";
        $sts=$this->db->prepare($sql);
		//$sts->execute();
        
		$sts->execute(array( 
		':HotelID'=>$data["HotelID"],
		':Name'=>$data["Name"], 
		':Address'=>$data["Alamat"],
		':Phone'=> $data["Phone"],
		':Fax'=> $data["Fax"],
		':email'=> $data["email"],
		':starID'=> $data["StarID"],
		':CountryID'=>$data["CountryID"],
		':Province'=>$data["Province"], 
		':City'=>$data["City"], 
		':CategoryID'=>$data["CategoryID"],
		':CheckIn'=> $data["CheckIn"], 
		':CheckOut'=>$data["CheckOut"], 
		':Area'=>$data["Area"],
		':Latmap'=> $data["LatMap"],
		':LongMap'=>$data["LongMap"], 
		':Commision'=>$data["commision"], 
		':startPrice'=>$data["startPrice"], 
		':PicName'=>$data["PICName"], 
		':Picdisignation'=>$data["PICdisignation"],
		':PicMobile'=>$data["PICMobile"], 
		':Deskripsi'=>$data["Deskripsi"]
		
		));
		$sts=$this->db->prepare("delete from hotelfasility where HotelID='".$data["HotelID"]."'");
        $sts->execute();
		$ls=Code::nLastData("hotelfas","hotelfasID");
		for($i=1;$i<=$ls;$i++){
			if (isset($_POST["Chk".$i])){
				$sql="insert into hotelfasility(FasilityID,HotelID,act)values(".$i.",'".$data["HotelID"]."',1)";
				echo $sql;
			$sts=$this->db->prepare($sql);
			$sts->execute();
			}
		}
    }
	public function listing(){  
		$sql="select HotelID,Name,Address from hotel where status=1";
		$sts=$this->db->prepare($sql);
		$sts->execute();
		$rst=$sts->fetchAll(PDO::FETCH_ASSOC);
		$xx=array();
		
		if ($sts->rowCount()>0){
		foreach($rst as $key => $value){
		$xx[]=array(
			"Name" => $value["Name"],
			"Address" => $value["Address"],
			"Details" => "<a href='".URL."hotellist/modifys/".$value["HotelID"]."'>Modify</a> ",
			"Gallery" => "<a href='".URL."gallery/".$value["HotelID"]."'>View Gallery</a> ",
			"RoomList" => "<a href='".URL."roomlist/".$value["HotelID"]."'>Room List</a> "
			);	
		}
		}
		
		$results = ["sEcho" => 1,
        	"iTotalRecords" => count($xx),
        	"iTotalDisplayRecords" => count($xx),
        	"aaData" => $xx ];
		echo json_encode($xx);
   }
   public function listpro(){  
		$sql="select HotelID,Name,Address,if(status=1,'Active','Void')as Status from hotel ";
		$sts=$this->db->prepare($sql);
		$sts->execute();
		$rst=$sts->fetchAll(PDO::FETCH_ASSOC);
		return $rst;
   }
   public function singlehotel($id){  
		$sql="select * from hotel where HotelID='".$id."'";
		$sts=$this->db->prepare($sql);
		$sts->execute();
		$rst=$sts->fetchAll(PDO::FETCH_ASSOC);
		return $rst;
   }
  public function alProFas($id){  
		$sql="select FasilityID from profasility where HotelID='".$id."'";
		$sts=$this->db->prepare($sql);
		$sts->execute();
		$rst=$sts->fetchAll(PDO::FETCH_ASSOC);
		return $rst;
   }
   
   public function Updatehotel($data){  
		/*
		$sql="Update  hotel set Name='".$data["Name"]."', Address='".$data["Alamat"]."', Phone='".$data["Phone"]."', Fax='".$data["Fax"]."', email= '".$data["email"]."', starID=".$data["StarID"].", CountryID=".$data["CountryID"].", Province='".$data["Province"]."', City='".$data["City"]."', CategoryID='".$data["CategoryID"]."', CheckIn='".$data["CheckIn"]."', CheckOut='".$data["CheckOut"]."', Area='".$data["Area"]."', Latmap='".$data["LatMap"]."', LongMap='".$data["LongMap"]."', Commision=".$data["commision"].", startPrice=".$data["startPrice"].", PicName='".$data["PICName"]."', Picdisignation='".$data["PICdisignation"]."', PicMobile=".$data["PICMobile"].", Deskripsi='".$data["Deskripsi"]."' where HotelID='".$data["HotelID"]."'";
		echo $sql;
        $sts=$this->db->prepare($sql);
        $sts->execute();
		$sts=$this->db->prepare("delete from profasility where HotelID='".$data["HotelID"]."'");
        $sts->execute();
		$ls=Code::nLastData("hotelfas","hotelfasID");
		for($i=1;$i<=$ls;$i++){
			if (isset($_GET["Chk".$i])){
			$sts=$this->db->prepare("insert into profasility(FasilityID,HotelID,act)values(".$i.",'".$data["HotelID"]."',1)");
			$sts->execute();
			}
		}*/
		//$sql="update hotel set Name=':Name',Address=':Address',Phone=':Phone',Fax=':Fax',email=':email',starID=:starID,CountryID=:CountryID,Province=':Province',City=':City',CategoryID=:CategoryID,CheckIn=':CheckIn',CheckOut=':CheckOut',Area=':Area',Latmap=':Latmap',LongMap=':LongMap',Commision=:Commision,startPrice=:startPrice,PicName=':PicName',Picdisignation=':Picdisignation',PicMobile=':PicMobile',Deskripsi=':Deskripsi' where HotelID=':HotelID'";
		$sql="update hotel set Name=:Name,Address=:Address,Phone=:Phone,Fax=:Fax,email=:email,starID=:starID,CountryID=:CountryID,Province=:Province,City=:City,CategoryID=:CategoryID,CheckIn=:CheckIn,CheckOut=:CheckOut,Area=:Area,Latmap=:Latmap,LongMap=:LongMap,Commision=:Commision,startPrice=:startPrice,PicName=:PicName,Picdisignation=:Picdisignation,PicMobile=:PicMobile,Deskripsi=:Deskripsi where HotelID=:HotelID";
        $sts=$this->db->prepare($sql);
		//$sts->execute();
        
		$sts->execute(array( 
		':HotelID'=>$data["HotelID"],
		':Name'=>$data["Name"], 
		':Address'=>$data["Alamat"],
		':Phone'=> $data["Phone"],
		':Fax'=> $data["Fax"],
		':email'=> $data["email"],
		':starID'=> $data["StarID"],
		':CountryID'=>$data["CountryID"],
		':Province'=>$data["Province"], 
		':City'=>$data["City"], 
		':CategoryID'=>$data["CategoryID"],
		':CheckIn'=> $data["CheckIn"], 
		':CheckOut'=>$data["CheckOut"], 
		':Area'=>$data["Area"],
		':Latmap'=> $data["LatMap"],
		':LongMap'=>$data["LongMap"], 
		':Commision'=>$data["commision"], 
		':startPrice'=>$data["startPrice"], 
		':PicName'=>$data["PICName"], 
		':Picdisignation'=>$data["PICdisignation"],
		':PicMobile'=>$data["PICMobile"], 
		':Deskripsi'=>$data["Deskripsi"]
		
		));
		$sts=$this->db->prepare("delete from hotelfasility where HotelID='".$data["HotelID"]."'");
        $sts->execute();
		$ls=Code::nLastData("hotelfas","hotelfasID");
		//echo $ls;
		for($i=1;$i<=$ls;$i++){
			//echo $_POST["Chk".$i];
			if (isset($_POST["Chk".$i])){
				$sql="insert into hotelfasility(FasilityID,HotelID,act)values(".$i.",'".$data["HotelID"]."',1)";
				echo $sql;
			$sts=$this->db->prepare($sql);
			$sts->execute();
			}
		}
    }
	
	public function HotGalList($id){
        $sts=$this->db->prepare("SELECT * FROM hotelgallery where HotelID='".$id."'");
        $sts->execute();
        return $sts->fetchAll();
    }
	public function hotUpload($id){ 
        
        switch(strtolower($_FILES['files']['type'])){
            //buat image            
        case 'image/jpeg':
            $image = imagecreatefromjpeg($_FILES['files']['tmp_name']);
			$ext="jpg";
            break;
        case 'image/png':
            $image = imagecreatefrompng($_FILES['files']['tmp_name']);
			$ext="png";
            break;
        case 'image/gif':
            $image = imagecreatefromgif($_FILES['files']['tmp_name']);
			$ext="gif";
            break;
        
        } 
        // Target dimensions Big File
        $max_width = 600;
        $max_height = 400;

        // Get current dimensions
        $old_width  = imagesx($image);
        $old_height = imagesy($image);

        // Calculate the scaling we need to do to fit the image inside our frame
        $scale      = min($max_width/$old_width, $max_height/$old_height);

        // Get the new dimensions
        $new_width  = ceil($scale*$old_width);
        $new_height = ceil($scale*$old_height);
        // Create new empty image
        $new = imagecreatetruecolor($new_width, $new_height);

        // Resize old image into new
        imagecopyresampled($new, $image, 0, 0, 0, 0, $new_width, $new_height, $old_width, $old_height);
        $filename = __DIR__."./../hotelgallery/".$id."-".time().".".$ext;
        $SaveName = "hotelgallery/".$id."-".time().".".$ext;
		switch($ext){
			case 'jpg':
            imagejpeg($new,$filename,100);
            break;
			case 'png':
            imagepng($new,$filename,9);
			break;
			case 'gif':
            imagegif($new,$filename);
            break;
		}
        
        
        // Target dimensions Thumbs
        $max_width2 = 200;
        $max_height2 = 200;

        // Get current dimensions
        $old_width2  = imagesx($image);
        $old_height2 = imagesy($image);

        // Calculate the scaling we need to do to fit the image inside our frame
        $scale2      = min($max_width2/$old_width2, $max_height2/$old_height2);

        // Get the new dimensions
        $new_width2  = ceil($scale2*$old_width2);
        $new_height2 = ceil($scale2*$old_height2);
        // Create new empty image
        $new2 = imagecreatetruecolor($new_width2, $new_height2);

        // Resize old image into new
        imagecopyresampled($new2, $image, 0, 0, 0, 0, $new_width2, $new_height2, $old_width2, $old_height2);
        $filename2 = __DIR__."./../hotelgallery/".$id."_".time()."_Thumb".".".$ext;
        $ThumbName = "hotelgallery/".$id."_".time()."_Thumb".".".$ext;
        //imagejpeg($new2,$filename2,100);
        switch($ext){
			case 'jpg':
            imagejpeg($new2,$filename2,100);
            break;
			case 'png':
            imagepng($new2,$filename2,9);
			break;
			case 'gif':
            imagegif($new2,$filename);
            break;
		}
        //save to database
		$sql="INSERT INTO `hotelgallery` (GalleryID,HotelID,Image,Thumb,Name) VALUES ('".Code::random_string()."','".$id."','".$SaveName."','".$ThumbName."','".$_POST['name']."')";
		//echo $sql;
        $sts2=$this->db->prepare($sql);
        $sts2->execute();
    }
	
	public function hoteldelgal(){
        //select Link Image
        $sql = "select * from hotelgallery where GalleryID='".$_POST['gid']."' and HotelID='".$_POST['prid']."'";
        $q = $this->db->prepare($sql);
        $q->execute();
        $q->setFetchMode(PDO::FETCH_BOTH);	
	while($r = $q->fetch()){
          $img=$r['Image'];
	  unlink($img);
          $thumb=$r['thumb'];
          unlink($thumb);
	}
        
        // remove dari database         
        $sts=$this->db->prepare("Delete from hotelgallery where GalleryID='".$_POST['gid']."' and HotelID='".$_POST['prid']."'");
        $sts->execute();
        
    }
	
	public function listroom($id){
		$sql="SELECT hotel.HotelID,hotel.Name,room.RoomID,room.RoomName,room.AdlPax,room.ChdPax, if(room.status=0,'Void','Active') as Status FROM hotel inner join room on hotel.HotelID=room.HotelID where hotel.HotelID='".$id."'";
		//echo $sql;
        $sts=$this->db->prepare($sql);
        $sts->execute();
        return $sts->fetchAll();
    }
	public function allroom(){
		$sql="SELECT hotel.HotelID,hotel.Name,room.RoomID,room.RoomName,room.AdlPax,room.ChdPax, if(room.status=0,'Void','Active') as Status FROM hotel inner join room on hotel.HotelID=room.HotelID";
		//echo $sql;
        $sts=$this->db->prepare($sql);
        $sts->execute();
        return $sts->fetchAll();
    }
	public function roomfas(){        
        $sts=$this->db->prepare("SELECT * FROM `roomfas`");
        $sts->execute();
		$data=$sts->fetchAll(PDO::FETCH_ASSOC);
        return $data;
        
    }
	public function roomtype(){        
        $sts=$this->db->prepare("SELECT * FROM `roomtypes`");
        $sts->execute();
		$data=$sts->fetchAll(PDO::FETCH_ASSOC);
        return $data;
        
    }
	public function CreateRoom($data){  
		
		$sql="insert into room(RoomID,HotelID,RoomName,RoomSize,Deskripsi,AdlPax,ChdPax) values (:RoomID,:HotelID,:RoomName,:RoomSize,:Deskripsi,:AdlPax,:ChdPax)";
		$sts=$this->db->prepare($sql);
		//$sts->execute();
        
		$sts->execute(array( 
		 ':RoomID'=>$data["RoomID"],
		 ':HotelID'=>$data["HotelID"], 
		 ':RoomName'=>$data["RoomName"], 
		 ':RoomSize'=>$data["RoomSize"], 
		 ':Deskripsi'=>$data["Deskripsi"], 
		 ':AdlPax'=>$data["AdlPax"],
		 ':ChdPax'=>$data["ChdPax"]
		
		));
		/*
		$sts=$this->db->prepare("delete from roomfasility where RoomID='".$data["RoomID"]."'");
        $sts->execute();
		$ls=Code::nLastData("roomfas","roomfasID");
		//echo $ls;
		for($i=1;$i<=$ls;$i++){
			if (isset($_GET["Chk".$i])){
				$sqlr="insert into roomfasility(roomfasID,RoomID,act)values(".$i.",'".$data["RoomID"]."',1)";
				//echo $sqlr;
			$sts=$this->db->prepare($sqlr);
			$sts->execute();
			}
		}
		*/
    }
	public function singleRoom($id){        
        $sts=$this->db->prepare("SELECT * FROM `room` where RoomID='".$id."'");
        $sts->execute();
		$data=$sts->fetchAll(PDO::FETCH_ASSOC);
        return $data;
        
    }
	public function UpdateRoom($data){  
		/*
		$sql="Update  room set RoomName='".$data["RoomName"]."', RoomSize='".$data["RoomSize"]."', RoomType='".$data["RoomType"]."', Deskripsi='".$data["Deskripsi"]."', AdlPax= '".$data["AdlPax"]."', ChdPax=".$data["ChdPax"]." where RoomID='".$data["RoomID"]."'";
		echo $sql;
        $sts=$this->db->prepare($sql);
        $sts->execute();
		
		$sts=$this->db->prepare("delete from roomfasility where RoomID='".$data["RoomID"]."'");
        $sts->execute();
		$ls=Code::nLastData("roomfas","roomfasID");
		echo $ls;
		for($i=1;$i<=$ls;$i++){
			if (isset($_GET["Chk".$i])){
				$sqlr="insert into roomfasility(roomfasID,RoomID,act)values(".$i.",'".$data["RoomID"]."',1)";
				//echo $sqlr;
			$sts=$this->db->prepare($sqlr);
			$sts->execute();
			}
		}
		*/
		$sql="Update room set RoomName=:RoomName,RoomSize:RoomSize,Deskripsi=:Deskripsi,AdlPax=:AdlPax,ChdPax=:ChdPax where RoomID=:RoomID and HotelID=:HotelID";
		$sts=$this->db->prepare($sql);
		//$sts->execute();
        
		$sts->execute(array( 
		 ':RoomID'=>$data["RoomID"],
		 ':HotelID'=>$data["HotelID"], 
		 ':RoomName'=>$data["RoomName"], 
		 ':RoomSize'=>$data["RoomSize"], 
		 ':Deskripsi'=>$data["Deskripsi"], 
		 ':AdlPax'=>$data["AdlPax"],
		 ':ChdPax'=>$data["ChdPax"]
		
		));
    }
	public function RoomGalList($id){
        $sts=$this->db->prepare("SELECT * FROM roomgallery where RoomID='".$id."'");
        $sts->execute();
        return $sts->fetchAll();
    }
	public function UploadRoom($id){ 
        
        switch(strtolower($_FILES['files']['type'])){
            //buat image            
        case 'image/jpeg':
            $image = imagecreatefromjpeg($_FILES['files']['tmp_name']);
			$ext="jpg";
            break;
        case 'image/png':
            $image = imagecreatefrompng($_FILES['files']['tmp_name']);
			$ext="png";
            break;
        case 'image/gif':
            $image = imagecreatefromgif($_FILES['files']['tmp_name']);
			$ext="gif";
            break;
        
        } 
        // Target dimensions Big File
        $max_width = 600;
        $max_height = 400;

        // Get current dimensions
        $old_width  = imagesx($image);
        $old_height = imagesy($image);

        // Calculate the scaling we need to do to fit the image inside our frame
        $scale      = min($max_width/$old_width, $max_height/$old_height);

        // Get the new dimensions
        $new_width  = ceil($scale*$old_width);
        $new_height = ceil($scale*$old_height);
        // Create new empty image
        $new = imagecreatetruecolor($new_width, $new_height);

        // Resize old image into new
        imagecopyresampled($new, $image, 0, 0, 0, 0, $new_width, $new_height, $old_width, $old_height);
        $filename = __DIR__."./../roomgallery/".$id."-".time().".".$ext;
        $SaveName = "roomgallery/".$id."-".time().".".$ext;
		switch($ext){
			case 'jpg':
            imagejpeg($new,$filename,100);
            break;
			case 'png':
            imagepng($new,$filename,9);
			break;
			case 'gif':
            imagegif($new,$filename);
            break;
		}
        
        
        // Target dimensions Thumbs
        $max_width2 = 200;
        $max_height2 = 200;

        // Get current dimensions
        $old_width2  = imagesx($image);
        $old_height2 = imagesy($image);

        // Calculate the scaling we need to do to fit the image inside our frame
        $scale2      = min($max_width2/$old_width2, $max_height2/$old_height2);

        // Get the new dimensions
        $new_width2  = ceil($scale2*$old_width2);
        $new_height2 = ceil($scale2*$old_height2);
        // Create new empty image
        $new2 = imagecreatetruecolor($new_width2, $new_height2);

        // Resize old image into new
        imagecopyresampled($new2, $image, 0, 0, 0, 0, $new_width2, $new_height2, $old_width2, $old_height2);
        $filename2 = __DIR__."./../roomgallery/".$id."_".time()."_Thumb".".".$ext;
        $ThumbName = "roomgallery/".$id."_".time()."_Thumb".".".$ext;
        //imagejpeg($new2,$filename2,100);
        switch($ext){
			case 'jpg':
            imagejpeg($new2,$filename2,100);
            break;
			case 'png':
            imagepng($new2,$filename2,9);
			break;
			case 'gif':
            imagegif($new2,$filename);
            break;
		}
        //save to database
		$sql="INSERT INTO `roomgallery` (GalleryID,RoomID,Image,Thumb,Name) VALUES ('".Code::random_string()."','".$id."','".$SaveName."','".$ThumbName."',:name)";
		//echo $sql;
        $sts2=$this->db->prepare($sql);
        $sts2->execute(array(':name'=>$_POST['name']));
    }
	public function roomdelgal(){
        //select Link Image
        $sql = "select * from roomgallery where GalleryID='".$_POST['gid']."' and RoomID='".$_POST['prid']."'";
        $q = $this->db->prepare($sql);
        $q->execute();
        $q->setFetchMode(PDO::FETCH_BOTH);	
	while($r = $q->fetch()){
          $img=$r['Image'];
	  unlink($img);
          $thumb=$r['thumb'];
          unlink($thumb);
	}
        
        // remove dari database         
        $sts=$this->db->prepare("Delete from roomgallery where GalleryID='".$_POST['gid']."' and RoomID='".$_POST['prid']."'");
        $sts->execute();
        
    }
	public function voidroom(){
        // remove dari database         
        $sts=$this->db->prepare("update room set status=0 where RoomID='".$_POST['gid']."' ");
        $sts->execute();
    }
	public function actroom(){
        // remove dari database         
        $sts=$this->db->prepare("update room set status=1 where RoomID='".$_POST['gid']."' ");
        $sts->execute();
    }
	public function voidhotel(){
        // remove dari database         
        $sts=$this->db->prepare("update hotel set status=0 where HotelID='".$_POST['gid']."' ");
        $sts->execute();
    }
	public function acthotel(){
        // remove dari database         
        $sts=$this->db->prepare("update hotel set status=1 where HotelID='".$_POST['gid']."' ");
        $sts->execute();
    
	}
	public function RoomRate($id){
		//echo $range;
			$sql="SELECT * from roompr where RoomID=:roomid";
		//echo $sql;
		$sts=$this->db->prepare($sql);
        $sts->execute(array(':roomid'=>$id));
        return $sts->fetchAll();
    }
	public function CreateRoomRate($data){ 
		$start_date=$data["Start"];
		$priceID=Code::random_string();
		$sql="delete from roomprdtl where roomID=:roomid and tgl between '".$data["Start"]."' and '".$data["End"]."'";
			//echo $sql;
			$sts=$this->db->prepare($sql);
			//$sts->execute();
			$sts->execute(array(
			':roomid'=>$data["RoomID"]
			));
		while (strtotime($start_date) <= strtotime($data["End"])) {
			
			$sql="insert into roomprdtl(RoomID,PriceID,Date,Publish,Price) values ( :roomid,:priceID, :date,:publish,:price)";
			//echo $sql;
			$sts=$this->db->prepare($sql);
			$sts->execute(array(
			':roomid'=>$data["RoomID"],
			':priceID'=>$priceID,
			':date'=>$start_date,
			':publish'=>$data["Publish"],
			':price'=>$data["Price"]
			));
			
			$start_date = date ("Y-m-d", strtotime("+1 days", strtotime($start_date)));
			//echo $start_date;
		}
		$sql="insert into roompr(RoomID,PriceID,StartDate,EndDate,PublishRate,Price,Deskription) values ( :roomid,:priceID, :start,:end,:publish,:price,:desk)";
			//echo $sql;
			$sts=$this->db->prepare($sql);
			$sts->execute(array(
			':roomid'=>$data["RoomID"],
			':priceID'=>$priceID,
			':start'=>$data["Start"],
			':end'=>$data["End"],
			':publish'=>$data["Publish"],
			':price'=>$data["Price"],
			':desk'=>$data["Desk"]
			
			));
    }
	/*--------- End Hotel ` ------*/
	/**/
}