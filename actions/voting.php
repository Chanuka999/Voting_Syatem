<?php

session_start();
include "connect.php";

$votes = $_POST['groupvotes'];
$totalvotes = $votes+1;

$gid = $_POST['groupid'];
$uid= $_SESSION['id'];

$sql1 = "UPDATE user SET votes = '$totalvotes' WHERE id='$gid'";
$updatevotes = mysqli_query($conn,$sql1);

$sql2 = "UPDATE user SET status=1 WHERE id='$uid'";
$updatestatus = mysqli_query($conn,$sql2);

if($updatevotes and $updatestatus){
   $getgroups = mysqli_query($conn,"SELECT username,photo,votes,id from user where standard='group'");
    $groups=mysqli_fetch_all($getgroups,MYSQLI_ASSOC);
    $_SESSION['groups'] = $groups;
    $_SESSION['status'] =1;
    echo '<script>alert("voting successfull")</script>';
    header("location: ../partials/dashboard.php?");
}else{
    header("location: ../partials/dashboard.php?technicalError=voteAfterSometime");
     
}


?>