<?php 
    include "dbh.php";
    require_once "functions.php";

    // For now, we will always load the user with ID:1. This will be changed later on
    $userId = $_SESSION["userId"];
    $user = getUser($conn, $userId);
?> 