<?php

class page_Model extends Model {

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
	public function pages($id){
		$mid=Code::GetField('contents','ContentID',"slugs='".$id."'");
		$sql="SELECT * from contents WHERE ContentID=".$mid." ";
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
	public function AreaList(){        
        $sql="SELECT area.*, country.CountryName from area Inner Join country on area.CountryID=country.CountryID where area.SetF=1";
		//echo $sql;
        $q = $this->db->prepare($sql);
        $q->execute();
        $data=$q->fetchAll(PDO::FETCH_ASSOC);
        return $data;
    }
}