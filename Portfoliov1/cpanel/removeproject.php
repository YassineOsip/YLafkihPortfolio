<?php 
if(isset($_POST["submit"])){
$id = $_POST["id"];
$sql = "DELETE FROM `projects` WHERE id=$id";
$conn->query($sql);
echo "<div style='color:green;margin-right:10px'>Successfully Updated</div>";
}
?>
<form id="removeProject" action="http://localhost/portfoliov1/cpanel/ypanel.php?page=removeproj" method="post">
                            <div class="d-flex d-sm-flex d-md-flex d-lg-flex d-xl-flex justify-content-center align-items-center justify-content-sm-center align-items-sm-center justify-content-md-center align-items-md-center justify-content-lg-center align-items-lg-center justify-content-xl-center align-items-xl-center"><label class="d-flex d-sm-flex d-xl-flex justify-content-center align-items-center justify-content-sm-center align-items-sm-center justify-content-xl-center align-items-xl-center" style="color: #ffffff;margin-right: 10px;">Project ID &nbsp; &nbsp; &nbsp;&nbsp;<i class="fa fa-chevron-right"></i></label>
                                <input
                                    class="bg-light border rounded-0 form-control" type="text" placeholder="Project ID" name="id"></div>
                            <div class="d-flex d-sm-flex d-md-flex d-lg-flex d-xl-flex justify-content-center align-items-center justify-content-sm-center align-items-sm-center justify-content-md-center align-items-md-center justify-content-lg-center align-items-lg-center justify-content-xl-center align-items-xl-center"><button class="btn btn-primary bg-light border-primary" type="submit" style="color: #000000;" name="submit">Remove</button></div>
                        </form>