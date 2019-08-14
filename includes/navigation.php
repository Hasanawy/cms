
       

<nav class="navbar navbar-inverse navbar-fixed-top" role="navigation">
       
       
        <div class="container">
            <!-- Brand and toggle get grouped for better mobile display -->
            <div class="navbar-header">
                <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1">
                    <span class="sr-only">Toggle navigation</span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                </button>
                <a class="navbar-brand" href="index.php">CMS SYSTEM</a>
            </div>
            <!-- Collect the nav links, forms, and other content for toggling -->
            <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
                <ul class="nav navbar-nav">
                   
                   <?php
                    
                    $query = "SELECT * FROM categories LIMIT 5";
                    $select_all_categories_query = mysqli_query($connection , $query);
                    while($row = mysqli_fetch_assoc($select_all_categories_query)){
                        
                        
                        $cat_id = $row['id'];
                        $cat_title = $row['cat_title'] ;
                        
                        
                        $registration = "registration.php";
                        $contact = "contact.php";
                        
                        $category_class = "";
                        $regstration_class = "";
                        $contact_class = "";
                        

                        $pageName =  basename($_SERVER['PHP_SELF']);
                        
                        if(isset($_GET['category']) && $_GET['category'] == $cat_id ){
                        
                        $category_class = "active";
                        
                        }else if($pageName == $registration){
                            
                            $regstration_class = "active";
                            
                        }else if($pageName == $contact){
                            
                            $contact_class = "active";
                        
                        }
                        
                        echo "<li class = '$category_class'> <a href='categories.php?category=$cat_id'> {$cat_title} </a> </li>";
                    
                    
                    
                    }
                    
                    
                    
                    
                    ?>
                   
                   
                   <?php 
                    if(isset($_SESSION["user_role"])){
                        
                        if($_SESSION["user_role"] == "admin"){

                            echo "<li><a style = 'color : #22d3ef' href='admin/'>ADMIN</a></li>";
                            echo "<li><a style = 'color : red' href='includes/logout.php'>LOGOUT</a></li>";
                            if(isset($_GET['p_id'])){
                                $the_post_id = $_GET['p_id'];
                                echo "<li><a style = 'color : #1cff0c' href = 'admin/posts.php?source=edit_post&p_id={$the_post_id}' >EDITE</a></li>";
                            
                            }

                        }else{
                        
                            echo "<li><a style = 'color : red' href='includes/logout.php'>LOGOUT</a></li>";
                        
                        }
                        
                        
                    }elseif(!isset($_SESSION["user_role"])){
                            
                            echo "<li class = '$contact_class'> <a href='contact.php'>CONTACT</a> </li>";
                            echo "<li class = '$regstration_class' > <a href='registration.php'>REGISTER</a> </li>";
                        
                        }
                    
                    ?>
                    
                    
                    
                    
                    
                
                    
                    
                    
                </ul>
                
                
                
                
                
                
                
            </div>
            <!-- /.navbar-collapse -->
        </div>
        <!-- /.container -->
        
        
        
        
        
        
    </nav>
    
   
  