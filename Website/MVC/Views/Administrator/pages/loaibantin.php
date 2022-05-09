<div id="layoutSidenav_content">
                <main>
                    <div class="container-fluid px-4">
                        <br>
                        <div class="card mb-4">
                            <div class="card-header">
                                <i class="fas fa-table me-1"></i>
                                DataTable Example
                            </div>
                            <form action="Administrator/DeleteLBT" method="POST">
                            <div class="card-body">
                                <table id="datatablesSimple">
                                    <thead>
                                        <tr>
                                            <th>STT</th>
                                            <th>Tên Loại bản tin</th>
                                            <th>Options</th>
                                        </tr>
                                    </thead>
                                    <tfoot>
                                        <tr>
                                            <th>STT</th>
                                            <th>Tên Loại bản tin</th>
                                            <th>Options</th>
                                        </tr>
                                    </tfoot>
                                    <tbody>
                                    <?php
                                    while($rows=mysqli_fetch_array($data["LoaiBT"])){?>
                                    
                                    
                                            <tr >
                                                <td ><?php echo $rows["id"]; ?></td>
                                                <td ><?php echo $rows["tenloai"]; ?></td>
                                                <td> <input type="radio" name="id" value="<?php echo $rows["id"]; ?>"> </td>
                                            </tr>
                                    <?php
                                    }
                                    ?>
                                       
                                       
                                    </tbody>
                                </table>
                                <div class=" text-center"> 
                                    
                                    <button class="btn btn-danger btn-block " type="submit" name="btnDelLBT" >Delete</button>
                                    <button class="btn btn-warning btn-block " type="submit" name="btnEditLBT" >Edit</button>
                                </div>
                            </div>
                            
                            </form>
                        </div>
                        <!-- Form Insert -->
                        <div>
                        
                        <form  action="./Administrator/InsertLBT" method="POST" enctype="multipart/form-data">
                            
                                <input type="text" name="tenloai" placeholder="Tên loại bản tin"> &ensp;
                                <select name="idnhombantin" >
                                    <?php
                                        while($row=mysqli_fetch_array($data["NhomBT"])){?>
                                            <option value="<?php echo $row['id']?>" ><?php echo $row["TenNhom"]?></option>
                                        <?php }
                                    ?>
                                </select> &ensp;
                                <input type="file" name="fileIcon" id="fileIcon"> &ensp;
                                <button class="btn btn-success btn-block " type="submit" name="btnInsertLBT" >Insert</button>
                               
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
                echo 'window.location="Administrator/LoaiBantin"';
                echo '</script>';
                
            }
            else
            {
                echo '<script language="javascript">';
                echo 'alert("Vui lòng điền đầy đủ thông tin")';
                echo '</script>';

                // Refresh lại page SignUp
                echo '<script language="Javascript">';
                echo 'window.location="Register"';
                echo '</script>';
                
            }
            }
            if(isset($data["results"])){
                if($data["results"]==true){
                    echo '<script language="javascript">';
                    echo 'alert("Insert thanh cong")';
                    echo '</script>';
    
                    // Refresh lại page SignUp
                    echo '<script language="Javascript">';
                    echo 'window.location="Administrator/LoaiBantin"';
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
        