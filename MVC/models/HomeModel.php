<?php 
class HomeModel extends DB{
    public function getListCustomer(){
        $sql = "select * from Account ";
        return $this->CheckCountRow($sql);
    }
    public function LocID($id){
        $sql = "select * from Account where ID='$id'";
        return $this->CheckCountRow($sql);
    }
    public function getDSBT(){
        $sql="select * from listwork";
        return $this->getData($sql);
    }
    public function getDSTP(){
        $sql="select * from food";
        return $this->getData($sql);
    }
    public function getNV(){
        $sql="";
        return $this->getData($sql);
    }
}
?>