<?php
    class RegitsterModel extends DB{
        function add($account,$email,$password,$fullname){
            if($this->CheckEmail($email)==1){
                $date=date('d/m/Y');
                $sql="INSERT INTO Account Values(NULL,'$account','$password','$fullname','','','$email','',0,1,0,'$date',0)";
                if($this->Execute($sql))
                    return 1;
                else
                    return 0;
            }
            return -1;
            
        }
        function CheckEmail($email){
            $sql="SELECT Email from Account where Email='$email' ";
            if($this->CheckCountRow($sql) >0)
                return 0;
            return 1;
        }
    }
?>