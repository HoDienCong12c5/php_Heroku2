<?php
    class ExerciseRevenue extends Controller{
        public static $dThu=0;
        public function __construct() {
            require_once("MVC/models/Admin/ExerciseRevenueModel.php");
            $this->model= new ExerciseRevenueModel();
        }
        public function index(){
            $bt= $this->modelAdmin("ExerciseRevenueModel");
            $this->viewAdmin("ExerciseRevenueView",[
                "dsbt"=> $bt->showDuyet()
            ]);
        }
        public function gettheoNgay(){
            $ngayBD= date( $_POST['ngayBD']);
            $ngayKT=date($_POST['ngayKT']);
            $ds=$this->modelAdmin("ExerciseRevenueModel");
            $data=$ds->showDuyet();
            while($listbt=mysqli_fetch_array($data)){ 
                $datetime3= date_format(date_create_from_format('d/m/Y', $listbt[4]), 'Y-m-d');
                //echo $datetime3;
                $money=$this->currency_format($listbt[3], 'VNĐ');
                if(strtotime($datetime3) >= strtotime($ngayBD) && strtotime($datetime3) <= strtotime($ngayKT)){
                    echo "<tr class='align-middle'>
                    <td>$listbt[0]</td>
                    <td style='width: 200px;'>$listbt[1]</td>
                    
                    <td style='width: 150px;' class='text-muted'>$listbt[2]</td>
                    <td>
                        $money
                    </td>
                    <td>
                        $listbt[4]
                    </td>
                    <td>
                        $listbt[5]
                    </td>
                    <td>
                         Đã duyệt
                    </td>
                     
                </tr>";
                }
                
            }
        } 
        public function getDuyet(){

            $bt= $this->modelAdmin("ExerciseRevenueModel");
            $data=$bt->showDuyet();
            while($listbt=mysqli_fetch_array($data)){
                $money=$this->currency_format($listbt[3], 'VNĐ');
                $cn=$listbt[6] ==1?'Đã duyệt':'';
                echo "<tr class='align-middle'>
                    <td>$listbt[0]</td>
                    <td style='width: 200px;'>$listbt[1]</td>
                    
                    <td style='width: 150px;' class='text-muted'>$listbt[2]</td>
                    <td>
                        $money
                    </td>
                    <td>
                        $listbt[4]
                    </td>
                    <td>
                        $listbt[5]
                    </td>
                    <td>
                         $cn
                    </td>
                     
                </tr>";
            }
        }
        public static function Chart(){
            $bf=ExerciseRevenue::modelAdmin("ExerciseRevenueModel");
             
            return  $bf->ChartR();  
        }
        public function DoanhThu(){
            $ngBD = date($_POST['ngBegin']);
            $ngKT = date($_POST['ngEnd']);
            $bf=$this->modelAdmin("ExerciseRevenueModel");
            $ds=$bf->getDSBT(); 
            while($data=mysqli_fetch_array($ds)){
                $datetime3= date_format(date_create_from_format('d/m/Y', $data[4]), 'Y-m-d');

                if(strtotime($ngBD)<= strtotime($datetime3) && strtotime($ngKT)>= strtotime($data[4]) ){
                    ExerciseRevenue::$dThu+=$data[3]; 
                } 
            }
            echo "Tổng doanh thu : ";
            echo $this->currency_format(ExerciseRevenue::$dThu);
        }
    }
?>
