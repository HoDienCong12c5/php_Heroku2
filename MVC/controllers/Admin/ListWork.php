<?php
class ListWork extends Controller{

    function __construct(){
        require_once "MVC/models/Admin/EditWorkModel.php";
            $this->model = new EditWorkModel();
    }
    public function index(){
        if(isset($_SESSION['user_id']) == false)
            header ('Location:/Home');
        $work=$this->modelAdmin("EditWorkModel");
        $this->viewAdmin('ListWordView',[
            "data"=>$work->getList()
        ]);
    }
    public function add(){

    }
    public function Delete(){
        $id=$_POST["id"];
        $work=$this->modelAdmin("EditWorkModel");
        if($work->Remove($id)==true){
            echo 1;
        }
        else
            echo 0;
    }
    public function UpdatePoint(){ 
        $point=$_POST['point'];
        UpDownPoint_Sale::PointUpExercise($point); 
    }

}

?>
