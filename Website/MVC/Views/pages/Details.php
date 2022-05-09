
<?php
        while($rows=mysqli_fetch_array($data["detailsBT"])){?>
        
                <div class="nameBT col-sm-12 col-md-12 col-lg-12 border-bottom"  style="display:block">
                    
                        <?php echo trim($rows["tenbantin"],"<" )?>
                    
                </div>  
                <div style="text-align:center"><img style="width:600px ;height:500px;" src="./Public/images/<?php echo $rows["image"] ?>" alt=""></div>
                <div class="motaBT col-sm-12 col-md-12 col-lg-12">
                        <?php echo $rows["motaDetails"] ?>
                </div>
                <div  class="date col-sm-12 col-md-12 col-lg-12" >
                        <?php 
                            $date=date_create($rows["date_created"]);
                            echo date_format($date,"l H:i:s d-m-Y"); 
                        ?>
                        
                </div>
                <br>
                
        <?php
        }
        


            
                        echo "<div class='container col-sm-12 col-md-12 col-lg-12 border-top text-center'><h1>Mục Bình Luận</h1></div>";
                        while($rows=mysqli_fetch_array($data["comment"])){?>
                                
                                <div class="border-bottom col-sm-12 col-md-12 col-lg-12">
                                        <br>
                                        <div class="col-6 col-sm-6 col-md-6 col-lg-6" style="float:left"><?php echo ' '.$rows["firstname"].' '.$rows["lastname"].' ' ?></div>
                                        <div class="date  col-6 col-sm-6 col-md-6 col-lg-6">
                                                <?php $date=date_create($rows["date"]);
                                                        echo date_format($date,"D H:i d-M-Y"); 
                                                ?>
                                        </div>
                                        <div class="col-12 col-sm-12 col-md-12 col-lg-12"><?php echo $rows["noidung"] ?></div>
                                        
                                        <br>
                                </div>
                                
                                
                                
                                 
                        <?php
                        
                        }
                        
                
        
       

        ?>
        

        
                <?php
                        if(isset($_SESSION["id"])){?>
                                <form action="Home/Comment" method="post">
                                <div class="col-sm-12 col-md-12 col-lg-12">
                                        <br>
                                        <textarea id="basic-comment" name="ndComment"> </textarea>
                                        <br>
                                </div>
                                <div style="display:none">
                                        <select name="idBT">
                                                <option value="<?php echo $_GET["id"];?>" ></option>
                                        </select>
                                        <select name="idUser">
                                                <option value="<?php echo $_SESSION["id"];?>" ></option>
                                        </select>
                                </div>
                                <div class="text-center">
                                        <button type="submit" class="btn btn-success" name="btnComment">Bình luận</button>
                                </div>
                                
                                
                                </form>
                        <?php
                        }else{?>
                                <div class="text-center" style="color:red"><b> 
                                   <a href="login">    Vui lòng login để có thể bình luận bài viết.</a> 
                                </b></div>
                                
                        <?php
                        }
                ?>
        
        <?php
      
       

?>
<script>
tinymce.init({
  selector: '#basic-comment',
  menubar: false,
  height: 300,
  plugins: [
    'searchreplace wordcount visualblocks code  lists ',
    'emoticons template'
  ],
  toolbar: 'undo redo | styleselect | bold italic | alignleft aligncenter alignright alignjustify | ' +
    'bullist numlist outdent indent | ' +
    'emoticons',
  content_style: 'body { font-family:Helvetica,Arial,sans-serif; font-size:14px }'
});

</script>