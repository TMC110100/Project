<?php
class Test extends Controller{
    public $UserModel;
    public $BanTinModel;

    public function __construct(){
        //Model
        $this->UserModel = $this->model("UserModel");
        $this->BanTinModel = $this->model("BanTinModel");
    }
    
    function Sayhi(){
        $this->view("test",[
        "sv"=>$this->BanTinModel->loaibantin() 
        ]);
    }
}
?>