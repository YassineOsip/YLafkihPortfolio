<?php
include "const.php";
$conn = mysqli_connect(SERVER,USERNAME,PASS,DB);
// Check connection
if (!$conn) {
    die("Connection failed: " . mysqli_connect_error());
}

?>