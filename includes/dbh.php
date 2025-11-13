<?php 
    // This is a DataBase Handler

    /* 
        The following are the server and database details.
        By default, Database Username is 'root'.
        Password is empty for Windows (XAMPP) or 'root' on iOS (MAMP).
        You should always set these up in the settings of the database via PHPMyAdmin for security purposes.
    */
    $server = "localhost";
    $dbName = "2025-1stDb";
    $dbUsername = "root";
    $dbPassword = "root";

    // The following function creates a connection to the database use the above config
    $conn = mysqli_connect($server, $dbUsername, $dbPassword, $dbName);

    // The following shows us an error if we have one
    if(!$conn){
        die("Connection failed: ".mysqli_connect_error());
    }


?>