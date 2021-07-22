<?php
class Login extends Controller
{
    public function __construct()
    {
        require_once("MVC/models/LoginModel.php");
        $this->model = new LoginModel();
    }
    public function index()
    {
        $this->view("LoginView");
    }
    public function Check()
    {
        $account = $_POST['account'];
        $pass = $_POST['password'];
        $temp = $this->model("LoginModel");
        $sql = $temp->getIDAcount($account, $pass);
        if( $sql==-1)
            echo -1;
        if($sql==0) 
            echo $sql;
        if($sql==1) 
            echo $sql;
    }
    public function SignOut()
    {
        session_destroy();
        header("location: /");
    }
}
