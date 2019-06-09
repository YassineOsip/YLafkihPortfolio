<?php
include "../db/conn.php";
$errors =[];
$message = "";
if(isset($_POST['submit'])){
$email = $_POST['email'];
$password = $_POST['password'];
$sql = "SELECT `id`, `username`, `email`, `date`, `password` FROM `admins` WHERE 1";
$result = $conn->query($sql);
$row = $result->fetch_assoc();
if ($row['email'] == $email || $row["username"] == $email && $row['password'] == $password){
session_start();

$_SESSION['user_id'] = $row['id'];
$_SESSION['name'] = $row['username'];
$_SESSION['email'] = $row['email'];
    header("location:ypanel.php");
}
}

    



?>
<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, shrink-to-fit=no">
    <title>Login - Brand</title>
    <link rel="icon" type="image/png" sizes="768x768" href="assets/img/kisspng-anonymous-function-lambda-calculus-functional-prog-ramdam-5b16644cb911a6.4568561715281941247581.png">
    <link rel="icon" type="image/png" sizes="768x768" href="assets/img/kisspng-anonymous-function-lambda-calculus-functional-prog-ramdam-5b16644cb911a6.4568561715281941247581.png">
    <link rel="icon" type="image/png" sizes="768x768" href="assets/img/kisspng-anonymous-function-lambda-calculus-functional-prog-ramdam-5b16644cb911a6.4568561715281941247581.png">
    <link rel="icon" type="image/png" sizes="768x768" href="assets/img/kisspng-anonymous-function-lambda-calculus-functional-prog-ramdam-5b16644cb911a6.4568561715281941247581.png">
    <link rel="icon" type="image/png" sizes="768x768" href="assets/img/kisspng-anonymous-function-lambda-calculus-functional-prog-ramdam-5b16644cb911a6.4568561715281941247581.png">
    <link rel="stylesheet" href="../assets/bootstrap/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Montserrat:400,700">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Lato:400,700,400italic,700italic">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/ionicons/2.0.1/css/ionicons.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/material-design-icons/3.0.1/iconfont/material-icons.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/typicons/2.0.9/typicons.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/animate.css/3.5.2/animate.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/pikaday/1.6.1/css/pikaday.min.css">
    <link rel="stylesheet" href="../assets/css/responsive.css">
</head>

<body>
    <main class="page login-page">
        <section class="clean-block clean-form dark">
            <div class="container">
                <div class="block-heading">
                    <h2 class="d-flex d-sm-flex d-md-flex d-lg-flex d-xl-flex justify-content-center align-items-center justify-content-sm-center align-items-sm-center justify-content-md-center align-items-md-center justify-content-lg-center align-items-lg-center justify-content-xl-center align-items-xl-center"
                        style="color: #18bc9c;">Log In</h2>
                    <!-- <p class="d-flex justify-content-center align-items-center">To Log In use your cordonates or face detection</p> -->
                </div>
                <form method="post" action="index.php">
                    <!-- <div class="form-group d-flex d-xl-flex flex-column justify-content-center align-items-center justify-content-xl-center align-items-xl-start"><label for="email" style="color: #18bc9c;">Face Detection</label><input type="file" id="image" accept="image/*"></div> -->
                    <div class="form-group"><label for="email" style="color: #18bc9c;">Email</label><input class="form-control item" type="email" id="email" name="email"></div>
                    <div class="form-group"><label for="password" style="color: #18bc9c;">Password</label><input class="form-control" type="password" id="password" name="password"></div>
                    <div class="form-group">
                        <!-- <div class="form-check"><input class="form-check-input" type="checkbox" id="checkbox"><label class="form-check-label" for="checkbox">Use Face Detection</label></div> -->
                    </div><button class="btn btn-primary btn-block" type="submit" name="submit">Log In</button></form>
            </div>
        </section>
    </main>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.3.1/js/bootstrap.bundle.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-easing/1.4.1/jquery.easing.min.js"></script>
    <script src="../assets/js/scroll.js"></script>
    <script src="../assets/js/bs-animation.js"></script>
    <script src="../assets/js/theme.js"></script>
</body>

</html>