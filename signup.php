<?php
session_start();
include "connection.php";
include "functions.php";

if($_SERVER['REQUEST_METHOD'] == "POST"){
    $username = $_POST['username'];
    $firstname = $_POST['firstname'];
    $middlename = $_POST['middlename'];
    $lastname = $_POST['lastname'];
    $birthdate = $_POST['birthdate'];
    $phonenum = $_POST['phonenumber'];
    $gender = $_POST['gender'];
    $barangay = $_POST['barangay'];
    $city = $_POST['city'];
    $province = $_POST['province'];
    $zipcode = $_POST['zipcode'];
    $password = $_POST['password'];
    $email = $_POST['email']; 

    $fullname = $firstname . " " . $middlename . " " . $lastname;

    $address = $barangay . ", " . $city . ", " . $province . ", " . $zipcode;


    ##Create queries for inserting into database

    if(!empty($password) && !empty($firstname) && !empty($phonenum) && !empty($barangay)){
        $query = "INSERT INTO `users`
                  (`username`, `firstname`, `middlename`, `lastname`, `fullname` `email`, `phonenumber`, `password`, `address`, `birth_date`, `gender`, `user_type`)
                  VALUES
                  ('$username', '$firstname', '$middlename', '$lastname', '$fullname', '$email', '$phonenum', '$password', '$address', '$birthdate', '$gender', 'U')";
        $result = mysqli_query($con, $query);
        if($result){
            echo '<script>alert("Account created Successfully")</script>';
            header('Location: index.php');
        }
    }else{
        echo '<script>alert("Please fill out the form with the appropriate information")</script>';
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>PuppKitt | Signup</title>
    <link rel="icon" type="image/x-icon" href="images/logoparent.png">
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
    <form action="" method="post">
        <div class="container">
            <div class="row pt-3">
                <div class="col-2"></div>
                <div class="col-8">
                    <div class="mb-3" style="text-align:center"><h1>SIGNUP</h1></div>
                    <div class="mb-3">
                        <input class="form-control" name="firstname" type="text" placeholder="First Name" aria-label="default input example">
                    </div>
                    <div class="mb-3">
                        <input class="form-control" name="middlename" type="text" placeholder="Middle Name" aria-label="default input example">
                    </div>
                    <div class="mb-3">
                        <input class="form-control" name="lastname" type="text" placeholder="Last Name" aria-label="default input example">
                    </div>
                    <div class="mb-1"><h6>BIRTHDATE</h6></div>
                </div>
                <div class="col-2"></div>
            </div>
            <div class="row mb-3">
                <div class="col-2"></div>
                <div class="col">
                    <input type="date" name="birthdate" class="form-control" placeholder="YYYY-MM-DD" aria-label="First name">
                </div>
                <div class="col">
                    <input type="text" name="phonenumber" class="form-control" placeholder="Phone Number" aria-label="Last name">
                </div>
                <div class="col">
                    <select class="form-select" name="gender" aria-label="Default select example">
                        <option selected>Gender</option>
                        <option value="1">Male</option>
                        <option value="2">Female</option>
                    </select>
                </div>
                <div class="col-2"></div>
            </div>
            <div class="row mb-3">
                <div class="col-2"></div>
                <div class="col">
                    <input type="text" name="barangay" class="form-control" placeholder="Barangay" aria-label="First name">
                </div>
                <div class="col">
                    <input type="text" name="city" class="form-control" placeholder="City/Municipality" aria-label="Last name">
                </div>
                <div class="col-2"></div>
            </div>
            <div class="row mb-3">
                <div class="col-2"></div>
                <div class="col">
                    <input type="text" name="province" class="form-control" placeholder="Province" aria-label="First name">
                </div>
                <div class="col">
                    <input type="text" name="zipcode" class="form-control" placeholder="Zip Code" aria-label="Last name">
                </div>
                <div class="col-2"></div>
            </div>
            <div class="row">
                <div class="col-2"></div>
                <div class="col">
                    <div class="mb-3">
                        <input class="form-control" name="username" type="text" placeholder="Username" aria-label="default input example">
                    </div>
                </div>
                <div class="col-2"></div>
            </div>
            <div class="row">
                <div class="col-2"></div>
                <div class="col">
                    <div class="mb-3">
                        <input class="form-control" name="password" type="password" placeholder="Password" aria-label="default input example">
                    </div>
                </div>
                <div class="col-2"></div>
            </div>
            <div class="row">
                <div class="col-2"></div>
                <div class="col">
                    <div class="mb-3">
                        <input class="form-control" name="email" type="text" placeholder="Email" aria-label="default input example">
                    </div>
                </div>
                <div class="col-2"></div>
            </div>
            <div class="row">
                <div class="col-2"></div>
                <div class="col-4">
                    <input class="form-check-input" name="terms" type="checkbox" value="1" id="flexCheckDefault">
                    <label class="form-check-label" for="flexCheckDefault">
                        I agree to the <a href="terms.php">Terms and Conditions</a>
                    </label>
                </div>
                <div class="col"></div>
                <div class="col">
                    <button type="submit" class="btn btn-success">Sign Up</button>
                </div>
                <div class="col">
                    <a href="index.php" class="btn btn-warning">Cancel</a>
                </div>
                <div class="col-2"></div>
                
            </div>
        </div>
    </form>
</body>
</html>

