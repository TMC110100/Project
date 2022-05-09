<div id="layoutSidenav_content">
                <main>
                    <div class="container-fluid px-4">
                        <br>
                        <div class="card mb-4">
                            <div class="card-header">
                                <i class="fas fa-table me-1"></i>
                                DataTable Users
                            </div>
                            <form action="Administrator/UserUnlock" method="POST">
                            <div class="card-body">
                                <table id="datatablesSimple">
                                    <thead>
                                        <tr>
                                            <th>ID</th>
                                            <th>UserName</th>
                                            <th>FirstName</th>
                                            <th>LastName</th>
                                            <th>Email</th>
                                            <th>Phone</th>
                                            <th>Status</th>
                                            <th>Options</th>
                                        </tr>
                                    </thead>
                                    <tfoot>
                                        <tr>
                                            <th>ID</th>
                                            <th>UserName</th>
                                            <th>FirstName</th>
                                            <th>LastName</th>
                                            <th>Email</th>
                                            <th>Phone</th>
                                            <th>Status</th>
                                            <th>Options</th>
                                        </tr>
                                    </tfoot>
                                    <tbody>
                                    <?php
                                    while($rows=mysqli_fetch_array($data["ShowUsersBlocked"])){?>
                                            <tr >
                                                <td ><?php echo $rows["id"]; ?></td>
                                                <td ><?php echo $rows["username"]; ?></td>
                                                <td ><?php echo $rows["firstname"]; ?></td>
                                                <td ><?php echo $rows["lastname"]; ?></td>
                                                <td ><?php echo $rows["email"]; ?></td>
                                                <td ><?php echo $rows["phone"]; ?></td>
                                                <td ><?php if($rows["blocked"]==1){ echo "<div class='btn btn-danger'> Blocked</div>"; }?></td>
                                                <td> <input type="radio" name="id" value="<?php echo $rows["id"]; ?>"> </td>
                                                
                                            </tr>
                                    <?php
                                    }
                                    ?>
                                       
                                        
                                    </tbody>
                                </table>
                                <div class=" text-center"> 
                                    <button class="btn btn-success btn-block " type="submit" name="btnUnlock" >Unblock</button>
                                    
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
                echo 'alert("Unblock account success!")';
                echo '</script>';

                // Refresh lại page SignUp
                echo '<script language="Javascript">';
                echo 'window.location="Administrator/UsersBlocked"';
                echo '</script>';
                
            }
            else
            {
                echo '<script language="javascript">';
                echo 'alert("Vui lòng điền đầy đủ thông tin")';
                echo '</script>';

                // Refresh lại page SignUp
                echo '<script language="Javascript">';
                echo 'window.location="UsersBlocked"';
                echo '</script>';
                
            }
            }
        ?>
        

    