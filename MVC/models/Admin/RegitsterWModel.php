<?php

    class RegitsterWModel extends DB{
        function getList(){
            $sql="SELECT w.ID,w.IDPersion,w.IDWork,w.DateBegin,w.DateEnd,w.Total,l.NameWork from listwork l, listregistration w WHERE l.ID=w.IDWork and w.Status=0 ";
            return $this->getData($sql);
        }
        public function SoSanh($dN,$dData){ 
            return (strtotime($dN) <=strtotime($dData)) ? 1 : 0;
        }
        function currency_format($number, $suffix = '  VNĐ') {
            if (!empty($number)) {
                return number_format($number, 0, ',', '.') . "{$suffix}";
            }
        } 
        function Search($dN){
            $d=$this->getList();
            $i=0;
            if($dN==1){
                $date= date('d/m/Y');
                while($r=mysqli_fetch_array($d)){
                    if(strtotime($date)== strtotime($r[3])){
                        $money=$this->currency_format($r[5]);
                        $c=$i%2==0 ?'antiquewhite':'';
                        echo " <tr class='align-middle'style='background-color: $c;' >
                                <td>
                                    $r[0]
                                    <div id='$i'></div>
                                </td>
                                <td >$r[1]</td>
                                <td><div id='d$i'>$r[2]</div></td>
                                <td>$r[6]</td>
                                <td> $money</td>
                                <td >$r[3] </td>
                                <td>
                                    $r[4]
                                </td> 
                                <td><a class='me-3 text-lg text-success' href='javascript:duyet($i,$r[0])'><i class='far fa-edit'>Duyệt</i></a>
                                </td>
                            </tr>";
                            $i++;
                    }  
                } 
            }
            if($dN==2){
                $date = date('Y-m-j');
                $newdate = strtotime ( '- 7 day' , strtotime ( $date ) ) ;
                $newdate = date ( 'd/m/Y' , $newdate );
                while($r=mysqli_fetch_array($d)){
                    if($this->SoSanh($newdate, $r[3])==1){
                        
                        $money=$this->currency_format($r[5]);
                        $c=$i%2==0 ?'antiquewhite':'';
                        echo " <tr class='align-middle'style='background-color: $c;' >
                                <td>
                                    $r[0]
                                    <div id='$i'></div>
                                </td>
                                <td >$r[1]</td>
                                <td><div id='d$i'>$r[2]</div></td>
                                <td>$r[6]</td>
                                <td> $money</td>
                                <td >$r[3] </td>
                                <td>
                                    $r[4]
                                </td> 
                                <td><a class='me-3 text-lg text-success' href='javascript:duyet($i,$r[0])'><i class='far fa-edit'>Duyệt</i></a>
                                </td>
                            </tr>";
                            $i++;
                    } 
                }

            }
            if($dN==3){
                $date = date('Y-m-j');
                while($r=mysqli_fetch_array($d)){
                    if($this->CheckMonth($r[3])==1){
                        $money=$this->currency_format($r[5]);
                        $c=$i%2==0 ?'antiquewhite':'';
                        echo " <tr class='align-middle'style='background-color: $c;' >
                                <td>
                                    $r[0]
                                    <div id='$i'></div>
                                </td>
                                <td >$r[1]</td>
                                <td><div id='d$i'>$r[2]</div></td>
                                <td>$r[6]</td>
                                <td> $money</td>
                                <td >$r[3] </td>
                                <td>
                                    $r[4]
                                </td> 
                                <td><a class='me-3 text-lg text-success' href='javascript:duyet($i,$r[0])'><i class='far fa-edit'>Duyệt</i></a>
                                </td>
                            </tr>";
                            $i++;
                    }
                }
            } 
            if($dN==0){
                while($r=mysqli_fetch_array($d)){
                    $money=$this->currency_format($r[5]);
                        $c=$i%2==0 ?'antiquewhite':'';
                        echo " <tr class='align-middle'style='background-color: $c;' >
                                <td>
                                    $r[0]
                                    <div id='$i'></div>
                                </td>
                                <td >$r[1]</td>
                                <td><div id='d$i'>$r[2]</div></td>
                                <td>$r[6]</td>
                                <td> $money</td>
                                <td >$r[3] </td>
                                <td>
                                    $r[4]
                                </td> 
                                <td><a class='me-3 text-lg text-success' href='javascript:duyet($i,$r[0])'><i class='far fa-edit'>Duyệt</i></a>
                                </td>
                            </tr>";
                            $i++;
                }
            }
        }
        public function getTime($idW)
        {
            $sql="select Time from listwork  where ID =$idW";
            return $this->getIDContent($sql);
        }
        function getIDPer($idLR){
            $sql="SELECT l.IDPersion from listregistration l where l.ID=$idLR";
            return $this->getIDContent($sql);
        }
        function Submit($id,$idW){
            $Time=$this->getTime($idW);

            $dBegin= date('d/m/Y');
            $newdate = strtotime ( '+'.$Time.' month' , strtotime ( $dBegin ) ) ;
            $dEnd=date ('d/m/Y' , $newdate );
            
            $sql="update listregistration l set l.Status=1,l.DateBegin='$dBegin' , l.DateEnd='$dEnd' where l.ID=$id ";

            $this->Execute($sql);

            $sql="UPDATE listwork set listwork.Subscribe=listwork.Subscribe+1 WHERE ID=$idW";

            $this->Execute($sql); 
            $sql="SELECT l.IDPersion from listregistration l WHERE l.ID=$id";
            $idP=$this->getIDContent($sql);
            $this->UpPointExercise($idP);
            echo "Duyệt thành công và ngày bắt đầu tính là :"; 
            echo $dBegin;
        }
    }
?>
