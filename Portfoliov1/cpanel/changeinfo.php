
<?php
$target_dir = "../assets/img/";

// Check if image file is a actual image or fake image
if(isset($_POST["submit"])) {
    $target_file = $target_dir . basename($_FILES["fileToUpload"]["name"]);
$uploadOk = 1;
$imageFileType = strtolower(pathinfo($target_file,PATHINFO_EXTENSION));
    $check = getimagesize($_FILES["fileToUpload"]["tmp_name"]);
    if($check !== false) {
        //echo "File is an image - " . $check["mime"] . ".";
        $uploadOk = 1;
    } else {
        echo "<div style='color:red;margin-right:10px'>File is not an image.</div>";
        $uploadOk = 0;
    }
// Check if file already exists
if (file_exists($target_file)) {
    echo "<div style='color:red;margin-right:10px'>Sorry, file already exists.</div>";
    $uploadOk = 0;
}
// Check file size
if ($_FILES["fileToUpload"]["size"] > 500000) {
    echo "<div style='color:red;margin-right:10px'>Sorry, your file is too large.</div>";
    $uploadOk = 0;
}
// Allow certain file formats
if($imageFileType != "jpg" && $imageFileType != "png" && $imageFileType != "jpeg"
&& $imageFileType != "gif" ) {
    echo "<div style='color:red;margin-right:10px'>Sorry, only JPG, JPEG, PNG & GIF files are allowed.</div>";
    $uploadOk = 0;
}
// Check if $uploadOk is set to 0 by an error
if ($uploadOk == 0) {
    echo "<div style='color:red;margin-right:10px'>Sorry, your file was not uploaded.</div>";
// if everything is ok, try to upload file
} else {
    if(isset($_POST["pass"]) && $_POST["pass"] == $row["password"]){
    if (move_uploaded_file($_FILES["fileToUpload"]["tmp_name"], $target_file)) {
        $fulln = $_POST["fullname"];
        $sql = "UPDATE admins SET img='$target_file' WHERE id=1";
        $sql2 = "UPDATE admins SET username='$fulln' WHERE id=1";
        $conn->query($sql);
        $conn->query($sql2);
        echo "<div style='color:green;margin-right:10px'>Successfully Changed</div>";
    } else {
        echo "<div style='color:red;margin-right:10px'>Sorry, there was an error uploading your file.";
    }}
    else{
        echo "<div style='color:red;margin-right:10px'>password Error</div>";
    }
}
}

?>


<form id="changeInfo" action="http://localhost/portfoliov1/cpanel/ypanel.php" method="post" enctype="multipart/form-data">
    <div class="d-xl-flex justify-content-xl-center align-items-xl-center" style="margin-top: 10px;"><label
            class="d-xl-flex justify-content-xl-center align-items-xl-center"
            style="color: #ffffff;margin-right: 10px;">Change Admin Image&nbsp;&nbsp;<i
                class="fa fa-chevron-right"></i></label>    <input type="file" name="fileToUpload" id="fileToUpload"></div>
    <div
        class="d-flex d-sm-flex d-md-flex d-lg-flex d-xl-flex justify-content-center align-items-center justify-content-sm-center align-items-sm-center justify-content-md-center align-items-md-center justify-content-lg-center align-items-lg-center justify-content-xl-center align-items-xl-center">
        <label
            class="d-flex d-sm-flex d-xl-flex justify-content-center align-items-center justify-content-sm-center align-items-sm-center justify-content-xl-center align-items-xl-center"
            style="color: #ffffff;margin-right: 10px;">Change Username&nbsp;<i class="fa fa-chevron-right"></i></label>
        <input class="bg-light border rounded-0 form-control" type="text" name="fullname"></div>
    <div
        class="d-flex d-sm-flex d-md-flex d-lg-flex d-xl-flex justify-content-center align-items-center justify-content-sm-center align-items-sm-center justify-content-md-center align-items-md-center justify-content-lg-center align-items-lg-center justify-content-xl-center align-items-xl-center">
        <label
            class="d-flex d-sm-flex d-xl-flex justify-content-center align-items-center justify-content-sm-center align-items-sm-center justify-content-xl-center align-items-xl-center"
            style="color: #ffffff;margin-right: 10px;">Cureent Password&nbsp;&nbsp;<i
                class="fa fa-chevron-right"></i></label>
        <input class="bg-light border rounded-0 form-control" type="password" name="pass"></div>
    <div
        class="d-flex d-sm-flex d-md-flex d-lg-flex d-xl-flex justify-content-start align-items-center justify-content-sm-start align-items-sm-center justify-content-md-start align-items-md-center justify-content-lg-start align-items-lg-center justify-content-xl-start align-items-xl-center">
        <a href="http://localhost/portfoliov1/cpanel/ypanel.php?page=changepass" style="color: #000000;">Change
            Password</a></div>
    <div
        class="d-flex d-sm-flex d-md-flex d-lg-flex d-xl-flex justify-content-center align-items-center justify-content-sm-center align-items-sm-center justify-content-md-center align-items-md-center justify-content-lg-center align-items-lg-center justify-content-xl-center align-items-xl-center">
        <button class="btn btn-primary bg-light border-primary" type="submit" style="color: #000000;" name="submit">Confirm</button>
    </div>
</form>