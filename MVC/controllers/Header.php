<?php
    class Header extends Controller{
        function __construct(){
            require_once("MVC/models/HeaderModel.php");
            $this->model = new HeaderModel();
        }
        public function index(){
            $temp =$this->model("HeaderModel");
            $this->viewMasterPage("HeaderView",[
                "dsbt"=>$temp->getDanhMucCon("dsbt"),
                "dstp"=>$temp->getDanhMucCon("dstp")
            ]);
        }
    }
?>