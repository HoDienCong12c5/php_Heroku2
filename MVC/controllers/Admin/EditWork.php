<?php
    class EditWork extends Controller{
        public function _construct(){
            require_once "MVC/models/Admin/EditWorkModel.php";
            $this->model = new EditWorkModel();
        }
        public function index(){
            
            if(isset($_GET["idWork"])){
                $work=$this->modelAdmin("EditWorkModel");
                $idW=$_GET["idWork"];
                $this->viewAdmin("EditWorkView",[
                    "data"=>$work->getDataWork($idW),
                    "IDD"=>$work->getIDDevice()
                ]);
            }
            else{
                $work=$this->modelAdmin("EditWorkModel");
                $this->viewAdmin("EditWorkView",[
                    "IDDe"=>$work->getIDDevice()
                ]);
            }
           
        }
        public function SaveEdit(){
            $name=$_POST['name'];
            $price=$_POST['price'];
            $img=isset($_FILES['img']['name'])==null?'':$_FILES['img']['name'];
            if($img!=''){ 
                $this->EditImgE($img);
            }
            $note=$_POST['note'];
            $time=$_POST['time'];
            $idDe=$_POST['idDe'];
            $id=$_POST['id'];
            $work=$this->modelAdmin("EditWorkModel");
            if($work->SaveEdit($id,$img,$price,$time,$name,$idDe,$note)==true){
                echo 1;
            }
            else
                echo 0;  
        }
        public function SaveNew(){
            $name=$_POST['name'];
            $price=$_POST['price']; 
            $img =$_FILES['img']['name'];
            $this->EditImgE($img);

            $note=$_POST['note'];
            $time=$_POST['time'];
            $idDe=$_POST['idDe'];  
            $work=$this->modelAdmin("EditWorkModel");
            if($work->SaveNew($img,$price,$time,$name,$idDe,$note)){
                echo 1;
            }
            else
                echo 0;
        }
        public function Search(){
            $name=$_POST['name'];
            $work=$this->modelAdmin("EditWorkModel");
            if($work->Search($name)){
                {
                    $i=0;
                    while($r=$work->Search($name)){
                        $money=$this->currency_format($r[4]);
                        $coler= $i%2==0?'antiquewhite':'';
                        echo  "<tr class='align-middle' style='background-color:$coler' ?>;'>
                        <td> $r[0] <div id=' $i '></div></td>
                        <td style='width: 100px;'><$r[2]</td>
                        <td><img style='width: 100px;height: 100px;' src='/Public/images/AnhBaiTap/$r[1]'></td>
                        <td> $money</td>
                        <td class='text-muted'> $r[5] <label>(Tháng)</label></td>
                        <td> $r[6]  </td>
                        <td><a class='me-3 text-lg text-success' href='/Admin/EditWork?idWork= $r[0]' ><i class='far fa-edit'></i></a>
                        <a class='text-lg text-danger' href='javascript:delet( $r[0],$i)'><i class='far fa-trash-alt'></i></a>
                        </td>
                    </tr>";
                        $i++;
                    }
                }
                
            }
            else
                echo "<div>Không tìm thấy dữ liệu</div> ";

        }

    }
?>