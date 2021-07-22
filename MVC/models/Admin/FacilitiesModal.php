<?php
    class FacilitiesModal extends DB{
        public function AllDL(){
            $sql= "SELECT * FROM device";
            return $this->getData($sql);
        }
    }
?>