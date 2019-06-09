<?php 
session_start();
$_SESSION['logged'] = true;
if(! isset($_SESSION["name"])){
    header("location:index.php");
}
else{
    header("location:ypanel.php");
}

?>