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
                            Dashboard
                        <small style = "text-transform: uppercase"><?php echo $_SESSION['user_name'];?></small>
                        </h1>
                        
                    </div>
                </div>
                
                <!-- /.row -->
                
                <div class="row">
                    <div class="col-lg-3 col-md-6">
                        <div class="panel panel-primary">
                            <div class="panel-heading">
                                <div class="row">
                                    <div class="col-xs-3">
                                        <i class="fa fa-file-text fa-5x"></i>
                                    </div>
                                    <div class="col-xs-9 text-right">
                            
                                    
                                  <div class='huge'><?php echo $post_counts  =  get_count("posts");?></div>
                                        <div>Posts</div>
                                    </div>
                                </div>
                            </div>
                            <a href="posts.php">
                                <div class="panel-footer">
                                    <span class="pull-left">View Details</span>
                                    <span class="pull-right"><i class="fa fa-arrow-circle-right"></i></span>
                                    <div class="clearfix"></div>
                                </div>
                            </a>
                        </div>
                    </div>
                    <div class="col-lg-3 col-md-6">
                        <div class="panel panel-green">
                            <div class="panel-heading">
                                <div class="row">
                                    <div class="col-xs-3">
                                        <i class="fa fa-comments fa-5x"></i>
                                    </div>
                                    <div class="col-xs-9 text-right">

                                                                    
                                     <div class='huge'><?php echo $comment_counts = get_count("comments");?></div>
                                      <div>Comments</div>
                                    </div>
                                </div>
                            </div>
                            <a href="comments.php">
                                <div class="panel-footer">
                                    <span class="pull-left">View Details</span>
                                    <span class="pull-right"><i class="fa fa-arrow-circle-right"></i></span>
                                    <div class="clearfix"></div>
                                </div>
                            </a>
                        </div>
                    </div>
                    <div class="col-lg-3 col-md-6">
                        <div class="panel panel-yellow">
                            <div class="panel-heading">
                                <div class="row">
                                    <div class="col-xs-3">
                                        <i class="fa fa-user fa-5x"></i>
                                    </div>
                                    <div class="col-xs-9 text-right">
                                    
                                    <div class='huge'><?php echo $users_counts = get_count("users");?></div>
                                        <div> Users</div>
                                    </div>
                                </div>
                            </div>
                            <a href="users.php">
                                <div class="panel-footer">
                                    <span class="pull-left">View Details</span>
                                    <span class="pull-right"><i class="fa fa-arrow-circle-right"></i></span>
                                    <div class="clearfix"></div>
                                </div>
                            </a>
                        </div>
                    </div>
                    <div class="col-lg-3 col-md-6">
                        <div class="panel panel-red">
                            <div class="panel-heading">
                                <div class="row">
                                    <div class="col-xs-3">
                                        <i class="fa fa-list fa-5x"></i>
                                    </div>
                                    <div class="col-xs-9 text-right">
                                    
                                      
                                        <div class='huge'><?php echo $categories_counts = get_count("categories");?></div>
                                         <div>Categories</div>
                                    </div>
                                </div>
                            </div>
                            <a href="categories.php">
                                <div class="panel-footer">
                                    <span class="pull-left">View Details</span>
                                    <span class="pull-right"><i class="fa fa-arrow-circle-right"></i></span>
                                    <div class="clearfix"></div>
                                </div>
                            </a>
                        </div>
                    </div>
                </div>
                <!-- /.row -->            
<?php
                
    $approve_posts_counts = get_count("posts WHERE post_status = 'approve'");
                
    $draft_posts_counts = get_count("posts WHERE post_status = 'draft'");

    $approve_comments_counts = get_count("comments WHERE comment_status = 'approve'");
     
    $draft_comments_counts = get_count("comments WHERE comment_status = 'draft'");
    
    $normal_users_counts = get_count("users WHERE user_role = 'user'");
    
    $admins_counts = get_count("users WHERE user_role = 'admin'");
            
                ?>
               
                <div class="row">
                    
                    <script type="text/javascript">
                          google.charts.load('current', {'packages':['bar']});
                          google.charts.setOnLoadCallback(drawChart);

      function drawChart() {
        var data = google.visualization.arrayToDataTable([
          ['Data', 'Count'],
            
            <?php 
            
            $element_text = ['Active Posts' , 'Pennding Posts' , 'Active Comments' ,'Pennding Comments', 'Users' ,'Admin' ,  'Categories'  ];
            $element_count = [$approve_posts_counts , $draft_posts_counts ,$approve_comments_counts , $draft_comments_counts , $normal_users_counts , $admins_counts , $categories_counts];
            
            for($i = 0 ; $i < 7; $i++){
            
                echo "['{$element_text[$i]}'" . "," . "{$element_count[$i]}],"  ;
            
            
            }
            
            
            ?>
            
            
            
          
        ]);

        var options = {
          chart: {
            title: '',
            subtitle: '',
          }
        };

        var chart = new google.charts.Bar(document.getElementById('columnchart_material'));

        chart.draw(data, google.charts.Bar.convertOptions(options));
      }
                    </script>
                    
                    
                    <div id="columnchart_material" style="width: 'auto'; height: 500px;"></div>
                    
                    
                </div>
                
                <!-- /.row -->

            </div>
            <!-- /.container-fluid -->

        </div>
        <!-- /#page-wrapper -->
   <?php include "includes/admin_footer.php" ;?>




    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/css/toastr.min.css" integrity="sha256-ENFZrbVzylNbgnXx0n3I1g//2WeO47XxoPe0vkp3NC8=" crossorigin="anonymous" />
    <script src="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/js/toastr.min.js" integrity="sha256-3blsJd4Hli/7wCQ+bmgXfOdK7p/ZUMtPXY08jmxSSgk=" crossorigin="anonymous"></script>

  <script src="https://js.pusher.com/4.4/pusher.min.js"></script>

  <script>
        $(document).ready(function(){

            var pusher = new Pusher('79cc26062060f93b0980' , {

                cluster: 'us2',
                forceTLS: true
            });

            var notificationChannel = pusher.subscribe('notifications');

              notificationChannel.bind('new_user' , function(notification){

                var message = notification.message;
                toastr.success(`${message} just register`);
                

              });


        });



  </script>