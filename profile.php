<?php

    include "includes/header.php";
    include "includes/user-inc.php";
     
    if(!isset($_SESSION["username"])){
        header("location: login.php");
        exit();
    }

    // since we included the user-inc file, we have access to the result of the SQL statement
    $username = $user["username"];
    $name = $user["name"];
    $surname = $user["surname"];
    $age = $user["age"];
?>

<div class="container mt-2">
    <div class="row">
        <div class="col-2">
            <img 
                src="images/user.png" 
                alt="Default User Icon"
                style="height:100px;width:100px;"
            >
        </div>
        <div class="col-10">
            <p><b><?php echo $username; ?></b></p>
            <p><?php echo "{$name} {$surname}"; ?></p>
            <p>Age: <?php echo $age; ?></p>
        </div>
    </div>
</div>


    


<?php include "includes/footer.php";?>