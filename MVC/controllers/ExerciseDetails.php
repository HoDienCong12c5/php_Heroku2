<?php
    class ExerciseDetails extends Controller{
        public function __construct() {
            require_once("MVC/models/ExerciseDetailsModel.php");
            $this-> model=new ExerciseDetailsModel();
        }
        public function index($id='') {
            if(isset($_GET['idExercise']) ){
                $Exercise= $this->model("ExerciseDetailsModel");
                $this-> view('ExerciseDetailViews',[
                   "data"=> $Exercise->getExercise($_GET['idExercise']),
                   "dstp"=>$Exercise->getFood()
                ]);
               
            }
            else{
               
                require_once "./MVC/error/404.php";
            }
        }
        public function Submit(){
            $id=$_POST['id'];
            if(isset($_SESSION['user_id'])){
                $Exercise= $this->model("ExerciseDetailsModel");
                if($Exercise->addExercise($id) ==0){
                    echo 0;
                }
                else {
                    
                    echo 1;
                }
            }
            else{
                echo -1;
            }
        }
    }
?>