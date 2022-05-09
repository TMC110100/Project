<?php
class App{
    //http://localhost/website/Home/SayHi/1/2/3
    protected $controller="Home";
    protected $action="SayHi";
    protected $params=[];
    function __construct(){

        $arr = $this->UrlProcess();
        
        //xu li controller
        if( file_exists("./MVC/Controllers/".$arr[0].".php") ){
            $this->controller = $arr[0];
            unset($arr[0]);
        }
        require_once "./MVC/Controllers/". $this->controller .".php";
        $this->controller = new $this->controller;
        
        //Xu li action
        if(isset($arr[1])){
            if(method_exists($this->controller,$arr[1])){
                $this->action = $arr[1];
            }
            unset($arr[1]);
        }

        //Xu li params
        $this->params = $arr?array_values($arr):[];

        call_user_func_array([new $this->controller,$this->action],$this->params);
        
    }

    function UrlProcess(){
        //Home/SayHi/1/2/3
        if(isset($_GET["url"])){
           return explode("/", filter_var(trim($_GET["url"],"/")));
        }
    }
       


}
?>