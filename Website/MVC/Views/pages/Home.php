<?php
    while($rows=mysqli_fetch_array($data["tin"])){?>
        
        <div class="nameBT col-sm-12 col-md-12 col-lg-12 border-top"  style="display:block">
                <a href="home/detailsBT?id=<?php echo $rows["id"] ?>">
                    <?php echo trim($rows["tenbantin"],"<" )?> //Loại bỏ kí tự "<" ở đầu đảm bảo không chạy lệnh script
                </a>
            </div>  
            <div class="imageBT col-sm-12 col-md-12 col-lg-5">
                <a href="home/detailsBT?id=<?php echo $rows["id"] ?>">
                    <img style="width:200px ;height:220px"  src="./Public/images/<?php echo $rows["image"] ?>" alt="">
                </a>
            </div>
            <div class="motaBT col-sm-12 col-md-12 col-lg-7">
                <?php echo trim($rows["mota"],"<" )?> //Loại bỏ kí tự "<" ở đầu đảm bảo không chạy lệnh script
            </div>
            <div  class="date col-sm-12 col-md-12 col-lg-12" >
                        <?php 
                            $date=date_create($rows["date_created"]);
                            echo date_format($date,"H:i:s d-m-Y"); 
                        ?>
                        
            </div>
            
    <?php
}
?>