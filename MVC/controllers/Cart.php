<?php
    class Cart extends Controller{
        function __construct(){
            require_once("MVC/models/Customers/CartModel.php");
            $this->model=new CartModel();
        }
        function index(){
            if(isset($_SESSION['user_id']) == false)
                header ('Location:/Home'); 
            $this->viewCustomer("CartView",[
            ]);
        }
        function addBill(){
            if(isset($_SESSION["bill"])){
                $temp = $this->modelCustomer("CartModel");
                $detail= [];
                $temp->addBill($detail);
            }
        }
        function Remove(){
            $line=$_POST['line'];
            $cart = (array) $_SESSION["card"];

            for ($i = 0; $i < count($cart); $i++) {
                if ($i==$line) {
                    array_splice($cart, $i, 1);
                }
            }
            $_SESSION["card"] = $cart;
            echo "1";      
        }
        function currency_format($number, $suffix = '') {
            if (!empty($number)) {
                return number_format($number, 0, ',', '.') . "{$suffix}";
            }
        }
        function ViewBill(){
            $sum = 0;
            $amount = 0;
            $total=0;
            $point=0;
            $dc=$_SESSION['discount_user']  ;
            if (isset($_SESSION["card"])){
                foreach ($_SESSION["card"] as $i) {
                    $sum += $i[3] * $i[4];
                    $amount += $i[3];
                    $point+=(UpDownPoint_Sale::FoodPointUp()*$i[3]);
                }
            }               
            $sum2 =$this->currency_format($sum," VNĐ");
            if($dc>0)
            {
                $total=$sum -($sum*$dc)/100;
                $total =$this->currency_format($total," VNĐ");
            }

            else
                $total=$sum2;
                echo "<tr>
                        <td>Số lượng sản phẩm mua :</td>
                        <td align='right'>$amount</td>
                    </tr>
                    <tr>
                        <td>Tổng điểm được cộng: </td>
                        <td align='right'> $point </td>
                    </tr>
                    <tr>
                        <td>Tổng giá : </td>
                        <td align='right'> $sum2 </td>
                    </tr>
                    <tr>
                        <td>Giảm giá : </td>
                        <td align='right'><div align='right'>$dc %</div></td>
                    </tr>
                
                    <tr>
                        <td >Tổng tiền : </td>
                        <td align='right'><div align='right'><font color='#FF0000'>$total</font></div></td>
                    </tr>";
            
            
        }
        public function EditSoLuong(){
            $action=$_POST['action'];
            $line=$_POST['line'];
            $temp = $this->modelCustomer("CartModel");
            iF($action==1){
                $temp->Plus($line); 
            }
            else{
                $temp->Down($line); 
            }
        }
        public function Pay(){
            $temp = $this->modelCustomer("CartModel");
            $temp->Pay();
            
        }
    }
