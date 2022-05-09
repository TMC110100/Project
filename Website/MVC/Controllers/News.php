<?php
class News extends Controller{
    public $UserModel;
    public $BanTinModel;

    public function __construct(){
        //Model
        $this->UserModel = $this->model("UserModel");
        $this->BanTinModel = $this->model("BanTinModel");
    }
    function SayHi(){
        
        //Model
        $BT=$this->BanTinModel;
        $tin=$this->BanTinModel;
        
        //View
        $this->view("Home",[
            "page"=>"News",
            "catogory"=>$BT->loaibantin(),
            "tin"=>$tin->AllBantin()
        ]);
    }
    
}
?>