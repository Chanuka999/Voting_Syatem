<?php

include "connect.php";
include "validation.php";

if(isset($_POST["register"])){
    $username = $_POST["username"];
    $mobilenumber = $_POST["mobilenumber"];
    $password = $_POST["password"];
    $cpassword = $_POST["cpassword"];
    $photo = $_FILES["photo"]["name"];
    $photoTmpName = $_FILES["photo"]["tmp_name"];
    $photosize = $_FILES["photo"]["size"];
    $photoerror= $_FILES["photo"]["error"];
    $phototype = $_FILES["photo"]["type"];
    $std = $_POST["std"];


    if(emptyValues($username,$mobilenumber,$password,$cpassword,$photo,$std)){
        header("location: ../partials/registration.php?singup=emptyError");
    }
    else if(invalidUsername($username)){
        header("location:  ../partials/registration.php?singup=invalidUsername");
    }
    else if(invalidMobilenumber($mobilenumber)){
        header("location:  ../partials/registration.php?singup=invalidMobilenumber");
    }
    else if(invalidPassword($password)){
        header("location:  ../partials/registration.php?singup=invalidpassword");
    }
    else if(notMatchPaasAndCpass($password,$cpassword)){
        header("location: registration.php?singup=notmatchPassword");
    }
    else if(fileErrorHandling($photo,$photoTmpName,$photosize,$photoerror,$phototype)){
        header("location:  ../partials/registration.php?singup=fileError");
    }
    else if(availableMobilenumber($conn,$mobilenumber)){
        header("location:  ../partials/registration.php?singup=mobilenumbnerAvailable");
    }else{
        userRegistration($conn,$username,$mobilenumber,$password,$cpassword,$photo, $photoTmpName, $photosize , $photoerror,$phototype,$std);
    }

    
}
function userRegistration($conn,$username,$mobilenumber,$password,$cpassword,$photo, $photoTmpName, $photosize , $photoerror,$phototype,$std){

    $passwordHash = password_hash($password, PASSWORD_DEFAULT);

    $sql = "INSERT INTO user (username,mobile,password,photo,standard,status,votes) VALUES ('$username','$mobilenumber','$passwordHash','$photo','$std',0,0);";

    $res =mysqli_query($conn,$sql);
    if($res == true){
        header("location: ../index.php?signup=success");
    }else{
        header("location: ../partials/registration.php");
    }
    // $stmt = mysqli_stmt_init($conn);

    // if(!mysqli_stmt_prepare($stmt,$sql)){
    //     header("location: registration.php?err=stmtFailed");
    // }else{
    //     mysqli_stmt_bind_param($stmt, "ssssiii" , $username,$mobilenumber,$passwordHash,$photo,$std,0,0);

    //     mysqli_stmt_excute($stmt);
        
    //     mysqli_stmt_close($stmt);
    //     header("location: index.php?signup=success");
    // }
}
?>