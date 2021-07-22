<?php
class ExerciseRevenueModel extends DB
{
    public function getDSBT()
    {
        $sql = "SELECT listregistration.ID, account.FullName, listwork.NameWork,listregistration.Total, listregistration.DateBegin, listregistration.DateEnd, listregistration.Status FROM listregistration, account, listwork WHERE listregistration.IDPersion=account.ID AND listwork.ID=listregistration.IDWork and listregistration.Status=1";
        return $this->getData($sql);
    }
    public function showDuyet()
    {
        $sql = "SELECT listregistration.ID, account.FullName, listwork.NameWork,listregistration.Total, listregistration.DateBegin, listregistration.DateEnd, listregistration.Status FROM listregistration, account, listwork WHERE listregistration.IDPersion=account.ID AND listwork.ID=listregistration.IDWork AND listregistration.Status=1";
        return $this->getData($sql);
    }
    public function showChuaDuyet()
    {
        $sql = "SELECT listregistration.ID, account.FullName, listwork.NameWork,listregistration.Total, listregistration.DateBegin, listregistration.DateEnd, listregistration.Status FROM listregistration, account, listwork WHERE listregistration.IDPersion=account.ID AND listwork.ID=listregistration.IDWork AND listregistration.Status=0";
        return $this->getData($sql);
    }
    public function CheckM($date, $month)
    {
        $m = substr($date, 3, 2);
        if ($m == $month)
            return 1;
        return 0;
    }

    public function ChartR()
    {
        $dt = $this->getDSBT();
        $i = 0;
        $s = 0;
        while ($r = mysqli_fetch_array($dt)) {
            $arr[$i] = $r;
            $i++;
        }
        $arrRe = array();
        for ($i = 1; $i < 13; $i++) {
            for ($j = 0; $j < count($arr); $j++) {
                $date = $arr[$j][4];
                if ($this->CheckYear($date) == 1) {
                    if ($this->CheckM($date, $i) == 1) {
                        $s += $arr[$j][3];
                    }
                }
            }
            array_push($arrRe, $s);
            $s = 0;
        }
        return json_encode($arrRe);
    }
}
