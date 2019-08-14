<?php  include "includes/db.php"; ?>
 <?php  include "includes/header.php"; ?>
 <?php
    
    
                            
                          
                        
                        

    if(isset($_POST['submit'])){
        
        $to                     =   "mohamedhasen227@gmail.com";
        $subject                =   $_POST['subject'];
        $body                   =   $_POST['body'];
        
                if(!empty($subject) && !empty($body) ){


                $subject                =   mysqli_real_escape_string($connection , $subject);
                $body                   =   mysqli_real_escape_string($connection , $body);




                
                  echo "<div class='alert alert-success text-center' role='alert'>Registeration Submitted Successfuly
                </div>"  ;  



                }else{

                     echo "<div class='alert alert-danger text-center' role='alert'>Fileds Cannot Be Empty
                </div>"  ;
                }
        
        
    }
?>

    <!-- Navigation -->
    
    <?php  include "includes/navigation.php"; ?>
    
 
    <!-- Page Content -->
    <div class="container">
    
<section id="login">
    <div class="container">
        <div class="row">
            <div class="col-xs-6 col-xs-offset-3">
                <div class="form-wrap">
                <h1>Contact</h1>
                    <form role="form" action="" method="post" id="login-form" autocomplete="off">
                        <div class="form-group">
                            <label for="email" class="sr-only">Email</label>
                            <input type="email" name="email" id="email" class="form-control" placeholder="Enter Your Email">
                        </div>
                         <div class="form-group">
                            <label for="subject" class="sr-only">Subject</label>
                            <input type="text" name="subject" id="subject" class="form-control" placeholder="Enter Your Subject">
                        </div>
                         <div class="form-group">
                         <textarea name="body" class = "form-control" id="body"  rows="13"></textarea>
                        </div>
                
                        <input type="submit" name="submit" id="btn-login" class="btn btn-custom btn-lg btn-block" value="Submit">
                    </form>
                 
                </div>
            </div> <!-- /.col-xs-12 -->
        </div> <!-- /.row -->
    </div> <!-- /.container -->
</section>


        <hr>



<?php include "includes/footer.php";?>
