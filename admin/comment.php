<?php include "includes/admin_header.php" ;?>

    <div id="wrapper">

        <!-- Navigation -->
        <?php include"includes/admin_navigation.php";?>
        
        <div id="page-wrapper">

            <div class="container-fluid">

                <!-- Page Heading -->
                <div class="row">
                    <div class="col-lg-12">
                        <h1 class="page-header">
                            Post Comment Page
                        <small style = "text-transform: uppercase"><?php echo $_SESSION['user_name'];?></small>
                        </h1>
                        
                        
<?php

if(isset($_GET['id'])){

    $comment_post_id  = $_GET['id'];
} else {
   die();
}

?>
<?php 
if(isset($_POST['checkBoxArray'])){
    foreach($_POST['checkBoxArray'] as $checkBoxValue){
        
        $bulk_options = $_POST['bulk_options'];
        
        switch($bulk_options){
        
            case 'approve' :
                $query = "UPDATE comments SET comment_status = 'approve' WHERE comment_id = $checkBoxValue";
                $approve_query = mysqli_query($connection , $query);
                confirmQuery($approve_query);
    header("Location: comment.php?id={$comment_post_id}");
                break;
                
            case 'unapprove' :
                $query = "UPDATE comments SET comment_status = 'draft' WHERE comment_id = $checkBoxValue";
                $unapprove_query = mysqli_query($connection , $query);
                confirmQuery($unapprove_query);
    header("Location: comment.php?id={$comment_post_id}");
                break;
                
                
            case 'clone' :
            $query = "SELECT * FROM comments WHERE comment_id = '{$checkBoxValue}' ";
            $colne_comment = mysqli_query($connection ,$query);
                
        $row = mysqli_fetch_assoc($colne_comment);
                $comment_post_id        = $row['comment_post_id'];
                $comment_author         = $row['comment_author'];
                $comment_email          = $row['comment_email'];
                $comment_content        = $row['comment_content'];
                $comment_status         = $row['comment_status'];
                $comment_date           = date("d-m-Y");
                
                
                
               $query = "INSERT INTO comments(comment_post_id , comment_author , comment_email , comment_content , comment_status , comment_date ) ";
                    $query .= "VALUES ($comment_post_id,'$comment_author','$comment_email','$comment_content','$comment_status',now())";
                    
                    
                    
                    $create_comment_query = mysqli_query($connection , $query);
                    
                    if(!isset($create_comment_query)){
                        
                        die('CREATE QUERY FAILED ... ' . mysqli_error($connection));
                    
                    }
                    
                    

                    $query = "UPDATE posts SET post_comment_count = post_comment_count + 1 ";
                    $query .= "WHERE post_id = $comment_post_id";
                    
                    $update_comment_count = mysqli_query($connection , $query);
                

    break;            
                
                    
                
                
                
                
                
            case 'delete' :
                $query = "DELETE FROM comments WHERE comment_id = '{$checkBoxValue}' ";
                $delete_query = mysqli_query($connection , $query);
                confirmQuery($delete_query);
    header("Location: comment.php?id={$comment_post_id}");
                break;

            
        
        
        }
    
    }

}


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
        </div> 
                           
                           
                           
                            <thead>
                                <tr>
                                    <th><input id = "selectAllBoxes" type="checkbox"></th>
                                    <th>ID</th>
                                    <th>AUTHOR</th>
                                    <th>COMMENT</th>
                                    <th>EMAIL</th>
                                    <th>STATUS</th>
                                    <th>IN RESPONSE TO</th>
                                    <th>DATE</th>
                                    <th>DELETE</th>
                                    <th>APPROVE/UNAPPROVE</th>
                                   
                                </tr>
                            </thead>
                        
                        
                            <tbody>
<?php 
        ////// SELECT ALL POSTS QUERY        
                $query = "SELECT * FROM comments WHERE comment_post_id = '{$comment_post_id}'";
                $select_all_comments= mysqli_query($connection ,$query);
                
                while ($row = mysqli_fetch_assoc($select_all_comments)){
                $comment_id            = $row['comment_id'];
                $comment_post_id       = $row['comment_post_id'];
                $comment_author        = $row['comment_author'];
                $comment_email         = $row['comment_email'];
                $comment_content       = $row['comment_content'];
                $comment_status        = $row['comment_status'];
                $comment_date          = $row['comment_date'];
                
                
                    
                $query = "SELECT * FROM posts WHERE post_id = '$comment_post_id' ";
                $select_post = mysqli_query($connection , $query);
                $row = mysqli_fetch_assoc($select_post);
                $post_title = $row['post_title'];
                
                
                ?>
                              
                               
                               
                               
                               
                                <tr>
<th>
                <input  class = "checkBoxes" type="checkbox" name ="checkBoxArray[]" value = "<?php echo $comment_id?>">
                </th>
                                    <th><?php echo $comment_id ;?></th>
                                    <th><?php echo $comment_author;?></th>
                                    <th><?php echo $comment_content;?></th>
                                    <th><?php echo $comment_email;?></th>
                                    <th><?php echo $comment_status;?></th>
                                    
                                    <th><a href="../post.php?p_id=<?php echo $comment_post_id;?>"><?php echo $post_title;?></a></th>
                                    <th><?php echo $comment_date;?></th>
                                    
                                    <th><a class = "btn btn-danger" href="?id=<?php echo $comment_post_id?>&delete=<?php echo $comment_id ;?>">Delete</a></th>
                                    
                                    <?php
                                    if($comment_status !== "approve"){
                                    echo "<th><a class = 'btn btn-info' href = '?id={$comment_post_id} & approve=".$comment_id."'>Approve</a></th>";
                                    }else{
                                    echo "<th><a class = 'btn btn-warning' href = '?id={$comment_post_id} & unapprove=".$comment_id."'>Unapprove</a></th>";
                                    
                                    }
                                    
                                    ?>
                                    
                                </tr>
                                
                                
                                
                        <?php }?>
                            </tbody>
                        
</table>
</form>

<?php

//////// UNAPROVE THE COMMENTS

if(isset($_GET['unapprove'])){

    $the_comment_id = $_GET['unapprove'];
    $query = "UPDATE comments SET comment_status = 'draft' WHERE comment_id = $the_comment_id";
    $unapprove_query = mysqli_query($connection , $query);
    confirmQuery($unapprove_query);
    header("Location: comment.php?id={$comment_post_id}");
    


}

//////// APROVE THE COMMENTS

if(isset($_GET['approve'])){

    $the_comment_id = $_GET['approve'];
    $query = "UPDATE comments SET comment_status = 'approve' WHERE comment_id = $the_comment_id";
    $approve_query = mysqli_query($connection , $query);
    confirmQuery($approve_query);
    header("Location: comment.php?id={$comment_post_id}");
    


}

///////// DELETE POST QUERY

if(isset($_GET['delete'])){

    $the_comment_id = $_GET['delete'];
    $query = "DELETE FROM comments WHERE comment_id = '{$the_comment_id}' ";
    $delete_query = mysqli_query($connection , $query);
    confirmQuery($delete_query);
    header("Location: comment.php?id={$comment_post_id}");
    echo "<h4>POST DELETED</h4>";


}







?>




                    
                        
                        
                    </div>
                </div>
                <!-- /.row -->

            </div>
            <!-- /.container-fluid -->

        </div>
        <!-- /#page-wrapper -->
   <?php include "includes/admin_footer.php" ;?>
