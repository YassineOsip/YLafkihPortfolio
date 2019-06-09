<?php
include "db/conn.php";
function sendmail($project , $emailAdd , $Message , $date){
    $to = 'yassine.lf.99@gmail.com';
    $subject = $project . "   " . $emailAdd  . "   ". $date;
    $message = $Message;
    $headers = "From:" . $emailAdd . "\r\n";
    mail($to, $subject, $message, $headers);

    }
if(isset($_POST["submit"])){
    $proj = $_POST["project"];
    $email = $_POST["email"];
    $msg = $_POST["msg"];
    $date = $_POST["date"];
    sendmail($proj , $email , $msg , $date);
    if(isset($_SESSION['req'])) 
    $_SESSION['req'] = $_SESSION['req']+1; 
    else
    $_SESSION['req']=1; 
    $req = $_SESSION['req'];      
    $sql = "UPDATE stats SET requests='$req' WHERE id=1";
    $conn->query($sql);
    header("location:resume.php");
}

?>
<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, shrink-to-fit=no">
    <title>Hire</title>
    <link rel="icon" type="image/png" sizes="768x768" href="assets/img/kisspng-anonymous-function-lambda-calculus-functional-prog-ramdam-5b16644cb911a6.4568561715281941247581.png">
    <link rel="icon" type="image/png" sizes="768x768" href="assets/img/kisspng-anonymous-function-lambda-calculus-functional-prog-ramdam-5b16644cb911a6.4568561715281941247581.png">
    <link rel="icon" type="image/png" sizes="768x768" href="assets/img/kisspng-anonymous-function-lambda-calculus-functional-prog-ramdam-5b16644cb911a6.4568561715281941247581.png">
    <link rel="icon" type="image/png" sizes="768x768" href="assets/img/kisspng-anonymous-function-lambda-calculus-functional-prog-ramdam-5b16644cb911a6.4568561715281941247581.png">
    <link rel="icon" type="image/png" sizes="768x768" href="assets/img/kisspng-anonymous-function-lambda-calculus-functional-prog-ramdam-5b16644cb911a6.4568561715281941247581.png">
    <link rel="stylesheet" href="assets/bootstrap/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Montserrat:400,700">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Lato:400,700,400italic,700italic">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/ionicons/2.0.1/css/ionicons.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/material-design-icons/3.0.1/iconfont/material-icons.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/typicons/2.0.9/typicons.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/animate.css/3.5.2/animate.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/pikaday/1.6.1/css/pikaday.min.css">
    <link rel="stylesheet" href="assets/css/responsive.css">
</head>

<body>
    <main class="page hire-me-page">
        <section class="portfolio-block hire-me">
            <div class="container">
                <div class="heading">
                    <h2 class="d-xl-flex justify-content-xl-center align-items-xl-center">Hire Me</h2>
                </div>
                <form method="post" action="hire.php">
                    <div class="form-group"><label for="subject">Subject</label><select class="form-control" id="subject" name="project" ><option value="0" selected="Oproject" >Other Project</option><option value="1">Python Project</option><option value="2">Web Project</option><option value="3">Console/Gui Application</option></select></div>
                    <div
                        class="form-group"><label for="email" >Email</label><input class="form-control" type="email" id="email" name="email"></div>
            <div class="form-group"><label for="message">Message</label><textarea class="form-control" id="message" name="msg"></textarea></div>
            <div class="form-group">
                <div class="form-row d-xl-flex justify-content-xl-center align-items-xl-center">
                    <div class="col-md-6" style="margin-bottom: 10px;"><label for="hire-date">Date</label><input class="form-control" id="hire-date" type="date" name="date"></div>
                </div>
                <div class="form-row d-xl-flex justify-content-xl-center align-items-xl-center">
                    <div class="col-md-6 button"><button class="btn btn-primary btn-block" type="submit" name="submit">Hire Me</button></div>
                </div>
            </div>
            </form>
            </div>
        </section>
    </main>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.3.1/js/bootstrap.bundle.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-easing/1.4.1/jquery.easing.min.js"></script>
    <script src="assets/js/scroll.js"></script>
    <script src="assets/js/bs-animation.js"></script>
    <script src="assets/js/theme.js"></script>
</body>

</html>