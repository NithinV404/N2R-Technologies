<?php
/* Database credentials. Assuming you are running MySQL
server with default setting (user 'root' with no password) */
define('DB_SERVER', 'db');
define('DB_USERNAME', 'php_docker');
define('DB_PASSWORD', 'password');
define('DB_NAME',"n2r_technologies");

include('../database/database.php');
 
/* Attempt to connect to MySQL database */
$link = mysqli_connect(DB_SERVER, DB_USERNAME, DB_PASSWORD);

// Check connection
if(!$link)
{
    echo("Connection failed");
}

try
{
    if(mysqli_num_rows(mysqli_query($link,"SHOW DATABASES LIKE '".DB_NAME."'"))<1){
            $create_db = "CREATE DATABASE IF NOT EXISTS n2r_technologies";
            mysqli_query($link,$create_db);
            mysqli_select_db($link,DB_NAME);
        }
    else
    mysqli_select_db($link,DB_NAME);

    if($insert_values==1 && mysqli_num_rows(mysqli_query($link,"SHOW TABLES LIKE 'product_details'"))<1)
    {
        //Tables creation if not exists
        foreach($tables_list as $t)
         mysqli_query($link,$t);
        
        //Quering intial values to tables
        foreach($table_entry_list as $t)
        {
                mysqli_multi_query($link,$t);
        }
    }
    
    }
catch(Exception $e)
{
    echo($e);
}

?>