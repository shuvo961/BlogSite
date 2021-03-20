<?php
session_start();
if(isset($_SESSION['id'])==null){
    header("Location: index.php");
}

require_once '../vendor/autoload.php';
$login = new App\classes\Login();

if(isset($_GET["logout"])){
    $login->logout();
}

use App\classes\blogs;
$id = $_GET['id'];
$query = blogs::getBlogInfo($id);

?>

<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title>Dashboard</title>
    <link href="../assets/css/bootstrap.min.css" rel="stylesheet">
    <link href="../assets/css/style.css" rel="stylesheet">
    <link rel="stylesheet" type="text/css" href="../assets/css/font-awesome.css">


</head>

<body>


<?php include 'includes/menu.php'?>

<div class="container" style="margin-top: 10px">
    <div class="row">
        <div class="col-sm-12 mx-auto">
            <div class="card shadowbox mt-lg-5 mb-lg-5">
                <div class="card-body">
                    <table class="table table-bordered">
                        <tr>
                            <th scope="col">BLOG ID</th>
                            <td scope="col"><?php echo $query['id'] ?></td>
                        </tr>
                        <tr>
                            <th scope="col">BLOG TITLE</th>
                            <td scope="col"><?php echo $query['blog_title'] ?></td>
                        </tr>  <tr>
                            <th scope="col">Category Name</th>
                            <td scope="col"><?php echo $query['name'] ?></td>
                        </tr>  <tr>
                            <th scope="col">Short Description</th>
                            <td scope="col"><?php echo $query['sdes'] ?></td>
                        </tr>  <tr>
                            <th scope="col">Long Description</th>
                            <td scope="col"><?php echo $query['ldes'] ?></td>
                        </tr>  <tr>
                            <th scope="col">Blog Image</th>
                            <td scope="col"><img src="<?php echo $query['blog_image']  ?> " alt="" height="200" width="250"></td>
                        </tr>  <tr>
                            <th scope="col">Publication Status</th>
                            <td scope="col"><?php echo $query['status']==1 ? 'Published' : 'Unpublished' ?></td>
                        </tr>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>



<?php include '../footer.php'?>


<!-- Bootstrap core JavaScript -->
<script src="../assets/js/jquery.js"></script>
<script src="../assets/js/bootstrap.min.js"></script>
<script src="../assets/js/bootstrap.bundle.min.js"></script>

</body>

</html>
