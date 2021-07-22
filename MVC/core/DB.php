<?php
class DB
{
    public $con;
    //mysql://b92a41fcac2802:77e581b8@us-cdbr-east-04.cleardb.com/heroku_a92ca5b5f558dcd?reconnect=true
    //sererold: localhost
    protected $server = "localhost";
    protected $username  = "root";
    protected $password = "";
    protected $dbname = "quanlyphonggym";
    function __construct()
    {
        $this->con = mysqli_connect(
            $this->server,
            $this->username,
            $this->password
        );
        mysqli_select_db(
            $this->con,
            $this->dbname
        );
        mysqli_query($this->con, "SET NAME 'utf8'");
    }
    public function getAllData($sql)
    {
        $kq = mysqli_query($this->con, $sql);
        return json_decode($kq);
    }
    public function CheckCountRow($SQL)
    {
        $kq = mysqli_query($this->con, $SQL);
        if ($kq)
            return mysqli_num_rows($kq);
        else
            return 0;
    }
    function Execute($sql)
    {
        return json_encode(mysqli_query($this->con, $sql));
    }
    public function getData($sql)
    {
        $kq = mysqli_query($this->con, $sql);
        $r = array();
        while ($qr = mysqli_fetch_array($kq)) {
            $r[] = $qr;
        }
        return mysqli_query($this->con, $sql);;
    }
    public function getIDContent($sql)
    {
        $kq = mysqli_query($this->con, $sql);

        $id = mysqli_fetch_array($kq);
        if ($id)
            return $id[0];
        else
            return -1;
    }
    public function UpPointFood($idP)
    {
        $value = UpDownPoint_Sale::FoodPointUp();
        $sql = "update Account set SavePonit=SavePonit+$value where ID=$idP";
        mysqli_query($this->con, $sql);
        $point = $this->getIDContent("SELECT SavePonit FROM account where ID=$idP ");
        if ($point >= 100) {
            if ($point >= 250) {
                if ($point >= 500) {
                    $sql = "update account set IDTypeCustomer=4 where ID=$idP";
                    mysqli_query($this->con, $sql);
                } else {
                    $sql = "update account set IDTypeCustomer=3 where ID=$idP";
                    mysqli_query($this->con, $sql);
                }
            } else {
                $sql = "update account set IDTypeCustomer=2 where ID=$idP";
                mysqli_query($this->con, $sql);
            }
        }
        
    }
    public function CheckLogin($user,$pass){
        $user = isset($user)?(string)$user:false;
        $user=$this->con->real_escape_string($user);
        
        $pass = isset($pass)?(string)$pass:false;
        $pass=$this->con->real_escape_string($pass);  
        $sql ="select ID,IDTypeCustomer  from Account where User='$user' and Pass='$pass'"; 
        if($this->CheckCountRow($sql) > 0)
            return 1;
        return 0;

    }
    public function UpPointExercise($idP)
    {
        $value = UpDownPoint_Sale::ExercisePointUp();
        $sql = "update Account set SavePonit=SavePonit+$value where ID=$idP";
        mysqli_query($this->con, $sql);
        $point = $this->getIDContent("SELECT SavePonit FROM account where ID=$idP ");
        if ($point >= 100) {
            if ($point >= 250) {
                if ($point >= 500) {
                    $sql = "update account set IDTypeCustomer=4 where ID=$idP";
                    mysqli_query($this->con, $sql);
                } else {
                    $sql = "update account set IDTypeCustomer=3 where ID=$idP";
                    mysqli_query($this->con, $sql);
                }
            } else {
                $sql = "update account set IDTypeCustomer=2 where ID=$idP";
                mysqli_query($this->con, $sql);
            }
        }
        $sql = "SELECT k.Discount from account a, kindcustomer k where a.IDTypeCustomer=k.ID and a.ID=$idP";
        $_SESSION['discount_user'] = $this->getIDContent($sql);
    }
    function currency_format($number, $suffix = 'VND')
    {
        if (!empty($number)) {
            return number_format($number, 0, ',', '.') . "{$suffix}";
        }
    }
    public function CheckMonth($idNgay)
    {
        $d = getdate();
        $m = substr($idNgay, 3, 2);
        if ($m == $d['mon'])
            return 1;
        return 0;
    }
    public function CheckYear($idNgay)
    {
        $d = getdate();
        $m = substr($idNgay, 6, 4);
        if ($m == $d['year'])
            return 1;
        return 0;
    }
}
