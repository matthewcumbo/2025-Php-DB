<?php 

require_once "dbh.php";
require_once "functions.php";

if(!isset($_POST["uploadFile"])){
    header("location: ../edit-profile.php");
    exit();
}
else{
    session_start();

    if($_POST["uploadFile"] == "upload"){
        $userId = $_SESSION["userId"];

        // print_r($_FILES);
        // die();
        $fileName = $_FILES["userFile"]["name"];
        $fileTmpName = $_FILES["userFile"]["tmp_name"];
        $fileSize = $_FILES["userFile"]["size"];
        $fileError = $_FILES["userFile"]["error"];
        $fileType = $_FILES["userFile"]["type"];

        $allowed = array("jpg","jpeg","png","webp");
        $fileTypeArray = explode(".",$fileName);
        $fileExtActual = end($fileTypeArray);
        $fileExt = strtolower($fileExtActual);

        if(!in_array($fileExt, $allowed)){
            header("location: ../edit-profile.php?error=filetype");
            exit();
        }

        if($fileError!=0){
            header("location: ../edit-profile.php?error=fileUpload");
            exit();
        }

        if($fileSize > 1000000000){
            // Calculated in bytes
            // 1024 bytes = 1kb
            // 1024kb = 1mb
            header("location: ../edit-profile.php?error=fileSize");
            exit();
        }

        $newFileName = uniqid($userId."-",true).".".$fileExt;
        $uploadDir = "../imageUploads/".$newFileName;
        // echo $newFileName;
        // die();

        move_uploaded_file($fileTmpName, $uploadDir);


        header("location: ../edit-profile.php?succes=true");
        exit();



    }
}




?>