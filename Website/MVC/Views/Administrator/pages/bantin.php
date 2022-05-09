<div id="layoutSidenav_content">
                <main>
                    <div class="container-fluid px-4">
                        <br>
                        <div class="card mb-4">
                            <div class="card-header">
                                <i class="fas fa-table me-1"></i>
                                DataTable Example
                            </div>
                            <form action="Administrator/DeleteBT" method="POST">
                            <div class="card-body">
                                <table id="datatablesSimple">
                                    <thead>
                                        <tr>
                                            <th>STT</th>
                                            <th>Tên bản tin</th>
                                            <th>Mô tả</th>
                                            <th>Hình ảnh</th>
                                            <th>Date Created</th>
                                            <th>Options</th>
                                        </tr>
                                    </thead>
                                    <tfoot>
                                        <tr>
                                            <th>STT</th>
                                            <th>Tên bản tin</th>
                                            <th>Mô tả</th>
                                            <th>Hình ảnh</th>
                                            <th>Date Created</th>
                                            <th>Options</th>
                                        </tr>
                                    </tfoot>
                                    <tbody>
                                    <?php
                                    while($rows=mysqli_fetch_array($data["AllBT"])){?>
                                    
                                    
                                            <tr >
                                                <td ><?php echo $rows["id"]; ?></td>
                                                <td ><?php echo trim($rows["tenbantin"],"<" ) ?></td>
                                                <td ><?php echo trim($rows["mota"],"<" ) ?></td>
                                                <td ><img src="./Public/images/<?php echo $rows["image"]; ?>" alt="" width="100" height="100"></td>
                                                <td ><?php $date=date_create($rows["date_created"]);
                                                            echo date_format($date,"H:i:s d-m-Y"); ?>
                                                </td>
                                                <td> <input type="radio" name="id" value="<?php echo $rows["id"]; ?>"> </td>
                                            </tr>
                                    <?php
                                    }
                                    ?>
                                       
                                       
                                    </tbody>
                                </table>
                                <div class=" text-center"> 
                                    <button class="btn btn-danger btn-block " type="submit" name="btnDelBT" >Delete</button>
                                    <button class="btn btn-warning btn-block " type="submit" name="btnEditBT" >Edit</button>
                                </div>
                            </div>
                            
                            </form>
                        </div>
                    </div>
                </main>
                <footer class="py-4 bg-light mt-auto">
                    <div class="container-fluid px-4">
                        <div class="d-flex align-items-center justify-content-between small">
                            <div class="text-muted">Copyright &copy; TMC Website 2021</div>
                            
                        </div>
                    </div>
                </footer>
            </div>
        </div>
        <?php
        if(isset($data["result"])){
            if($data["result"]==true){
                echo '<script language="javascript">';
                echo 'alert("delete thanh cong")';
                echo '</script>';

                // Refresh lại page SignUp
                echo '<script language="Javascript">';
                echo 'window.location="administrator/bantin"';
                echo '</script>';
                
            }
            else
            {
                echo '<script language="javascript">';
                echo 'alert("Vui lòng điền đầy đủ thông tin")';
                echo '</script>';

                // Refresh lại page SignUp
                echo '<script language="Javascript">';
                echo 'window.location="register"';
                echo '</script>';
                
            }
            }
        ?>
        