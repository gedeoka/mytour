<?php

class pages_Model extends Model {

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
	public function listprod($id){
		$data=explode("-",$id);
		$tp=Code::GetField('tourtype','ID',"Name like '%".$data[1]."%'");
		$tc=Code::GetField('tourcategory','ID',"Name like '%".$data[0]."%'");
		$sql="SELECT tour.* FROM tour  WHERE tour.TourType=".$tp." and tour.TourCat=".$tc." GROUP BY tour.TourID";
		//echo $sql;
        $sts=$this->db->prepare($sql);
        $sts->execute();
		$data=$sts->fetchAll(PDO::FETCH_ASSOC);
		return $data;
	}
	
	public function Single($id){
		$x=Code::GetField('tour','sts',"TourID='".$id."'");
		//echo $x;
		if ($x=="1"){
		$sql="SELECT tour.*,country.CountryName,tourtype.Name FROM tour INNER JOIN country ON tour.CountryID=country.CountryID INNER JOIN tourtype ON tour.tourtype=tourtype.ID WHERE tour.TourID='".$id."' GROUP BY tour.TourID";
		}else{
			$sql="SELECT tour.*,country.CountryName FROM tour INNER JOIN country ON tour.CountryID=country.CountryID WHERE tour.TourID='".$id."' GROUP BY tour.TourID";
		}
		//echo $sql;
        $sts=$this->db->prepare($sql);
        $sts->execute();
		$data=$sts->fetchAll(PDO::FETCH_ASSOC);
        return $data;
		//print_r($data);
    }
	public function imglist($id){
		$sql="SELECT * from tourgallery where TourID='".$id."'";
		//echo $sql;
        $sts=$this->db->prepare($sql);
        $sts->execute();
		$data=$sts->fetchAll(PDO::FETCH_ASSOC);
        return $data;
    }
	public function HTimglist($id){
		$sql="SELECT * from hotelgallery where HotelID='".$id."'";
		//echo $sql;
        $sts=$this->db->prepare($sql);
        $sts->execute();
		$data=$sts->fetchAll(PDO::FETCH_ASSOC);
        return $data;
    }
	public function randtour($id){
		$sql="Select * from tour where TourID <> '".$id."' and sts=1 and Status=1  order by RAND() limit 3";
		//echo $sql;
        $sts=$this->db->prepare($sql);
        $sts->execute();
		$data=$sts->fetchAll(PDO::FETCH_ASSOC);
        return $data;
    }
	
	public function SingleTiket(){
		
		$sql="select * from tiket where ContentID=1";
		
		//echo $sql;
        $sts=$this->db->prepare($sql);
        $sts->execute();
		$data=$sts->fetchAll(PDO::FETCH_ASSOC);
        return $data;
		//print_r($data);
    }
	public function pagelist(){
		$sql="SELECT ContentTitle,slugs from contents ";
		//echo $sql;
        $sts=$this->db->prepare($sql);
        $sts->execute();
		$data=$sts->fetchAll(PDO::FETCH_ASSOC);
        return $data;
    }
	public function SingleHT($id){
		//$x=Code::GetField('tour','sts',"TourID='".$id."'");
		//echo $x;
		
			$sql="SELECT  * FROM hotel WHERE hotel.HotelID='".$id."' ";
		
		//echo $sql;
        $sts=$this->db->prepare($sql);
        $sts->execute();
		$data=$sts->fetchAll(PDO::FETCH_ASSOC);
        return $data;
		//print_r($data);
    }
	public function HotelList(){
		$sql="SELECT     `hotel`.`Name` AS HotelName    , `room`.`RoomName` , `hotel`.`defaultImg`    , `room`.`RoomSize`    , `room`.`RoomID`    , `room`.`HotelID`    , `room`.`Deskripsi`    , `hotel`.`Address`    , MIN(`roomprdtl`.`Publish`)AS PublishRate    , MIN(`roomprdtl`.`Price`) AS Price FROM    `hotel`    INNER JOIN `room`         ON (`hotel`.`HotelID` = `room`.`HotelID`)    INNER JOIN `apatour`.`roomprdtl`         ON (`room`.`RoomID` = `roomprdtl`.`RoomID`) GROUP BY HotelName";
		//echo $sql;
        $sts=$this->db->prepare($sql);
        $sts->execute();
		$data=$sts->fetchAll(PDO::FETCH_ASSOC);
        return $data;
    }
	
	public function HotelRoom($id){
		$sql="SELECT `room`.*, MIN(`roomprdtl`.`Publish`) as Publish, MIN(`roomprdtl`.`Price`)as Price FROM    `apatour`.`room`  INNER JOIN `apatour`.`roomprdtl`        ON (`room`.`RoomID` = `roomprdtl`.`RoomID`)WHERE room.HotelID='".$id."'  GROUP BY RoomName ";
		//echo $sql;
        $sts=$this->db->prepare($sql);
        $sts->execute();
		$data=$sts->fetchAll(PDO::FETCH_ASSOC);
        return $data;
    }
	

}