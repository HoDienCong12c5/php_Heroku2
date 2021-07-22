<?php
    class Food extends Controller{
        public $imgLast="";
        public function _construct(){
            require_once "MVC/models/Admin/EditFoodModel.php";
            $this->model = new EditFoodModel();
        }
        public function index(){
            $f=$this->modelAdmin("EditFoodModel");
            $this->viewAdmin("ListFoodView",[
                "data"=>$f->getFood(),
                "lkf"=>$f->getKindFood()
            ]);
        }
        public function EditFood(){
            if(isset($_GET['idFood'])){
                $f=$this->modelAdmin("EditFoodModel");
                $imgLast=$f->getImgLast($_GET['idFood']);
                $this->viewAdmin("EditFoodView",[
                    "data"=>$f->getFoodDetail($_GET['idFood']),
                    "lkf"=>$f->getKindFood()
                ]);
            }
            else{
                $f=$this->modelAdmin("EditFoodModel");
                $this->viewAdmin("EditFoodView",[
                    "lkf"=>$f->getKindFood()
                ]);
            }
            
        }
        public function Remove(){
            $id=$_POST['id'];
            $f=$this->modelAdmin("EditFoodModel");
            if($f->Delete($id)==1)
                echo 1;
            else
                echo 0;
        }
        public function AddNew(){
            $img=$_FILES['img'];
            $imgName=$_FILES['img']['name'];
            $this->EditImgFood($imgName);
            $name=$_POST['name'];
            $price=$_POST['price'];
            $idTy=$_POST['idTy']; 
            $amount=$_POST['amount'];
           $f=$this->modelAdmin("EditFoodModel");
            if($f->Add($imgName,$name,$price,$amount,$idTy)==true)
                echo 1;
            else
                echo $f->Add($img,$name,$price,$amount,$idTy);
        }
        public function Update(){

            $id=$_POST['id'];
            $img=isset($_FILES['img']['name'])==null?'':$_FILES['img']['name'];
            if($img!='')
                $this->EditImgFood($img);
            $name=$_POST['name'];
            $price=$_POST['price'];
            $idTy=$_POST['idTy']; 
            $amount=$_POST['amount'];
            $f=$this->modelAdmin("EditFoodModel");
            if($f->setFood($id,$img,$name,$price,$amount,$idTy))
                echo 1;
            else
                echo 0;
        }
        public function Search(){
            $idTy=$_POST['idTy'];
            $f=$this->modelAdmin("EditFoodModel");
            if($idTy==-1){
                $data=$f->getFood();
                $i=0;
                while($r=mysqli_fetch_array($data)){
                    $p=$this->currency_format($r[3]);
                    echo"<tr class='align-middle'>
                            <td>
                                $r[0]
                                <div id='$i'></div>
                            </td>
                            <td style='width: 100px;'>$r[2]</td>
                            <td><img style='width: 100px;height: 100px;' src='/Public/images/AnhSanPham/$r[1]'></td>
                            <td>$p</td>
                            <td >$r[4]</td>
                            <td>
                                $r[5]
                            </td>
                            <td ><label id='type'>$r[6]</label></td>
                            <td><a class='me-3 text-lg text-success' href='/Admin/Food/EditFood?idFood=$r[0]'><i class='far fa-edit'></i></a>
                            <a class='text-lg text-danger' href='javascript:delet($r[0],$i)'><i class='far fa-trash-alt'></i></a>
                            </td>
                        </tr>";
                    $i++;
                }
            }
            else
            {
                $data=$f->Search($idTy);
                $i=0;
                while($r=mysqli_fetch_array($data)){
                    $p=$this->currency_format($r[3]);
                    echo"<tr class='align-middle'>
                            <td>
                                $r[0]
                                <div id='$i'></div>
                            </td>
                            <td style='width: 100px;'>$r[2]</td>
                            <td><img style='width: 100px;height: 100px;' src='/Public/images/AnhSanPham/$r[1]'></td>
                            <td>$p</td>
                            <td >$r[4]</td>
                            <td>
                                $r[5]
                            </td>
                            <td ><label id='type'>$r[6]</label></td>
                            <td><a class='me-3 text-lg text-success' href='/Admin/Food/EditFood?idFood=$r[0]'><i class='far fa-edit'></i></a>
                            <a class='text-lg text-danger' href='javascript:delet($r[0],$i)'><i class='far fa-trash-alt'></i></a>
                            </td>
                        </tr>";
                    $i++;
                }
            }
        }
        public function UpdatePoint(){ 
            UpDownPoint_Sale::PointUpFood($_POST['point']);
        }

    }
?>