<?php
    // if user id is not send die
if(!isset($_GET['user_id'])){
    
    die();
    
}

$the_user_id = $_GET['user_id'];
$query = "SELECT * FROM users WHERE user_id = '$the_user_id' ";
$select_user = mysqli_query($connection , $query);
confirmQuery($select_user);

    $row = mysqli_fetch_assoc($select_user);

    $user_name          = $row['user_name'];
    $user_password      = $row['user_password'];
    $user_firstname     = $row['user_firstname'] ;
    $user_lastname      = $row['user_lastname'] ;
    $user_email         = $row['user_email'] ;
    $user_image         = $row['user_image'];
    $randSalt           = $row['randSalt'];
    $user_role          = $row['user_role'] ;
   
// if update button pressed
if (isset($_POST['update_user'])){
    
    $user_name          = $_POST['user_name'] ;
    $user_password      = $_POST['user_password'];
    $old_password       = $_POST['old_password'];
    $user_firstname     = $_POST['user_firstname'] ;
    $user_lastname      = $_POST['user_lastname'] ;
    $user_email         = $_POST['user_email'] ;
    $user_image         = $_FILES['image']['name'];
    $user_image_temp    = $_FILES['image']['tmp_name'];
    $user_role          = $_POST['user_role'] ;
   
    move_uploaded_file($user_image_temp , "../images/$user_image");
     
    if(empty($user_image)){
        
        $user_image = $row['user_image'];
    }
    if(empty($user_password)){
    
       $user_password = $old_password;
    
    }else{
    
        $user_password = password_hash($user_password , PASSWORD_BCRYPT , array('cost' => 12)); 
    }
    
    
    $query      = "UPDATE users SET ";
    $query     .= "user_name = '{$user_name}', ";
    $query     .= "user_password = '{$user_password}', ";
    $query     .= "user_firstname = '{$user_firstname}', ";
    $query     .= "user_lastname = '{$user_lastname}', ";
    $query     .= "user_email = '{$user_email}', ";
    $query     .= "user_image = '{$user_image}', ";
    $query     .= "user_role = '{$user_role}' ";
    $query     .= "WHERE user_id = {$the_user_id} ";
    
    $update_user = mysqli_query($connection , $query);
    
    confirmQuery($update_user);
    
    header("Location: users.php");
    
}
?>
 
 <form action = "" method="post" enctype="multipart/form-data">
     
      <div class="form-group">
        <label for="user_name">Username</label>
        <input type="text" class="form-control" name = "user_name" value = "<?php echo $user_name?>" placeholder="Enter Your Username">
      </div>

      <div class="form-group">
        <label for="user_password">Password</label>
        <input type="password" autocomplete = "off" class="form-control" name = "user_password" placeholder="Enter Your Password">
        <input type="hidden" value = "<?php echo $user_password?>" name = "old_password">
      </div>
      
      <div class="form-group">
        <label for="first_name">First Name</label>
        <input type="text" class="form-control" name = "user_firstname" value = "<?php echo $user_firstname?>"placeholder="Enter Your First Name">
      </div>

       <div class="form-group">
        <label for="last_name">Last Name</label>
        <input type="text" class="form-control" name = "user_lastname" value = "<?php echo $user_lastname?>" placeholder="Enter Your Last Name">
      </div>

      <div class="form-group">
        <label for="email">Email</label>
        <input type="email" class="form-control" name = "user_email" value = "<?php echo $user_email?>" placeholder="Enter Your Email">
      </div>

     <div class="form-group">
        <label for="user_role">User Role</label>
        <select name="user_role" id="" class = "form-control">
           
            <option value="<?php echo $user_role?>"><?php echo $user_role?></option>            
            <?php
            if($user_role == "admin"){

                echo "<option value = 'user'>User</option>";

            }elseif($user_role !== "admin"){
                echo "<option value = 'admin'>Admin</option>";
            }
            ?>

        </select>
      </div>

      <div class="form-group">
        <label for="user_image">User Image</label>
        <img width = "100" src="../images/<?php echo $user_image?>" alt="">
        <input type="file" class="form-control-file" name = "image" >
      </div>
  
      <button type="submit" class="btn btn-primary" name = "update_user">Update User</button>
</form>