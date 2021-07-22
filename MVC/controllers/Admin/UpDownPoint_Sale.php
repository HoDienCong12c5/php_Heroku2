<?php
    class UpDownPoint_Sale{ 
        public static function FoodPointUp(){
            $sql="SELECT Point FROM Point where ID= 1";
            $n=new DB();
            $point=$n->getIDContent($sql);
            return $point;
        }
        public static function ExercisePointUp(){
            $sql="SELECT Point FROM Point where ID= 2";
            $n=new DB();
            $point=$n->getIDContent($sql);
            return $point;
        }
        public static function PointUpFood($point){
            $sql="UPDATE Point SET Point=$point where ID=1";
            $n=new DB();
            $point=$n->Execute($sql);
        }
        public static function PointUpExercise($point){
            $sql="UPDATE Point SET Point=$point where ID=2";
            $n=new DB();
            $point=$n->Execute($sql);
        }
    }
?>