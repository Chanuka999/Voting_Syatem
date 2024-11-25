<?php

include "connect.php";

session_start();
if(isset($_POST["login"])){
    $username = $_POST["username"];
    $mobile= $_POST["mobile"];
    $password = $_POST["password"];
    $std = $_POST["std"];


    $sql = "SELECT * FROM `user` WHERE username='$username' AND mobile='$mobile' AND password='$password' AND standard='$std';";

    $res=mysqli_query($conn,$sql);

    if(mysqli_num_rows($res)>0){
        $sql="SELECT username,photo,votes,id FROM user WHERE standard='group'";
        $resultGroup = mysqli_query($conn,$sql);
        if(mysqli_num_rows($resultGroup)>0){
            $groups = mysqli_fetch_all($resultGroup,MYSQLI_ASSOC);

           $_SESSION['groups'] = $groups;
        }
        $data = mysqli_fetch_array($res);
        $_SESSION['id'] = $data['id'];
        $_SESSION['status'] = $data['status'];
        $_SESSION['data'] = $data;

        header("location: ../partials/dashboard.php?login=success");
    
    }else{
        echo"invalid codentials";
    }
}


?>