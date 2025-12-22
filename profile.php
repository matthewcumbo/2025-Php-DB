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
    $profileImageUrl = $user["url"];

    // Here, we can set up the default image url
    $imageUrl = "images/user.png";
    // And then, if we actually have an image url from the database, we replace that default image url
    if($profileImageUrl != null && $profileImageUrl != ""){
        $imageUrl = "imageUploads/".$profileImageUrl;
    }
?>

<div class="container mt-2">
    <div class="row">
        <div class="col-2">
            <!-- Here we build an img element with the url of the image built in PHP. If we have an image url in the database, we use that, otherwise, we get the default image. -->
            <img 
                src="<?php echo $imageUrl; ?>" 
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