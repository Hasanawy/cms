<?php



function get_count($string){
    
    global $connection;
    $query = "SELECT * FROM $string";
    $select_all_query = mysqli_query($connection , $query);
    confirmQuery($select_all_query);
    $count = mysqli_num_rows($select_all_query);
    return $count;


}

function escape($string){

    global $connection;
    return mysqli_real_escape_string($connection , trim($string));


}





function users_online(){
   
    if(isset($_GET['onlineusers'])){

        global $connection;
        
        if(!$connection){
        
            session_start();
            include"../../includes/db.php";
            
            
            $session = session_id();
            $time = time();
            $time_out_in_seconds = 5;
            $time_out = $time - $time_out_in_seconds;

            $query = "SELECT * FROM users_online WHERE session = '$session' ";
            $send_query = mysqli_query($connection , $query);
            $count = mysqli_num_rows($send_query);


            // IF NEW USER LOGIN 
            if($count == NULL){

                $query = "INSERT INTO users_online(session , time) VALUES ('$session','$time')";
                mysqli_query($connection , $query);

            }else{
                //IF USER IS ALREADY LOGIN 
                $query = "UPDATE users_online SET time = '$time' WHERE session = '$session' ";
                mysqli_query($connection , $query);
            }

            $query = "SELECT * FROM users_online WHERE time > '$time_out' ";
            $users_online_query = mysqli_query($connection , $query) ;

            echo $count_users = mysqli_num_rows($users_online_query);
            
        
        }// INLUCED BRACKET

            

    } // GET REQUEST ISSET BRACKET
}// MAIN FUNCTION BRACKET



//CALL THE FUNCTION 
users_online();


    
    
    
function confirmQuery($queryName){
    global $connection;
    if(!$queryName){
    
        die("CREAT POST QUERY FAILED" . mysqli_error($connection));
    
    }
    
}



function insert_categories(){

  if(isset($_POST['submit'])){
    global $connection;
    $cat_title = $_POST['cat_title'];
      
    if($cat_title == "" || empty($cat_title)){

        echo "<h4>Category Title Cannot Be Empty</h4>";

    }else {

        $query = "INSERT INTO categories(cat_title) ";
        $query .= "VALUE('$cat_title')";
        $create_category_query = mysqli_query($connection , $query);
        
        ////// IF THERE IS ERRORS DIE
        if(!$create_category_query){
            die("QUERY FAILED " . mysqli_error($connection));
        }else{

            echo "<h4>Category Added </h4>";
        }


    }




}
                        
}


function find_all_categories(){

    global $connection;
    $query = "SELECT * FROM categories";
    $select_categories_sidebar = mysqli_query($connection , $query);

    ?>







        <table class = "table table-bordered table-hover">
            <thead>
                <tr>
                    <th>Id </th>
                    <th> Category Title</th>
                </tr>
            </thead>
            <tbody>
               <?php 
                while($row = mysqli_fetch_assoc($select_categories_sidebar)){
                    $cat_id = $row['id'];
                    $cat_title = $row['cat_title'] ;
                    ?>

                    <tr>
                    <td><?php echo $cat_id?></td>
                    <td><?php echo $cat_title?></td>
                    <td><a class = "btn btn-danger" href="?delete=<?php echo $cat_id ;?>">Delete</a></td>
                    <td><a class = "btn btn-success" href="?edit=<?php echo $cat_id ;?>">Edit</a></td>

                    </tr>

                <?php } 

    




}


function delete_categories(){

global $connection;
    if(isset($_GET['delete'])){
                                    
        $get_cat_id = $_GET['delete'];
        $query = "DELETE FROM categories WHERE id = {$get_cat_id}";
        $delete_category = mysqli_query($connection , $query);

        if(!$delete_category){

            die("QUERY FAILED " . mysqli_error($connection));

        }else{
            echo "<h4>CATEGORY DELETED</h4>";
            header("Location: categories.php");
            echo "<h4>CATEGORY DELETED</h4>";

        }


    }
                                    











}


function edite_categories(){

if(isset($_GET['edit'])){
global $connection;
                        $cat_id = $_GET['edit'];

                        include "update_categories.php";


                        }
    
    

}



function username_exists($user_name){

        global $connection ;
        $query = "SELECT user_name FROM users WHERE user_name = '$user_name' ";
        $result = mysqli_query($connection , $query );

        confirmQuery($result);


        if(mysqli_num_rows($result) > 0 ){

            return true;

        }else{

            return false;
        }

}

