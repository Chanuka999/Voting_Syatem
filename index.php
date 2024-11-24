<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Voting system</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body class="bg-dark">
    <h1 class="text-info text-center p-3">Voting System</h1>
    <div class="bg-info py-4">
        <h2 class="text-center">Login</h2>
        <div class="container text-center">
            <form action="">
                <div class="mb-3">
                    <input type="text" class="form-control w-50 m-auto" name="username" placeholder="Enter your username" require="requried">
                 </div>
                 <div class="mb-3">
                    <input type="text" class="form-control w-50 m-auto" name="mobile" placeholder="Enter your mobile" require="requried" maxLenght="10" minLenght="10">
                    </div>
                    <div class="mb-3">
                    <input type="password" class="form-control w-50 m-auto" name="password" placeholder="Enter your password" require="requried">
                 </div>
                 <div class="mb-3">
                    <select name="std" class="form-select w-50 m-auto">
                        <option value="group">Group</option>
                        <option value="voter">voter</option>
                    </select>
                 </div>
                 <button type="submit" class="btn btn-dark my-4">Login</button>
                 <p>Don't have an account?<a href="./partials/registration.php" class="text-white"> Register here</a></p>
                 
            </form>
        </div>
    </div>
</body>
</html>