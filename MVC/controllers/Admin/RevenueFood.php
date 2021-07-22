<?php
class RevenueFood extends Controller{
    function __construct(){
         
    }
    public function index(){
        $this->viewAdmin("RevenueFoodView",[
                
        ]);
    }
}