<?php

$db['db_host'] = "sql312.epizy.com";
$db['db_user'] = "epiz_24321692";
$db['db_pass'] = "iqFsGrjSB2GXZK";
$db['db_name'] = "epiz_24321692_cms";

foreach($db as $key => $value){


    define( strtoupper($key) , $value ); 
    
}


$connection = mysqli_connect(DB_HOST , DB_USER , DB_PASS , DB_NAME);

if($connection){


}else{

    die("Database Connection Failed" . mysqli_error($connection));

}


?>