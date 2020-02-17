<?php

class Code{
    public static function random_string(){
        $character_set_array = array();
        $character_set_array[] = array('count' => 4, 'characters' => 'ABCDEFGHIJKLMNOPQRSTUVWXYZ');
		$character_set_array[] = array('count' => 2, 'characters' => 'abcdefghijklmnopqrstuvwxyz');
        $character_set_array[] = array('count' => 4, 'characters' => '0123456789');
        $temp_array = array();
        foreach ($character_set_array as $character_set) {
            for ($i = 0; $i < $character_set['count']; $i++) {
                $temp_array[] = $character_set['characters'][rand(0, strlen($character_set['characters']) - 1)];
            }
        }
        shuffle($temp_array);
        return implode('', $temp_array);
    }
    public static function profileid(){
        $character_set_array = array();
        $character_set_array[] = array('count' => 5, 'characters' => 'ABCDEFGHIJKLMNOPQRSTUVWXYZ');
        $character_set_array[] = array('count' => 3, 'characters' => '0123456789');
        $temp_array = array();
        foreach ($character_set_array as $character_set) {
            for ($i = 0; $i < $character_set['count']; $i++) {
                $temp_array[] = $character_set['characters'][rand(0, strlen($character_set['characters']) - 1)];
            }
        }
        shuffle($temp_array);
        return implode('', $temp_array);
    }
    public static function CFields($table,$field,$criteria){
        $dsn = DB_TYPE.':host='.DB_HOST.';dbname='.DB_NAME;
        $user = DB_USER;
        $password = DB_PASS;

        try {
            $dbh = new PDO($dsn, $user, $password);
        } catch (PDOException $e) {
            echo 'Connection failed: ' . $e->getMessage();
        }
        $sts=$dbh->prepare("select ".$field." from `".$table."` where ".$criteria);
        $sts->execute();
        return $sts->rowCount();
        
    }
	public static function nLastData($table,$field){
        $dsn = DB_TYPE.':host='.DB_HOST.';dbname='.DB_NAME;
        $user = DB_USER;
        $password = DB_PASS;

        try {
            $dbh = new PDO($dsn, $user, $password);
        } catch (PDOException $e) {
            echo 'Connection failed: ' . $e->getMessage();
        }
		$sql="select ".$field." from `".$table."` order by ".$field." DESC limit 0,1";
		echo $sql;
        $sts=$dbh->prepare($sql);
        $sts->execute();
        $data=$sts->fetchAll(PDO::FETCH_ASSOC);
		//print_r($data[0][$field]);
        return  $data[0][$field];
    }
    public static function GetField($table,$field,$criteria){
        $dsn = DB_TYPE.':host='.DB_HOST.';dbname='.DB_NAME;
        $user = DB_USER;
        $password = DB_PASS;

        try {
            $dbh = new PDO($dsn, $user, $password);
        } catch (PDOException $e) {
            return 'Connection failed: ' . $e->getMessage();
        }
        //echo "select ".$field." from `".$table."` where ".$criteria;\
        $qry="select ".$field." from `".$table."` where ".$criteria;
        //echo $qry;
        $sts=$dbh->prepare($qry);
        
        $sts->execute();
        $data=$sts->fetchAll(PDO::FETCH_ASSOC);
        return  $data[0][$field];
        //print_r($data);
        
    }public static function requery($qry,$field){
        $dsn = DB_TYPE.':host='.DB_HOST.';dbname='.DB_NAME;
        $user = DB_USER;
        $password = DB_PASS;

        try {
            $dbh = new PDO($dsn, $user, $password);
        } catch (PDOException $e) {
            return 'Connection failed: ' . $e->getMessage();
        }
        //echo "select ".$field." from `".$table."` where ".$criteria;\
        //$qry="select ".$field." from `".$table."` where ".$criteria;
        //echo $qry;
        $sts=$dbh->prepare($qry);
        
        $sts->execute();
        $data=$sts->fetchAll(PDO::FETCH_ASSOC);
        return  $data[0][$field];
        //print_r($data);
        
    }
	public static function getTour($status){
        $dsn = DB_TYPE.':host='.DB_HOST.';dbname='.DB_NAME;
        $user = DB_USER;
        $password = DB_PASS;

        try {
            $dbh = new PDO($dsn, $user, $password);
        } catch (PDOException $e) {
            return 'Connection failed: ' . $e->getMessage();
        }
        //echo "select ".$field." from `".$table."` where ".$criteria;\
		switch ($status){
			case "tour":
                $qry="select count(TourID) as total from tour where status=1 and sts=1";	
                break;
			case "hm":
                $qry="select count(TourID) as total from tour where status=1 and sts=2 ";	
                break;
			case "yg":
                $qry="select count(YogaID) as total from yoga where status=1 ";	
                break;
			case "wd":
                $qry="select count(WeddingID) as total from wedding where status=1 ";	
                break;
		}
        
        //echo $qry;
        $sts=$dbh->prepare($qry);
        
        $sts->execute();
        $data=$sts->fetchAll(PDO::FETCH_ASSOC);
        return  $data[0]['total'];
        //print_r($data);
        
    }
    public static function minTour($id){
        $dsn = DB_TYPE.':host='.DB_HOST.';dbname='.DB_NAME;
        $user = DB_USER;
        $password = DB_PASS;

        try {
            $dbh = new PDO($dsn, $user, $password);
        } catch (PDOException $e) {
            return 'Connection failed: ' . $e->getMessage();
        }
        
        $qry="select min(Starts) as MinStart,price as Price,Cur,Cur2,Price2 from tourprice where tourID='".$id."'";
        //echo $qry;
        $sts=$dbh->prepare($qry);
        
        $sts->execute();
        $data=$sts->fetchAll(PDO::FETCH_ASSOC);
        return  "Domestic: ".$data[0]['Cur']."".number_format($data[0]['Price'])." | Expat: ".$data[0]['Cur2']."".$data[0]['Price2'];
        //print_r($data);
        
    }
    public static function Convert($Val,$Cur){
        $dsn = DB_TYPE.':host='.DB_HOST.';dbname='.DB_NAME;
        $user = DB_USER;
        $password = DB_PASS;

        try {
            $dbh = new PDO($dsn, $user, $password);
        } catch (PDOException $e) {
            echo 'Connection failed: ' . $e->getMessage();
        }
        //echo "select ".$field." from `".$table."` where ".$criteria;
        $sql="select Value from `Settings` where Name='".$Cur."'";
        
        $sts=$dbh->prepare($sql);
        
        $sts->execute();
        $data=$sts->fetchAll(PDO::FETCH_ASSOC);
        $hasil= ($data[0]["Value"])*$Val;
        return $hasil;
          
    }
    public static function NoOrder(){
        switch (date("m")){
            case "01":
                $codes="A";
                break;
            case "02":
                $codes="B";
                break;
            case "03":
                $codes="C";
                break;
            case "04":
                $codes="D";
                break;
            case "05":
                $codes="E";
                break;
            case "06":
                $codes="F";
                break;
            case "07":
                $codes="G";
                break;
            case "08":
                $codes="H";
                break;
            case "09":
                $codes="I";
                break;
            case "10":
                $codes="J";
                break;
            case "11":
                $codes="K";
                break;
            case "12":
                $codes="L";
                break;
        }
        $codes=$codes.date("y").date("d");
        $character_set_array = array();
        $character_set_array[] = array('count' => 2, 'characters' => 'ABCDEFGHIJKLMNOPQRSTUVWXYZ');
        $character_set_array[] = array('count' => 3, 'characters' => '0123456789');
        $temp_array = array();
        foreach ($character_set_array as $character_set) {
            for ($i = 0; $i < $character_set['count']; $i++) {
                $temp_array[] = $character_set['characters'][rand(0, strlen($character_set['characters']) - 1)];
            }
        }
        shuffle($temp_array);
        $codes=$codes.(implode('', $temp_array));
        return $codes;
    }
}
?>
