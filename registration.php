<?php  include "includes/db.php"; ?>
<?php  include "includes/header.php"; ?>
 <?php
    
          require __DIR__ . '/vendor/autoload.php';

          $dotenv = Dotenv\Dotenv::create(__DIR__);
$dotenv->load();

          $options = array(
            'cluster' => 'us2',
            'useTLS' => true
          );

          $pusher = new Pusher\Pusher(
            getenv('APP_KEY'),
            getenv('APP_SECRET'),
            getenv('APP_ID'),
            $options
          );

          
        





    if(!isset($_SESSION["user_role"])){
                            
                          
                        
                        

    if(isset($_POST['submit'])){


        
        $user_name               =   trim($_POST['username']);
        $user_email              =   trim($_POST['email']);
        $user_password           =   trim($_POST['password']);

        register_user($user_name , $user_email , $user_password);

        $data['message'] = $user_name;

        $pusher->trigger('notifications', 'new_user', $data);

               
    } // submit bracket

    } // user role bracket
    else{
   
        header("Location: index.php");
   
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
                <h1>Register</h1>
                    <form role="form" action="registration.php" method="post" id="login-form" autocomplete="off">
                        <div class="form-group">
                            <label for="username" class="sr-only">username</label>

                            <input 
                            type="text"
                            name="username" 
                            id="username" 
                            class="form-control" 
                            placeholder="Enter Desired Username"
                            autocomplete="on"
                            value="<?php echo isset($user_name) ? $user_name : '' ?>" 
                             >

                        </div>
                         <div class="form-group">
                            <label for="email" class="sr-only">Email</label>

                            <input 
                            type="email" 
                            name="email" 
                            id="email" 
                            class="form-control" 
                            placeholder="somebody@example.com"
                            autocomplete = "on"
                            value = "<?php echo isset($user_email) ? $user_email : '' ?>"
                            >

                        </div>
                         <div class="form-group">
                            <label for="password" class="sr-only">Password</label>

                            <input 
                            type="password" 
                            name="password" 
                            id="key" 
                            class="form-control" 
                            placeholder="Password"
                            autocomplete = "on"
                            value = "<?php echo isset($user_password) ? $user_password : '' ?>"

                            >

                        </div>
                
                        <input type="submit" name="submit" id="btn-login" class="btn btn-custom btn-lg btn-block" value="Register">
                    </form>
                 
                </div>
            </div> <!-- /.col-xs-12 -->
        </div> <!-- /.row -->
    </div> <!-- /.container -->
</section>


        <hr>



<?php include "includes/footer.php";?>
