<?php
class Home extends Controller{
    public $UserModel;
    public $BanTinModel;

    public function __construct(){
        //Model
        $this->UserModel = $this->model("UserModel");
        $this->BanTinModel = $this->model("BanTinModel");
    }
    public function SayHi(){
        
        //Model
        $BT=$this->BanTinModel;
        //View
        $this->view("Home",[
            "page"=>"News",
            "catogory"=>$BT->loaibantin(),
            "tin"=>$BT->AllBantin()
        ]);
    }
    public function BanTin(){
        //Model
        $BT=$this->BanTinModel;
       
        //View
        $this->view("Home",[
            "page"=>"BanTin",
            "catogory"=>$BT->loaibantin(),
            "tin"=>$BT->bantin(),
            "loaiBT"=>$BT->loaiBT()
        ]);
    }

    public function detailsBT(){
        //Model
        $BT=$this->BanTinModel;
        //View
        $this->view("Home",[
            "page"=>"Details",
            "catogory"=>$BT->loaibantin(),
            "detailsBT"=>$BT->ShowDetailsBT(),
            "comment"=>$BT->ShowComment()
        ]);
    }
    public function Comment(){
        if(isset($_POST["btnComment"])){
            if($_POST["ndComment"]==''){
                echo '<script language="javascript">';
                echo 'alert("Vui lòng không để trống bình luận!!!")';
                echo '</script>';

                // Refresh lại page SignUp
                echo '<script language="Javascript">';
                echo 'window.location="DetailsBT?id='.$_POST["idBT"].'"';
                echo '</script>';
                return false;
            }
            $ndComment=$_POST["ndComment"];
            $idBT=$_POST["idBT"];
            $idUser=$_POST["idUser"];

            $InsertComment=$this->BanTinModel->InsertComment($idBT,$idUser,$ndComment);
            if($InsertComment==true){
                echo '<script language="javascript">';
                echo 'alert("Bình luận thành công.")';
                echo '</script>';

                // Refresh lại page SignUp
                echo '<script language="Javascript">';
                echo 'window.location="DetailsBT?id='.$_POST["idBT"].'"';
                echo '</script>';
            }else{
                echo '<script language="javascript">';
                echo 'alert("Bình luận thất bại.")';
                echo '</script>';

                // Refresh lại page SignUp
                echo '<script language="Javascript">';
                echo 'window.location="DetailsBT?id='.$_POST["idBT"].'"';
                echo '</script>';
            }
    

        }


    }
    
    public function Search(){
        $BT=$this->BanTinModel;

        if (isset($_REQUEST['search'])) {
             $search = $_GET['search'];
            if (empty($search)) {
                echo '<script language="javascript">';
                echo 'alert("Yêu cầu nhập dữ liệu cần tìm kiếm vào ô.")';
                echo '</script>';

                // Refresh lại page Home
                echo '<script language="Javascript">';
                echo 'window.location="localhostHome"';
                echo '</script>';
            } else {
                $this->view("Home",[
                    "page"=>"Search",
                    "catogory"=>$BT->loaibantin(),
                    "search"=>$BT->Search($search)
                ]);
                //View
               
                
            }
        }
    }

}

?>