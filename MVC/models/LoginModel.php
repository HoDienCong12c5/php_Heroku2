<?php
class LoginModel extends DB{ 
    public function getAccount($userName){ 
        $qr ="select * from Account where User='$userName'";
        return $this->CheckCountRow($qr);
    } 
    public function getIDAcount($userName,$pass){  

         if($this->CheckLogin($userName,$pass) ==1){
            $sql ="select ID  from Account where User='$userName' and Pass='$pass'";
            $idP=$this->getIDContent($sql);
            $_SESSION['user_id']=$idP;
            $sql="SELECT a.FullName from account a where a.IDWork >0 and a.ID =$idP";
            $_SESSION['fullName']=$this->getIDContent($sql);
            if($this->CheckCountRow($sql) > 0)
                return 1;
            else{
                $sql="SELECT a.FullName from account a where a.ID =$idP";
                
                $sql ="SELECT k.Discount from account a, kindcustomer k where a.IDTypeCustomer=k.ID and a.ID=$idP"; 
                $_SESSION['discount_user']=$this->getIDContent($sql);  
                return 0;
            }
        }
        else
            return -1;
                   
    } 
}
