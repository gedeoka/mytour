<?php

class contact_Model extends Model {

    public function __construct() {
        parent::__construct();
    }
    
	public function HMenu(){
		$sql="SELECT COUNT(tour.TourID) AS total, tourcategory.Name as Name, tourcategory.ID as ID FROM tour INNER JOIN tourcategory ON tour.TourCat=tourcategory.ID  GROUP BY tourcategory.ID";
		//echo $sql;
        $sts=$this->db->prepare($sql);
        $sts->execute();
		$data=$sts->fetchAll(PDO::FETCH_ASSOC);
		$datax="";
		foreach($data as $key=>$keys){
			$datax=$datax."<li class='dropdown'> <a href='#' data-toggle='dropdown' class='dropdown-toggle js-activated'>".$keys["Name"]."<b class='caret'></b></a>
            <ul class='dropdown-menu'>";
			
			$sql="SELECT COUNT(tour.TourID) AS total, tourtype.Name as Namex FROM tour INNER JOIN tourtype ON tour.TourType=tourtype.ID where tour.TourCat=".$keys["ID"]." GROUP BY tourtype.Name";
			//echo $sql;
			$sts=$this->db->prepare($sql);
			$sts->execute();
			$sub=$sts->fetchAll(PDO::FETCH_ASSOC);
			foreach($sub as $keyx=>$valuess){
				$datax=$datax."<li><a href='".URL."pages/lists/".$keys["Name"]."-".$valuess["Namex"]."'>".$valuess["Namex"]."</a></li>";
			
			}
			$datax=$datax."</ul></li>";
		}
        return $datax;
    }
	public function TourByType(){
		$sql="SELECT COUNT(tour.TourID) AS total, tourtype.Name as Name FROM tour INNER JOIN tourtype ON tour.Tourtype=tourtype.ID where tour.sts=1 and tourtype.type=1 GROUP BY tourtype.Name";
		//echo $sql;
        $sts=$this->db->prepare($sql);
        $sts->execute();
		$data=$sts->fetchAll(PDO::FETCH_ASSOC);
        return $data;
    }
	public function TrType(){
		$sql="SELECT COUNT(tour.TourID) AS total, tourtype.Name as Name FROM tour INNER JOIN tourtype ON tour.Tourtype=tourtype.ID where tour.sts=1 and tourtype.type=2 GROUP BY tourtype.Name";
		//echo $sql;
        $sts=$this->db->prepare($sql);
        $sts->execute();
		$data=$sts->fetchAll(PDO::FETCH_ASSOC);
        return $data;
    }
	public function WedType(){
		$sql="SELECT wedtype.* FROM wedtype INNER JOIN wedding ON wedtype.ID=wedding.WedType where wedtype.ID>0 GROUP BY wedtype.Name";
		//echo $sql;
        $sts=$this->db->prepare($sql);
        $sts->execute();
		$data=$sts->fetchAll(PDO::FETCH_ASSOC);
        return $data;
    }
	public function pagelist(){
		$sql="SELECT ContentTitle,slugs from contents ";
		//echo $sql;
        $sts=$this->db->prepare($sql);
        $sts->execute();
		$data=$sts->fetchAll(PDO::FETCH_ASSOC);
        return $data;
    }
	public function AreaList(){        
        $sql="SELECT area.*, country.CountryName from area Inner Join country on area.CountryID=country.CountryID where area.SetF=1";
		//echo $sql;
        $q = $this->db->prepare($sql);
        $q->execute();
        $data=$q->fetchAll(PDO::FETCH_ASSOC);
        return $data;
    }
	public function SendMail(){
		$mailbody="Online Contact : <br>";
		$mailbody=$mailbody."From     : ".$_POST["email"]." [ ".$_POST["name"]." ] <br>";
		$mailbody=$mailbody."Subject  : ".$_POST["subject"]." <br>";
		$mailbody=$mailbody."Massage : <br><hr><br>";
		$mailbody=$mailbody.$_POST["comments"]." \n\n";
		
		
		/***************** Send Mail *********************/
		$mail = new PHPMailer(); // create a new object
		$mail->IsSMTP(); // enable SMTP
		
		 //$mail->SMTPDebug  = 2;                     // enables SMTP debug information (for testing)
      $mail->SMTPAuth   = true;                  // enable SMTP authentication
      $mail->SMTPSecure = "ssl";                 // sets the prefix to the servier
      $mail->Host       = "smtp.gmail.com";      // sets GMAIL as the SMTP server
      $mail->Port       = 465;   // set the SMTP port for the GMAIL server
      $mail->SMTPKeepAlive = true;
      $mail->Mailer = "smtp";
		//or more succinctly:
		
		$mail->IsHTML(true);
		$mail->Username = "reservation@abrahamtourgroup.com";  // SMTP username
		$mail->Password = "JinggaKuning/2018++"; // SMTP password
//echo Code::GetField("customer","Email","CustomerID='".$cst."'");
		//$mail->From = "abrahamtourgroup@gmail.com";
		// To
		$mail->AddAddress ('reservation@abrahamtourgroup.com');
		
		///From
		$mail->setFrom ('reservation@abrahamtourgroup.com','Abraham Tour Online Contact');
		//$mail->setFrom($_POST["email"],$_POST["name"]);
	
		$mail->Subject = " Online Contact Form";
		
		$mail->Body    = $mailbody;
		//$mail->msgHTML($_POST["comments"]);
		//echo $data["pop"]."=>".$data["username"]."=".$data["password"];

		if(!$mail->Send())
		{
		   return "<h3>Ups Sorry...</h3><br>Something wrong message cannot send. please contact us at info@abrahamtourgroup.com";
			//echo "0Mailer Error: " . $mail->ErrorInfo;
		   exit;
		}else{
			 return "<h3>Message Send.</h3><br>thank you for contact us";
		} 
		
	}
}