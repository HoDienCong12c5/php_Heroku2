<?php
    class DevicesModel extends DB{
        public function getAll(){
            $sql="SELECT * FROM device";
            return $this->getData($sql);
        }
        
        public function SearchID($id){
            $sql="SELECT * FROM device where ID =$id" ;
            return $this->getData($sql);
        }
        public function Searchname($name){
            $sql="SELECT * FROM device where Name like '%$name%'";
            return $this->getData($sql);
        }
        function getImgLast($id){
            $sql = "SELECT d.Image from device d WHERE d.ID =$id "; 
            return $this->getIDContent($sql);
        }
        public function RemoveImgD($img){
            $path="/Public/images/ThietBiAdmin/$img";
            if(is_file($path)){
                unlink($path);
            }
        }
        public function Delete($id){
            $sql="SELECT device.ID from listwork, device WHERE device.ID=listwork.IDDevice and device.ID=$id";
            if($this->CheckCountRow($sql) <1)
            {
                $img=$this->getImgLast($id);
                $this->RemoveImgD($img);
                $sql="DELETE FROM device   WHERE device.ID=$id";
                $this->Execute($sql);
                return 1;
            }
            return 0; 

        }
        public function AddNew($img,$name,$price,$amount,$fail)
        {
            $d=date('d-m-Y');
            $sql="insert into device (ID,Image, Name, Price, Amount, Fail, DateBuy) values (NULL,N'$img',N'$name',$price ,$amount ,$fail , '$d')";
            if($this->Execute($sql))
                return 1; 
            return $sql;
        }
        public function Update($id,$img,$name,$price,$amount,$fail){

        }
    }
?>