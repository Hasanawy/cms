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
                            Categories Page
                        <small style = "text-transform: uppercase"><?php echo $_SESSION['user_name'];?></small>
                        </h1>
                        
                    <!-- ADD CATEGORY FUNCTION-->
                        <?php insert_categories() ;?>
                        
                        <div class="col-xs-6">
                            <form action="categories.php" method = "post" >
                                <div class="form-group">
                                   <label for="cat-title">Add Category</label>
                                    <input class = "form-control" type="text" name = "cat_title">
                                </div>
                                <div class="form-group">
                                    <input class = "btn btn-primary" type="submit" name = "submit" value = "Add Category">
                                </div>
                            
                            
                            </form>
                            
                        <!-- UPDATE AND UNCLUDE QUERY-->
                        <?php edite_categories() ; ?>
                            
                        </div>
                        
                        
                        <div class="col-xs-6">
                           
                          
                            
                            
                        <!--UPDATE AND INCLUDE  QUERY     -->
                            <?php find_all_categories();?>
                        <!--DELETE QUERY     -->
                            <?php delete_categories() ; ?>
                        
                                    
                                                            
                                </tbody>
                            </table>
                            
                            
                            
                            
                            
                            
                        </div>
                        
                        
                    </div>
                </div>
                <!-- /.row -->

            </div>
            <!-- /.container-fluid -->

        </div>
        <!-- /#page-wrapper -->
   <?php include "includes/admin_footer.php" ;?>
