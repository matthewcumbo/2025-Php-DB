<?php
    // This file will be used for all code that interacts with the database

    function getUsers($conn){
        /* 
            This function sets up an SQL statement, and tests if it will work.
            If there's a problem with the SQL statement, it will show an error.
            Otherwise, it executes the SQL statment, and returns the result to wherever it is called from.
            IMPORTANT: the database connection must always be closed.
        */
        $sql = "SELECT * FROM users";
        $stmt = mysqli_stmt_init($conn);

        if(!mysqli_stmt_prepare($stmt,$sql)){
            echo "<p>We have an error.</p>";
            exit();
        }

        mysqli_stmt_execute($stmt);

        $result = mysqli_stmt_get_result($stmt);
        mysqli_stmt_close($stmt);

        return $result;
    }
?>