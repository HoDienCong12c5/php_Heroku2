<?php
class IntroduceModel extends DB
{
    public function getAccount()
    {
        $iduser = $_SESSION['user_id'];
        $sql = "select * from account where ID= $iduser";
        return $this->getData($sql);
    }
    public function getLoaiKH()
    {
        $iduser = $_SESSION['user_id'];
        $sql = "SELECT kindcustomer.Name FROM account, kindcustomer WHERE account.ID= $iduser AND account.IDTypeCustomer=kindcustomer.ID";
        return   $this->getIDContent($sql);
    }
    public function setAccount($img, $fname, $sex, $add, $nPhone, $account, $pass)
    {
        $idps = $_SESSION['user_id'];
        $imgL = $this->getIDContent("SELECT Image from account where ID =$idps");
        
        if ($img == '') {
            $sql = "UPDATE account
                SET User = '$account', FullName ='$fname' , Address= '$add', NumberPhone= '$nPhone',Sex= $sex
                WHERE ID = $idps";
        } else {
            if ($imgL != '')
                if($img!=$imgL)
                    $this->RemoveImgA($imgL);
            $sql = "UPDATE account
                SET User = '$account', FullName ='$fname' , Address= '$add', NumberPhone= '$nPhone',Sex= $sex, Image ='$img'
                WHERE ID = $idps";
        }


        if ($this->Execute($sql))
            echo "Cập nhật thành công!";
    }
    public function setPass($pass){
        $idps = $_SESSION['user_id'];
        $sql = "UPDATE account
            SET Pass = '$pass'  WHERE ID = $idps";
         if ($this->Execute($sql))
         echo "Cập nhật thành công!";
    }
    public function RemoveImgA($img)
    {
        $path = "/Public/images/AnhDaiDien/$img";
        if (is_file($path)) {
            unlink($path);
        }
    }
}
