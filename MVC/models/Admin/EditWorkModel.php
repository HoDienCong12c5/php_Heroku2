<?php 
class EditWorkModel extends DB{  
    public function getDataWork($id){
        $sql="SELECT * from listWork where ID =$id";
        return $this->getData($sql);
    }
    public function getList(){
        $sql="select * from listWork ";
        return $this->getData($sql);
    }
    function getImgLast($id){
        $sql="SELECT Image from listWork where ID =$id"; 
        return $this->getIDContent($sql);
    }
    public function getIDDevice(){
        $sql="select ID from device";
        return $this->getData($sql);
    }
    public function SaveEdit($id,$img,$price,$time,$name,$idStaff,$note){
        if($img=='')
            $sql="update  listwork set  NameWork='$name', Price=$price, time=$time,Note='$note' where ID =$id";

        else{ 
            if($this->getImgLast($id)!= $img)
                $this->RemoveImgE($this->getImgLast($id));
            $sql="update  listwork set image='$img', NameWork='$name', Price=$price, time=$time,Note='$note' where ID =$id";

        }

        if($this->Execute($sql))
            return true;
        else
            return false; 
    }
    public function SaveNew($img,$price,$time,$name,$idDe,$note){
        $sql="insert into ListWork values(NULL,'$img','$name','$note',$price,$time,$idDe,0)";
        
        if($this->Execute($sql))
            return true;
        else
            return false;
    }
    public function RemoveImgE($img){
        $path="./Public/images/AnhBaiTap/$img";
        unlink($path);
        if(is_file($path)==true){
            unlink($path);
        }
    }
    public function Remove($id){
        $sql="SELECT * from listregistration where IDWork =$id";
        if($this->CheckCountRow($sql) >0) {
            return false;
        } 
        else{
            $img=$this->getImgLast($id);
            $this->RemoveImgE($img);
            $sql="delete from ListWork where ID =$id";
            if($this->Execute($sql))
                return true;
            else
                return false;
        }
    }
    public function Search($name){
        $sql="SELECT * from listWork where NameWork like '%$name%'";
        return $this->getData($sql);
    }
}
?>