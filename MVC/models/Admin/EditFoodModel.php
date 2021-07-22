<?php 
class EditFoodModel extends DB{
    function getKindFood(){
        $sql="select * from KindFood";
        return $this->getData($sql);
    }
    function getFoodDetail($id){
        $sql = "SELECT f.ID,f.Image,f.name,f.Price,f.Amount,f.Sold,k.ID,K.Category from Food f,kindfood k where f.IDType =k.ID and f.ID=$id"; 
        return $this->getData($sql);
    }
    function getImgLast($id){
        $sql = "SELECT f.Image from Food f where ID=$id "; 
        return $this->getIDContent($sql);
    }
    function getFood(){
        $sql = "SELECT f.ID,f.Image,f.name,f.Price,f.Amount,f.Sold,K.Category from Food f,kindfood k where f.IDType =k.ID "; 
        return $this->getData($sql);
    }
    function setFood($id,$img,$name,$price,$amount,$idTy){
        if($img=='')
            $sql="update Food set  Name='$name', price=$price,Amount=$amount, IDType=$idTy where ID =$id " ;
        else{
            if($this->getImgLast($id)!= $img)
                $this->RemoveImgFood($this->getImgLast($id));
            $sql="update Food set Image='$img',Name='$name', price=$price,Amount=$amount, IDType=$idTy where ID =$id " ;

        }
        if($this->Execute($sql))
            return $sql;
        else
            return false;
    }
    public function RemoveImgFood($img){
        $path="/Public/images/AnhSanPham/$img";
        if(is_file($path)){
            unlink($path);
        }
    }
    function Delete($id){
        $sql="select * from hoadonchitiet where IDFood =$id ";

        if($this->CheckCountRow($sql)>0){
            return 0;
        }
        else{
            $img=$this->getImgLast($id);
            $this->RemoveImgFood($img);
            $sql="DELETE from Food where ID=$id ";
            $this->Execute($sql);
            return 1;
        }
    }
    function Add($img,$name,$price,$amount,$idTy){
        $sql="insert into Food values(NULL,'$img','$name',$price,$amount,0,$idTy)";
        if($this->Execute($sql)){
            return true;
        }
        else
            return false;
    }
    function Search($idTy){
        $sql = "SELECT f.ID,f.Image,f.name,f.Price,f.Amount,f.Sold,K.Category from Food f,kindfood k where f.IDType =k.ID and k.ID=$idTy"; 
        return $this->getData($sql);
    }
}
?>