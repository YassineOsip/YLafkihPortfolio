<?php
include "../db/conn.php";
$sql = "SELECT `id`, `username`, `email`, `date`, `password` ,`img` FROM `admins` WHERE 1";
$result = $conn->query($sql);
$row = $result->fetch_assoc();


if(isset($_GET["log"])) {
    if($_GET["log"]=="out") {
        session_destroy();
        header("location:index.php");
    }
}

?>
<!DOCTYPE html>
    <html>

    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0, shrink-to-fit=no">
        <title>Panel</title>
        <link rel="icon" type="image/png" sizes="768x768"
            href="../assets/img/kisspng-anonymous-function-lambda-calculus-functional-prog-ramdam-5b16644cb911a6.4568561715281941247581.png">
        <link rel="icon" type="image/png" sizes="768x768"
            href="../assets/img/kisspng-anonymous-function-lambda-calculus-functional-prog-ramdam-5b16644cb911a6.4568561715281941247581.png">
        <link rel="icon" type="image/png" sizes="768x768"
            href="../assets/img/kisspng-anonymous-function-lambda-calculus-functional-prog-ramdam-5b16644cb911a6.4568561715281941247581.png">
        <link rel="icon" type="image/png" sizes="768x768"
            href="../assets/img/kisspng-anonymous-function-lambda-calculus-functional-prog-ramdam-5b16644cb911a6.4568561715281941247581.png">
        <link rel="icon" type="image/png" sizes="768x768"
            href="../assets/img/kisspng-anonymous-function-lambda-calculus-functional-prog-ramdam-5b16644cb911a6.4568561715281941247581.png">
        <link rel="stylesheet" href="../assets/bootstrap/css/bootstrap.min.css">
        <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Montserrat:400,700">
        <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Lato:400,700,400italic,700italic">
        <link rel="stylesheet"
            href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/ionicons/2.0.1/css/ionicons.min.css">
        <link rel="stylesheet"
            href="https://cdnjs.cloudflare.com/ajax/libs/material-design-icons/3.0.1/iconfont/material-icons.min.css">
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/typicons/2.0.9/typicons.min.css">
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/animate.css/3.5.2/animate.min.css">
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/pikaday/1.6.1/css/pikaday.min.css">
        <link rel="stylesheet" href="../assets/css/responsive.css">
    </head>

    <body background-image="url(../assets/img/astro.jpg)">
        <main class="page projects-page">
            <section class="portfolio-block projects-with-sidebar">
                <div class="container">
                    <div class="d-xl-flex justify-content-xl-center align-items-xl-center heading"
                        style="margin-bottom: 10px;background-color: #2c3e50;">
                        <div class="row no-gutters d-lg-flex justify-content-lg-start align-items-lg-center">
                            <div
                                class="col d-flex d-sm-flex d-md-flex d-lg-flex justify-content-center align-items-center justify-content-sm-center align-items-sm-center justify-content-md-center align-items-md-center justify-content-lg-center align-items-lg-center">
                                <img class="img-fluid" id="logo"
                                    src="../assets/img/kisspng-anonymous-function-lambda-calculus-functional-prog-ramdam-5b16644cb911a6.4568561715281941247581.png"
                                    width="50px"></div>
                        </div>
                        <h2 class="d-flex d-sm-flex justify-content-center align-items-center justify-content-sm-center align-items-sm-center"
                            style="color: #ffffff;margin-right: 10px;">panel<span
                                class="d-flex d-sm-flex d-md-flex d-lg-flex d-xl-flex justify-content-center align-items-center justify-content-sm-center align-items-sm-center justify-content-md-center align-items-md-center justify-content-lg-center align-items-lg-center justify-content-xl-center align-items-xl-center"
                                style="font-size: 30px;"><i class="material-icons"
                                    style="font-size: 40px;">keyboard_arrow_right</i><?php if(! isset($_GET["page"])){echo "profile";} else{ echo $_GET["page"];} ?></span></h2><span
                            style="margin-right: 10px;"></span>
                    </div>
                    <div class="row" style="background-color: #18bc9c;">
                        <div class="col-md-3 d-md-flex justify-content-md-center align-items-xl-start"
                            style="background-color: #2c3e50;height:750px;">
                            <div class="row">
                                <div class="col">
                                    <div class="row" style="margin-bottom: 20px;">
                                        <div
                                            class="col d-flex d-sm-flex d-xl-flex justify-content-center align-items-center justify-content-sm-center align-items-sm-center justify-content-xl-center align-items-xl-center">
                                            <img class="img-fluid" src="<?php echo $row["img"] ?>" alt="Profile Img" width="120px">
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col">
                                            <h5 style="color: #18bc9c;"><?php echo $row["username"];?></h5>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col">
                                            <ul class="list-unstyled sidebar">
                                                <li><a class="active"
                                                        href="http://localhost/portfoliov1/cpanel/ypanel.php"
                                                        style="color: #ffffff;">Profile</a></li>
                                                <li><a href="http://localhost/portfoliov1/cpanel/ypanel.php?page=stats"
                                                        style="color: #ffffff;">Statistics</a></li>
                                                <li><a href="http://localhost/portfoliov1/cpanel/ypanel.php?page=requests"
                                                        style="color: #ffffff;">Requests</a></li>
                                                <li><a href="http://localhost/portfoliov1/cpanel/ypanel.php?page=addproj"
                                                        style="color: #ffffff;">add project</a></li>
                                                <li><a href="http://localhost/portfoliov1/cpanel/ypanel.php?page=updateproj"
                                                        style="color: #ffffff;">Edit project</a></li>
                                                <li><a href="http://localhost/portfoliov1/cpanel/ypanel.php?page=removeproj"
                                                        style="color: #ffffff;">Remove project</a></li>
                                                <li><a href="http://localhost/portfoliov1/cpanel/ypanel.php?page=github"
                                                        style="color: #ffffff;">Manage Github</a></li>
                                                <li><a href="http://localhost/portfoliov1/cpanel/ypanel.php?log=out"
                                                        style="color: #ffffff;margin-right: 10px;">Logout</a><i
                                                        class="fa fa-sign-out"
                                                        style="font-size: 20px;color: #ffffff;"></i></li>
                                            </ul>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col d-flex d-sm-flex d-md-flex d-lg-flex d-xl-flex justify-content-center align-items-center justify-content-sm-center align-items-sm-center justify-content-md-center align-items-md-center justify-content-lg-center align-items-lg-center justify-content-xl-center align-items-xl-center"
                            id="content">
<?php 
if( ! isset($_GET["page"])) {
    include "changeinfo.php";
}

if(isset($_GET["page"])) {
    if($_GET["page"]=="stats") {
        include "stats.php";
    }

    elseif($_GET["page"]=="github") {
        include "github.php";
    }

    elseif($_GET["page"]=="requests") {
        include "requests.php";
    }

    elseif($_GET["page"]=="changepass") {
        include "pass.php";
    }

    elseif($_GET["page"]=="addproj") {
        include "addproject.php";
    }

    elseif($_GET["page"]=="updateproj") {
        include "editproject.php";
    }

    elseif($_GET["page"]=="removeproj") {
        include "removeproject.php";
    }

    elseif(empty($_GET["page"])) {
        include "changeinfo.php";
    }

    else {
        include "404.php";
    }
}

?></div>
                    </div>
                </div>
            </section>
        </main>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.3.1/js/bootstrap.bundle.min.js">
        </script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-easing/1.4.1/jquery.easing.min.js"></script>
        <script src="../assets/js/scroll.js"></script>
        <script src="../assets/js/bs-animation.js"></script>
        <script src="../assets/js/theme.js"></script>
    </body>

    </html>