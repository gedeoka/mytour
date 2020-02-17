<?php

class thankyou_Model extends Model {

    public function __construct() {
        parent::__construct();
    }
    
	
	public function SingleProd($id){
		$sql="SELECT tour.* FROM tour  WHERE tour.TourID='".$id."' GROUP BY tour.TourID";
		//echo $sql;
        $sts=$this->db->prepare($sql);
        $sts->execute();
		$data=$sts->fetchAll(PDO::FETCH_ASSOC);
        return $data;
        
    }
	public function SingleYoga($id){
		$sql="SELECT yoga.* FROM yoga  WHERE yoga.YogaID='".$id."' GROUP BY yoga.YogaID";
		//echo $sql;
        $sts=$this->db->prepare($sql);
        $sts->execute();
		$data=$sts->fetchAll(PDO::FETCH_ASSOC);
        return $data;
        
    }
	public function SingleWed($id){
		$sql="SELECT wedding.* FROM wedding  WHERE wedding.WeddingID='".$id."' GROUP BY wedding.WeddingID";
		//echo $sql;
        $sts=$this->db->prepare($sql);
        $sts->execute();
		$data=$sts->fetchAll(PDO::FETCH_ASSOC);
        return $data;
        
    }
	public function SaveBooking($data){
		
		
		$sql="insert into `order`(OrderID,Packagetype,PackageID,CheckIn,Adult,child,TotalPrice,Contact,Email,Guest,Phone,Remark,Payment,Status) values ( '".$data["ID"]."', '".$data["Packagetype"]."', '".$data["ProdID"]."', '".$data["checkin"]."', ".$data["adult"].",".$data["child"].",".$data["total"].",  '".$data["name"]."', '".$data["email"]."', '".$data["Guest"]."', '".$data["mobile"]."', '".$data["option"]."', 1, 1)";
		//echo $sql;
        $sts=$this->db->prepare($sql);
        $sts->execute();
		
	}
	public function HotelOrder($rid,$hid){
		$sql="SELECT     `room`.`RoomName`     , `room`.`RoomID`     , MIN(`roomprdtl`.`Publish`) AS Phublish     , MIN(`roomprdtl`.`Price`) AS Price     , `hotel`.`HotelID`     , `hotel`.`Name` FROM     `room`     INNER JOIN `apatour`.`roomprdtl`          ON (`room`.`RoomID` = `roomprdtl`.`RoomID`)     INNER JOIN `hotel`           ON (`hotel`.`HotelID` = `room`.`HotelID`) WHERE room.RoomID='".$rid."' and hotel.HotelID='".$hid."'";
		//echo $sql;
        $sts=$this->db->prepare($sql);
        $sts->execute();
		$data=$sts->fetchAll(PDO::FETCH_ASSOC);
        return $data;
        
    }
	public function SendMail($data){
		/*
		$note1="Your booking complete!<br>Your confirmation number is ".$data["ID"]."\n\n";
		$note2="Thank your form booking\n\n";
		
		$mailbody="Dear Customer,\n\n";
		$mailbody=$mailbody.$note1;
		
		$mailbody=$mailbody."Package : ".$data["ProdName"]."\n\n";
		$mailbody=$mailbody."Travel Date : ".$data["CI"]."\n\n";
		//$mailbody=$mailbody."Check out : ".$data["CO"]."\n\n";
		if ($data["type"]=="tour"){
			if ($data["sts"]==1){
				$mailbody=$mailbody."Adult : ".$data["adult"]." @ ".$data["cur"]." ".$data["Price1"]."\n\n";
				$mailbody=$mailbody."Child : ".$data["child"]." @ ".$data["cur"]." ".$data["Price2"]."\n\n";
			}elseif ($data["sts"]==2){
				$mailbody=$mailbody."Price : ".$data["cur"]." ".$data["Price1"]."\n\n";
			}
		}
		if ($data["type"]=="yoga"){
			$mailbody=$mailbody."No.Pax : ".$data["adult"]." @ ".$data["cur"]." ".$data["Price1"]."\n\n";
		}
		if ($data["type"]=="wed"){
			$mailbody=$mailbody."Price :  ".$data["cur"]." ".$data["Price1"]."\n\n";
		}
		$mailbody=$mailbody."Total : ".$data["total"]."\n\n\n\n\n\n";
		$mailbody=$mailbody."Contact Name : ".$data["name"]."\n\n";
		$mailbody=$mailbody."E-mail : ".$data["email"]."\n\n";
		$mailbody=$mailbody."Contact Number : ".$data["mobile"]."\n\n";
		$mailbody=$mailbody."Guest Name : ".$data["mobile"]."\n\n";
		$mailbody=$mailbody."Special request (optional) :\n\n";
		$mailbody=$mailbody.$data["option"]."\n\n\n\n";
		$mailbody=$mailbody.$note2;
		$mailbody=$mailbody."BR,\n\n";
		$mailbody=$mailbody."AbrahamTour\n\n";*/
		$mailbody="Dear Customer,

<table border='0'>
<tr><td>
<h3>Your booking complete!<br>Your confirmation number is ".$data["ID"]."</h3><br>
</td></tr>
<tr>
<td>Package </td>
<td>: ".$data["ProdName"]." </td>
</tr>
<tr>
<td>Travel Date </td>
<td>: ".$data["CI"]." </td>
</tr>
<tr>";
if ($data["type"]=="tour"){
			if ($data["sts"]==1){
				$mailbody=$mailbody."<td>Adult </td>
				<td> : ".$data["adult"]." @ ".$data["cur"]." ".$data["Price1"]."</td>
				<td>Child </td>
				<td> : ".$data["child"]." @ ".$data["cur"]." ".$data["Price2"]."</td>";
				
			}elseif ($data["sts"]==2){
				$mailbody=$mailbody."<td>Price </td>
				<td>: ".$data["cur"]." ".$data["Price1"]."</td>";
				
			}
		}
		if ($data["type"]=="yoga"){
			$mailbody=$mailbody."<td>No.Pax </td>
			<td>: ".$data["adult"]." @ ".$data["cur"]." ".$data["Price1"]."</td>";
			
		}
		if ($data["type"]=="wed"){
			$mailbody=$mailbody."<td>Price </td>
			<td>: ".$data["cur"]." ".$data["Price1"]."</td>";
			
		}
$mailbody=$mailbody."</tr>
<tr>
	<td>Total </td>
	<td>: ".$data["cur"]." ".$data["total"]."</td>
</tr>
<tr>
	<td></td>
	<td></td>
</tr>
<tr>
	<td>Contact Name </td>
	<td>: ".$data["name"]."</td>
</tr>
<tr>
	<td>E-mail </td>
	<td>: ".$data["email"]."</td>
</tr>
<tr>
	<td>Contact Number </td>
	<td>: ".$data["mobile"]."</td>
</tr>
<tr>
	<td>Guest Name </td>
	<td>: ".$data["Guest"]."</td>
</tr>
<tr>
	<td>Special request (optional) : </td>
	
</tr>
<tr>
	<td>".$data["option"]." </td>
	
</tr>
</table>
Thank you for your booking<br><br>
Br,<br>
AbrahamTour";
		/***************** Send Mail *********************/
		$mail = new PHPMailer(); // create a new object
		$mail->IsSMTP(); // enable SMTP
		/*
		$mail->SMTPSecure = 'tls'; // secure transfer enabled REQUIRED for Gmail
		//$mail->Host = 'tls://smtp.gmail.com';
		$mail->Host = gethostbyname('smtp.gmail.com');
		$mail->Port = 587;   
		*/
		 //$mail->SMTPDebug  = 2;                     // enables SMTP debug information (for testing)
      $mail->SMTPAuth   = true;                  // enable SMTP authentication
      $mail->SMTPSecure = "ssl";                 // sets the prefix to the servier
      $mail->Host       = "smtp.gmail.com";      // sets GMAIL as the SMTP server
      $mail->Port       = 465;   // set the SMTP port for the GMAIL server
      $mail->SMTPKeepAlive = true;
      $mail->Mailer = "smtp";
		//or more succinctly:
		
		$mail->IsHTML(true);
		$mail->Username = "";  // SMTP username
		$mail->Password = ""; // SMTP password
//echo Code::GetField("customer","Email","CustomerID='".$cst."'");
		//$mail->From = "abrahamtourgroup@gmail.com";
		$mail->setFrom ('','');//(Email,Name)
		
		
		$subject="Online Booking Apatours.com";
		//$mail->SMTPOptions = array( 			'tls' => array( 'verify_peer' => false,	'verify_peer_name' => false, 'allow_self_signed' => true	));
		///To Customer
		$mail->AddAddress($data["email"],$data["name"]);
	
		$mail->Subject = $subject;
		//$mail->Body    = $mailbody;
		$mail->msgHTML($mailbody);
		//echo $data["pop"]."=>".$data["username"]."=".$data["password"];

		if(!$mail->Send())
		{
		   //echo "Message could not be sent. 0<p>";
			//echo "0Mailer Error: " . $mail->ErrorInfo;
		   exit;
		}else{
			//echo "Message has been sent";
			
			$sql="Update `order` set SendMailCst='".date("Y-m-d")."' where OrderID='".$data["ID"]."'";
			
			$sts=$this->db->prepare($sql);
			$sts->execute();
			//header('location: '.URL.'admin/Senddock');
		} 
		///To Info
		
		$mail->AddAddress("reservation@abrahamtourgroup.com");
	
		$mail->Subject = $subject;
		$mail->Body    = $mailbody;
		//echo $data["pop"]."=>".$data["username"]."=".$data["password"];

		if(!$mail->Send())
		{
		   //return "Message could not be sent. <p>";
		  // echo "1Mailer Error: " . $mail->ErrorInfo;
		   exit;
		}else{
			//echo "Message has been sent";
			$sql="Update `order` set SendMailResv='".date("Y-m-d")."' where OrderID='".$data["ID"]."'";	
			
			$sts=$this->db->prepare($sql);
			$sts->execute();
			//header('location: '.URL.'admin/Senddock');
		} 
	}
	public function pagelist(){
		$sql="SELECT ContentTitle,slugs from contents ";
		//echo $sql;
        $sts=$this->db->prepare($sql);
        $sts->execute();
		$data=$sts->fetchAll(PDO::FETCH_ASSOC);
        return $data;
    }
}