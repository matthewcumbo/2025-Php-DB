<?php 

require_once "dbh.php";
require_once "functions.php";

session_start();

$userId = $_SESSION["userId"];

if(isset($_POST["submit"])){
    $username = $_POST["username"];
    $password = $_POST["password"];
    $firstName = $_POST["name"];
    $lastName = $_POST["surname"];
    $age = $_POST["age"];

    // Here we should have data validation function calls to check that the user filled in the form correctly 
    // If not, we should redirect back to the back with an error in the querystring, just like in the registration page

    // For now, we will assume that everything is valid

    editUser($conn, $userId, $username, $password, $firstName, $lastName, $age);

    header("location: ../edit-profile.php?succeess=true");
    exit();

}



?>