<?php

class lists_Model extends Model {

    public function __construct() {
        parent::__construct();
    }
    public function listarea($id){   
		$sql="SELECT tour.* FROM tour  WHERE tour.status=1 and sts=1 and (tour.area like '%".$id."%')  GROUP BY tour.TourID";
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
	public function listcountry($id){   
		$sql="SELECT tour.*,country.CountryName FROM tour  inner join country on tour.CountryID=country.CountryID WHERE tour.Status=1 and (country.CountryName = '".$id."') and tour.sts=1 GROUP BY tour.TourID";
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
	public function ByCountry(){
		$sql="SELECT COUNT(tour.TourID) AS total, country.CountryName FROM tour INNER JOIN country ON tour.CountryID=country.CountryID where tour.Status=1 and tour.sts=1 GROUP BY country.CountryName";
		//echo $sql;
        $sts=$this->db->prepare($sql);
        $sts->execute();
		$data=$sts->fetchAll(PDO::FETCH_ASSOC);
        return $data;
    }
	public function ByType(){
		
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
	public function listtype($id){   
		$ids=Code::GetField("tourtype","ID","Name like '%".$id."%'");
		//echo $ids;
		$sql="SELECT tour.* FROM tour  WHERE tour.Status=1 and tour.sts=1 and (tour.TourType='".$ids."')  GROUP BY tour.TourID";
		//echo $sql;
        $sts=$this->db->prepare($sql);
        $sts->execute();
		$data=$sts->fetchAll(PDO::FETCH_ASSOC);
		
        return $data;
    }
	
	public function lshoneymoon(){   
		
		$sql="SELECT tour.* FROM tour  WHERE tour.Status=1 and  tour.sts=2  GROUP BY tour.TourID";
        $sts=$this->db->prepare($sql);
        $sts->execute();
		$data=$sts->fetchAll(PDO::FETCH_ASSOC);
		
        return $data;
    }
	public function lsyoga(){   
		$sql="SELECT yoga.* FROM yoga  WHERE yoga.Status=1 GROUP BY yoga.YogaName";
		
        $sts=$this->db->prepare($sql);
        $sts->execute();
		$data=$sts->fetchAll(PDO::FETCH_ASSOC);
		
        return $data;
    }
	public function lswedding($id){ 
		$ids=Code::GetField("wedtype","ID","Name like '%".$id."%'");
		$sql="SELECT wedding.* FROM wedding  WHERE wedding.Status=1 and (wedding.WedType=".$ids.") GROUP BY wedding.WeddingName";
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
}