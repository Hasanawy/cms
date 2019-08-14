<?php 
if(isset($_POST['checkBoxArray'])){
    foreach($_POST['checkBoxArray'] as $checkBoxValue){
        
        $bulk_options = $_POST['bulk_options'];
        
        switch($bulk_options){
        
            case 'approve' :
                $query = "UPDATE posts SET post_status = 'approve' WHERE post_id = $checkBoxValue";
                $approve_query = mysqli_query($connection , $query);
                confirmQuery($approve_query);
                header("Location: posts.php");
                break;
                
            case 'unapprove' :
                $query = "UPDATE posts SET post_status = 'draft' WHERE post_id = $checkBoxValue";
                $unapprove_query = mysqli_query($connection , $query);
                confirmQuery($unapprove_query);
                header("Location: posts.php");
                break;
                
                
            case 'clone' :
            $query = "SELECT * FROM posts WHERE post_id = '{$checkBoxValue}' ";
            $colne_post = mysqli_query($connection ,$query);
                
        $row = mysqli_fetch_assoc($colne_post);
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
                
                
                
                
                $query = "INSERT INTO posts(post_category_id , post_title , post_author , post_date , post_image , post_content , post_tags , post_comment_count , post_status) ";
    $query .= "VALUES({$post_category_id},'{$post_title}','{$post_author}', now() , '{$post_image}' , '{$post_content}' , '{$post_tags}' ,'{$post_comment_count}' , '{$post_status}' ) ";
    
    $create_post_query = mysqli_query($connection , $query);
    
    confirmQuery($create_post_query);
    header("Location: posts.php");

    break;            
                
                
                
                
                
                
                
                
            case 'delete' :
                $query = "DELETE FROM posts WHERE post_id = '{$checkBoxValue}' ";
                $delete_query = mysqli_query($connection , $query);
                confirmQuery($delete_query);
                header("Location: posts.php");
                break;

            
        
        
        }
    
    }

}


?>
<?php







?>                          
                          
                          

                           
<form action="" method = "post"> 
    
            
<table class = "table table-bordered table-hover">
                           
        <div id="bulkOptionContainer" class = "col-xs-4">
            <select class = "form-control" name="bulk_options" id="">
               
                <option value="">Select Option</option>
                <option value="approve">Publish</option>
                <option value="unapprove">Draft</option>
                <option value="clone">Clone</option>
                <option value="delete">Delete</option>

            </select>
        </div> 
        <div class="col-xs-4">
            <input type="submit" name = "submit" class = "btn btn-success" value ="Apply" >
            <a class = "btn btn-primary" href="posts.php?source=add_post">Add New </a>
        </div>                         
                                     
                           
                           
                            <thead>
                                <tr>
                                    <th><input id = "selectAllBoxes" type="checkbox"></th>
                                    <th>ID</th>
                                    <th>AUTHOR</th>
                                    <th>TITLE</th>
                                    <th>CATEGORY</th>
                                    <th>STATUS</th>
                                    <th>IMAGE</th>
                                    <th>TAGS</th>
                                    <th>COMMENTS</th>
                                    <th>VIEWS</th>
                                    <th>DATE</th>
                                    <th>EDIT</th>
                                    <th>DELETE</th>
                                    <th>PUPLISHED</th>
                                </tr>
                            </thead>
                        
                        
                            <tbody>
<?php 
        ////// SELECT ALL POSTS QUERY        
                // $query = "SELECT * FROM posts ORDER BY post_id DESC";
                $query = "SELECT * , categories.id , categories.cat_title ";
                $query .= " FROM posts ";
                $query .= "LEFT JOIN categories ON posts.post_category_id = categories.id ";


                $select_all_posts= mysqli_query($connection ,$query);
                
                while ($row = mysqli_fetch_assoc($select_all_posts)){
                $post_id            = $row['post_id'];
                $post_author        = $row['post_author'];
                $post_title         = $row['post_title'];
                $post_category_id   = $row['post_category_id'];
                $post_status        = $row['post_status'];
                $post_image         = $row['post_image'];
                $post_tags          = $row['post_tags'];
                $post_comment_count = $row['post_comment_count'];
                $post_date          = $row['post_date'];
                $post_views_count   = $row['post_views_count'];
                $category_name      = $row['cat_title'];
                
                
                    
                  
                $query = "SELECT * FROM comments WHERE comment_post_id = '{$post_id}' ";
                $comment_count_query = mysqli_query($connection , $query);
                $comment_count = mysqli_num_rows($comment_count_query);
                
                
                ?>
                              
                               
                               
                               
                               
                                <tr>
                <th>
                <input  class = "checkBoxes" type="checkbox" name ="checkBoxArray[]" value = "<?php echo $post_id?>">
                </th>

                                    
                                    
                                    <th><?php echo $post_id ?></th>
                                    <th><?php echo $post_author;?></th>
                                    <th><a href="../post.php?p_id=<?php echo $post_id ?>"><?php echo $post_title;?></a></th>
                                    <th><?php echo $category_name;?></th>
                                    <th><?php echo $post_status;?></th>
                                    <th><img width = "100" src="../images/<?php echo $post_image;?>" alt=""></th>
                                    <th><?php echo $post_tags;?></th>
                                    <th><a href="comment.php?id=<?php echo $post_id ?>"><?php echo $comment_count;?></a></th>
                                    <th><?php echo $post_views_count;?></th>
                                    <th><?php echo $post_date;?></th>
                                    <th><a class = "btn btn-success" href="?source=edit_post&p_id=<?php echo $post_id ;?>">Edit</a></th>
                                    <th><a onClick ="javascript: return confirm('Are You Sure That You Want To Delete That Post');" class = "btn btn-danger" href="?delete=<?php echo $post_id ;?>">Delete</a></th>
                                    <?php
                                    if($post_status !== "approve"){
                                    echo "<th><a class = 'btn btn-info' href = '?approve=".$post_id."'>Approve</a></th>";
                                    }else{
                                    echo "<th><a class = 'btn btn-warning' href = '?unapprove=".$post_id."'>Unapprove</a></th>";
                                    
                                    }
                                    
                                    ?>
                                    
                                </tr>
                                
                                
                                
                        <?php }?>
                            </tbody>
                        
</table>

</form>


<?php

//////// UNAPROVE THE POSTS

if(isset($_GET['unapprove'])){

    $the_post_id = $_GET['unapprove'];
    $query = "UPDATE posts SET post_status = 'draft' WHERE post_id = $the_post_id";
    $unapprove_query = mysqli_query($connection , $query);
    confirmQuery($unapprove_query);
    header("Location: posts.php");
    


}

//////// APROVE THE POSTS

if(isset($_GET['approve'])){

    $the_post_id = $_GET['approve'];
    $query = "UPDATE posts SET post_status = 'approve' WHERE post_id = $the_post_id";
    $approve_query = mysqli_query($connection , $query);
    confirmQuery($approve_query);
    header("Location: posts.php");
    


}



///////// DELETE POST QUERY

if(isset($_GET['delete'])){
    
    if(!isset($_SESSION['user_role'])){
        
        die();
    
    }
    if($_SESSION['user_role'] !== 'admin'){
        die();
    }

    $the_post_id = $_GET['delete'];
    $query = "DELETE FROM posts WHERE post_id = '{$the_post_id}' ";
    $delete_query = mysqli_query($connection , $query);
    confirmQuery($delete_query);
    header("Location: posts.php");
    echo "<h4>POST DELETED</h4>";


}







?>



