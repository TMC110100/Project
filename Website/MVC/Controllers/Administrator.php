<?php
class Administrator extends Controller
{
    
    public $UserModel;
    public $BanTinModel;
    public $BackupModel;
    public $ContactModel;

    public function __construct(){
        //Model
        $this->UserModel = $this->model("UserModel");
        $this->BanTinModel = $this->model("BanTinModel");
        $this->BackupModel = $this->model("BackupModel");
        $this->ContactModel = $this->model("ContactModel");
    }
    public function SayHi()
    {
        $AllBanTin=$this->BanTinModel->AllBantin();
        $this->view("Administrator",[
            "page"=>"home",
            "AllBT"=>$AllBanTin
        ]);
    }

    public function Bantin()
    {
        $AllBanTin=$this->BanTinModel->AllBantin();
        $this->view("Administrator",[
            "page"=>"bantin",
            "AllBT"=>$AllBanTin
        ]);
    }

    public function Members()
    {
        $Members=$this->UserModel->CheckMembers();
        $this->view("Administrator",[
            "page"=>"members",
            "AllMembers"=>$Members
        ]);
    }

    public function LoaiBantin()
    {
        $ShowLoaiBT=$this->BanTinModel->ShowLoaiBT();
        $NhomBT=$this->BanTinModel->nhombantin();
        $this->view("Administrator",[
            "page"=>"loaibantin",
            "LoaiBT"=>$ShowLoaiBT,
            "NhomBT"=>$NhomBT
        ]);
    }

    public function Logout(){
        unset($_SESSION["id"]);
        session_destroy();
        header("location:localhostLogin");
    }


    public function DeleteBT(){
        $AllBanTin=$this->BanTinModel->AllBantin();

        if(isset($_POST["btnDelBT"])){
            $id=$_POST["id"];
            $DeleteBT=$this->BanTinModel->DeleteBT($id);
            $this->view("Administrator",[
                "page"=>"bantin",
                "AllBT"=>$AllBanTin,
                "result"=>$DeleteBT
            ]);
        }else{
            header("location:localhostHome");
        }

    }
    

    public function DeleteUser(){
        $Members=$this->UserModel->CheckMembers();

        if(isset($_POST["btnDelUser"])){
            if(isset($_POST["id"])){
                $id=$_POST["id"];
                $DeleteUser=$this->UserModel->DeleteUser($id);
                $this->view("Administrator",[
                "page"=>"members",
                "AllMembers"=>$Members,
                "result"=>$DeleteUser
            ]);
            }else{

                echo '<script language="javascript">';
                echo 'alert("Vui lòng chọn User cần edit")';
                echo '</script>';

                // Refresh lại page SignUp
                echo '<script language="Javascript">';
                echo 'window.location="Members"';
                echo '</script>';
            }
            
        }else{
            header("location:localhostHome");
        }

    }
    
    public function DeleteLBT(){
        $ShowLoaiBT=$this->BanTinModel->ShowLoaiBT();
        $NhomBT=$this->BanTinModel->nhombantin();
        if(isset($_POST["btnDelLBT"])){
            $id=$_POST["id"];
            $DeleteLBT=$this->BanTinModel->DeleteLBT($id);
            $this->view("Administrator",[
                "page"=>"loaibantin",
                "LoaiBT"=>$ShowLoaiBT,
                "NhomBT"=>$NhomBT,
                "result"=>$DeleteLBT
            ]);
        }else{
            header("location:localhostHome");
        }

    }

