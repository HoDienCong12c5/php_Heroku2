<?php
class Controller
{
    public static $dP = 10;
    public function model($modelName)
    {
        //thiếu kiểm tra
        require_once "MVC/models/" . $modelName . ".php";
        return new $modelName;
    }

    public function EditImgFood($img)
    {
        $path = "Public/images/AnhSanPham/$img";
        if (is_file($path) == true) {
        } else {
            move_uploaded_file($_FILES['img']['tmp_name'], $path);
        }
    }

    public function EditImgE($img)
    {
        $path = "Public/images/AnhBaiTap/$img";
        if (is_file($path) == true) {
        } else {
            move_uploaded_file($_FILES['img']['tmp_name'], $path);
        }
    }
    public function RemoveImgA($img)
    {
        $path = "Public/images/AnhDaiDien/$img";
        if (is_file($path)) {
            unlink($path);
        }
    }
    public function EditImgA($img)
    {
        $path = "Public/images/AnhDaiDien/$img";
        if (is_file($path) == true) {
        } else {
            move_uploaded_file($_FILES['img']['tmp_name'], $path);
        }
    }
    public function EditImgD($img)
    {
        $path = "Public/images/ThietBiAdmin/$img";
        if (is_file($path) == true) {
        } else {
            move_uploaded_file($_FILES['img']['tmp_name'], $path);
        }
    }
    public function view($viewName, $data = [])
    {   //edit 
        require_once "MVC/views/". $viewName . ".php";
    }
    public function viewAdmin($viewName, $data = [])
    {
        require_once "MVC/views/Admin/" . $viewName . ".php";
    }
    public function viewCustomer($viewName, $data = [])
    {
        require_once "MVC/views/Customers/" . $viewName . ".php";
    }
    public function viewMasterPage($viewName, $data = [])
    {
        require_once "MVC/views/MasterPage/" . $viewName . ".php";
    }
    public function modelAdmin($modelName)
    {
        //thiếu kiểm tra
        require_once "MVC/models/Admin/" . $modelName . ".php";
        return new $modelName;
    }
    public function modelCustomer($modelName)
    {
        //thiếu kiểm tra
        require_once "MVC/models/Customers/" . $modelName . ".php";
        return new $modelName;
    }
    function currency_format($number, $suffix = 'VND')
    {
        if (!empty($number)) {
            return number_format($number, 0, ',', '.') . "{$suffix}";
        }
    }
}
