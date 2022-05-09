
<!DOCTYPE html>
<html lang="en">
<head>
    
  <meta charset="utf-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <link rel="apple-touch-icon" sizes="76x76" href="./assets/img/apple-icon.png">
  <link rel="icon" type="image/png" href="./assets/img/favicon.png">
  <title>
    Profile User
  </title>
  <base href="http://localhost/website/">
  
  <link rel="stylesheet" href="./public/bootstrap/css/bootstrap.min.css" type="text/css">
  <script src="https://cdn.tiny.cloud/1/x8ddsy8ubdlqj8p29903wwpe13uqygjc4s6ojs2vx8e5s9vy/tinymce/5/tinymce.min.js" referrerpolicy="origin"></script>
  <!--     Fonts and icons     -->
  <link href="https://fonts.googleapis.com/css?family=Poppins:200,300,400,600,700,800" rel="stylesheet" />
  <link href="https://use.fontawesome.com/releases/v5.0.6/css/all.css" rel="stylesheet">
  <!-- Nucleo Icons -->
  <link href="./assets/css/nucleo-icons.css" rel="stylesheet" type="text/css" />
  <!-- CSS Files -->
  <link href="./assets/css/blk-design-system.css?v=1.0.0" rel="stylesheet"  type="text/css"/>
  <!-- CSS Just for demo purpose, don't include it in your project -->
  <link href="./assets/demo/demo.css" rel="stylesheet"  type="text/css"/>
  
  
</head>