    public function InsertLBT(){

        
        date_default_timezone_set("Asia/Ho_Chi_Minh");
        $kiemtra='';
        $target_dir = "./Public/icon/";
        $target_file = $target_dir . basename($_FILES["fileIcon"]["name"]);
        $uploadOk = 1;
        $imageFileType = strtolower(pathinfo($target_file,PATHINFO_EXTENSION));
        // Check if image file is a actual image or fake image
        if(isset($_POST["btnInsertLBT"])) {
            if($_FILES["fileIcon"]["name"]=="" || $_POST["tenloai"]=="" || $_POST["idnhombantin"]==""){
                echo '<script language="javascript">';
                echo 'alert("Vui lòng điền đầy đủ thông tin và chọn file hình.")';
                
                echo '</script>';
                 // Refresh lại page Admin
                 echo '<script language="Javascript">';
                 echo 'window.location="localhostAdministrator/LoaiBantin"';
                 echo '</script>';
                return false;
                
            }

            $check = getimagesize($_FILES["fileIcon"]["tmp_name"]);
            
            if($check !== false) {
                echo "File is an image - " . $check["mime"] . ".";
                $uploadOk = 1;
            } else {
                $kiemtra="File is not an image.";
                $uploadOk = 0;    
            }

            //Check if file already exists
            if (file_exists($target_file)) {
            $kiemtra= "Sorry, file already exists.";
            $uploadOk = 0;
               
            }

            // Check file size
            if ($_FILES["fileIcon"]["size"] > 1000000) {
                $kiemtra= "Sorry, your file is too large.";
                $uploadOk = 0;
                
            }

            // Allow certain file formats
            if($imageFileType != "jpg" && $imageFileType != "png" && $imageFileType != "jpeg"
            && $imageFileType != "gif" ) {
                $kiemtra="Sorry, only JPG, JPEG, PNG & GIF files are allowed.";
                $uploadOk = 0;
                
                
            }

            // Check if $uploadOk is set to 0 by an error
            if ($uploadOk == 0) {
                $kiemtra=".$kiemtra. Sorry, your file was not uploaded.";
                echo '<script language="javascript">';
                echo 'alert("'.$kiemtra.'")';
                echo '</script>';
                // Refresh lại page Admin
                echo '<script language="Javascript">';
                echo 'window.location="localhostAdministrator/LoaiBantin"';
                echo '</script>';
                return false;
                
                
            // if everything is ok, try to upload file
            } else {
                $newfileIcon= date('dmYHis_').str_replace(" ", "", basename($_FILES["fileIcon"]["name"]));
                if (move_uploaded_file($_FILES["fileIcon"]["tmp_name"], $target_dir.$newfileIcon)) {
                    // echo "The file ". htmlspecialchars( basename( $_FILES["fileIcon"]["name"])). " has been uploaded.";
                } else {
                    // echo "Sorry, there was an error uploading your file.";
                }
            }
            $tenloai=$_POST["tenloai"];
            $tenloai_slug=$this->BanTinModel->to_slug($tenloai);
            $id_nhombantin=$_POST["idnhombantin"];
            $icon=$newfileIcon;
            $InsertLBT=$this->BanTinModel->InsertLBT($tenloai,$tenloai_slug,$id_nhombantin,$icon);
            $NhomBT=$this->BanTinModel->nhombantin();
            $ShowLoaiBT=$this->BanTinModel->ShowLoaiBT();
            $this->view("Administrator",[
                "page"=>"loaibantin",
                "LoaiBT"=>$ShowLoaiBT,
                 "NhomBT"=>$NhomBT,
                "results"=>$InsertLBT
            ]);
        }else{
            header("location:localhostHome");
        }

    }
    
    public function BackupDB(){
        $BackupDB=$this->BackupModel->Backup_DB();
        $AllBanTin=$this->BanTinModel->AllBantin();
        echo '<script language="javascript">';
                echo 'alert("BackupDB thành công!")';
                echo '</script>';

                // Refresh lại page SignUp
                echo '<script language="Javascript">';
                echo 'window.location="../Administrator"';
                echo '</script>';
    }
    
    public function Contact()
    {
        $AllContact=$this->ContactModel->AllContact();
        $this->view("Administrator",[
            "page"=>"contact",
            "AllContact"=>$AllContact
        ]);
    }
    public function UpdateContact()
    {
        if(isset($_POST["btnActived"])){
            $id=$_POST["id"];
            if(!empty($id)){
                $EditContact=$this->ContactModel->EditContact($id);
                $AllContact=$this->ContactModel->AllContact();
                $this->view("Administrator",[
                    "page"=>"contact",
                    "AllContact"=>$AllContact,
                    "kq"=>$EditContact
                ]);
                    
                
            }else{
                echo '<script language="javascript">';
                    echo 'alert("Vui lòng chọn contact cần edit")';
                    echo '</script>';
    
                    // Refresh lại page Contact
                    echo '<script language="Javascript">';
                    echo 'window.location="./Contact"';
                    echo '</script>';
            }
            
        }
        
    }
    
    public function UsersBlocked()
    {
        $ShowUsersBlocked=$this->UserModel->ShowUsersBlocked();
        $this->view("Administrator",[
            "page"=>"UsersBlocked",
            "ShowUsersBlocked"=>$ShowUsersBlocked
        ]);
    }

    public function UserUnlock()
    {
        if(isset($_POST["btnUnlock"])){
            
            if(isset($_POST["id"])){
                $id=$_POST["id"];
                $UserUnblock=$this->UserModel->UserUnlock($id);
                $ShowUsersBlocked=$this->UserModel->ShowUsersBlocked();
                $this->view("Administrator",[
                    "page"=>"UsersBlocked",
                    "ShowUsersBlocked"=>$ShowUsersBlocked,
                    "result"=>$ShowUsersBlocked
                ]);
            }else{
                echo '<script language="javascript">';
                echo 'alert("Vui lòng chọn User cần edit")';
                echo '</script>';

                // Refresh lại page SignUp
                echo '<script language="Javascript">';
                echo 'window.location="UsersBlocked"';
                echo '</script>';
            }
            
        }
        
    
    }

}
?>