<?php
class API_SV extends Controller{
    public function DanhSach(){
        //goi model
        $sinhvien= $this->model("BanTinModel");
        echo "Json";
    }
}

?>