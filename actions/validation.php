<?php

include "connect.php";

function emptyValues($username,$mobilenumber,$password,$cpassword,$photo,$std){
    $value;
    if(empty($username) || empty($mobilenumber) || empty($password) || empty($cpassword) || empty($photo) || empty($std)){
     $value=true;
    }else{
        $value=false;
    }
    return $value;
}

function invalidUsername($username){
    $value;
    if(!preg_match("/^[a-zA-Z]+$/", $username)){
        $value=true;
    }else{
        $value=false;
    }
    return $value;
}

function invalidMobilenumber($mobilenumber){
    $value;
    if(!preg_match("/^[0][\d]{9}$/", $mobilenumber)){
        $value=true;
    }else{
        $value=false;
    }
    return $value;
}

function invalidPassword($password){
    $value;
    if(!preg_match("/^.{5,}$/", $password)){
        $value=true;
    }else{
        $value=false;
    }
    return $value;
}

function notMatchPaasAndCpass($password,$cpassword){
    $value;
    if($password !== $cpassword){
        $value=true;
    }else{
        $value=false;
    }
    return $value;
}

function fileErrorHandling($photo,$photoTmpName,$photosize,$photoerror,$phototype){
    $value;
    $fileExt = explode('.',$photo);

    $fileActualExt = strtolower($fileExt['1']);

    $allowed = array('jpg','jpeg','png');

    if(in_array($fileActualExt,$allowed)){
        if($photoerror === 0){
            if($photosize <1000000){
              
                $fileNewname = uniqid('',true).".".$fileActualExt;

                $fileDest = '../uploads/'.$fileNewname;
                move_uploaded_file($photoTmpName,$fileDest);
                $value=false;
            }else{
                $value=true;
            }
        }else{
            $value=true;
        }
    }else{
       $value=true;
    }
  return $value;
}


function availableMobilenumber($conn,$mobilenumber){
    $value;
    $sql = "SELECT * FROM user WHERE mobile = ?;";

    $stmt = mysqli_stmt_init($conn);

    if(!mysqli_stmt_prepare($stmt,$sql)){
        header("location: registration.php?signup=stmtfailed");
        exit();
    }else{
        mysqli_stmt_bind_param($stmt, "s", $mobilenumber);

        mysqli_stmt_execute($stmt);

        $data = mysqli_stmt_get_result($stmt);

        if(!mysqli_fetch_assoc($data)){
            $value=false;
        }else{
            $value=true;
        }
    }
    return $value;
}
?>