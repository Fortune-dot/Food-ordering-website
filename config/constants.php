<?php 
    //Start Session
    session_start();

    //Get Heroku ClearDB connection information
    $cleardb_url = parse_url(getenv("CLEARDB_DATABASE_URL"));
    $cleardb_server = $cleardb_url["host"];
    $cleardb_username = $cleardb_url["user"];
    $cleardb_password = $cleardb_url["pass"];
    $cleardb_db = substr($cleardb_url["path"],1);
    $active_group = 'default';
    $query_builder = TRUE;

    //Create Constants to Store Non Repeating Values
    define('SITEURL', 'https://foodmasters.herokuapp.com/');
    define('HOST', '$cleardb_server');
    define('DB_USERNAME', '$cleardb_username');
    define('DB_PASSWORD', '$cleardb_password');
    define('DB_NAME', '$cleardb_db');

    
        // Connect to DB
    $conn = mysqli_connect($cleardb_server, $cleardb_username, $cleardb_password, $cleardb_db);
    $db_select = mysqli_select_db($conn, $cleardb_db) or die(mysqli_error()); //Selecting Database


?>
