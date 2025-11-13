<?php 
    // We need an open connection to the database, so we access dbh for that
    require_once "dbh.php";
    require_once "functions.php";

    $result = getUsers($conn);


    while($row = mysqli_fetch_assoc($result)){
        // print_r($row);
        // echo "<br/>";

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