<?php

class detail_Model extends Model {

    public function __construct() {
        parent::__construct();
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
	public function SingleHm($id){
		$sql="SELECT tour.*,country.CountryName FROM tour INNER JOIN country ON tour.CountryID=country.CountryID WHERE tour.TourID='".$id."' GROUP BY tour.TourID";
		//echo $sql;
        $sts=$this->db->prepare($sql);
        $sts->execute();
		$data=$sts->fetchAll(PDO::FETCH_ASSOC);
        return $data;
		//print_r($data);
    }
	public function WedType(){
		$sql="SELECT wedtype.* FROM wedtype INNER JOIN wedding ON wedtype.ID=wedding.WedType where wedtype.ID>0 GROUP BY wedtype.Name";
		//echo $sql;
        $sts=$this->db->prepare($sql);
        $sts->execute();
		$data=$sts->fetchAll(PDO::FETCH_ASSOC);
        return $data;
    }
	public function imglist($id){
		$sql="SELECT * from tourgallery where TourID='".$id."'";
		//echo $sql;
        $sts=$this->db->prepare($sql);
        $sts->execute();
		$data=$sts->fetchAll(PDO::FETCH_ASSOC);
        return $data;
    }
	public function SingleYoga($id){
		$sql="SELECT yoga.*,country.CountryName FROM yoga INNER JOIN country ON yoga.CountryID=country.CountryID WHERE yoga.YogaID='".$id."' GROUP BY yoga.YogaID";
		//echo $sql;
        $sts=$this->db->prepare($sql);
        $sts->execute();
		$data=$sts->fetchAll(PDO::FETCH_ASSOC);
        return $data;
		//print_r($data);
    }
	public function YogaimgLs($id){
		$sql="SELECT * from yogagallery where YogaID='".$id."'";
		//echo $sql;
        $sts=$this->db->prepare($sql);
        $sts->execute();
		$data=$sts->fetchAll(PDO::FETCH_ASSOC);
        return $data;
    }
	public function SingleWedding($id){
		$sql="SELECT wedding.*,country.CountryName FROM wedding INNER JOIN country ON wedding.CountryID=country.CountryID WHERE wedding.WeddingID='".$id."' GROUP BY wedding.WeddingID";
		//echo $sql;
        $sts=$this->db->prepare($sql);
        $sts->execute();
		$data=$sts->fetchAll(PDO::FETCH_ASSOC);
        return $data;
		//print_r($data);
    }
	public function WeddingimgLs($id){
		$sql="SELECT * from weddinggallery where WeddingID='".$id."'";
		//echo $sql;
        $sts=$this->db->prepare($sql);
        $sts->execute();
		$data=$sts->fetchAll(PDO::FETCH_ASSOC);
        return $data;
    }
	public function TourDetail($id){
		$sql="SELECT * from tourdtl where TourID='".$id."'";
		//echo $sql;
        $sts=$this->db->prepare($sql);
        $sts->execute();
		$data=$sts->fetchAll(PDO::FETCH_ASSOC);
        return $data;
    }
	public function Price($id){
		$sql="SELECT * from tourprice where TourID='".$id."'";
		//echo $sql;
        $sts=$this->db->prepare($sql);
        $sts->execute();
		$data=$sts->fetchAll(PDO::FETCH_ASSOC);
        return $data;
    }
	public function TourByArea(){
		$sql="SELECT * from area";
		//echo $sql;
        $q=$this->db->prepare($sql);
        $q->execute();
		$q->setFetchMode(PDO::FETCH_BOTH);	
		$data=array();
		
		while($r = $q->fetch()){
			$sql2="SELECT count(TourID) as total from tour where area like '%".$r["AreaName"]."%'";
			//echo $sql2;
			$q2=$this->db->prepare($sql2);
			$q2->execute();
			$q2->setFetchMode(PDO::FETCH_BOTH);
			$dat=$q2->fetch();
			//$data=array();
			
			
			if($dat["total"]==0){ 
			}else{
			//echo $r["AreaName"];
			//print_r($dat["total"]);
			//echo "<br>";
				$data[]=array(
				"Area"=>$r["AreaName"],"sum"=>$dat["total"]
				);
			//	$data["Area"]=$r["AreaName"];
			//	$data["sum"]=$dat["total"];
			}
			
		}
		return $data;
        
    }
	public function TourByCountry(){
		$sql="SELECT COUNT(tour.TourID) AS total, country.CountryName FROM tour INNER JOIN country ON tour.CountryID=country.CountryID where tour.sts=1 GROUP BY country.CountryName";
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
	public function pagelist(){
		$sql="SELECT ContentTitle,slugs from contents ";
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
	public function randhm($id){
		$sql="Select * from tour where TourID <> '".$id."' and sts=2  and Status=1 order by RAND() limit 3";
		//echo $sql;
        $sts=$this->db->prepare($sql);
        $sts->execute();
		$data=$sts->fetchAll(PDO::FETCH_ASSOC);
        return $data;
    }
	public function randyg($id){
		$sql="Select * from yoga where YogaID <> '".$id."' and Status=1  order by RAND() limit 3";
		//echo $sql;
        $sts=$this->db->prepare($sql);
        $sts->execute();
		$data=$sts->fetchAll(PDO::FETCH_ASSOC);
        return $data;
    }
	public function randwd($id){
		$sql="Select * from wedding where WeddingID <> '".$id."'  and Status=1  order by RAND() limit 3";
		//echo $sql;
        $sts=$this->db->prepare($sql);
        $sts->execute();
		$data=$sts->fetchAll(PDO::FETCH_ASSOC);
        return $data;
    }
}