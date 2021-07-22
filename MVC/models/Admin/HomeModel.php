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
    public function LocNgay($date){

    }
    public function LocTen($name){

    }
}
?>