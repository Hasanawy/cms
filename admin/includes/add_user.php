<?php

if (isset($_POST['create_user'])){
    
    $user_name          = $_POST['user_name'] ;
    $user_password      = $_POST['user_password'];
    $user_firstname     = $_POST['user_firstname'] ;
    $user_lastname      = $_POST['user_lastname'] ;
    $user_email         = $_POST['user_email'] ;
    
    $user_image         = $_FILES['image']['name'];
    $user_image_temp    = $_FILES['image']['tmp_name'];
    
    $user_role          = $_POST['user_role'] ;
    $user_status        = "draft" ;
    
    
    move_uploaded_file($user_image_temp , "../images/$user_image");
    
     
    if(empty($user_image)){
        
        echo "<div class='alert alert-danger' role='alert'>
                Please Choose The Image
                </div>";
    
    
    }
    
    if($user_role == "..."){
        
        echo "<div class='alert alert-danger' role='alert'>
                Please Choose The Role
                </div>";
    
    
    }else{
    
    $user_password = password_hash($user_password , PASSWORD_BCRYPT , array('cost' => 12)); 

    
    $query = "INSERT INTO users(user_name , user_password , user_firstname , user_lastname , user_email , user_image , user_role , user_status ) ";
    $query .= "VALUES('{$user_name}','{$user_password}','{$user_firstname}', '{$user_lastname}' , '{$user_email}' , '{$user_image}' , '{$user_role}' ,'{$user_status}'  ) ";
    
    $create_user_query = mysqli_query($connection , $query);
    
    confirmQuery($create_user_query);
        header("Location: users.php");


}

}


?>
 

 
 
 
 
 <form action = "" method="post" enctype="multipart/form-data">
  <div class="form-group">
    <label for="user_name">Username</label>
    <input type="text" class="form-control" name = "user_name" placeholder="Enter Your Username">
  </div>
  
  <div class="form-group">
    <label for="user_password">Password</label>
    <input type="password" class="form-control" name = "user_password" placeholder="Enter Your Password">
  </div>
  
  
  
  <div class="form-group">
    <label for="first_name">First Name</label>
    <input type="text" class="form-control" name = "user_firstname" placeholder="Enter Your First Name">
  </div>
  
   <div class="form-group">
    <label for="last_name">Last Name</label>
    <input type="text" class="form-control" name = "user_lastname" placeholder="Enter Your Last Name">
  </div>
  
  <div class="form-group">
    <label for="email">Email</label>
    <input type="email" class="form-control" name = "user_email" placeholder="Enter Your Email">
  </div>
  
 <div class="form-group">
    <label for="user_role">User Role</label>
    <select name="user_role" id="" class = "form-control">
       <option value="...">...</option>
        <option value="admin">Admin</option>
        <option value="user">User</option>
        
        
    </select>
  </div>
  
  <div class="form-group">
    <label for="user_image">User Image</label>
    <input type="file" class="form-control-file" name = "image">
  </div>
  
   
  
  
  
  
  
  <button type="submit" class="btn btn-primary" name = "create_user">Add User</button>
</form>