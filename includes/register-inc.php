<!-- This file is meant to be executed once the registration form is submitted. -->
<?php 
    require_once "dbh.php";
    require_once "functions.php";

    // The $_POST superglobal contains all information submitted via a posted form.
    // The value of each input will be in a key-value-pair, the key being the name of the input. 
    // Here, we are checking if submit exists $_POST contains something called sumbit, this is the name of the submit button. 
    if(!isset($_POST["submit"])){
        // If submit does not exist, then the form was not submitted.
        // i.e. the user is trying to access this file without submitting a form (unauthorized access)

        // Redirect user back to registration page
        header("location: ../register.php");
        exit();
    }
    else{
        // Since $_POST is an associative array, we can access the values through the key of that particular value
        $username = $_POST["username"];
        $nationality = $_POST["nationality"];
        $password = $_POST["password"];
        $confpass = $_POST["confpass"];
        $firstName = $_POST["name"];
        $lastName = $_POST["surname"];
        $email = $_POST["email"];
        $age = $_POST["age"];

        $error = "";
        // Before we try and save data into the database, we should always run some data validation to check that everything is ok
        // This example checks if all inputs are filled in 
        if(emptyRegistrationInput($username,$password,$firstName,$lastName,$age,$nationality,$email)){
            // Here we redirect the user back to the register page with an error code in the QueryString
            // This will be used to show an error in the page if the use left some fields empty
            $error = $error."emptyinput=true&";
        }

        if(invalidUsername($username)){
            $error = $error."invalidUsername=true&";
        }

        if(invalidEmail($email)){
            $error = $error."invalidEmail=true&";
        }

        if(passwordsDoNotMatch($password, $confpass)){
            $error = $error."passwordsDoNotMatch=true&";
        }

        if($error != ""){
            header("location: ../register.php?error=true&{$error}");
            exit();
        }

        // We should call each of our validation functions here


        // If all validation has passed, then the user has filled in the form correctly
        // In that case, we call our registerUser function to actually save the data in the database
        registerUser($conn,$username,$password,$firstName,$lastName,$age,$nationality,$email);

        // Once the data hase been saved in the database, we can redirect back to the registration page
        // Here we are adding a QueryString that states that the registration process has been successful
        // This will be used to show a success message to the user
        header("location: ../register.php?success=true");
        exit();
    }





?>