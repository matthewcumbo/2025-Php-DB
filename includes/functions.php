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
            echo "<p>We have an error - Could not load users.</p>";
            exit();
        }

        mysqli_stmt_execute($stmt);

        $result = mysqli_stmt_get_result($stmt);
        mysqli_stmt_close($stmt);

        return $result;
    }

    function getUser($conn, $userId){
        /*
            This function is very similar to the one above. It gets all details from the users table, but only for one user.
            We add a userId parameter to be able to receive it from elsewhere, and then we can use it to filter out the results through SQL. 
        */
        $sql = "SELECT * FROM users WHERE id = ?;";
        // The ? above is called a wildcard. It's used to test the SQL statement and then replace it with an actual value.
        $stmt = mysqli_stmt_init($conn);

        if(!mysqli_stmt_prepare($stmt,$sql)){
            echo "<p>We have an error - Could not load user.</p>";
            exit();
        }

        // Here, we replace the ? wildcard with an integer, its value being in the userId variable
        mysqli_stmt_bind_param($stmt, "i", $userId);
        
        mysqli_stmt_execute($stmt);

        $result = mysqli_stmt_get_result($stmt);
        mysqli_stmt_close($stmt);

        if($row = mysqli_fetch_assoc($result)){
            return $row;
        }
        else{
            return false;
        }
    }

    function registerUser($conn, $username, $password, $firstName, $lastName, $age, $nationality, $email){
        /*
            This function will insert new data into the database. 
            In our SQL, we need multiple wildcards, since we need to supply multiple pieces of information to be stored in the database.
        */
        $sql = "INSERT INTO users (username,password,name,surname,age,nationality,email) VALUES (?,?,?,?,?,?,?);";

        $stmt = mysqli_stmt_init($conn);

        if(!mysqli_stmt_prepare($stmt,$sql)){
            // Here we are upgrading our error handling, using QueryStrings instead of a simple echo
            header("location: ../register.php?error=stmtfailed");
            exit();
        }

        // Password hashing is an essential process, which will modify how the password is structured and can never be decrypted, making our users' passwords secure
        $hashedPassword = password_hash($password, PASSWORD_DEFAULT);

        mysqli_stmt_bind_param($stmt, "ssssiss", $username, $hashedPassword, $firstName, $lastName, $age, $nationality, $email);

        mysqli_stmt_execute($stmt);
        mysqli_stmt_close($stmt);
    }





    function login($conn, $username, $password){
        $user = userExists($conn, $username);
        
        if(!$user){
            header("location: ../login.php?error=incorrectlogin");
            exit();
        }

        $userId = $user["id"];

        $user = getUser($conn, $userId);
        $dbPassword = $user["password"];
        $checkedPassword = password_verify($password, $dbPassword);

        if(!$checkedPassword){
            header("location: ../login.php?error=incorrectlogin");
            exit();
        }

        session_start();
        $_SESSION["username"] = $username;
        $_SESSION["userId"] = $userId;

        header("location: ../profile.php");
        exit();
    }

    function userExists($conn, $username){
        $sql = "SELECT id FROM users WHERE username = ?;";

        $stmt = mysqli_stmt_init($conn);

        if(!mysqli_stmt_prepare($stmt,$sql)){
            header("location: ../login.php?error=stmtfailed");
            exit();
        }

        mysqli_stmt_bind_param($stmt, "s", $username);
        
        mysqli_stmt_execute($stmt);

        $result = mysqli_stmt_get_result($stmt);
        mysqli_stmt_close($stmt);

        if($row = mysqli_fetch_assoc($result)){
            return $row;
        }
        else{
            return false;
        }

    }





    // Validation functions
    function emptyRegistrationInput($username, $password, $firstName, $lastName, $age, $nationality, $email){
        if(empty($username) || empty($password) || empty($firstName) || empty($lastName) || empty($age) || empty($nationality) || empty($email)){
            return true;
        }
    }

    function invalidUsername($username){
        // allow letters and numbers, but nothing else
        if(!preg_match("/^[a-zA-Z0-9]*$/",$username)){
            return true;
        }
    }

    function passwordsDoNotMatch($password, $confpass){
        // check if passwords have the same value
        if($password != $confpass){
            return true;
        }
    }

    function invalidEmail($email){
        if(!filter_var($email, FILTER_VALIDATE_EMAIL)){
            return true;
        }
    }



    // We should have a bunch of other functions that check different things
    // Examples: 
    // - invalid username  -> maybe we do not want symbols in usernames
    // - invalid password  -> we can check if a password has letters, numbers, and symbols
    // - invalid email     -> check email structure : something@something.something


?>