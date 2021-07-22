<?php  
    class Home extends Controller{ 
        public function __construct()
        {
            //edit 
            require_once 'MVC/models/HomeModel.php';
            $this->model = new HomeModel(); 
        }
        public function index(){  
            $bt= $this->model("HomeModel");
            $this->view("HomeView",[
                "dsbt"=>$bt->getDSBT(),
                "dstp"=>$bt->getDSTP(),
            ]);
        }

        public function Show($a , $b){
            //model
            $temp = $this->model("CustomerModel"); 
            $tong = $temp->Tong($a,$b);            
            //views
            $this->view("HomeView",[
                "arr"=>$tong, 
                "color"=>"red",
                "SoThich"=>["A","b","c"],
                "sv"=>$temp->KH() 
            ]);
        }
        public function ShowDSBT(){
            $bt= $this->model("HomeModel");
            $this->view("HomeView",[
                "dsbt"=>$bt->getDSBT()
            ]);
        }
        public function ShowDSTP(){
            $tp= $this->model("HomeModel");
            $this->view("HomeView",[
                "dstp"=>$tp->getDSTP()
            ]);
        }
        public function ShowNV(){

        }
    }
?>