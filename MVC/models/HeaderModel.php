<?php
    class HeaderModel extends DB{
        function getDanhMuc(){

        }
        function getDanhMucCon($type){
            if($type=='dsbt'){
                $sql = "select ID,NameWork from ListWork";
            }
            if($type=='dstp'){
                $sql = "select ID,Name from Food";
            }
            return $this->getData($sql);
        }
    }
?>