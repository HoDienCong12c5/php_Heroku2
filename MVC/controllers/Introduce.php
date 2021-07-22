<?php
    class Introduce extends Controller{
        public function __construct()
        {
            require_once("MVC/models/IntroduceModel.php");
            $this->model= new IntroduceModel();
        }
        public function index(){
            if(isset($_SESSION['user_id']) == false)
                header ('Location:/Home');
            $introduce= $this->model("IntroduceModel");
            $this->view("IntroduceView",[
                "data"=>$introduce->getAccount(),
                "loaikhach"=>$introduce->getLoaiKH()
            ]);
        }
        public function UpdateAccount(){
            $fullName=$_POST['fname'];
            $address=$_POST['diachi'];
            $sex=$_POST['gt'];
            $nPhone=$_POST['sdt'];
            $account=$_POST['tk'];
            $pass=$_POST['mk']; 
            $img=isset($_FILES['img']['name'])==null?'':$_FILES['img']['name'];         
            if($img!=''){ 
                $this->EditImgA($img);
            }
            $capnhap= $this->model("IntroduceModel");
            $capnhap->setAccount($img ,$fullName, $sex, $address, $nPhone, $account, $pass); 
            echo 1;
        }
        public function UpdatePass(){
            $pass=$_POST['pass'];
            $capnhap= $this->model("IntroduceModel");
            $capnhap->setPass($pass);
        }
    }
?>