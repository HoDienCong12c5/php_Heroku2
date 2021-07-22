<?php
    class FoodDetailModel extends DB{
        function getFood($id){
            $sql = "SELECT f.ID,f.Image,f.Name,f.Price,k.ID,k.Category from Food f,KindFood k where f.ID =$id and k.ID=f.IDType";
            if($this->CheckCountRow($sql))
            return mysqli_query($this->con,$sql);
        }
        public function getLfood(){
            $sql ="select * from food";
            return $this->getData($sql);
        }
        public function getAmount($id){
            $sql="select Amount from Food where ID=$id";
            $totalAmount=$this->getIDContent($sql);
            $sql="select Sold from Food where ID=$id";
            $sold=$this->getIDContent($sql);
            return $totalAmount-$sold;
        }
       public  function Buy($idFood,$amount,$price){
           if(isset($_SESSION['user_id'])){
                $discount=$_SESSION['discount_user'];
               
                $total=$amount*$price - ($amount*$price*$discount)/100;

                $idPersion=$_SESSION['user_id'];
                $date= Date('d-m-Y');

                $soLuong=$this->getAmount($idFood);
                
                if($amount >$soLuong)
                    return 1;
                $sql0="update Food set Sold=(Sold+$amount) where ID=$idFood";
                $this->Execute($sql0);
                $sql1="insert into BillFood values(NULL,$idPersion,$total,'$date')";
                $this->Execute($sql1);
                $sql2="select MAX(ID) from BillFood";
                $idBillFood=$this->getIDContent($sql2);
                $this->UpPointFood($idPersion);
                $sql3="insert into hoadonchitiet values(NULL,$idBillFood,$idFood,$price,$amount)";
                $this->Execute($sql3);
                return 2;
           }
           else
                return 0;
        }
        public function AddCart($idFood,$amount,$price){
            if(isset($_SESSION['user_id'])){
                $sql="select k.Discount from KindCustomer k, Account a where a.IDTypeCustomer = k.ID";
            
                $discount=$this->getIDContent($sql);
            
                $total=$amount*$price - ($amount*$price*$discount)/100;
                $image=" ";
                $sql="select Image,name from Food where ID=$idFood";
                if($this->getData($sql)){
                    $r=mysqli_fetch_array($this->getData($sql));
                    $image=$r[0];
                    $name=$r[1];
                    $duLieu=array($idFood,$image,$name,$amount,$total); 
                    
                    if(isset($_SESSION['card'])){
                        $kt=0;
                        $data=$_SESSION['card'];
                        foreach($data as $item){
                            if($item[0]==$idFood){
                                $kt=1;
                            }
                        }
                        if($kt==0){
                            $_SESSION['card'][]=$duLieu;
                        }
                    }
                    else{
                        $_SESSION['card'][]=$duLieu;
                    }
                    return true;
                }
                else{
                    return false;
                }
            }
            else
                return false;
           
        }
    
    }
