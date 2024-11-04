<?php
session_start();
include("connection.php");
include("functions.php");

if($_SERVER['REQUEST_METHOD'] == "POST"){
    $username = $_POST['username'];
    $password = $_POST['password'];

    if(!empty($username) && !empty($password)){
        $query = "SELECT * FROM users WHERE username = '$username' limit 1";
        $result = mysqli_query($con, $query);
        $logindata = mysqli_fetch_assoc($result);
        $type = $logindata['user_type'];

        switch($type){
            case 'A':
                if($logindata['password'] === $password){
                    $_SESSION['num_id'] = $logindata['id'];
                    $_SESSION['type'] = $type;
                    header("Location: adminpage/index.php");
                    die;
                }
                break;
            case 'U':
                if($logindata['password'] === $password){
                    $_SESSION['num_id'] = $logindata['id'];
                    $_SESSION['type'] = $type;
                    header("Location: userpage/index.php");
                    die;
                }
                break;
            default:
            echo '<script>alert("Undefined user type.")</script>';
        }
    }else{
        echo '<script>alert("Please enter valid information.")</script>';    }
}

?>

<!DOCTYPE html>
<html>
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Pup Kitt | Login</title>
        <link rel="icon" type="image/x-icon" href="/images/logoparent.png">
        <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css">
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/animate.css/4.1.1/animate.min.css">
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.min.js"></script>
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>
        <style>
            body{
               background-color: aquamarine;
            }
        </style>
    </head>
    <body>
        <div class="container mt-5 mb-3">
            <form action="" method="post">
            <div class="row mb-3">
                <div class="col-sm-4"></div>
                <div class="col-sm-4 text-center">
                    <label for="">Username</label>
                    <input type="text" name="username">
                </div>
                <div class="col-sm-4"></div> 
            </div>
            <div class="row mb-3">
                <div class="col-sm-4"></div>
                <div class="col-sm-4 text-center">
                    <label for="">Password</label>
                    <input type="password" name="password">
                </div>
                <div class="col-sm-4"></div>
            </div>
            <div class="row mt-3">
                <div class="col-sm-4"></div>
                <div class="col-sm-4">
                <button type="submit" class="btn btn-primary">Login</button>
                </div>
                <div class="col-sm-4"></div>
            </div>
            </form>
        </div>
    </body>
</html>