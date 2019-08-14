<?php

if (isset($_POST['create_post'])){
    
    $post_title = $_POST['post_title'] ;
    $post_author = $_POST['post_author'] ;
    $post_category_id = $_POST['post_category'] ;
    $post_status = $_POST['post_status'] ;
    
    $post_image = $_FILES['image']['name'];
    $post_image_temp = $_FILES['image']['tmp_name'];
    
    $post_tags = $_POST['post_tags'] ;
    $post_content = $_POST['post_content'] ;
    $post_date = date('d-m-y');
    $post_comment_count = 0;
    
    move_uploaded_file($post_image_temp , "../images/$post_image");
    
     
    if(empty($post_image)){
        
        echo "<div class='alert alert-danger' role='alert'>
                Please Choose The Image
                </div>";
    
    
    }
    
    
    if($post_category_id == 0 ){
        
       echo "<div class='alert alert-danger' role='alert'>
                Please Choose The Category
                </div>";
    
    }else{
    
    $query = "INSERT INTO posts(post_category_id , post_title , post_author , post_date , post_image , post_content , post_tags , post_comment_count , post_status) ";
    $query .= "VALUES({$post_category_id},'{$post_title}','{$post_author}', now() , '{$post_image}' , '{$post_content}' , '{$post_tags}' ,'{$post_comment_count}' , '{$post_status}' ) ";
    
    $create_post_query = mysqli_query($connection , $query);
    
    confirmQuery($create_post_query);
        

}
    
    
    $the_post_id = mysqli_insert_id($connection);
    echo "<div class='alert alert-success' role='alert'>
   Post Added   <a href = '../post.php?p_id=".$the_post_id."' > View Post  </a>
        </div>"  ;
    
    
}



?>
 

 
 
 
 
 <form action = "" method="post" enctype="multipart/form-data">
  <div class="form-group">
    <label for="post_title">Post Title</label>
    <input type="text" class="form-control" name = "post_title" placeholder="Enter The Post Title">
  </div>
  
  <div class="form-group">
       <label for="post_category">Post Category</label>

    <select class="form-control" name="post_category" id="">
        <?php
        $query = "SELECT * FROM categories ";
                            $select_categories = mysqli_query($connection , $query);
                            confirmQuery($select_categories);
           
                            echo "<option value = '0' > ... </option>";

                            while($row  = mysqli_fetch_assoc($select_categories)){
                            $cat_id     = $row['id'];
                            $cat_title  = $row['cat_title'];
                                
                            echo "<option value = '$cat_id' >" . $cat_title  . "</option>";
                                
                            }
        
        ?>
        
        
    </select>
  </div>
  
  <div class="form-group">
    <label for="post_author">Post Author</label>
    <select class="form-control" name="post_author" id="">
        <?php
        $query = "SELECT * FROM users ";
                            $select_users = mysqli_query($connection , $query);
                            confirmQuery($select_users);
           
                            echo "<option value = '0' > ... </option>";

                            while($row  = mysqli_fetch_assoc($select_users)){
                            $user_id     = $row['user_id'];
                            $user_name  = $row['user_name'];
                                
                            echo "<option value = '$user_name' >" . $user_name  . "</option>";
                                
                            }
        
        ?>
        
        
    </select>
  </div>
  
  <div class="form-group">
    <label for="post_status">Post Status</label>
    <select class="form-control" name="post_status" id="">
        <option value='approve'>approve</option>
        <option value='draft'>draft</option>
    </select>
  </div>
  
  <div class="form-group">
    <label for="post_image">Post Image</label>
    <input type="file" class="form-control-file" name = "image">
  </div>
  
  <div class="form-group">
    <label for="post_tags">Post Tags</label>
    <input type="text" class="form-control" name = "post_tags" placeholder="Tag1 , Tag2 , Tag3 , ">
  </div>
  
  <div class="form-group">
    <label for="post_content">Post Content</label>
    <textarea class="form-control" name = "post_content" rows="8"></textarea>
  </div>
  
  
  <button type="submit" class="btn btn-primary" name = "create_post">Publish Post</button>
</form>