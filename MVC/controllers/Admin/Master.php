<?php
    class Master extends Controller{
        public function _construct(){
            require_once "MVC/models/Admin/MasterModel.php";
            $this->model = new MasterModel();
        }
        public function index(){
            
            $this->viewMasterPage("MasterView",[
                
            ]);
        }

    }
?>