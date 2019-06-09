<?php 
include "config.php";
include "db/conn.php";
$sql = "SELECT id, title , descr, img FROM projects";
$result = mysqli_query($conn, $sql);
function sendmail($name , $emailAdd , $phoneNum , $Message){
    $to = 'yassine.lf.99@gmail.com';
    $subject = "Name". $name . "  Email Adresse" . $emailAdd . "  Phone: " . $phoneNum;
    $message = $Message;
    $headers = "From:" . $emailAdd . "\r\n";
    mail($to, $subject, $message, $headers);
    }
    if(isset($_POST["submit"])){
        $nm = $_POST["name"]; 
        $em = $_POST["email"]; 
        $pn = $_POST["phone"]; 
        $mss = $_POST["message"]; 
        sendmail($nm,$em,$pn,$mss);
        if(isset($_SESSION['email'])) 
        $_SESSION['email'] = $_SESSION['email']+1; 
        else
        $_SESSION['email']=1; 
        $email = $_SESSION['email'];      
        $sql2 = "UPDATE stats SET emails='$email' WHERE id=1";
        $conn->query($sql2);
    }
    if(isset($_SESSION['views'])) 
        $_SESSION['views'] = $_SESSION['views']+1; 
    else
        $_SESSION['views']=1; 
        
    $views = $_SESSION['views'];      
    $sql = "UPDATE stats SET views='$views' WHERE id=1";
    $conn->query($sql);

    

?>
<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, shrink-to-fit=no">
    <title>Lafkih Yassine</title>
    <link rel="icon" type="image/png" sizes="768x768"
        href="assets/img/kisspng-anonymous-function-lambda-calculus-functional-prog-ramdam-5b16644cb911a6.4568561715281941247581.png">
    <link rel="icon" type="image/png" sizes="768x768"
        href="assets/img/kisspng-anonymous-function-lambda-calculus-functional-prog-ramdam-5b16644cb911a6.4568561715281941247581.png">
    <link rel="icon" type="image/png" sizes="768x768"
        href="assets/img/kisspng-anonymous-function-lambda-calculus-functional-prog-ramdam-5b16644cb911a6.4568561715281941247581.png">
    <link rel="icon" type="image/png" sizes="768x768"
        href="assets/img/kisspng-anonymous-function-lambda-calculus-functional-prog-ramdam-5b16644cb911a6.4568561715281941247581.png">
    <link rel="icon" type="image/png" sizes="768x768"
        href="assets/img/kisspng-anonymous-function-lambda-calculus-functional-prog-ramdam-5b16644cb911a6.4568561715281941247581.png">
    <link rel="stylesheet" href="assets/bootstrap/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Montserrat:400,700">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Lato:400,700,400italic,700italic">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/ionicons/2.0.1/css/ionicons.min.css">
    <link rel="stylesheet"
        href="https://cdnjs.cloudflare.com/ajax/libs/material-design-icons/3.0.1/iconfont/material-icons.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/typicons/2.0.9/typicons.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/animate.css/3.5.2/animate.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/pikaday/1.6.1/css/pikaday.min.css">
    <link rel="stylesheet" href="assets/css/responsive.css">
</head>

