<?php
class Home extends Controller{
    function __construct(){
        require_once("MVC/models/Admin/HomeModel.php");
        $this->model = new HomeModel();
    }
    public function index(){
        $this->viewMasterPage("AdminView",[
                
        ]);
    }
}
?>