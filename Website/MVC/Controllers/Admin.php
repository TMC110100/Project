<?php
class Admin extends Controller{
    public $UserModel;
    public $BanTinModel;

    public function __construct(){
        //Model
        $this->UserModel = $this->model("UserModel");
        $this->BanTinModel = $this->model("BanTinModel");
    }
    public function SayHi(){
        $LoaiBT=$this->BanTinModel->ShowLoaiBT();
        if(isset($_SESSION["id"])){
            $un=$_SESSION["username"];
            $id=$_SESSION["id"];
            $Permission=$this->UserModel->CheckPermissionUser($un);
            $status=$this->UserModel->CheckStatus($un);
            if($status==true){
                $ShowUser=$this->UserModel->ShowUser($id);
                $this->view("Admin/Home",[
                    "page"=>"Home",
                    "LoaiBT"=>$LoaiBT,
                    "Permission"=>$Permission,
                    "User"=>$ShowUser
                ]);
            }else{
                header("location:http://localhost/website/login");
            }
        }
        else{
            header("location:http://localhost/website/login");
        }
        
    }
    

    

    public function XuLyUploads(){
        date_default_timezone_set("Asia/Ho_Chi_Minh");
        $kiemtra='';
        $target_dir = "./Public/images/";
        $target_file = $target_dir . basename($_FILES["fileToUpload"]["name"]);
        $uploadOk = 1;
        $imageFileType = strtolower(pathinfo($target_file,PATHINFO_EXTENSION));
        // Check if image file is a actual image or fake image
        if(isset($_POST["submit"])) {
            if($_FILES["fileToUpload"]["name"]=="" || $_POST["tenBT"]=='' ||$_POST["motaBT"]==''||$_POST["motaDetails"]=='' ){
                echo '<script language="javascript">';
                echo 'alert("Vui lòng điền đầy đủ thông tin và chọn file hình")';
                echo '</script>';
                 // Refresh lại page Admin
                 echo '<script language="Javascript">';
                 echo 'window.location="Admin"';
                 echo '</script>';
                return false;
                
            }

            $check = getimagesize($_FILES["fileToUpload"]["tmp_name"]);
            
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
            if ($_FILES["fileToUpload"]["size"] > 1000000) {
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
                echo 'window.location="./Admin"';
                echo '</script>';
                return false;
                
                
            // if everything is ok, try to upload file
            } else {
                $newfilename= date('dmYHis_').str_replace(" ", "", basename($_FILES["fileToUpload"]["name"]));
                if (move_uploaded_file($_FILES["fileToUpload"]["tmp_name"], $target_dir.$newfilename)) {
                    // echo "The file ". htmlspecialchars( basename( $_FILES["fileToUpload"]["name"])). " has been uploaded.";
                } else {
                    // echo "Sorry, there was an error uploading your file.";
                }
            }
            
            
            $tenBT=$_POST["tenBT"];
           
            $IDLoaiBT=$_POST["IDLoaiBT"];
            $mota=$_POST["motaBT"];
            $motaDetails=$_POST["motaDetails"];
            $image=$newfilename;
            $date_created=date("Y-m-d H:i:sa");
            //Upload BT vao DB
            $un=$_SESSION["username"];
            $id_user=$_SESSION["id"];
            $qr=$this->BanTinModel->UploadBT($tenBT,$IDLoaiBT,$mota,$motaDetails,$image,$date_created,$id_user);
            $LoaiBT=$this->BanTinModel->ShowLoaiBT();
            
            $Permission=$this->UserModel->CheckPermissionUser($un);
            $ShowUser=$this->UserModel->ShowUser($id_user);
            $this->view("Admin/Home",[
                "page"=>"Home",
                "result"=>$qr,
                "LoaiBT"=>$LoaiBT,
                "Permission"=>$Permission,
                "User"=>$ShowUser
            ]);
        }
    }

    public function ChangeAvatar(){
        date_default_timezone_set("Asia/Ho_Chi_Minh");
        $kiemtra='';
        $target_dir = "./Public/images/avatar/";
        $target_file = $target_dir . basename($_FILES["fileAvatar"]["name"]);
        $uploadOk = 1;
        $imageFileType = strtolower(pathinfo($target_file,PATHINFO_EXTENSION));
        // Check if image file is a actual image or fake image
        if(isset($_POST["btnChangeAvatar"])) {
            if($_FILES["fileAvatar"]["name"]==""){
                echo '<script language="javascript">';
                echo 'alert("Vui lòng chọn file hình")';
                echo '</script>';
                 // Refresh lại page Admin
                 echo '<script language="Javascript">';
                 echo 'window.location="Admin"';
                 echo '</script>';
                return false;
                
            }

            $check = getimagesize($_FILES["fileAvatar"]["tmp_name"]);
            
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
            if ($_FILES["fileAvatar"]["size"] > 1000000) {
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
                echo 'window.location="./Admin"';
                echo '</script>';
                return false;
                
                
            // if everything is ok, try to upload file
            } else {
                $newfilename= date('dmYHis_').str_replace(" ", "", basename($_FILES["fileAvatar"]["name"]));
                if (move_uploaded_file($_FILES["fileAvatar"]["tmp_name"], $target_dir.$newfilename)) {
                    // echo "The file ". htmlspecialchars( basename( $_FILES["fileToUpload"]["name"])). " has been uploaded.";
                } else {
                    // echo "Sorry, there was an error uploading your file.";
                }
            }
            
            
            
            $avatar=$newfilename;
            $un=$_SESSION["username"];
            $id=$_SESSION["id"];
            //Upload BT vao DB
            $qr=$this->UserModel->ChangeAvatar($id,$avatar);

            $LoaiBT=$this->BanTinModel->ShowLoaiBT();
            $Permission=$this->UserModel->CheckPermissionUser($un);
            $ShowUser=$this->UserModel->ShowUser($id);
            $this->view("Admin/Home",[
                "page"=>"Home",
                "results"=>$qr,
                "LoaiBT"=>$LoaiBT,
                "Permission"=>$Permission,
                "User"=>$ShowUser
            ]);
        }else{
            header("location:Admin");
        }
    }
    // public function ChangePassword(){
    //     if(isset($_POST["btnChangePassword"])){
    //         $password_old=$_POST["password_old"];
    //         $password_new=$_POST["password_new"];
    //         $cfn_password_new=$_POST["confirm_password_new"];
    //         if($password_new){
                
    //         }else{
                
    //         }
    //     }
    // }
    

    public function Logout(){
        unset($_SESSION["id"]);
        session_destroy();
        header("location:http://localhost/website/home");
    }


}

?>