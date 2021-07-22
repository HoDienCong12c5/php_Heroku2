<?php
class FoodDetail extends Controller
{
    function __construct()
    {
        require_once("MVC/models/FoodDetailModel.php");
        $this->model = new FoodDetailModel();
    }
    public function index()
    {
        if (isset($_GET['idFood'])) {
            $_SESSION['food_id'] = $_GET['idFood'];

            $food = $this->model("FoodDetailModel");
            $this->view('FoodDetailView', [
                "data" => $food->getFood($_GET['idFood']),
                "remaining" => $food->getAmount($_GET['idFood']),
                "discount" => isset($_SESSION['discount_user'])?$_SESSION['discount_user']:0,
                "lfood" => $food->getLfood()
            ]);
        } else {
            if (isset($_SESSION['food_id'])) {
                $food = $this->model("FoodDetailModel");
                $this->view('FoodDetailView', [
                    "data" => $food->getFood($_GET['idFood']),
                    "remaining" => $food->getAmount($_GET['idFood']),
                    "discount" => isset($_SESSION['discount_user'])?$_SESSION['discount_user']:0,
                    "lfood" => $food->getLfood()
                ]);
            }
        }
    }
    public function Submit()
    {
        $idFood = $_POST["idFood"];
        $price = $_POST["price"];
        $amount = $_POST["amount"];
        $food = $this->model("FoodDetailModel");
        $kq = $food->Buy($idFood, $amount, $price);
        if ($kq == 2)
            echo "Hoàn thành thanh toán";
        if ($kq == 1)
            echo "số lượng đặt mua lớn hơn số lượng có";
        if ($kq == 0)
            echo "Bạn chưa đăng nhập";
    }
    public function AddCart()
    {
        $idFood = $_POST["idFood"];
        $price = $_POST["price"];
        $amount = $_POST["amount"];

        $food = $this->model("FoodDetailModel");
        if ($food->AddCart($idFood, $amount, $price))
            echo "Đặt hàng thành công";
        else
            echo "Bạn phải đăng nhập trước đã";
    }
}