<body class="profile-page">
  <!-- Navbar -->
  <nav class="navbar navbar-expand-lg fixed-top navbar-transparent " color-on-scroll="100">
    <div class="container">
      <div class="navbar-translate">
        <a class="navbar-brand" href="./Admin/Home" rel="tooltip" title="Home Page Profile User" data-placement="bottom" >
          <span>TMC•</span> Profile
        </a>
        <button class="navbar-toggler navbar-toggler" type="button" data-toggle="collapse" data-target="#navigation" aria-controls="navigation-index" aria-expanded="false" aria-label="Toggle navigation">
          <span class="navbar-toggler-bar bar1"></span>
          <span class="navbar-toggler-bar bar2"></span>
          <span class="navbar-toggler-bar bar3"></span>
        </button>
      </div>
      <div class="collapse navbar-collapse justify-content-end" id="navigation">
        <div class="navbar-collapse-header">
          <div class="row">
            <div class="col-6 collapse-brand">
              <a>
                TMC•
              </a>
            </div>
            <div class="col-6 collapse-close text-right">
              <button type="button" class="navbar-toggler" data-toggle="collapse" data-target="#navigation" aria-controls="navigation-index" aria-expanded="false" aria-label="Toggle navigation">
                <i class="tim-icons icon-simple-remove"></i>
              </button>
            </div>
          </div>
        </div>
        <ul class="navbar-nav">
          <li class="nav-item p-0">
            <a class="nav-link" rel="tooltip" title="Follow us on Twitter" data-placement="bottom" href="https://twitter.com/CreativeTim" target="_blank">
              <i class="fab fa-twitter"></i>
              <p class="d-lg-none d-xl-none">Twitter</p>
            </a>
          </li>
          <li class="nav-item p-0">
            <a class="nav-link" rel="tooltip" title="Like us on Facebook" data-placement="bottom" href="https://www.facebook.com/CreativeTim" target="_blank">
              <i class="fab fa-facebook-square"></i>
              <p class="d-lg-none d-xl-none">Facebook</p>
            </a>
          </li>
          <li class="nav-item p-0">
            <a class="nav-link" rel="tooltip" title="Follow us on Instagram" data-placement="bottom" href="https://www.instagram.com/CreativeTimOfficial" target="_blank">
              <i class="fab fa-instagram"></i>
              <p class="d-lg-none d-xl-none">Instagram</p>
            </a>
          </li>

          <?php
                  if(isset($data["Permission"])){
                      if($data["Permission"]==true){
                          $_SESSION["Permission"]=$data["Permission"];
                          ?>
                          <li class="nav-item p-0">
                            <a class="nav-link" rel="tooltip" title="Go to Admin Page" data-placement="bottom" href="Administrator" target="_blank">
                              <i class="fa fa-user"></i>
                              <p class="d-lg-none d-xl-none">Admin</p>
                            </a>
                          </li>
                          <?php
                      }
                  }
          ?>
          
          <li class="nav-item">
            <a class="nav-link" href="./Home">Back to HomePage</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="./Admin/Logout">LogOut?</a>
          </li>
        </ul>
      </div>
    </div>
  </nav>
  <!-- End Navbar -->
  <div class="wrapper">
    <div class="page-header">
      <img src="./assets/img/dots.png" class="dots">
      <img src="./assets/img/path4.png" class="path">
      <div class="container align-items-center">
        <div class="row">
          <div class="col-lg-6 col-md-6 col-sm-12 ">
            <h1 class="profile-title text-left">
            <?php
                    while($row=mysqli_fetch_array($data["User"])){?>
                          <?php echo $row["FullName"];?>
            </h1>
            <h5 class="text-on-back">01</h5>
            <p class="profile-description">Offices parties lasting outward nothing age few resolve. Impression to discretion understood to we interested he excellence. Him remarkably use projection collecting. Going about eat forty world has round miles.</p>
            <div class="btn-wrapper profile pt-3">
              <a target="_blank" href="https://twitter.com/creativetim" class="btn btn-icon btn-twitter btn-round" data-toggle="tooltip" data-original-title="Follow us">
                <i class="fab fa-twitter"></i>
              </a>
              <a target="_blank" href="https://www.facebook.com/creativetim" class="btn btn-icon btn-facebook btn-round" data-toggle="tooltip" data-original-title="Like us">
                <i class="fab fa-facebook-square"></i>
              </a>
              <a target="_blank" href="https://dribbble.com/creativetim" class="btn btn-icon btn-dribbble  btn-round" data-toggle="tooltip" data-original-title="Follow us">
                <i class="fab fa-dribbble"></i>
              </a>
            </div>
          </div>
          <div class="col-lg-6 col-md-6 col-sm-12 ml-auto mr-auto">
            <div class="card card-coin card-plain">
              <div class="card-header">
                <img src="./Public/images/avatar/<?php echo $row["avatar"];?>" class="img-center img-fluid rounded-circle">
                <h4 class="title">
                                <?php echo $row["FullName"];?>
                                
                      
                </h4>
              </div>
              <div class="card-body ">
                <ul class="nav nav-tabs nav-tabs-primary justify-content-center">
                  <li class="nav-item">
                    <a class="nav-link active" data-toggle="tab" href="#linka">
                    
                    Contact
                    
                    </a>
                  </li>
                  <li class="nav-item">
                    <a class="nav-link" data-toggle="tab" href="#linkb">
                     Change Passowrd
                    </a>
                  </li>
                  <li class="nav-item">
                    <a class="nav-link" data-toggle="tab" href="#linkc">
                      Avatar
                    </a>
                  </li>
                </ul>
                <div class="tab-content tab-subcategories ">
                  <div class="tab-pane active" id="linka">
                    <div class="table-responsive">
                    <table class="table tablesorter " id="plain-table">
                        <thead class=" text-primary">
                          <tr>
                            <th class="header">
                              Information
                            </th>
                          </tr>
                        </thead>
                        <tbody>
                          <tr>
                            <td>
                              Email: <a href="mailto:<?php echo $row["email"];?>"><?php echo $row["email"];?></a>
                            </td>
                          </tr>
                          <tr>
                            <td>
                              Address: <?php echo $row["address"];?>
                            </td>
                          </tr>
                          <tr>
                            <td>
                              Phone: <a href="tel:+<?php echo $row["phone"];?>"><?php echo $row["phone"];?></a>
                              <?php }
                              ?>
                            </td>
                          </tr>
                        </tbody>
                      </table>
                    </div>
                  </div>
                  <div class="tab-pane" id="linkb">
                      <form action="./Admin/ChangePassword" method="POST" enctype="multipart/form-data" class>
                    <div class="row">
                      <label class="col-sm-3 col-form-label" >Password Old</label>
                      <div class="col-sm-9">
                        <div class="form-group">
                          <input type="password" class="form-control" name="password_old" required>
                        </div>
                      </div>
                    </div>
                    <div class="row">
                      <label class="col-sm-3 col-form-label">Password New</label>
                      <div class="col-sm-9">
                        <div class="form-group">
                          <input type="password" class="form-control" name="password_new"  required>
                        </div>
                      </div>
                    </div>
                    <div class="row">
                      <label class="col-sm-3 col-form-label">Confirm Password New</label>
                      <div class="col-sm-9">
                        <div class="form-group">
                          <input type="password" class="form-control"name="confirm_password_new"  required>
                        </div>
                      </div>
                    </div>
                    <div class="row">
                        <button class="btn btn-success" type="submit" name="btnChangePassword">Change Password</button>
                    </div>
                    </form>
                    <button type="submit" class="btn btn-simple btn-primary btn-icon btn-round float-right"><i class="tim-icons icon-send"></i></button>
                  </div>
                  <div class="tab-pane" id="linkc">
                    <div class="table-responsive">
                      <table class="table tablesorter " id="plain-table">
                        <thead class=" text-primary">
                          <tr>
                            <th class="header">
                              Thay đổi ảnh đại diện
                            </th>
                          </tr>
                        </thead>
                      
                        <tbody>
                        <form action="./Admin/ChangeAvatar" method="POST" enctype="multipart/form-data">
                          <tr>
                            <td>
                            <div>Chọn ảnh: <input type="file" name="fileAvatar" id="fileAvatar"></div> 
                            </td>
                          </tr>
                          <tr>
                            <td>
                              <div><button class="btn btn-success" type="submit" name="btnChangeAvatar">Change Avatar</button></div>
                            </td>
                          </tr>
                          </form>
                          <?php
                  if(isset($data["results"])) { ?>
                <h3><?php
                  if($data["results"]==true){
                    echo '<script language="javascript">';
                    echo 'alert("Thay đổi avatar thành công")';
                    echo '</script>';

                    // Refresh lại page SignUp
                    echo '<script language="Javascript">';
                    echo 'window.location="./Admin/Home"';
                    echo '</script>';
                  }
                  else
                  {
                    echo '<script language="javascript">';
                    echo 'alert("Thay đổi avatar thất bại")';
                    echo '</script>';

                    // Refresh lại page SignUp
                    echo '<script language="Javascript">';
                    echo 'window.location="./Admin/Home"';
                    echo '</script>';
                  }
                ?></h3>
                <?php } ?> 
                        </tbody>
                      </table>
                    </div>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
  
  <!--Ads-->
  <div>
     

  </div>
      <div class="col-md-12 col-sm-12 col-lg-12">
          <div class="container ">
            <form class="border" action="./Admin/XuLyUploads" method="POST" enctype="multipart/form-data">
                <table class="table" >  
                    <tr>
                        <th style="text-align: center" colspan="2"><h3>Thêm mới bản tin:</h3></th>
                    </tr>
                    <tr>
                        <td>Tên bản tin:</td>
                        <td><input type="text" name="tenBT" rows="2" cols="50"  ></td>
                    </tr>
                    <tr>
                        <td>Chọn loại bản tin:</td>
                        <td>
                            <select name="IDLoaiBT" >
                                <?php
                                    while($row=mysqli_fetch_array($data["LoaiBT"])){?>
                                        <option value="<?php echo $row['id']?>" ><?php echo $row["tenloai"]?></option>
                                    <?php }
                                ?>
                            </select>
                        </td>
                    </tr>
                    <tr>
                        <td>Mô tả bản tin:</td>
                        <td ><textarea type="text" name="motaBT" rows="4" cols="50"></textarea></td>
                    </tr>
                    <tr>
                        <td>Mô tả chi tiết bản tin:<br>
                        <div style="color:red"><b>No Copy</b></div>
                            
                        </td>
                        <td><textarea type="text" name="motaDetails" id="basic-example" rows="10" cols="70"></textarea></td>
                    </tr>
                    <tr>
                        <td>File hình:</td>
                        <td><input type="file" name="fileToUpload" id="fileToUpload"></td>
                    </tr>
                    <tr>
                        <td style="text-align: center" colspan="2"><input type="submit" value="Upload" name="submit"></td>
                    </tr>
                </table>
                <?php
                  if(isset($data["result"])) { ?>
                <h3><?php
                  if($data["result"]==true){
                    echo '<script language="javascript">';
                    echo 'alert("Thêm bản tin mới thành công")';
                    echo '</script>';

                    // Refresh lại page SignUp
                    echo '<script language="Javascript">';
                    echo 'window.location="./Admin/Home"';
                    echo '</script>';
                  }
                  else
                  {
                    echo '<script language="javascript">';
                    echo 'alert("Thêm thất bại")';
                    echo '</script>';

                    // Refresh lại page SignUp
                    echo '<script language="Javascript">';
                    echo 'window.location="./Admin/Home"';
                    echo '</script>';
                  }
                ?></h3>
                <?php } ?> 
                
                
            </form>
            </div>  
            </div>
        
        <!--Ads-->
        

