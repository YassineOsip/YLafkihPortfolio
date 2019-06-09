<?php
$target_dir = "../assets/img/";

// Check if image file is a actual image or fake image
if(isset($_POST["submit"])) {
    $dir = "assets/img";
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
    if(isset($_POST["submit"])){
    if (move_uploaded_file($_FILES["fileToUpload"]["tmp_name"], $target_file)) {
        $projname = $_POST["proj"];
        $id = $_POST["id"];
        $descr = $_POST["descr"];
        $file = $res = str_replace("../", "", $target_file);
        $sql = "UPDATE `projects` SET `title`='$projname',`descr`='$descr',`img`='$file' WHERE $id";
        $conn->query($sql);
        echo "<div style='color:green;margin-right:10px'>Successfully Updated</div>";
    } else {
        echo "<div style='color:red;margin-right:10px'>Sorry, there was an error uploading your file.";
    }}
    else{
        echo "<div style='color:red;margin-right:10px'> Error</div>";
    }
}
}
?>

<form class="d-xl-flex flex-column justify-content-xl-center align-items-xl-start" id="editProject" action="http://localhost/portfoliov1/cpanel/ypanel.php?page=updateproj" method="post" enctype="multipart/form-data">
                            <div class="d-flex d-sm-flex d-md-flex d-lg-flex d-xl-flex justify-content-center align-items-center justify-content-sm-center align-items-sm-center justify-content-md-center align-items-md-center justify-content-lg-center align-items-lg-center justify-content-xl-center align-items-xl-center"><label class="d-flex d-sm-flex d-xl-flex justify-content-center align-items-center justify-content-sm-center align-items-sm-center justify-content-xl-center align-items-xl-center" style="color: #ffffff;margin-right: 10px;">Project ID &nbsp; &nbsp; &nbsp;&nbsp;<i class="fa fa-chevron-right"></i></label>
                                <input
                                    class="bg-light border rounded-0 form-control" type="text" placeholder="Project ID" name="id"></div>
                            <div class="d-xl-flex justify-content-xl-center align-items-xl-center" style="margin-top: 10px;"><label class="d-xl-flex justify-content-xl-center align-items-xl-center" style="color: #ffffff;margin-right: 10px;">Project Image<i class="fa fa-chevron-right"></i></label><input type="file" name="fileToUpload" id="fileToUpload"></div>
                            <div class="d-flex d-sm-flex d-md-flex d-lg-flex d-xl-flex justify-content-center align-items-center justify-content-sm-center align-items-sm-center justify-content-md-center align-items-md-center justify-content-lg-center align-items-lg-center justify-content-xl-center align-items-xl-center"><label class="d-flex d-sm-flex d-xl-flex justify-content-center align-items-center justify-content-sm-center align-items-sm-center justify-content-xl-center align-items-xl-center" style="color: #ffffff;margin-right: 10px;">Project Name&nbsp;<i class="fa fa-chevron-right"></i></label>
                                <input
                                    class="bg-light border rounded-0 form-control" type="text" placeholder="Project Name" name="proj"></div>
                            <div class="d-flex d-sm-flex d-md-flex d-lg-flex d-xl-flex justify-content-center align-items-center justify-content-sm-center align-items-sm-center justify-content-md-center align-items-md-center justify-content-lg-center align-items-lg-center justify-content-xl-center align-items-xl-center"><label class="d-flex d-sm-flex d-xl-flex justify-content-center align-items-center justify-content-sm-center align-items-sm-center justify-content-xl-center align-items-xl-center" style="color: #ffffff;margin-right: 10px;">Project Description<i class="fa fa-chevron-right"></i></label>
                                <textarea
                                    class="form-control" placeholder="Write about your project" name="descr"></textarea>
                            </div>
                            <div class="d-flex d-sm-flex d-md-flex d-lg-flex d-xl-flex justify-content-center align-items-center justify-content-sm-center align-items-sm-center justify-content-md-center align-items-md-center justify-content-lg-center align-items-lg-center justify-content-xl-center align-items-xl-center"><button class="btn btn-primary bg-light border-primary" type="submit" style="color: #000000;" name="submit">Edit</button></div>
                        </form>