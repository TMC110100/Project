<?php
class Contact extends Controller{
    public $ContactModel;
    

    public function __construct(){
        //Model
        $this->ContactModel = $this->model("ContactModel");
        
    }
    
    public function SayHi(){
        
        //View
        $this->view("Contact");
    }

    public function SendContact(){
        if(isset($_POST["btnContact"])){
            $name=$_POST["name"];
            $email=$_POST["email"];
            $subject=$_POST["subject"];
            $message=$_POST["message"];
           
            $qr=$this->ContactModel->InsertContact($name,$email,$subject,$message);
            $this->view("sendEmail",[
                "name"=>$name,
                "email"=>$email,
                "subject"=>$subject,
                "message"=>$message,

            ]);

        }
    }

    

    
}
?>