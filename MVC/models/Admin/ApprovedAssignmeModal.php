<?php
    class ApprovedAssignmeModal extends DB{
        public function getChuaDuyet(){
            $sql="SELECT listregistration.ID, account.FullName, listwork.NameWork,listregistration.Total, listregistration.DateBegin, listregistration.DateEnd, listregistration.Status FROM listregistration, account, listwork WHERE listregistration.IDPersion=account.ID AND listwork.ID=listregistration.IDWork AND listregistration.Status=0" ;
            return $this->getData($sql);
        }
        public function getDaDuyet(){
            $sql="SELECT listregistration.ID, account.FullName, listwork.NameWork,listregistration.Total, listregistration.DateBegin, listregistration.DateEnd, listregistration.Status FROM listregistration, account, listwork WHERE listregistration.IDPersion=account.ID AND listwork.ID=listregistration.IDWork AND listregistration.Status=1" ;
            return $this->getData($sql);
        }
    }
?>