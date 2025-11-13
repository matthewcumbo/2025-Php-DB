<?php 
    // We need an open connection to the database, so we access dbh for that
    require_once "dbh.php";
    require_once "functions.php";

    // Once we included the functions file, we can seamlessly access the functions inside of it
    $result = getUsers($conn);

    /*
        Here, we loop over the results of the SQL statement,
        structuring each result in an Associative Array format
    */

    while($row = mysqli_fetch_assoc($result)){
        // print_r($row);
        // echo "<br/>";

        // Once formated, we can now access each field of the database table we are reading from
        $id = $row['id'];
        $username = $row['username'];
        $password = $row['password'];
        $name = $row['name'];
        $surname = $row['surname'];
        $age = $row['age'];

        echo "<div class='col'>";
        echo "<h2>{$username}</h2><h4>{$name} {$surname}</h4> <p>({$age} years old)</p>";
        echo "</div>";

    }

?>