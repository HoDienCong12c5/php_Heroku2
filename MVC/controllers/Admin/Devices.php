<?php
    class Devices extends Controller{
        public function __construct()
        {
            require_once("MVC/models/Admin/DevicesModel.php");
            $this->modal=new DevicesModel();
        }

        public function index(){
            
            $dv=$this->modelAdmin("DevicesModel");
            $this->viewAdmin("DevicesView",[
                "data"=>$dv->getAll()
            ]);
        }
        public function SearchName(){
            $name=$_POST['name'];
            $ac=$this->modelAdmin("DevicesModel");
            $dt=$ac->SearchName($name); 
            $i = 0;
            if ($dt) {
                while($r=mysqli_fetch_array($dt)){
                    $coler = $i % 2 == 0 ? 'antiquewhite' : '';
                    echo " <tr class='align-middle' style='background-color:$coler'>
                                <td id='id$r[0]'>$r[0]</td>
                                <td><img style='width: 100px;height: 100px;' src='/Public/images/ThietBiAdmin/$r[1]'></td> 
                                <td>$r[2]</td>
                                <td>$r[3]</td>
                                <td>$r[4]</td>
                                <td>$r[5]</td>
                                <td>$r[6]</td> 
                                <td >
                                    <button data-bs-toggle='modal' data-bs-target='#exampleModal' ><a class='me-3 text-lg text-success' href='javascript:Edit($r[0],$i)' ><i class='far fa-edit'></i></a></button>
                                    <button><a class='text-lg text-danger' href='javascript:Delete($r[0],$i)'><i class='far fa-trash-alt'></i></a></button>
                                </td>
                            </tr>";
                    $i++;
                }
            }

        }

        public function ViewAll(){
            $dv=$this->modelAdmin("DevicesModel");
            $dt=$dv->getAll();
            $i = 0;
            if ($dt) {
                while($r=mysqli_fetch_array($dt)){
                    $coler = $i % 2 == 0 ? 'antiquewhite' : '';
                    echo " <tr class='align-middle' style='background-color:$coler'>
                                <td id='id$r[0]'>$r[0]</td>
                                <td><img style='width: 100px;height: 100px;' src='/Public/images/ThietBiAdmin/$r[1]'></td> 
                                <td>$r[2]</td>
                                <td>$r[3]</td>
                                <td>$r[4]</td>
                                <td>$r[5]</td>
                                <td>$r[6]</td> 
                                <td >
                                    <button data-bs-toggle='modal' data-bs-target='#exampleModal' ><a class='me-3 text-lg text-success' href='javascript:Edit($r[0],$i)' ><i class='far fa-edit'></i></a></button>
                                    <button><a class='text-lg text-danger' href='javascript:Delete($r[0],$i)'><i class='far fa-trash-alt'></i></a></button>
                                </td>
                            </tr>";
                    $i++;
                }
            }
           
        }
        public function AddNew(){
            $name=$_POST['name'];
            $price=$_POST['price']; 
            $amount=$_POST['amount'];
            $fail=$_POST['fail'];  
            $img =$_FILES['img']['name'];
            $work=$this->modelAdmin("DevicesModel");
            $dk= $work->AddNew($img,$name,$price,$amount,$fail);
            if($dk==1)
                echo 1;
            else
                echo 0;
        }

        public function Delete(){
            $id=$_POST['id'];
            $ac=$this->modelAdmin("DevicesModel");
            echo $ac->Delete($id);  
        }

        public function SaveEdit(){
            $name=$_POST['name'];
            $price=$_POST['price'];
            $img=isset($_FILES['img']['name'])==null?'':$_FILES['img']['name'];
            if($img!=''){ 
                $this->EditImgD($img);
            }
            $amount=$_POST['amount'];
            $fail=$_POST['fail'];  
            $id=$_POST['id'];
            $work=$this->modelAdmin("EditWorkModel");
            if($work->Update($id,$img,$name,$price,$amount,$fail)==true){
                echo 1;
            }
            else
                echo 0;  
        }

    }
