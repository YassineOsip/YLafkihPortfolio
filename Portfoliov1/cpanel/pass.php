<?php 
if(isset($_POST["passsub"])){
    if($_POST["password"] == $row["password"]){
        if($_POST["passconf"] == $_POST["passconff"]){
            $pass = $_POST["passconf"];
            $current_date = date("Y-m-d");
            $sql = "UPDATE admins SET password='$pass' WHERE id=1";
            $sql2 = "UPDATE admins SET date='$current_date' WHERE id=1";
            $conn->query($sql);
            $conn->query($sql2);
        }
    }
    else{
        echo "<div style='color:red;margin-right:10px'>password Error</div>";
    }  
}
?>
<form id="changePassword" action="http://localhost/portfoliov1/cpanel/ypanel.php?page=changepass" method="post">
    <div
        class="d-flex d-sm-flex d-md-flex d-lg-flex d-xl-flex justify-content-center align-items-center justify-content-sm-center align-items-sm-center justify-content-md-center align-items-md-center justify-content-lg-center align-items-lg-center justify-content-xl-center align-items-xl-center">
        <label
            class="d-flex d-sm-flex d-xl-flex justify-content-center align-items-center justify-content-sm-center align-items-sm-center justify-content-xl-center align-items-xl-center"
            style="color: #ffffff;margin-right: 10px;">Currrent Password<i class="fa fa-chevron-right"></i></label>
        <input class="bg-light border rounded-0 border-light form-control" type="password" name="password"></div>
    <div
        class="d-flex d-sm-flex d-md-flex d-lg-flex d-xl-flex justify-content-center align-items-center justify-content-sm-center align-items-sm-center justify-content-md-center align-items-md-center justify-content-lg-center align-items-lg-center justify-content-xl-center align-items-xl-center">
        <label
            class="d-flex d-sm-flex d-xl-flex justify-content-center align-items-center justify-content-sm-center align-items-sm-center justify-content-xl-center align-items-xl-center"
            style="color: #ffffff;margin-right: 10px;">New Password &nbsp;<i class="fa fa-chevron-right"></i></label>
        <input class="bg-light border rounded-0 form-control" type="password" name="passconf"></div>
    <div
        class="d-flex d-sm-flex d-md-flex d-lg-flex d-xl-flex justify-content-center align-items-center justify-content-sm-center align-items-sm-center justify-content-md-center align-items-md-center justify-content-lg-center align-items-lg-center justify-content-xl-center align-items-xl-center">
        <label
            class="d-flex d-sm-flex d-xl-flex justify-content-center align-items-center justify-content-sm-center align-items-sm-center justify-content-xl-center align-items-xl-center"
            style="color: #ffffff;margin-right: 10px;">Confirm Password &nbsp;<i
                class="fa fa-chevron-right"></i></label>
        <input class="bg-light border rounded-0 form-control" type="password" name="passconff"></div>
    <div
        class="d-flex d-sm-flex d-md-flex d-lg-flex d-xl-flex justify-content-center align-items-center justify-content-sm-center align-items-sm-center justify-content-md-center align-items-md-center justify-content-lg-center align-items-lg-center justify-content-xl-center align-items-xl-center">
        <button class="btn btn-primary bg-light border-primary" type="submit" style="color: #000000;"
            name="passsub">Confirm</button></div>
</form>