<body class="text-break" id="page-top">
    <nav class="navbar navbar-light navbar-expand-lg fixed-top bg-secondary text-uppercase" id="mainNav"
        style="opacity: 1;">
        <div class="container"><button data-toggle="collapse" data-target="#navbarResponsive"
                class="navbar-toggler navbar-toggler-right text-uppercase bg-primary text-white rounded"
                aria-controls="navbarResponsive" aria-expanded="false" aria-label="Toggle navigation"><i
                    class="fa fa-bars"></i></button>
            <div class="collapse navbar-collapse" id="navbarResponsive"><a href="#"><img data-bs-hover-animate="pulse"
                        src="assets/img/kisspng-anonymous-function-lambda-calculus-functional-prog-ramdam-5b16644cb911a6.4568561715281941247581.png"
                        style="width: 60px;"></a>
                <ul class="nav navbar-nav ml-auto">
                    <li class="nav-item mx-0 mx-lg-1" role="presentation"><a
                            class="nav-link py-3 px-0 px-lg-3 rounded js-scroll-trigger" data-bs-hover-animate="pulse"
                            href="#portfolio"><?php echo $lang["portfolio"] ?></a></li>
                    <li class="nav-item mx-0 mx-lg-1" role="presentation"><a
                            class="nav-link py-3 px-0 px-lg-3 rounded js-scroll-trigger" data-bs-hover-animate="pulse"
                            href="#about"><?php echo $lang["about"] ?></a></li>
                    <li class="nav-item mx-0 mx-lg-1" role="presentation"><a
                            class="nav-link py-3 px-0 px-lg-3 rounded js-scroll-trigger" data-bs-hover-animate="pulse"
                            href="#contact"><?php echo $lang["contact"] ?></a></li>
                </ul>
            </div>
        </div>
    </nav>
    <header class="masthead bg-primary text-white text-center">
        <div class="container"><img class="img-fluid d-block mx-auto mb-5" data-bs-hover-animate="tada"
                src="assets/img/cube.gif">
            <h1>Yassine Lafkih</h1>
            <hr class="star-light">
            <h2 class="font-weight-light mb-0"><?php echo $lang["portfolio"] ?>&nbsp;</h2>
        </div>
    </header>
    <section id="portfolio" class="portfolio">
        <div class="container">
            <h2 class="text-uppercase text-center text-secondary pulse animated infinite">
                <?php echo $lang["portfolio"] ?></h2>
            <hr class="star-dark mb-5">
            <div
                class="row d-flex d-sm-flex d-md-flex d-lg-flex d-xl-flex justify-content-center align-items-center justify-content-sm-center align-items-sm-center justify-content-lg-center align-items-lg-center justify-content-xl-center align-items-xl-center">
            <?php 
            if (mysqli_num_rows($result) > 0) {
                // output data of each row
                $numodel = 1 ;
                while($proj = mysqli_fetch_assoc($result)) {
                    $imgg = $proj["img"];
                    $modal = "#portfolio-modal-" . $numodel;
                    // echo "id: " . $row["id"]. " - Name: " . $row["firstname"]. " " . $row["lastname"]. "<br>";
                    echo "<div
                        class='col-md-6 col-lg-4 d-flex d-lg-flex justify-content-center align-items-center justify-content-lg-center align-items-lg-center'>
                        <a class='d-block mx-auto portfolio-item' data-toggle='modal' href='$modal'>
                            <div class='d-flex portfolio-item-caption position-absolute h-100 w-100'>
                                <div class='my-auto portfolio-item-caption-content w-100 text-center text-white'><i
                                        class='fa fa-search-plus fa-3x'></i></div>
                            </div><img class='img-fluid' src='$imgg'>
                        </a>
                    </div>";
                    $numodel++;
                }
            } else {
                // echo "0 results";
            }
            
            ?>
           
                <div
                    class="col-md-6 col-lg-4 d-flex d-lg-flex justify-content-center align-items-center justify-content-lg-center align-items-lg-center">
                    <a class="d-block mx-auto portfolio-item" data-toggle="modal" href="#portfolio-modal-1">
                        <div class="d-flex portfolio-item-caption position-absolute h-100 w-100">
                            <div class="my-auto portfolio-item-caption-content w-100 text-center text-white"><i
                                    class="fa fa-search-plus fa-3x"></i></div>
                        </div><img class="img-fluid" src="assets/img/assfaroRose.png">
                    </a>
                </div>
                <div
                    class="col-md-6 col-lg-4 d-flex d-lg-flex justify-content-center align-items-center justify-content-lg-center align-items-lg-center">
                    <a class="d-block mx-auto portfolio-item" data-toggle="modal" href="#portfolio-modal-2">
                        <div class="d-flex portfolio-item-caption position-absolute h-100 w-100">
                            <div class="my-auto portfolio-item-caption-content w-100 text-center text-white"><i
                                    class="fa fa-search-plus fa-3x"></i></div>
                        </div><img class="img-fluid" src="assets/img/ringProogramming.png">
                    </a>
                </div>
                <div
                    class="col-md-6 col-lg-4 d-flex d-lg-flex justify-content-center align-items-center justify-content-lg-center align-items-lg-center">
                    <a class="d-block mx-auto portfolio-item" data-toggle="modal" href="#portfolio-modal-3">
                        <div class="d-flex portfolio-item-caption position-absolute h-100 w-100">
                            <div class="my-auto portfolio-item-caption-content w-100 text-center text-white"><i
                                    class="fa fa-search-plus fa-3x"></i></div>
                        </div><img class="img-fluid" src="assets/img/laila.png">
                    </a>
                </div>
                <div
                    class="col-md-6 col-lg-4 d-flex d-lg-flex justify-content-center align-items-center justify-content-lg-center align-items-lg-center">
                    <a class="d-block mx-auto portfolio-item" data-toggle="modal" href="#portfolio-modal-4">
                        <div class="d-flex portfolio-item-caption position-absolute h-100 w-100">
                            <div class="my-auto portfolio-item-caption-content w-100 text-center text-white"><i
                                    class="fa fa-search-plus fa-3x"></i></div>
                        </div><img class="img-fluid" src="assets/img/spotify.png">
                    </a>
                </div>
                <div
                    class="col-md-6 col-lg-4 d-flex d-lg-flex justify-content-center align-items-center justify-content-lg-center align-items-lg-center">
                    <a class="d-block mx-auto portfolio-item" data-toggle="modal" href="#portfolio-modal-5">
                        <div class="d-flex portfolio-item-caption position-absolute h-100 w-100">
                            <div class="my-auto portfolio-item-caption-content w-100 text-center text-white"><i
                                    class="fa fa-search-plus fa-3x"></i></div>
                        </div><img class="img-fluid" src="assets/img/suduko.png">
                    </a>
                </div>
                <div
                    class="col-md-6 col-lg-4 d-flex d-lg-flex justify-content-center align-items-center justify-content-lg-center align-items-lg-center">
                    <a class="d-block mx-auto portfolio-item" data-toggle="modal" href="#portfolio-modal-6">
                        <div class="d-flex portfolio-item-caption position-absolute h-100 w-100">
                            <div class="my-auto portfolio-item-caption-content w-100 text-center text-white"><i
                                    class="fa fa-search-plus fa-3x"></i></div>
                        </div><img class="img-fluid" src="assets/img/calculator.png">
                    </a>
                </div>

            </div>
        </div>
        <div class="row">
            <div
                class="col d-flex d-sm-flex d-md-flex d-lg-flex d-xl-flex justify-content-center align-items-center justify-content-sm-center align-items-sm-center justify-content-md-center align-items-md-center justify-content-lg-center align-items-lg-center justify-content-xl-center align-items-xl-center">
                <a class="btn btn-outline-primary btn-xl" role="button" data-bs-hover-animate="pulse"
                    href="projects.php"><i class="typcn typcn-media-record-outline mr-2"></i><span
                        class="bounce animated infinite"><?php echo $lang["more"] ?></span></a></div>
        </div>
    </section>
    <section id="about" class="bg-primary text-white mb-0">
        <div class="container">
            <h2 class="text-uppercase text-center text-white pulse animated infinite"><?php echo $lang["about"] ?></h2>
            <hr class="star-light mb-5">
            <div class="row">
                <div class="col-lg-4 ml-auto">
                    <p class="lead">Hi there!&nbsp;I'm&nbsp;Lafkih Yassine&nbsp;from Méknes, Morocco.
                        I&nbsp;currently&nbsp;study at Youcode School.&nbsp;I have 04 years experience creating
                        software, console applications and websites for both myself, and for clients.&nbsp;<br><br></p>
                </div>
                <div class="col-lg-4 mr-auto">
                    <p class="lead"><?php echo $lang["description"] ?><br><br></p>
                </div>
            </div>
            <div class="text-center mt-4"><a class="btn btn-outline-light btn-xl" role="button"
                    data-bs-hover-animate="pulse" href="resume.php"><i
                        class="typcn typcn-media-record-outline mr-2"></i><span><?php echo $lang["resume"] ?></span></a>
            </div>
        </div>
    </section>
    <section id="contact">
        <div class="container">
            <h2 class="text-uppercase text-center text-secondary pulse animated infinite mb-0">
                <?php echo $lang["contact"] ?></h2>
            <hr class="star-dark mb-5">
            <div class="row">
                <div class="col-lg-8 mx-auto">
                    <form id="contactForm" name="sentMessage" novalidate="novalidate" method="post" action="index.php">
                        <div class="control-group">
                            <div class="form-group floating-label-form-group controls mb-0 pb-2">
                                <label><?php echo $lang["name"] ?></label><input class="form-control" type="text"
                                    id="name" required="" placeholder="Name" minlength="0" maxlength="20"
                                    name="name"><small class="form-text text-danger help-block"></small></div>
                        </div>
                        <div class="control-group">
                            <div class="form-group floating-label-form-group controls mb-0 pb-2">
                                <label><?php echo $lang["email"] ?></label><input class="form-control" type="email"
                                    id="email" required="" placeholder="Email Address" name="email"><small
                                    class="form-text text-danger help-block"></small></div>
                        </div>
                        <div class="control-group">
                            <div class="form-group floating-label-form-group controls mb-0 pb-2">
                                <label><?php echo $lang["phone"] ?></label><input class="form-control" type="tel"
                                    id="phone" placeholder="Phone Number" minlength="10" maxlength="13"
                                    name="phone"><small class="form-text text-danger help-block"></small></div>
                        </div>
                        <div class="control-group">
                            <div class="form-group floating-label-form-group controls mb-5 pb-2"><textarea
                                    class="form-control" id="message" required="" placeholder="Message" rows="5"
                                    name="message"></textarea><small class="form-text text-danger help-block"></small>
                            </div>
                        </div>
                        <?php if(isset($_POST["submit"])){ echo '<div class="d-flex d-sm-flex d-md-flex d-lg-flex d-xl-flex justify-content-center align-items-center justify-content-sm-center align-items-sm-center justify-content-md-center align-items-md-center justify-content-lg-center align-items-lg-center justify-content-xl-center align-items-xl-center"
                            id="success" style="margin-bottom: 10px;"><span class="text-primary">email &nbsp;sent successfully .</span></div>';} ?>
                        <div class="form-group"><button class="btn btn-primary btn-xl" id="sendMessageButton"
                                type="submit" name="submit"><?php echo $lang["send"] ?></button></div>
                    </form>
                </div>
            </div>
        </div>
    </section>
    <?php include "footer.php"?>
    <div class="copyright py-4 text-center text-white">
        <div class="container"><small>Copyright © Yassine Lafkih 2019</small></div>
    </div>
    <div class="d-lg-none scroll-to-top position-fixed rounded"><a
            class="d-block js-scroll-trigger text-center text-white rounded" href="#page-top"><i
                class="fa fa-chevron-up"></i></a></div>
    <div class="modal text-center" role="dialog" tabindex="-1" id="portfolio-modal-1">
        <div class="modal-dialog modal-lg" role="document">
            <div class="modal-content">
                <div class="modal-header"><button type="button" class="close" data-dismiss="modal"
                        aria-label="Close"><span aria-hidden="true">×</span></button></div>
                <div class="modal-body">
                    <div class="container text-center">
                        <div class="row">
                            <div class="col-lg-8 mx-auto">
                                <h2 class="text-uppercase text-secondary mb-0">Assfar O Rose</h2>
                                <hr class="star-dark mb-5"><img class="img-fluid mb-5"
                                    src="assets/img/assfaroRose-1.png">
                                <p class="mb-5">bla bla bla blabla blabla blabla blabla blabla blabla blabla blabla
                                    blabla blabla blabla blabla bla</p>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="modal-footer pb-5"><a
                        class="btn btn-primary btn-lg mx-auto rounded-pill portfolio-modal-dismiss" role="button"
                        href="project.php">
                        <!--<i class="fa fa-close"></i>&nbsp;-->More</a></div>
            </div>
        </div>
    </div>
    <div class="modal text-center" role="dialog" tabindex="-1" id="portfolio-modal-2">
        <div class="modal-dialog modal-lg" role="document">
            <div class="modal-content">
                <div class="modal-header"><button type="button" class="close" data-dismiss="modal"
                        aria-label="Close"><span aria-hidden="true">×</span></button></div>
                <div class="modal-body">
                    <div class="container text-center">
                        <div class="row">
                            <div class="col-lg-8 mx-auto">
                                <h2 class="text-uppercase text-secondary mb-0">Project Name</h2>
                                <hr class="star-dark mb-5"><img class="img-fluid mb-5" src="assets/img/khawya.png">
                                <p class="mb-5">Lorem ipsum dolor sit amet, consectetur adipisicing elit. Mollitia neque
                                    assumenda ipsam nihil, molestias magnam, recusandae quos quis inventore quisquam
                                    velit asperiores, vitae? Reprehenderit soluta, eos quod consequuntur
                                    itaque. Nam.</p>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="modal-footer pb-5"><a
                        class="btn btn-primary btn-lg mx-auto rounded-pill portfolio-modal-dismiss" role="button"
                        href="#"><i class="fa fa-close"></i>&nbsp;Close Project</a></div>
            </div>
        </div>
    </div>
    <div class="modal text-center" role="dialog" tabindex="-1" id="portfolio-modal-3">
        <div class="modal-dialog modal-lg" role="document">
            <div class="modal-content">
                <div class="modal-header"><button type="button" class="close" data-dismiss="modal"
                        aria-label="Close"><span aria-hidden="true">×</span></button></div>
                <div class="modal-body">
                    <div class="container text-center">
                        <div class="row">
                            <div class="col-lg-8 mx-auto">
                                <h2 class="text-uppercase text-secondary mb-0">Project Name</h2>
                                <hr class="star-dark mb-5"><img class="img-fluid mb-5" src="assets/img/khawya.png">
                                <p class="mb-5">Lorem ipsum dolor sit amet, consectetur adipisicing elit. Mollitia neque
                                    assumenda ipsam nihil, molestias magnam, recusandae quos quis inventore quisquam
                                    velit asperiores, vitae? Reprehenderit soluta, eos quod consequuntur
                                    itaque. Nam.</p>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="modal-footer pb-5"><a
                        class="btn btn-primary btn-lg mx-auto rounded-pill portfolio-modal-dismiss" role="button"
                        href="#"><i class="fa fa-close"></i>&nbsp;Close Project</a></div>
            </div>
        </div>
    </div>
    <div class="modal text-center" role="dialog" tabindex="-1" id="portfolio-modal-4">
        <div class="modal-dialog modal-lg" role="document">
            <div class="modal-content">
                <div class="modal-header"><button type="button" class="close" data-dismiss="modal"
                        aria-label="Close"><span aria-hidden="true">×</span></button></div>
                <div class="modal-body">
                    <div class="container text-center">
                        <div class="row">
                            <div class="col-lg-8 mx-auto">
                                <h2 class="text-uppercase text-secondary mb-0">Project Name</h2>
                                <hr class="star-dark mb-5"><img class="img-fluid mb-5" src="assets/img/khawya.png">
                                <p class="mb-5">Lorem ipsum dolor sit amet, consectetur adipisicing elit. Mollitia neque
                                    assumenda ipsam nihil, molestias magnam, recusandae quos quis inventore quisquam
                                    velit asperiores, vitae? Reprehenderit soluta, eos quod consequuntur
                                    itaque. Nam.</p>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="modal-footer pb-5"><a
                        class="btn btn-primary btn-lg mx-auto rounded-pill portfolio-modal-dismiss" role="button"
                        href="#"><i class="fa fa-close"></i>&nbsp;Close Project</a></div>
            </div>
        </div>
    </div>
    <div class="modal text-center" role="dialog" tabindex="-1" id="portfolio-modal-5">
        <div class="modal-dialog modal-lg" role="document">
            <div class="modal-content">
                <div class="modal-header"><button type="button" class="close" data-dismiss="modal"
                        aria-label="Close"><span aria-hidden="true">×</span></button></div>
                <div class="modal-body">
                    <div class="container text-center">
                        <div class="row">
                            <div class="col-lg-8 mx-auto">
                                <h2 class="text-uppercase text-secondary mb-0">Project Name</h2>
                                <hr class="star-dark mb-5"><img class="img-fluid mb-5" src="assets/img/khawya.png">
                                <p class="mb-5">Lorem ipsum dolor sit amet, consectetur adipisicing elit. Mollitia neque
                                    assumenda ipsam nihil, molestias magnam, recusandae quos quis inventore quisquam
                                    velit asperiores, vitae? Reprehenderit soluta, eos quod consequuntur
                                    itaque. Nam.</p>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="modal-footer pb-5"><a
                        class="btn btn-primary btn-lg mx-auto rounded-pill portfolio-modal-dismiss" role="button"
                        href="project.php">More</a></div>
            </div>
        </div>
    </div>
    <div class="modal text-center" role="dialog" tabindex="-1" id="portfolio-modal-6">
        <div class="modal-dialog modal-lg" role="document">
            <div class="modal-content">
                <div class="modal-header"><button type="button" class="close" data-dismiss="modal"
                        aria-label="Close"><span aria-hidden="true">×</span></button></div>
                <div class="modal-body">
                    <div class="container text-center">
                        <div class="row">
                            <div class="col-lg-8 mx-auto">
                                <h2 class="text-uppercase text-secondary mb-0">Project Name</h2>
                                <hr class="star-dark mb-5"><img class="img-fluid mb-5" src="assets/img/khawya.png">
                                <p class="mb-5">Lorem ipsum dolor sit amet, consectetur adipisicing elit. Mollitia neque
                                    assumenda ipsam nihil, molestias magnam, recusandae quos quis inventore quisquam
                                    velit asperiores, vitae? Reprehenderit soluta, eos quod consequuntur
                                    itaque. Nam.</p>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="modal-footer pb-5"><a
                        class="btn btn-primary btn-lg mx-auto rounded-pill portfolio-modal-dismiss" role="button"
                        href="project.php">More</a></div>
            </div>
        </div>
    </div>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.3.1/js/bootstrap.bundle.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-easing/1.4.1/jquery.easing.min.js"></script>
    <script src="assets/js/scroll.js"></script>
    <script src="assets/js/bs-animation.js"></script>
    <script src="assets/js/theme.js"></script>
</body>

</html>