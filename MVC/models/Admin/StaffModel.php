<?php
    class StaffModel extends DB{
        function getStaff(){
            $sql="SELECT a.ID,a.FullName,p.Name,a.Email,a.NumberPhone,a.Sex,p.Salary,a.DateRegistrate,p.ID FROM account a, parttype p WHERE a.IDWork <>0 and p.ID=a.IDWork";
            return $this->getData($sql);
        }
        function Delete($id){
            $sql="DELETE from Account where ID=$id";
            $this->Execute($sql);
        }
        function SearchName($name){
            $sql="SELECT a.ID,a.FullName,p.Name,a.Email,a.NumberPhone,a.Sex,p.Salary,a.DateRegistrate,p.ID  FROM account a, parttype p WHERE a.IDWork <>0 and p.ID=a.IDWork and  a.FullName like '%$name%'";
            return $this->getData($sql);
        }
        function SearchID($id){
            $sql="SELECT a.ID,a.FullName,p.Name,a.Email,a.NumberPhone,a.Sex,p.Salary,a.DateRegistrate,p.ID  FROM account a, parttype p WHERE a.IDWork <>0 and p.ID=a.IDWork and a.ID=$id";
            return $this->getData($sql);
        }
        function SearchIDW($id){
            if($id==-1)
                $this->getStaff();
            else{
                $sql="SELECT a.ID,a.FullName,p.Name,a.Email,a.NumberPhone,a.Sex,p.Salary,a.DateRegistrate,p.ID FROM account a, parttype p WHERE a.IDWork <>0 and p.ID=a.IDWork and a.IDWork=$id";
                return $this->getData($sql);
            }
            
        }
        function Update($idP,$idW){
            $sql="UPDATE account set IDWork=$idW WHERE ID=$idP ";
            $this->Execute($sql);
        }
        function IDPartTime($idP){
            $sql="select IDWork from account where ID=$idP";
            return $this->getIDContent($sql);
        }
        function getSalary($idW){
            $sql="select Salary from parttype where ID=$idW";
            return $this->getIDContent($sql);
        }
        function PartTime(){
            $sql="SELECT * from parttype";
            return $this->getData($sql);
        }
    }
?>