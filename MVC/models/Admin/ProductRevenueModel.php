<?php
class ProductRevenueModel extends DB
{
    public function getBILLTP()
    {
        $sql = "SELECT billfood.ID, account.ID, account.FullName, billfood.TotalMoney, billfood.BuyDate FROM billfood, account WHERE billfood.IDPersion=account.ID";
        return $this->getData($sql);
    }
    public function getChitiet($id)
    {
        $sql = "SELECT food.id,food.Name,hoadonchitiet.Price,hoadonchitiet.Amount from  hoadonchitiet ,billfood, food WHERE hoadonchitiet.IDBillFood=billfood.ID  and billfood.id=$id and food.id=hoadonchitiet.IDFood";
        return $this->getData($sql);
    }
    public function ChartR()
    {
        $dt = $this->getBILLTP();
        $i=0;
        $s=0;
        while ($r = mysqli_fetch_array($dt)) { 
            $arr[$i]=$r;
            $i++; 
        }
        $arrRe=array();
        for($i=1; $i < 13; $i++ ){
            for($j=0 ; $j < count($arr) ; $j++){
                $date=$arr[$j][4];
                if($this->CheckYear($date)==1){ 
                    if($this->CheckM($date,$i)==1){
                        $s+=$arr[$j][3];  
                    }
                }
            } 
            array_push($arrRe,$s);
            $s=0;
        }
        return json_encode($arrRe);
    }
    public function CheckM($date, $month)
    {
        $m = substr($date, 3, 2);
        if ($m == $month)
            return 1;
        return 0;
    }
}
