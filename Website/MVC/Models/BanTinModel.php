<?php
class BanTinModel extends DB{

    public function loaibantin(){
        $qr= "SELECT * FROM loaibantin";
        return mysqli_query($this->con,$qr);;
        
    }
    public function AllBantin(){
        $qr="SELECT * FROM bantin ORDER BY id DESC";
        return mysqli_query($this->con,$qr);
    }

    public function bantin(){
        if(isset($_GET["id"])){
            $myid=intval($_GET['id']);
        }
        $qr="SELECT * FROM bantin WHERE id_loaibantin=$myid ORDER BY id DESC";
        return mysqli_query($this->con,$qr);
    }

    public function loaiBT(){
        if(isset($_GET["id"])){
            $myid=intval($_GET['id']);
        }
        $qr="SELECT * FROM loaibantin WHERE id=$myid";
        return mysqli_query($this->con,$qr);
       
    }
    
    // Upload bản tin
    public function UploadBT($tenBT,$IDLoaiBT,$motaBT,$motaDetails,$image,$date_created,$id_user){
        $qr ="INSERT INTO bantin values(null,'$tenBT','$IDLoaiBT',1,'$motaBT','$motaDetails','$image','$date_created',$id_user)";
        $result = false;
        if(mysqli_query($this->con, $qr) ){
            $result = true;
        }
        return $result; 

    }

    // Show Loai Ban tin
    public function ShowLoaiBT(){
        $qr = "SELECT * FROM loaibantin";
        return mysqli_query($this->con,$qr);
    }

    public function ShowDetailsBT(){
        if(isset($_GET["id"])){
            $myid=intval($_GET['id']);
        }
        $qr="SELECT * FROM bantin WHERE id=$myid";
        return mysqli_query($this->con,$qr);
    }

    public function DeleteBT($id){
        
        $qr="DELETE FROM bantin WHERE id=$id";
        $result = false;
        if(mysqli_query($this->con, $qr) ){
            $result = true;
        }
        return $result; 

    }
    public function DeleteLBT($id){
        
        $qr="DELETE FROM loaibantin WHERE id=$id";
        $result = false;
        if(mysqli_query($this->con, $qr) ){
            $result = true;
        }
        return $result; 

    }
    
    public function InsertLBT($tenloai,$tenloai_slug,$id_nhombantin,$icon){   
        $qr = "INSERT INTO loaibantin values(null,'$tenloai','$tenloai_slug','$id_nhombantin','$icon')";
        
        $result = false;
        if(mysqli_query($this->con, $qr) ){
            $result = true;
            
        }
        return json_encode($result); //Trả vê JSON
    }

    public function InsertComment($idBT,$idUser,$ndComment){
        $qr="INSERT INTO comment VALUES(null,'$idBT','$idUser','$ndComment',current_timestamp() )";
        $result = false;
        if(mysqli_query($this->con, $qr) ){
            $result = true;
            
        }
        return json_encode($result); //Trả vê JSON
    }

    public function ShowComment(){
        if(isset($_GET["id"])){
            $myid=intval($_GET['id']);
        }
        $qr="SELECT * FROM comment C INNER JOIN user U ON C.id_user=U.id WHERE id_news=$myid";
        return mysqli_query($this->con,$qr);
    }
    
    public function Search($search){
        $qr ="SELECT * FROM bantin WHERE tenbantin like '%$search%'";
        return mysqli_query($this->con,$qr);
    }
    
    public function nhombantin(){
        $qr= "SELECT * FROM nhom";
        return mysqli_query($this->con,$qr);;
        
    }
    public function to_slug($str) {
        $str = trim(mb_strtolower($str));
        $str = preg_replace('/(à|á|ạ|ả|ã|â|ầ|ấ|ậ|ẩ|ẫ|ă|ằ|ắ|ặ|ẳ|ẵ)/', 'a', $str);
        $str = preg_replace('/(è|é|ẹ|ẻ|ẽ|ê|ề|ế|ệ|ể|ễ)/', 'e', $str);
        $str = preg_replace('/(ì|í|ị|ỉ|ĩ)/', 'i', $str);
        $str = preg_replace('/(ò|ó|ọ|ỏ|õ|ô|ồ|ố|ộ|ổ|ỗ|ơ|ờ|ớ|ợ|ở|ỡ)/', 'o', $str);
        $str = preg_replace('/(ù|ú|ụ|ủ|ũ|ư|ừ|ứ|ự|ử|ữ)/', 'u', $str);
        $str = preg_replace('/(ỳ|ý|ỵ|ỷ|ỹ)/', 'y', $str);
        $str = preg_replace('/(đ)/', 'd', $str);
        $str = preg_replace('/[^a-z0-9-\s]/', '', $str);
        $str = preg_replace('/([\s]+)/', '-', $str);
        return $str;
    }

}
?>