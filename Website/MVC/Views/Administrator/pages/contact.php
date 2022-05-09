<div id="layoutSidenav_content">
                <main>
                    <div class="container-fluid px-4">
                        <br>
                        <div class="card mb-4">
                            <div class="card-header">
                                <i class="fas fa-table me-1"></i>
                                DataTable Example
                            </div>
                            <form action="./Administrator/UpdateContact" method="POST">
                            <div class="card-body">
                                <table id="datatablesSimple">
                                    <thead>
                                        <tr>
                                            <th>STT</th>
                                            <th>Tên Liên Lạc</th>
                                            <th>Email</th>
                                            <th>Subject</th>
                                            <th>Message</th>
                                            <th>Date</th>
                                            <th>Status</th>
                                            <th>Options</th>
                                        </tr>
                                    </thead>
                                    <tfoot>
                                        <tr>
                                            <th>STT</th>
                                            <th>Tên Liên Lạc</th>
                                            <th>Email</th>
                                            <th>Subject</th>
                                            <th>Message</th>
                                            <th>Date</th>
                                            <th>Status</th>
                                            <th>Options</th>
                                        </tr>
                                    </tfoot>
                                    <tbody>
                                    <?php
                                    while($rows=mysqli_fetch_array($data["AllContact"])){?>
                                    
                                    
                                            <tr >
                                                <td ><?php echo $rows["id"]; ?></td>
                                                <td ><?php echo $rows["name"]; ?></td>
                                                <td ><?php echo $rows["email"]; ?></td>
                                                <td ><?php echo $rows["subject"]; ?></td>
                                                <td ><?php echo $rows["message"]; ?></td>
                                                <td ><?php $date=date_create($rows["date"]);
                                                            echo date_format($date,"H:i:s d-m-Y"); ?>
                                                </td>
                                                <td ><input type="hidden" name="status" value="<?php echo $rows["status"]; ?>" > 
                                                    <?php if($rows["status"]==0){ 
                                                                echo "<div class='btn btn-danger btn-block'>Pending</div>";
                                                            }
                                                            else
                                                            { 
                                                                echo "<div class='btn btn-success btn-block'>Actived</div>";
                                                                } 
                                                    ?>
                                                </td>
                                                <td> <input type="radio" name="id" value="<?php echo $rows["id"]; ?>"> </td>
                                            </tr>
                                    <?php
                                    }
                                    ?>
                                       
                                       
                                    </tbody>
                                </table>
                                <div class=" text-center"> 
                                    <button class="btn btn-success btn-block " type="submit" name="btnActived" >Actived</button>
                                    
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
        if(isset($data["kq"])){
            if($data["kq"]==true){
                echo '<script language="javascript">';
                echo 'alert("Update thanh cong")';
                echo '</script>';

                // Refresh lại page SignUp
                echo '<script language="Javascript">';
                echo 'window.location="Administrator/Contact"';
                echo '</script>';
                
            }
            else
            {
                echo '<script language="javascript">';
                echo 'alert("Vui lòng điền đầy đủ thông tin")';
                echo '</script>';

                // Refresh lại page SignUp
                echo '<script language="Javascript">';
                echo 'window.location="Administrator"';
                echo '</script>';
                
            }
            }
        ?>
        