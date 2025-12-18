<?php 

require_once "dbh.php";
require_once "functions.php";

session_start();

$userId = $_SESSION["userId"];
deleteUser($conn, $userId);

include "logout-inc.php";

?>