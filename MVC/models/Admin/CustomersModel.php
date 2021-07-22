<?php
class CustomersModel extends DB
{
    public function getAll()
    {
        $sql = "SELECT a.ID,a.FullName,a.User,a.Pass,a.Email,a.NumberPhone,a.SavePonit,a.DateRegistrate from account a WHERE a.IDWork =0";
        return $this->getData($sql);
    }
    public function getList()
    {
        $sql = "SELECT a.ID,a.FullName,a.User,a.Pass,a.Email,a.NumberPhone,a.SavePonit,a.DateRegistrate from account a WHERE a.IDWork =0";
        return $this->getAllData($sql);
    }
    public function SearchID($id)
    {
        $sql = "SELECT a.ID,a.FullName,a.User,a.Pass,a.Email,a.NumberPhone,a.SavePonit,a.DateRegistrate from account a WHERE a.ID=$id";
        return $this->getData($sql);
    }
    public function SearchName($name)
    {
        $sql = "SELECT a.ID,a.FullName,a.User,a.Pass,a.Email,a.NumberPhone,a.SavePonit,a.DateRegistrate from account a WHERE a.IDWork =0 and  a.FullName like '%$name%'";
        $data =$this->getData($sql);
        $i = 0;
        while ($r = mysqli_fetch_array($data)) {
            $coler = $i % 2 == 0 ? 'antiquewhite' : '';
            echo " <tr class='align-middle' style='background-color:$coler'>
                        <td id='id$r[0]'>$r[0]</td>
                        <td>$r[1]</td> 
                        <td>$r[2]</td>
                        <td>$r[3]</td>
                        <td>$r[4]</td>
                        <td>$r[5]</td>
                        <td>$r[6]</td>
                        <td>$r[7]</td>
                        <td>
                            <a class='text-lg text-danger' href='javascript:delete($r[0] , $i)'><i class='far fa-trash-alt'></i></a>
                        </td>
                    </tr>";
            $i++;
        }
    }
    public function Check($id){
        $dk=0;
        $sql="SELECT * from billfood WHERE billfood.IDPersion=$id ";
        if($this->CheckCountRow($sql)<1)
            $dk= 1;
        $sql="SELECT * from listregistration WHERE listregistration.IDPersion=$id";
        if($this->CheckCountRow($sql)<1)
            $dk= 1;
        return $dk;
    }
    public function Delete($id)
    {
        if($this->Check($id)==1){
            $sql = "delete from account where ID=$id";
            $this->Execute($sql);
            return 1;
        }
        return 0;
        
    }
    public function Search($idTy)
    {
        $data = $this->getAll();
        $i=0;
        if ($idTy == 0) {
            $d = date('d/m/Y');
            while ($r = mysqli_fetch_array($data)) {
                if (strtotime($d) == strtotime($r[7])) {
                    $coler = $i % 2 == 0 ? 'antiquewhite' : '';
                    echo " <tr class='align-middle' style='background-color:$coler'>
                             <td id='id$r[0]'>$r[0]</td>
                             <td>$r[1]</td> 
                             <td>$r[2]</td>
                            <td>$r[3]</td>
                            <td>$r[4]</td>
                            <td>$r[5]</td>
                            <td>$r[6]</td>
                            <td>$r[7]</td>
                            <td>
                            <a class='text-lg text-danger' href='javascript:delete($r[0] , $i)'><i class='far fa-trash-alt'></i></a>
                            </td>
                        </tr>";
                    $i++;
                }
            }
        }
        if ($idTy == 1) {
            $d = date('d/m/Y');
            while ($r = mysqli_fetch_array($data)) {
                if ($this->CheckMonth($r[7])) {
                    $coler = $i % 2 == 0 ? 'antiquewhite' : '';
                    echo " <tr class='align-middle' style='background-color:$coler'>
                             <td id='id$r[0]'>$r[0]</td>
                             <td>$r[1]</td> 
                             <td>$r[2]</td>
                            <td>$r[3]</td>
                            <td>$r[4]</td>
                            <td>$r[5]</td>
                            <td>$r[6]</td>
                            <td>$r[7]</td>
                            <td>
                            <a class='text-lg text-danger' href='javascript:delete($r[0] , $i)'><i class='far fa-trash-alt'></i></a>
                            </td>
                        </tr>";
                    $i++;
                }
            }
        }
        if ($idTy == 2) {
            $d = date('d/m/Y');
            while ($r = mysqli_fetch_array($data)) {
                $coler = $i % 2 == 0 ? 'antiquewhite' : '';
                    echo " <tr class='align-middle' style='background-color:$coler'>
                             <td id='id$r[0]'>$r[0]</td>
                             <td>$r[1]</td> 
                             <td>$r[2]</td>
                            <td>$r[3]</td>
                            <td>$r[4]</td>
                            <td>$r[5]</td>
                            <td>$r[6]</td>
                            <td>$r[7]</td>
                            <td>
                            <a class='text-lg text-danger' href='javascript:delete( $r[0], $i)'><i class='far fa-trash-alt'></i></a>
                            </td>
                        </tr>";
                    $i++;
            }
        }
    }
}
