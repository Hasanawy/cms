<?php 
if(isset($_POST['checkBoxArray'])){
    foreach($_POST['checkBoxArray'] as $checkBoxValue){
        
        $bulk_options = $_POST['bulk_options'];
        
        switch($bulk_options){
        
            case 'approve' :
                $query = "UPDATE users SET user_status = 'approve' WHERE user_id = $checkBoxValue";
                $approve_query = mysqli_query($connection , $query);
                confirmQuery($approve_query);
                header("Location: users.php");
                break;
                
            case 'unapprove' :
                $query = "UPDATE users SET user_status = 'draft' WHERE user_id =  $checkBoxValue";
                $unapprove_query = mysqli_query($connection , $query);
                confirmQuery($unapprove_query);
                header("Location: users.php");
                break;
                
                
            
            case 'delete' :
                $query = "DELETE FROM users WHERE user_id = '{$checkBoxValue}' ";
                $delete_query = mysqli_query($connection , $query);
                confirmQuery($delete_query);
                header("Location: users.php");
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
                <option value="delete">Delete</option>

            </select>
        </div> 
        <div class="col-xs-4">
            <input type="submit" name = "submit" class = "btn btn-success" value ="Apply" >
            <a class = "btn btn-primary" href="users.php?source=add_user">Add New </a>
        </div>   
                           
                           
                           
                            <thead>
                                <tr>
                                    <th><input id = "selectAllBoxes" type="checkbox"></th>
                                    <th>ID</th>
                                    <th>USERNAME</th>
                                    <th>FIRSTNAME</th>
                                    <th>LASTNAME</th>
                                    <th>EMAIL</th>
                                    <th>IMAGE</th>
                                    <th>STATUS</th>
                                    <th>ROLE</th>
                                    <th>EDIT</th>
                                    <th>DELETE</th>
                                    <th>APPROVE/UNAPPROVE</th>
                                   
                                </tr>
                            </thead>
                        
                        
                            <tbody>
<?php 
        ////// SELECT ALL POSTS QUERY        
                $query = "SELECT * FROM users ";
                $select_all_users= mysqli_query($connection ,$query);
                
                while ($row = mysqli_fetch_assoc($select_all_users)){
                $user_id            = $row['user_id'];
                $user_name          = $row['user_name'];
                $user_firstname     = $row['user_firstname'];
                $user_lastname      = $row['user_lastname'];
                $user_email         = $row['user_email'];
                $user_image         = $row['user_image'];
                $user_role          = $row['user_role'];
                $user_status        = $row['user_status'];
                
                
                
                
                    
                
                
                
                ?>
                              
                               
                               
                               
                               
                                <tr>
                                    <th>
                                        <input  class = "checkBoxes" type="checkbox" name ="checkBoxArray[]" value = "<?php echo $user_id?>">
                                    </th>
                                    <th><?php echo $user_id ;?></th>
                                    <th><?php echo $user_name;?></th>
                                    <th><?php echo $user_firstname;?></th>
                                    <th><?php echo $user_lastname ;?></th>
                                    <th><?php echo $user_email ;?></th>
                                    <th><img width = "100" src="../images/<?php echo $user_image;?>" alt=""></th>
                                    <th><?php echo $user_status ;?></th>
                                    <th><?php echo $user_role;?></th>
                                    
                                    <th><a class = "btn btn-success" href="?source=edit_user&user_id=<?php echo $user_id ;?>">Edit</a></th>
                                    <th><a class = "btn btn-danger" href="?delete=<?php echo $user_id ;?>">Delete</a></th>
                                    
                                    <?php
                                    if($user_status !== "approve"){
                                    echo "<th><a class = 'btn btn-info' href = '?approve=".$user_id."'>Approve</a></th>";
                                    }else{
                                    echo "<th><a class = 'btn btn-warning' href = '?unapprove=".$user_id."'>Unapprove</a></th>";
                                    
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

    $the_user_id = $_GET['unapprove'];
    $query = "UPDATE users SET user_status = 'draft' WHERE user_id = $the_user_id";
    $unapprove_query = mysqli_query($connection , $query);
    confirmQuery($unapprove_query);
    header("Location: users.php");
    


}

//////// APROVE THE COMMENTS

if(isset($_GET['approve'])){

    $the_user_id = $_GET['approve'];
    $query = "UPDATE users SET user_status = 'approve' WHERE user_id = $the_user_id";
    $approve_query = mysqli_query($connection , $query);
    confirmQuery($approve_query);
    header("Location: users.php");
    


}

///////// DELETE POST QUERY

if(isset($_GET['delete'])){

    if(!isset($_SESSION['user_role'])){
        
        die();
    
    }
    if($_SESSION['user_role'] !== 'admin'){
        die();
    }
    
    
    $the_user_id = $_GET['delete'];
    $query = "DELETE FROM users WHERE user_id = '{$the_user_id}' ";
    $delete_query = mysqli_query($connection , $query);
    confirmQuery($delete_query);
    header("Location: users.php");
    echo "<h4>POST DELETED</h4>";


}







?>



