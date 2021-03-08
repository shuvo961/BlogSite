<?php
session_start();
if(isset($_SESSION['id'])==null){
    header("Location: index.php");
}

require_once '../vendor/autoload.php';
$login = new App\classes\Login();

if(isset($_GET["logout"])){
    $login->adminLogout();
}
$message='';
use App\classes\category;
if(isset($_POST['btn'])){
    $message= category::addCategory($_POST);
}


?>

<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title>Dashboard</title>
    <link href="../assets/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" type="text/css" href="../assets/css/style.css">


</head>

<body>


<?php include 'includes/menu.php'?>


<div class="container" style="margin-top: 80px">
    <div class="row">
        <div class="col-sm-6 mx-auto">
            <div class="card shadowbox">
                <div class="card-title">
                    <p align="center"> <b> Add Category </b></p>
                </div>
                <div class="card-body">

                    <h5 align="center">
                        <?php echo $message?>
                    </h5>
                    <form action="" method="post">
                        <div class="form-group row">
                            <label for="inputEmail3" class="col-sm-4 col-form-label">Category Name</label>
                            <div class="col-sm-8">
                                <input type="text" class="form-control" name="category_name">
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="inputPassword3" class="col-sm-4 col-form-label">Category Info</label>
                            <div class="col-sm-8">
                             <textarea class="form-control" name="category_info"></textarea>
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="inputEmail3" class="col-sm-4 col-form-label">Publication Status</label>
                            <div class="col-sm-8">
                                <input type="radio" class="custom-radio" name="status" value="1"> Published
                                <input type="radio" class="custom-radio" name="status" value="0"> Unpublished
                            </div>
                        </div>

                        <div class="form-group row">
                            <div class="col-sm-12">
                                <button type="submit" name="btn" class="btn btn-block btn-success">Save Category Info</button>
                            </div>
                        </div>
                    </form>

                </div>
            </div>
        </div>
    </div>
</div>





<!-- Bootstrap core JavaScript -->
<script src="../assets/js/jquery.js"></script>
<script src="../assets/js/bootstrap.min.js"></script>
<script src="../assets/js/bootstrap.bundle.min.js"></script>

</body>

</html>