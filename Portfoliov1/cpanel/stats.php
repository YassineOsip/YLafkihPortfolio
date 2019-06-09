<?php 
$sql = "SELECT `id`, `views`, `emails`, `requests` FROM `stats` WHERE 1";
$result = $conn->query($sql);
$row = $result->fetch_assoc();


?>
<div class="row" id="stats">
                            <div class="col d-xl-flex justify-content-xl-center align-items-xl-center">
                                <div class="card">
                                    <div class="card-body" style="background-color: #2c3e50;color: #ffffff;">
                                        <h1 class="d-xl-flex justify-content-xl-center align-items-xl-center card-title" style="color: #18bc9c;">Views</h1>
                                        <h6 class="text-muted card-subtitle mb-2">Total</h6>
                                        <h1 class="d-xl-flex justify-content-xl-center align-items-xl-center card-title"><?php echo $row["views"] ?></h1>
                                    </div>
                                </div>
                            </div>
                            <div class="col d-xl-flex justify-content-xl-center align-items-xl-center">
                                <div class="card">
                                    <div class="card-body" style="background-color: #2c3e50;color: #ffffff;">
                                        <h1 class="d-xl-flex justify-content-xl-center align-items-xl-center card-title" style="color: #18bc9c;">Requests</h1>
                                        <h6 class="text-muted card-subtitle mb-2">Total</h6>
                                        <h1 class="d-xl-flex justify-content-xl-center align-items-xl-center card-title"><?php echo $row["requests"] ?></h1>
                                    </div>
                                </div>
                            </div>
                        </div>
                       