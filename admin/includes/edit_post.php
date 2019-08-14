<?php


if(isset($_GET['p_id'])){
    
    $the_post_id = $_GET['p_id'];
    $query = "SELECT * FROM posts WHERE post_id = '{$the_post_id}' ";
    $select_post_by_id = mysqli_query($connection ,$query);
                
        $row = mysqli_fetch_assoc($select_post_by_id);
                $post_id            = $row['post_id'];
                $post_author        = $row['post_author'];
                $post_title         = $row['post_title'];
                $post_category_id   = $row['post_category_id'];
                $post_status        = $row['post_status'];
                $post_image         = $row['post_image'];
                $post_tags          = $row['post_tags'];
                $post_comment_count = $row['post_comment_count'];
                $post_date          = $row['post_date'];
                $post_content       = $row['post_content'];
    

}


if(isset($_POST['update_post'])){

    
    $post_title         = $_POST['post_title'];
    $post_category_id   = $_POST['post_category'];
    $post_author        = $_POST['post_author'];
    $post_status        = $_POST['post_status'];
    $post_image         = $_FILES['image']['name'];
    $post_image_temp    = $_FILES['image']['tmp_name'];
    $post_tags          = $_POST['post_tags'];
    $post_content       = $_POST['post_content'];
    
    
    
    move_uploaded_file($post_image_temp , "../images/$post_image");
    
    if(empty($post_image)){
        $query              = "SELECT * FROM posts WHERE post_id = '{$the_post_id}' ";
        $select_image       = mysqli_query($connection , $query);
        $row                = mysqli_fetch_assoc($select_image);
        $post_image         = $row['post_image'];

    
    
    }
    if($post_category_id == 0 ){
        $query              = "SELECT * FROM posts WHERE post_id = '{$the_post_id}' ";
        $select_cat       = mysqli_query($connection , $query);
        $row                = mysqli_fetch_assoc($select_cat);
        $post_category_id         = $row['post_category_id'];

    
    
    }
    
    

    $query      = "UPDATE posts SET ";
    $query     .= "post_title = '{$post_title}', ";
    $query     .= "post_category_id = '{$post_category_id}', ";
    $query     .= "post_date = now(), ";
    $query     .= "post_author = '{$post_author}', ";
    $query     .= "post_status = '{$post_status}', ";
    $query     .= "post_tags = '{$post_tags}', ";
    $query     .= "post_content = '{$post_content}', ";
    $query     .= "post_image = '{$post_image}' ";
    $query     .= "WHERE post_id = {$the_post_id} ";
    
    
    $update_post = mysqli_query($connection , $query);
    
    confirmQuery($update_post);
    

//    header("Location: posts.php");
    
   
        echo "<div class='alert alert-success' role='alert'>
   Post Updated   <a href = '../post.php?p_id=".$the_post_id."' > View Post  </a>
        </div>"  ;
       
        

        
   
    
}

?>
 

 
 
 
 
 <form action = "" method="post" enctype="multipart/form-data">
  <div class="form-group">
    <label for="post_title">Post Title</label>
    <input type="text" class="form-control" name = "post_title" placeholder="Enter The Post Title"
     value = "<?php echo $post_title?>">
  </div>
  
  <div class="form-group">
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
     
     <option value="<?php echo $post_status?>"><?php echo $post_status?></option>
     
     <?php
        
        if($post_status == "approve"){
            echo "<option value='draft'>draft</option>";
        }else{
            echo "<option value='approve'>approve</option>";
        
        }
        
        
        ?>
     
     
      </select>
  </div>
  
  <div class="form-group">
    <img width = "100" src="../images/<?php echo $post_image?>" alt="">
    <label for="post_image">Post Image</label>
    <input type="file" class="form-control" name = "image">
  </div>
  
  <div class="form-group">
    <label for="post_tags">Post Tags</label>
    <input type="text" class="form-control" name = "post_tags" placeholder="Tag1 , Tag2 , Tag3 , "
    value = "<?php echo $post_tags?>">
  </div>
  
  <div class="form-group">
    <label for="post_content">Post Content</label>
    <textarea class="form-control" name = "post_content" rows="8"><?php echo $post_content?></textarea>
  </div>
  
  
  <button type="submit" class="btn btn-primary" name = "update_post">Update Post</button>
</form>