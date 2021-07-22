<?php
    class ListFood extends Controller {
        public function __construct() {
            require_once("MVC/models/ListFoodModel.php");
            $this-> model= new ListFoodModel();
        }
        public function index(){
            $lfood =$this->model("ListFoodModel");
            $this->view("ListFoodView",[
                "dstp"=>$lfood->getListFood(),
                "dm"=>$lfood->getDM()
            ]);
        }
        public function submit($id=''){
            if(isset($_GET['idFood'])){
                $this->idPersion=$_SESSION['user_id'];
                
            }
        }
        function currency_format($number, $suffix = '') {
            if (!empty($number)) {
                return number_format($number, 0, ',', '.') . "{$suffix}";
            }
        }
        public function Search(){
            $name=$_POST['name'];
            $lfood =$this->model("ListFoodModel");
            if($lfood->Search($name)!=false){
                $dt=$lfood->Search($name);
                $i=0;
                while($row2=mysqli_fetch_array($dt)){
                    $tongsl=$row2[4];
                    $ban=$row2[5];
                    $sl=$tongsl- $ban;
                    $p=$this->currency_format($row2[3]);
                    if($i % 5 ==0){
                        echo "<br/>";
                        $i=0;
                    }
                    echo" <div id='voSP' class='voSP'>
                            <div id='sanpham' class='sanpham'>
                                <image id='anhSP' src='/Public/images/AnhSanPham/$row2[1]' class='anhSP'/><br/><br/>
                            <b> <label class='tenSP'>$row2[2]</label><br/></b>
                                <label >Giá:  </label>
                                <label class='giaSP'>$p</label><lable>  VNĐ</lable><br/>
                                <label>Số lượng bán: $sl</label><br/>
                                <a href='/FoodDetail?idFood= $row2[0]' ><image class='btnmua' src='/Public/images/AnhChucNang/chon_mua_nn.gif'></image></a>
                            </div>
                        </div>";
                $i++;
                }
            }
            else
                echo "Không tìm thấy";
        }
        public function SKind(){
            $idTy=$_POST['idTy'];
            if($idTy!=-1){
                $lfood =$this->model("ListFoodModel");
                if($lfood->SKind($idTy)!=false){
                    $dt=$lfood->SKind($idTy);
                    $i=0;
                    while($row2=mysqli_fetch_array($dt)){
                        $tongsl=$row2[4];
                        $ban=$row2[5];
                        $sl=$tongsl- $ban;
                        $p=$this->currency_format($row2[3]);
                        if($i % 5 ==0){
                            echo "<br/>";
                            $i=0;
                        }
                        echo" <div id='voSP' class='voSP'>
                                <div id='sanpham' class='sanpham'>
                                    <image id='anhSP' src='/Public/images/AnhSanPham/$row2[1]' class='anhSP'/><br/><br/>
                                <b> <label class='tenSP'>$row2[2]</label><br/></b>
                                    <label >Giá:  </label>
                                    <label class='giaSP'>$p</label><lable>  VNĐ</lable><br/>
                                    <label>Số lượng bán: $sl</label><br/>
                                    <a href='/FoodDetail?idFood= $row2[0]' ><image class='btnmua' src='/Public/images/AnhChucNang/chon_mua_nn.gif'></image></a>
                                </div>
                            </div>";
                    $i++;
                    }
                }
                else
                    echo "Không tìm thấy";
            }
            else{
                $lfood =$this->model("ListFoodModel");
                if( $lfood->getListFood() ){
                    $dt=$lfood->getListFood();
                    $i=0;
                    while($row2=mysqli_fetch_array($dt ) ){
                        $tongsl=$row2[4];
                        $ban=$row2[5];
                        $sl=$tongsl- $ban;
                        $p=$this->currency_format($row2[3]);
                        if($i % 5 ==0){
                            echo "<br/>";
                            $i=0;
                        }
                        echo" <div id='voSP' class='voSP'>
                                <div id='sanpham' class='sanpham'>
                                    <image id='anhSP' src='/Public/images/AnhSanPham/$row2[1]' class='anhSP'/><br/><br/>
                                <b> <label class='tenSP'>$row2[2]</label><br/></b>
                                    <label >Giá:  </label>
                                    <label class='giaSP'>$p</label><lable>  VNĐ</lable><br/>
                                    <label>Số lượng bán: $sl</label><br/>
                                    <a href='/FoodDetail?idFood= $row2[0]' ><image class='btnmua' src='/Public/images/AnhChucNang/chon_mua_nn.gif'></image></a>
                                </div>
                            </div>";
                    $i++;
                    } 
                }
            }
        }
    }
?>