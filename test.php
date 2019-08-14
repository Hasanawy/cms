<?php

$error_msgs = [];
$error_msgs[1] = ["Fileds Cannot Be Empty"] ;
                    $error_msgs[2] =  ["Username Is Alraedy Taken "]  ;

                    $error_msgs[3] = ["Email Is Already Taken "] ;

                    foreach ($error_msgs as $msg ) {
                    	# code...
                    	echo "<div class='alert alert-danger text-center' role='alert'>".implode(', ', $msg)."</div>";
                    }
?>


<pre>
	<?php print_r($error_msgs) ; ?>
	<?php echo count($error_msgs); ?>
</pre>