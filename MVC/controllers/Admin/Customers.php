<?php
    class Customers extends Controller{
        public function __construct(){
            require_once("MVC/models/Admin/CustomersModel.php");
            $this->modal=new CustomersModel();
        }
        public function index(){
            if(isset($_SESSION['user_id']) == false)
                header ('Location:/Home');
            $ac=$this->modelAdmin("CustomersModel");
            $this->viewAdmin("CustomersView",[
                "data"=>$ac->getAll()
            ]);
        }
        public function Search(){
            $idTy=$_POST['idTy'];
            $ac=$this->modelAdmin("CustomersModel");
            $ac->Search($idTy);

        }
        public function SearchName(){
            $name=$_POST['name'];
            $ac=$this->modelAdmin("CustomersModel");
            $ac->SearchName($name); 
        }
        public function Delete(){
            $id=$_POST['id'];
            $ac=$this->modelAdmin("CustomersModel");
            echo $ac->Delete($id);  
        }
        
    }
?>