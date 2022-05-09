<?php
class ContactModel extends DB{

    public function InsertContact($name,$email,$subject,$message){
        $qr="INSERT INTO contact VALUES(null,'$name','$email','$subject','$message',current_timestamp(),0)";
        $result = false;
        if(mysqli_query($this->con, $qr) ){
            $result = true;
            
        }
        return $result; 
    }

    public function AllContact(){
        $qr="SELECT * FROM contact ORDER BY id DESC";
        return mysqli_query($this->con,$qr);
    }

    public function EditContact($id){
        $qr="UPDATE contact SET status=1 WHERE id=$id";
        $result = false;
        if(mysqli_query($this->con, $qr) ){
            $result = true;
            
        }
        return $result; 
    }

}
?>