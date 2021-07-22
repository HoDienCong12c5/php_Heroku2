<?php
class RegitsterW extends Controller{
    function __construct(){
        require_once("MVC/models/Admin/RegitsterWModel.php");
        $this->model = new RegitsterWModel();
    }
    public function index(){
        $ds=$this->modelAdmin("RegitsterWModel");
        $this->viewAdmin("RegitsterWView",[
            "data"=>$ds->getList()
        ]);
    }
    public function Submit(){
        $id=$_POST['id'];
        $idW=$_POST['idW'];
        $w=$this->modelAdmin("RegitsterWModel");
        $w->Submit($id,$idW); 
    }
    public function Search(){
        $date=$_POST['date'];
        $w=$this->modelAdmin("RegitsterWModel");
        $w->Search($date); 
    }
}
?>