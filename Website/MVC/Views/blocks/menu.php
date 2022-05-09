
<?php
    while($row=mysqli_fetch_array($data["catogory"])){?>
    
        <b><a class="nav-link text-dark " style="display:inline" href="home/bantin?id=<?php echo $row["id"] ?>"><img width="24" height="24" src="./Public/icon/<?php echo $row["icon"] ?>" alt=""><?php echo $row["tenloai"] ?></a></b>

    <?php
    }
    
?>

