<?php
                            
                          
                                ////////////// Update Category QUERY    
                             if(isset($_POST['update_category'])){
                                       
                                        $cat_title = $_POST['cat_title'];
                                        $query = "UPDATE categories SET cat_title = '{$cat_title}' WHERE id = {$cat_id}";
                                        $update_category = mysqli_query($connection , $query);
                                        
                                        if(!$update_category){
                                        
                                            die("QUERY FAILED " . mysqli_error($connection));
                                            
                                        }else{
                                            
                                            header("Location: categories.php");
                                            echo "<h4>CATEGORY UPDATED</h4>";
                                        
                                        }
                                    
                                    
                                    }
                            
                            
                            
                            
                            
                            if(isset($_GET['edit'])){ 
                            
                            $cat_id = $_GET['edit'];
                            
                            $query = "SELECT * FROM categories WHERE id = '{$cat_id}' ";
                            $select_categories_id = mysqli_query($connection , $query);
                            
                            while($row  = mysqli_fetch_assoc($select_categories_id)){
                            
                            $cat_title = $row['cat_title'];
                            
                            
                            }
                            
                            
                            
                            ?>
                                
                                
                            <form action="" method = "post" >
                                <div class="form-group">
                                   <label for="cat-title">Edit Category</label>
                                    <input class = "form-control" value = "<?php if(isset($cat_title)){ echo $cat_title ;}?>" type="text" name = "cat_title">
                                </div>
                                <div class="form-group">
                                    <input class = "btn btn-success" type="submit" name = "update_category" value = "Update Category">
                                </div>
                            
                            
                            </form>
                           
                            
                            
                            
                           <?php } ?>
                           