</div>
        
    <footer class="footer">
      <div class="container">
        <div class="row">
          <div class="col-md-3">
            <h1 class="title">TMC•</h1>
          </div>
          <div class="col-md-3">
            <ul class="nav">
              <li class="nav-item">
                <a href="Home" class="nav-link">
                  Home
                </a>
              </li>
              <li class="nav-item">
                <a href="../examples/landing-page.html" class="nav-link">
                  Landing
                </a>
              </li>
              <li class="nav-item">
                <a href="Register" class="nav-link">
                  Register
                </a>
              </li>
              <li class="nav-item">
                <a href="Admin/Home" class="nav-link">
                  Profile
                </a>
              </li>
            </ul>
          </div>
          <div class="col-md-3">
            <ul class="nav">
              <li class="nav-item">
                <a href="localhostContact" class="nav-link">
                  Contact Us
                </a>
              </li>
              <li class="nav-item">
                <a href="localhostAbout-us" class="nav-link">
                  About Us
                </a>
              </li>
              <li class="nav-item">
                <a href="localhostBlog" class="nav-link">
                  Blog
                </a>
              </li>
              <li class="nav-item">
                <a href="localhostlicenses/MIT" class="nav-link">
                  License
                </a>
              </li>
            </ul>
          </div>
          <div class="col-md-3">
            <h3 class="title">Follow us:</h3>
            <div class="btn-wrapper profile">
              <a target="_blank" href="https://twitter.com/cuongtm.it" class="btn btn-icon btn-neutral btn-round btn-simple" data-toggle="tooltip" data-original-title="Follow us">
                <i class="fab fa-twitter"></i>
              </a>
              <a target="_blank" href="https://www.facebook.com/cuongtm.it" class="btn btn-icon btn-neutral btn-round btn-simple" data-toggle="tooltip" data-original-title="Like us">
                <i class="fab fa-facebook-square"></i>
              </a>
              <a target="_blank" href="https://dribbble.com/cuongtm.it" class="btn btn-icon btn-neutral  btn-round btn-simple" data-toggle="tooltip" data-original-title="Follow us">
                <i class="fab fa-dribbble"></i>
              </a>
            </div>
          </div>
        </div>
      </div>
    </footer>
    
  </div>
  <!--   Core JS Files   -->
  <script src="./assets/js/core/jquery.min.js" type="text/javascript"></script>
  <script src="./assets/js/core/popper.min.js" type="text/javascript"></script>
  <script src="./assets/js/core/bootstrap.min.js" type="text/javascript"></script>
  <script src="./assets/js/plugins/perfect-scrollbar.jquery.min.js"></script>
  <!--  Plugin for Switches, full documentation here: http://www.jque.re/plugins/version3/bootstrap.switch/ -->
  <script src="./assets/js/plugins/bootstrap-switch.js"></script>
  <!--  Plugin for the Sliders, full documentation here: http://refreshless.com/nouislider/ -->
  <script src="./assets/js/plugins/nouislider.min.js" type="text/javascript"></script>
  <!-- Chart JS -->
  <script src="./assets/js/plugins/chartjs.min.js"></script>
  <!--  Plugin for the DatePicker, full documentation here: https://github.com/uxsolutions/bootstrap-datepicker -->
  <script src="./assets/js/plugins/moment.min.js"></script>
  <script src="./assets/js/plugins/bootstrap-datetimepicker.js" type="text/javascript"></script>
  <!-- Black Dashboard DEMO methods, don't include it in your project! -->
  <script src="./assets/demo/demo.js"></script>
  <!-- Control Center for Black UI Kit: parallax effects, scripts for the example pages etc -->
  <script src="./assets/js/blk-design-system.min.js?v=1.0.0" type="text/javascript"></script>
  <!-- Script Home -->
  
    <script>
            tinymce.init({
            selector: 'textarea#basic-example',
            height: 500,
            menubar: false,
            plugins: [
                'advlist autolink lists link image charmap print preview anchor',
                'searchreplace visualblocks code fullscreen',
                'insertdatetime media table paste code help wordcount'
            ],
            toolbar: 'undo redo | formatselect | ' +
            'bold italic backcolor | alignleft aligncenter ' +
            'alignright alignjustify | bullist numlist outdent indent | ' +
            'removeformat | help',
            content_style: 'body { font-family:Helvetica,Arial,sans-serif; font-size:14px }'
            });
    </script>
</body>

</html>
