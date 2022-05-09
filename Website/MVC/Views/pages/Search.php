<?php
    $num = mysqli_num_rows($data["search"]);
    if ($num > 0) {
        while($rows=mysqli_fetch_array($data["search"])){?>
        
            <div class="nameBT col-sm-12 col-md-12 col-lg-12 border-top"  style="display:block">
                    <a href="home/detailsBT?id=<?php echo $rows["id"] ?>">
                        <?php echo trim($rows["tenbantin"],"<" )?>
                    </a>
                </div>  
                <div class="imageBT col-sm-12 col-md-12 col-lg-5">
                    <a href="home/detailsBT?id=<?php echo $rows["id"] ?>">
                        <img style="width:200px ;height:220px"  src="./Public/images/<?php echo $rows["image"] ?>" alt="">
                    </a>
                </div>
                <div class="motaBT col-sm-12 col-md-12 col-lg-7">
                    <?php echo trim($rows["mota"],"<" )?>
                </div>
                <div  class="date col-sm-12 col-md-12 col-lg-12" >
                            <?php 
                                $date=date_create($rows["date_created"]);
                                echo date_format($date,"H:i:s d-m-Y"); 
                            ?>
                            
                </div>
                
            <?php
        }
    }else{
        ?>
            <div style="text-align:center; color:red">
                <?php
                    echo "Không tìm thấy kết quả bạn cần!";
                ?>
            </div> 
        <?php
    }
    

?>