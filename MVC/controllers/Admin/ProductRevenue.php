<?php
   
    class ProductRevenue extends Controller{
        public static $dThu=0;
        public function __construct(){
            require_once("MVC/models/Admin/ProductRevenueModel.php");
            $this->model=new ProductRevenueModel();
        }
        public function index(){
            $dt=$this->modelAdmin("ProductRevenueModel");
            $this->viewAdmin("ProductRevenueView",[
                "dsbill"=> $dt->getBILLTP(),
            ]);
        }
        public static function Chart(){
            $bf=ProductRevenue::modelAdmin("ProductRevenueModel"); 
            return  $bf->ChartR();  
        }

        public function getDS(){
            $bf=$this->modelAdmin("ProductRevenueModel");
            $ds=$bf->getBILLTP();
            echo "đãm vô";
                while($data=mysqli_fetch_array($ds)){
                    $money= $this->currency_format($data[3]);
                    echo "<tr class='align-middle'>
                            <td>$data[0]</td>
                            <td style=''>$data[1]</td>
                        
                        <td class='text-muted'>$data[2] </td>
                        <td>
                            $money VNĐ
                        </td>
                        </td>
                        <td>
                        $data[4]
                        </td>
                        </td>
                        <td>
                           <button data-bs-toggle='modal' data-bs-target='#exampleModal' > <a class='me-3 text-lg text-success' href='javascript:delet($data[0])'><i class='far fa-edit'></i>Chi tiết</a></button>
                        </td>
                    </tr>";
            }
        }
        function getDetail(){
            $id=$_POST['id'];
            $dl= $this->modelAdmin("ProductRevenueModel");
            $data= $dl->getChitiet($id);
            while($r=mysqli_fetch_array($data)){
                $money=$this->currency_format($r[2]);
                echo " <tr>
                        <th scope='row'>$r[0]</th>
                        <td>$r[1]</td>
                        <td>$money </td>
                        <td>$r[3]</td>
                    </tr>";
            }
            
        }
        public function getTheoNgay(){
            $ngBD = date($_POST['ngBegin']);
            $ngKT = date($_POST['ngEnd']);
            $bf=$this->modelAdmin("ProductRevenueModel");
            $ds=$bf->getBILLTP();

            while($data=mysqli_fetch_array($ds)){
                $money= $this->currency_format($data[3]);
                if(strtotime($ngBD)<= strtotime($data[4]) && strtotime($ngKT)>= strtotime($data[4]) ){
                    ProductRevenue::$dThu+=$data[3];
                    echo "<tr class='align-middle'>
                    <td>$data[0]</td>
                        <td >$data[1]</td>
                
                        <td class='text-muted'>$data[2] </td>
                        <td>
                            $money VNĐ
                        </td>
                        </td>
                        <td>
                        $data[4]
                        </td>
                        </td>
                        <td>
                        <button data-bs-toggle='modal' data-bs-target='#exampleModal' > <a class='me-3 text-lg text-success' href='javascript:delet($data[0])'><i class='far fa-edit'></i>Chi tiết</a></button>
                        </td>
                    </tr>";
                }
            }
        }
        public function DoanhThu(){
            $ngBD = date($_POST['ngBegin']);
            $ngKT = date($_POST['ngEnd']);
            $bf=$this->modelAdmin("ProductRevenueModel");
            $ds=$bf->getBILLTP();

            while($data=mysqli_fetch_array($ds)){ 
                if(strtotime($ngBD)<= strtotime($data[4]) && strtotime($ngKT)>= strtotime($data[4]) ){
                    ProductRevenue::$dThu+=$data[3]; 
                }
            }
            echo "Tổng doanh thu : ";
            echo $this->currency_format(ProductRevenue::$dThu);
        }
    }
?>