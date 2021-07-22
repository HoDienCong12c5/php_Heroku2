<?php
class CartModel extends DB
{
    public function getList()
    {
    }
    public function addBill($idFood, $amount, $price)
    {
        include_once "./MVC/models/FoodDetailModel.php";
        $data = new FoodDetailModel();
        // $data->Buy($idFood,$amount,$price);
        return "Đã thanh toán";
    }
    public function getBill()
    {
        if (isset($_SESSION['user_id'])) {
            $id = $_SESSION['user_id'];
            $sql = "select b.ID, from Account a, BillFood b, hoadonchitiet h where a.ID= b.IDPersion where b.ID=h.IDBillFood ";
            return true;
        } else {
            return false;
        }
    }
    public function getCart()
    {
        if (isset($_SESSION['card'])) {
            $arr = $_SESSION['card'];
            return $arr;
        } else
            return null;
    }

    public function Plus($line)
    {
        if (isset($_SESSION["card"])) {
            $cart = (array) $_SESSION["card"];

            for ($i = 0; $i < count($cart); $i++) {
                if ($line == $i) {
                    $cart[$i][3]++;
                }
            }
            $_SESSION["card"] = $cart;
        }
    }
    public function Down($line)
    {
        if (isset($_SESSION["card"])) {

            $cart = (array) $_SESSION["card"];

            for ($i = 0; $i < count($cart); $i++) {
                if ($line == $i) {
                    $cart[$i][3]--;
                }
            }
            $_SESSION["card"] = $cart;
        }
    }
    public function getSoLuong($id, $sl, $name)
    {
        $sql = "select Amount from Food where ID=$id ";
        $amount = $this->getIDContent($sql);
        $sql = "select Sold from Food where ID=$id ";
        $sold = $this->getIDContent($sql);
        if (($amount - $sold) < 1) {
            echo "<div>Shop tạm thời $name, bạn không thể mua</div>";
            return -1;
        } else {
            if ($amount < ($sold + $sl)) {
                $x = $amount - $sold;
                echo "<div>Bạn chỉ có thể mua $name tối đa $x </div>";

                return -1;
            }
            return 1;
        }
    }
    public function InsertBillDetail($idF, $amount, $price)
    {
        $idBF = $this->getIDContent("select MAX(ID) from BillFood");
        $sql = "INSERT INTO hoadonchitiet values(NULL,$idBF,$idF,$price,$amount)";

        $this->UpdateBillDetail($idF, $amount);
        $this->Execute($sql);
    }
    function UpdateBillDetail($id, $sl)
    {
        $sql = "update Food set Sold=Sold+$sl where ID=$id";
        $this->Execute($sql);
    }
    public function AddBillDetail($data)
    {
        for ($i = 0; $i < count($data); $i++) {
            $this->InsertBillDetail($data[$i][0], $data[$i][3], $data[$i][4]);
            $this->UpPointFood($_SESSION['user_id']);
        }
    }
    public function InsertBillF()
    {
        $date = Date('d-m-Y');
        $sum = 0;
        $amount = 0;
        if (isset($_SESSION["card"])) {
            $idPersion = $_SESSION['user_id'];
            foreach ($_SESSION["card"] as $i) {
                $sum += $i[3] * $i[4];
                $amount += $i[3];
            }
            $sum=$sum -$sum*$_SESSION['discount_user']/100;
            $sql1 = "insert into BillFood values(NULL,$idPersion,$sum,'$date')";
            $this->Execute($sql1);
        } else
            echo "<div class='msg'>Chưa đặt mua không thể thanh toán</div>";
    }
    public function Pay()
    {
        $arr = (array)$_SESSION['card'];
        $dk = 0;
        for ($i = 0; $i < count($arr); $i++) {
            if ($this->getSoLuong($arr[$i][0], $arr[$i][3], $arr[$i][2]) == -1) {
                $dk = 1;
            }
        }
        if ($dk == 1) {
            echo "<div class='msg'>Thanh toán thất bại</div>";
        } else {
            $this->InsertBillF();
            $this->AddBillDetail($arr);
            $_SESSION['card'] = null;
            $idP=$_SESSION['user_id'];
            $sql = "SELECT k.Discount from account a, kindcustomer k where a.IDTypeCustomer=k.ID and a.ID=$idP";
            $_SESSION['discount_user'] = $this->getIDContent($sql);
        }
    }
}
