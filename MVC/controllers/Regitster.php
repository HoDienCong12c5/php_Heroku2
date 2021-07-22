<?php

    class Regitster extends Controller{
        public function __construct(){
            require_once "MVC/models/RegitsterModel.php";
            $this->model=new RegitsterModel();
        }
        function index(){
            $this->view("RegitsterView",[]);
        }
        function submit(){
                $name=$_POST['name'];
                $email=$_POST['email'];
                $pass=$_POST['password'];
                $fullname=$_POST['fullname'];
            $OK=$this->model('RegitsterModel');
            if($OK->add($name,$email,$pass,$fullname)==1){
                echo 1;
            }
            else{
                if($OK->add($name,$email,$pass,$fullname)==-1)
                    echo "Gmail trùng với tài khoản khác";
                 
            }
        }
    }
?>