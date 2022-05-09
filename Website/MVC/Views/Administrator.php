<?php
        if(isset($_SESSION["id"])){
            if(isset($_SESSION["Permission"])){
                
            }else{
                header("location:http://localhost/website/admin");
            }
        }
        else{
            header("location:http://localhost/website/login");
        }
            
?>
<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8" />
        <meta http-equiv="X-UA-Compatible" content="IE=edge" />
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
        <meta name="description" content="" />
        <meta name="author" content="" />
        <title>Dashboard - SB Admin</title>
        <base href="localhost">
        <link href="https://cdn.jsdelivr.net/npm/simple-datatables@latest/dist/style.css" rel="stylesheet" />
        <link href="./Public/css/styles.css" rel="stylesheet" type="text/css" >
        <script src="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/js/all.min.js" crossorigin="anonymous"></script>
    </head>
    <body class="sb-nav-fixed">
    
        <!-- Header -->
        <?php  require_once "./MVC/Views/Administrator/blocks/header.php" ?>

        <!-- Menu Left -->
        <?php  require_once "./MVC/Views/Administrator/blocks/menu.php" ?>
        
        <?php  require_once "./MVC/Views/Administrator/pages/".$data["page"].".php" ?>

        
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" crossorigin="anonymous"></script>
        <script src="./Public/js/scripts.js"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.8.0/Chart.min.js" crossorigin="anonymous"></script>
        <script src="./Public/js/chart-area-demo.js"></script>
        <script src="./Public/js/chart-bar-demo.js"></script>
        <script src="https://cdn.jsdelivr.net/npm/simple-datatables@latest" crossorigin="anonymous"></script>
        <script src="./Public/js/datatables-simple-demo.js"></script>
    </body>
</html>

