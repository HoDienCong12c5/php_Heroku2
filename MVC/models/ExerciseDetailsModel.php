<?php
    class ExerciseDetailsModel extends DB{
         public function getExercise($id=''){
            $sql= "SELECT * FROM ListWork WHERE ID=$id";
            return $this->getData($sql);
        }
        public function addExercise($id){
             
            $idPersion= $_SESSION['user_id'];
            $arr = $this->getExercise($id);
            $arr=mysqli_fetch_array($arr);
            $ID=$arr[0]; 
            $Price=$arr[4]; $Time=$arr[5]; 
            $dateBegin=date('m/d/Y');
            $newdate = strtotime ( '+'.$Time.' month' , strtotime ( $dateBegin ) ) ;
            $dateEnd = date ( 'd/m/Y' , $newdate );
            $dateBegin=date('d/m/Y');
             
            if($this->check($idPersion,$ID)==1){
                $sql= "INSERT INTO listregistration (IDPersion, IDWork, DateBegin, DateEnd, Total, Status) VALUES ($idPersion, $ID, '$dateBegin', '$dateEnd', $Price,0)";
                $this->Execute($sql);
                return 1;
            }
            else{
                return 0;
            }
            
        }
        public function getFood(){
            $sql="SELECT * FROM food";
            return $this->getData($sql);
        }
        public function getIDFood($id=''){
            $sql= "select * from food where ID=.$id";
            return $this->getData($sql);    
        }
        function check($idP,$idW){
            $sql= "SELECT DateEnd FROM listregistration WHERE IDWork=$idW and IDPersion = $idP";
            $date = $this->getIDContent($sql);
            if($date==-1){
                return 1;
            }
            else{
                $dateNow=date('d/m/Y');
                if(strtotime($dateNow)>strtotime($date)){
                    return 1;
                }
                else{
                    return 0;
                }
            }
           
        }
    }
?>