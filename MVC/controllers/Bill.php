<?php
    class Bill extends Controller{
        public function __construct() {
            require_once("MVC/models/BillModel.php");
            $this->model= new BillModel();
        }
        public function index(){
            if(isset($_SESSION['user_id']) == false)
                header ('Location:/Home');
            $bill = $this->model("BillModel");
            $this->viewCustomer("BillView",[
                "dsbt"=>$bill->getDSBT(),
                "dstp"=> $bill ->getDSTP(),
            ]);
        }
        public function ViewAll(){
            $bill = $this->model("BillModel");
            $bill ->getDSTP();
        }
        public function SearchFood(){
            $id=$_POST['idTy'];
            $bill = $this->model("BillModel");
            $bill->SFood($id); 
        }
        public function SearchE(){
            $id=$_POST['idTy'];
            $bill = $this->model("BillModel");
            $bill->SExersie($id); 
           
        }
        public function Detailt(){
            $idHD=$_POST['idhd'];
            $bill = $this->model("BillModel");
            $data=$bill->Detailt($idHD);
            while($r=mysqli_fetch_array($data)){
                $toatl=$this->currency_format($r[4]);
                echo "<tr > 
                        <td>$r[0]</td>
                        <td>$r[1]</td>
                        <td>$r[2]</td>
                        <td>$r[3]</td>
                        <td> $toatl</td>
                    </tr>
                ";
            }
        }
    }
?>