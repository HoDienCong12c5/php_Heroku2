<?php
    class Facilities extends Controller{
        public function __construct(){
            require_once("MVC/models/Admin/FacilitiesModal.php");
            $this->mpdal=new FacilitiesModal();
        }
        public function index(){
            $this->viewAdmin("FacilitiesView",[]);
        }
        
    }
?>