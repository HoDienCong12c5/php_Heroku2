<?php
    class ListFoodModel extends DB{
        public function getListFood(){
            $sql ="select * from food";
            return $this->getData($sql);
        }
        public function getDM(){
            $sql="select * from kindfood";
            return $this->getData($sql);
        }
        public function getIDFood($id=''){
            $sql= "select * from food where ID=.$id";
            return $this->getData($sql);    
        }
        public function addFood($id=''){
            $dataNow= date('d/m/Y');
            echo "<script type='text/javascript'>alert('.$dataNow.  Đăng ký thành công');</script>";
        }
        public function search($name){
            $sql ="select * from food where Name like '%$name%' ";
            if($this->CheckCountRow($sql)>0)
                return $this->getData($sql);
            else
                return false;
        }
        public function SKind($idTy){
            $sql ="select * from food where IDType=$idTy";
            if($this->CheckCountRow($sql)>0)
                return $this->getData($sql);
            else
                return false;
        }
    }
?>