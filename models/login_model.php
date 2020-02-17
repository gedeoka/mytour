<?php

class Login_Model extends Model {

    public function __construct() {
        parent::__construct();
    }
    public function run(){        
        $sts=$this->db->prepare("SELECT * FROM  `user` WHERE username= :login AND PASSWORD =  MD5(:password)");
        $sts->execute(array(
            ':login'=>$_POST['login'],
            ':password'=>$_POST['password']
        ));
        $data=$sts->fetch(PDO::FETCH_ASSOC );
        $count=$sts->rowcount();
        //echo $count;
        
        if($count>0){
            if($data['aktif']==1){
                Session::init();
                Session::set($_POST['login'],'abraham', true);
                Session::set($_POST['login'],'user', $data['Name']);
                Session::set($_POST['login'],'TypeID', $data['TypeID']);
                Session::set($_POST['login'],'userID', $data['userID']);
                header('location: '.URL.'admin');
            }else{
                echo 'here';
                header('location: '.URL.'login/error/2');
            }
        }else{            
           header('location: '.URL.'login/error/1');
            echo 'here';
        }
         
    }
}