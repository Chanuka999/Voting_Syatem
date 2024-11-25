<?php

session_start();
$data =  $_SESSION['data'];

?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Voting_System-Dashboard</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body class="bg-secondary text-light">
   <div class="container my-5">
     <a href="#"><button class="btn btn-dark text-light px-3">Back</button></a>
     <a href="logout.php"><button class="btn btn-dark text-light px-3">Logout</button></a>
     <h1 class="my-3">Voting System</h1>
     <div class="row my-5">
        <div class="col-md-7">
             <div class="row">
                <div class="col-md-4">
                    <img src="" alt="Group image">
                </div>
                <div class="col-md-8">
                    <strong class="text-dark h5">Group name:</strong><br>
                    <strong class="text-dark h5">Votes:</strong><br>
                </div>
             </div>
             <hr>
        </div>
        <div class="col-md-5">
            <img src="../uploads/<?php echo $data['photo'];  ?>" alt="user image">
            <br>
            <br>
            <strong class="text-dark h5">Name:</strong><?php echo $data['username'];  ?><br><br>
            <strong class="text-dark h5">Mobile:</strong><?php echo $data['mobile'];  ?><br><br>
            <strong class="text-dark h5">Status:</strong><?php echo $data['status'];  ?><br><br>
        </div>
     </div>
   </div>
</body>
</html>