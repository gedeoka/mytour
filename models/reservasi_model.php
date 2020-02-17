<?php

class reservasi_Model extends Model {

    public function __construct() {
        parent::__construct();
    }
    
	public function ByCountry(){
		$sql="SELECT COUNT(tour.TourID) AS total, country.CountryName FROM tour INNER JOIN country ON tour.CountryID=country.CountryID GROUP BY country.CountryName";
		//echo $sql;
        $sts=$this->db->prepare($sql);
        $sts->execute();
		$data=$sts->fetchAll(PDO::FETCH_ASSOC);
        return $data;
    }
	public function TourType(){
		$sql="SELECT tourtype.* FROM tourtype INNER JOIN tour ON tourtype.ID=tour.TourType where tourtype.ID>0 GROUP BY tourtype.Name";
		//echo $sql;
        $sts=$this->db->prepare($sql);
        $sts->execute();
		$data=$sts->fetchAll(PDO::FETCH_ASSOC);
        return $data;
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
	public function HotelOrder($rid,$hid){
		$sql="SELECT     `room`.`RoomName`     , `room`.`RoomID`     , MIN(`roomprdtl`.`Publish`) AS Phublish     , MIN(`roomprdtl`.`Price`) AS Price     , `hotel`.`HotelID`     , `hotel`.`Name` FROM     `room`     INNER JOIN `apatour`.`roomprdtl`          ON (`room`.`RoomID` = `roomprdtl`.`RoomID`)     INNER JOIN `hotel`           ON (`hotel`.`HotelID` = `room`.`HotelID`) WHERE room.RoomID='".$rid."' and hotel.HotelID='".$hid."'";
		//echo $sql;
        $sts=$this->db->prepare($sql);
        $sts->execute();
		$data=$sts->fetchAll(PDO::FETCH_ASSOC);
        return $data;
        
    }
}