function email_exists($user_email){

    global $connection;
    $query = "SELECT user_email FROM users WHERE user_email = '$user_email' ";
    $result = mysqli_query($connection , $query);

    confirmQuery($result);

    if(mysqli_num_rows($result) > 0 ){

        return true;

    }else{

        return false;

    }



}

function register_user($user_name , $user_email , $user_password){

    global $connection;

    $error_msgs = [];

                
                if(empty($user_name) && empty($user_email) && empty($user_password)){

                    $error_msgs[1] = ["Fileds Cannot Be Empty"] ;

                }if(strlen($user_name) < 4){

                    $error_msgs[2] = ["Username Must Be More Than 4 Charcters"] ;

                }if(strlen($user_password) < 5){

                    $error_msgs[3] = ["Password Must Be More Than 5 Charcters"] ;

                }if(username_exists($user_name)){

                    $error_msgs[4] =  ["Username Is Alraedy Taken "]  ;

                }if (email_exists($user_email)){

                    $error_msgs[5] = ["Email Is Already Taken , <a href ='index.php' > Please Login</a> "] ;

                }

                if(count($error_msgs) > 0){

                    echo "<div class='alert alert-danger text-center' role='alert'>";
                    foreach ($error_msgs as $msg ){
                        echo implode(', ', $msg) . "<br>";
                    }
                    echo "</div>";
                } else{


                $user_name               =   mysqli_real_escape_string($connection , $user_name);
                $user_email              =   mysqli_real_escape_string($connection , $user_email);
                $user_password           =   mysqli_real_escape_string($connection , $user_password);

                $user_password           = password_hash($user_password , PASSWORD_BCRYPT , array('cost' => 12)); 


                $query = "INSERT INTO users (user_name , user_email , user_password , user_role ) ";
                $query .= "VALUES ('{$user_name}' , '$user_email' , '$user_password' , 'user')";
                $register_user_query = mysqli_query($connection , $query);
                    
                    if(!$register_user_query){

                        die("Query Failed" .  mysqli_error($connection));

                    }

                echo "<div class='alert alert-success text-center' role='alert'>Registeration Successful You Can  <a href = 'index.php'> Login Now</a>
                </div>"  ;  

                }



}



function login_user($user_name , $user_password){

    global $connection;
    $error_msgs = [];

    $user_name          = mysqli_real_escape_string($connection , $user_name);
    $user_password      = mysqli_real_escape_string($connection , $user_password);
    
    $query = "SELECT * FROM users WHERE user_name = '{$user_name}' ";
    
    $select_user_query = mysqli_query($connection , $query);
    
    if(!$select_user_query){
        die("LOGIN QUERY FAILED " .mysqli_error($connection) );
    }

    if(mysqli_num_rows($select_user_query) > 0){


        while($row = mysqli_fetch_assoc($select_user_query)){
    
        $db_user_id             = $row['user_id'];
        $db_user_name           = $row['user_name'];
        $db_user_password       = $row['user_password'];
        $db_user_firstname      = $row['user_firstname'];
        $db_user_lastname       = $row['user_lastname'];
        $db_user_role           = $row['user_role'];
        
    
    }
    
    ///////////////  REVIRSE CRYPT FUNCTION ////////////////// 
    
//    $user_password = crypt($user_password , $db_user_password);
    
//    if($user_name === $db_user_name && $user_password === $db_user_password)
    
    
    if(password_verify($user_password , $db_user_password)){
        
        $_SESSION['user_id']          = $db_user_id;
        $_SESSION['user_name']          = $db_user_name;
        $_SESSION['user_firstname']     = $db_user_firstname;
        $_SESSION['user_lastname']      = $db_user_lastname;
        $_SESSION['user_role']          = $db_user_role;
        
        if($_SESSION['user_role'] !== "admin"){
            
            header("Location: index.php ");
            
        }else{
            
            header("Location: admin/ ");
        
        }
    
    }else{
        
    // header("Location: ../index.php ");
        $error_msgs[1] =  ["Password Is Incorrect "]  ;
    }







     }else{
        $error_msgs[2] =  ["Username Is Incorrect "]  ;
     }
    
       if(count($error_msgs) > 0){

                    echo "<div class='alert alert-danger text-center' role='alert'>";
                    foreach ($error_msgs as $msg ){
                        echo implode(', ', $msg) . "<br>";
                    }
                    echo "</div>";

                } else{}


    

}






?>