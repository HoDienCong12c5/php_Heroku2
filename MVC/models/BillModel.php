<?php
class BillModel extends DB
{
    public function getDSBT()
    {
        $idpersion = $_SESSION['user_id'];
        $sql = "SELECT listregistration.ID, listwork.NameWork, listwork.Price, listregistration.DateBegin, listregistration.DateEnd, listwork.IDDevice, listwork.Price FROM listregistration, listwork WHERE listregistration.IDPersion=$idpersion AND listregistration.IDWork=listwork.ID and listregistration.Status=1";
        return $this->getData($sql);
    }
    public function getDSTP()
    {
        $idpersion = $_SESSION['user_id'];
        $sql = "SELECT b.ID, b.TotalMoney,b.BuyDate FROM  billfood b WHERE b.IDPersion=$idpersion";
        return $this->getData($sql);
    }
    public function CheckDate($dN)
    {
        $d = date('d-m-Y');
        if (strtotime($d) == strtotime($dN))
            return 1;
        return 0;
    } 
    public function SFood($idNgay)
    {
        $data = $this->getDSTP();
        $i = 0;
        if ($idNgay == 0) {
            while ($arr2 = mysqli_fetch_array($data)) {
                if ($this->CheckDate($arr2[2]) == 1) {
                    $money = $this->currency_format($arr2[1]);
                    echo "<tr>
                                <td id='$i'> $arr2[0]</td>
                                <td style='text-align: right;'>$money</td>
                                <td> $arr2[2] </td>
                                <td> <button data-bs-toggle='modal' data-bs-target='#detailtFood' class='btn btn-outline-success'><a  href='javascript:Detailt( $arr2[0], $i)'  > Chi tiết <i class='far fa-edit'></i></a> </td></button>
                            </tr>";
                    $i++;
                }
            }
        } else {
            if ($idNgay == 1) {
                while ($arr2 = mysqli_fetch_array($data)) {
                    if ($this->CheckMonth($arr2[2]) == 1) {
                        $col = $i % 2 == 0 ? '' : '#f7f7de';
                        $money = $this->currency_format($arr2[1]);
                        echo "<tr>
                                <td id='$i'> $arr2[0]</td>
                                <td style='text-align: right;'>$money</td>
                                <td> $arr2[2] </td>
                                <td> <button data-bs-toggle='modal' data-bs-target='#detailtFood' class='btn btn-outline-success'><a  href='javascript:Detailt( $arr2[0], $i)'  > Chi tiết <i class='far fa-edit'></i></a> </td></button>
                            </tr>";
                        $i++;
                    }
                }
            } else {
                while ($arr2 = mysqli_fetch_array($data)) {
                    $col = $i % 2 == 0 ? '' : '#f7f7de';
                    $money = $this->currency_format($arr2[1]);
                    echo "<tr>
                            <td id='$i'> $arr2[0]</td>
                            <td style='text-align: right;'>$money</td>
                            <td> $arr2[2] </td>
                            <td> <button data-bs-toggle='modal' data-bs-target='#detailtFood' class='btn btn-outline-success'><a  href='javascript:Detailt( $arr2[0], $i)'  > Chi tiết <i class='far fa-edit'></i></a> </td></button>
                        </tr>";
                    $i++;
                }
            }
        }
    }
    public function SExersie($idNgay)
    {
        $e = $this->getDSBT();
        $i = 0;
        if ($idNgay == 0) {
            while ($arr1 = mysqli_fetch_array($e)) { 
                if ($this->CheckDate($arr1[3]) == 1) {
                    $col = $i % 2 == 0 ? '' : '#f7f7de';
                    $total = $this->currency_format($arr1[6]);
                    echo "<tr style='$col'>
                                <td> $arr1[0] </td>
                                <td> $arr1[1] </td>
                                <td> $arr1[2]</td>
                                <td> $arr1[3]</td>
                                <td> $arr1[4] </td>
                                <td> $arr1[5] </td>
                                <td>$total</td>
                            </tr>";
                    $i++;
                }
            }
        } else {
            if ($idNgay == 1) {
                while ($arr1 = mysqli_fetch_array($e)) {  
                    if ($this->CheckMonth($arr1[3]) == 1) {
                        $col = $i % 2 == 0 ? '' : '#f7f7de';
                        $total = $this->currency_format($arr1[6]);
                        echo "<tr style='$col'>
                                    <td> $arr1[0] </td>
                                    <td> $arr1[1] </td>
                                    <td> $arr1[2]</td>
                                    <td> $arr1[3]</td>
                                    <td> $arr1[4] </td>
                                    <td> $arr1[5] </td>
                                    <td>$total</td>
                                </tr>";
                        $i++;
                    }
                }
            } else {
                while ($arr1 = mysqli_fetch_array($e)) {
                    $col = $i % 2 == 0 ? '' : '#f7f7de';
                    $total = $this->currency_format($arr1[6]);
                    echo "<tr style='$col'>
                                <td> $arr1[0] </td>
                                <td> $arr1[1] </td>
                                <td> $arr1[2]</td>
                                <td> $arr1[3]</td>
                                <td> $arr1[4] </td>
                                <td> $arr1[5] </td>
                                <td>$total</td>
                            </tr>";
                    $i++;
                }
            }
        }
    }

    public function Detailt($idHD)
    {
        $sql = "SELECT hoadonchitiet.IDFood, food.Name, kindfood.Category ,hoadonchitiet.Amount,hoadonchitiet.Price  from billfood, hoadonchitiet, food, kindfood WHERE food.ID= hoadonchitiet.IDFood and hoadonchitiet.IDBillFood= billfood.ID and  food.IDType=kindfood.ID and billfood.ID=$idHD";
        return $this->getData($sql);
    }
}
