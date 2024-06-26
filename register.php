<?php
global $conn;
session_start();

include 'server/connection.php';

if ($_SERVER["REQUEST_METHOD"] === 'POST'){
    $usernameStr = htmlspecialchars($_POST['username']);
    $nameStr = htmlspecialchars($_POST['name']);
    $lastnameStr = htmlspecialchars($_POST['lastname']);
    $emailStr = htmlspecialchars($_POST['email']);
    $passwordStr = htmlspecialchars($_POST['password']);
    $confirmPasswordStr = htmlspecialchars($_POST['confirmPassword']);

    if ($passwordStr !== $confirmPasswordStr){
        die(json_encode(array('error' => 'Passwords do not match')));
    }

    $HashedPassword = password_hash($passwordStr, PASSWORD_BCRYPT);

    $CreateUser = $conn->prepare("INSERT INTO users (username, name, lastname, email, password) VALUES (?, ?, ?, ?, ?)");

    if (!$CreateUser){
        die(json_encode(array('error' => 'Failed to prepare statement')));
    }

    $CreateUser->bind_param("sssss", $usernameStr, $nameStr, $lastnameStr, $emailStr, $HashedPassword);

    if ($CreateUser->execute()){
        echo json_encode(array('success' => 'User created successfully'));
    }
    else{
        echo json_encode(array('error' => 'Failed to create user'));
    }

    $CreateUser->close();
} else{
    echo json_encode(array('error' => 'Invalid request method'));
}

$conn->close();
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Register</title>

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">

    <script src="https://kit.fontawesome.com/1f77cdf804.js" crossorigin="anonymous"></script>

    <link rel="stylesheet" href="assets/css/registerStyle.css"/>
</head>
<body>

<!--NavBar-->
<nav class="navbar navbar-expand-lg navbar-light bg-white bg-body-tertiary py-3 fixed-top">
    <div class="container">
        <img src="assets/images/logo.png" alt="logo" width="50" height="50" class="d-inline-block align-text-top">
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse nav-buttons" id="navbarSupportedContent">
            <ul class="navbar-nav me-auto mb-2 mb-lg-0">

                <li class="nav-item">
                    <a class="nav-link active" aria-current="page" href="index.html">Home</a>
                </li>

                <li class="nav-item">
                    <a class="nav-link" aria-current="page" href="shop.php">Shop</a>
                </li>

                <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                        Profile
                    </a>

                    <ul class="dropdown-menu">
                        <li><a class="dropdown-item" href="Cart.php">Basket</a></li>
                        <li><a class="dropdown-item" href="Account.html">Account</a></li>
                    </ul>
                </li>

                <li class="nav-item">
                    <a class="nav-link" aria-current="page" href="About.html">About Us</a>
                </li>

            </ul>
            <form class="d-flex" role="search">
                <input class="form-control me-2" type="search" placeholder="Search" aria-label="Search">
                <button class="btn btn-outline-success" type="submit">Search</button>

            </form>
        </div>
    </div>
</nav>

<!--Register-->
<section class="my-5 py-5">
    <div class="container text-center mt-3 pt-5">
        <h2 class="font-weight-bold">Register</h2>
        <hr class="mx-auto container">
       <form id="register-form">
           <div class="form-group">
               <label for="username">Username</label>
               <input type="text" class="form-control" id="username" name="username" required>
           </div>
           <div class="form-group">
               <label for="firstName">First Name</label>
               <input type="text" class="form-control" id="name" name="username" required>
           </div>
           <div class="form-group">
               <label for="lastname">Last Name</label>
               <input type="text" class="form-control" id="lastname" name="username" required>
           </div>
           <div class="form-group">
               <label for="email">Email</label>
               <input type="email" class="form-control" id="email" name="email" required>

           <div class="form-row">
               <div class="form-group col-md-6">
                   <label for="password">Password</label>
                   <input type="password" class="form-control" id="password" name="password" placeholder="Password" required>
                   <div class="error-message text-danger" id="password-error"></div>
               </div>
               <div class="form-group col-md-6">
                   <label for="confirmPassword">Confirm Password</label>
                   <input type="password" class="form-control" id="confirmPassword" name="confirmPassword" placeholder="Confirm Password" required>
                   <div class="error-message text-danger" id="confirmPassword-error"></div>
               </div>
           </div>
              <button type="submit" class="btn btn-primary" id="registerButton">Register</button>
           <div class="form-group">
               <p>Already have an account? <a href="Login.php">Login</a></p>
           </div>
       </form>

    </div>

</section>

<!--Footer-->
<footer class="mt-5 py-5">
    <div class="row container mx-auto pt-5">
        <div class="footer-one col-lg-3 col-md-6 col-sm-12">
            <img class="logo" src="assets/images/logo.png"/>
            <p class="pt-3">John Deere is a leading manufacturer in the agriculture environment</p>
        </div>
        <div class="footer-one col-lg-3 col-md-6 col-sm-12">
            <h5 class="pt-3">Quick Links</h5>
            <ul class="text-uppercase">
                <li><a href="#">Home</a></li>
                <li><a href="#">Shop</a></li>
                <li><a href="#">About Us</a></li>
                <li><a href="#">Contact Us</a></li>
            </ul>
        </div>

        <div class="footer-one col-lg-3 col-md-6 col-sm-12">
            <h5 class="pb-2">Contact Us</h5>
            <ul class="text-uppercase">
                <li><a href="#">+27 71 123 4567</a></li>
            </ul>
        </div>
    </div>
</footer>


<script src="assets/js/Register.js"></script>
<script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.5.3/dist/umd/popper.min.js"></script>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
</body>
</html>