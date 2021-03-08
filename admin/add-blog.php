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
use App\classes\blogs;
if(isset($_POST['btn'])){
    $message= blogs::addBlog($_POST);
}
use App\classes\category;
$NameQuery = category::loadCategoryName();


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


<div class="container">
    <div class="row">
        <div class="col-sm-10 mx-auto my-auto">
            <div class="card mt-3 mb-3 shadowbox">
                <div class="card-title mx-auto my-auto">
                    <h3 align="center" class="pt-lg-2"> <b> Add Blog </b></h3>
                    <h4 align="center" class="alert-success"><?php echo $message?></h4>
                </div>
                <div class="card-body">

                    <form action="" method="post" enctype="multipart/form-data">
                        <div class="form-group row">
                            <label for="inputEmail3" class="col-sm-3 col-form-label">Category Name</label>
                            <div class="col-sm-9">
                                <select class="form-control" name="category_id">
                                    <option>Select Category Name</option>
                                   <?php while($getName = mysqli_fetch_assoc($NameQuery)){ ?>
                                    <option value="<?php echo $getName['id'] ?>"><?php echo $getName['name'] ?></option>
                                    <?php } ?>
                                </select>
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="inputPassword3" class="col-sm-3 col-form-label">Blog Title</label>
                            <div class="col-sm-9">
                                <input type="text" class="form-control" name="blog_title">
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="inputPassword3" class="col-sm-3 col-form-label">Short Description</label>
                            <div class="col-sm-9">
                                <textarea class="form-control" name="short_description"></textarea>
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="inputPassword3" class="col-sm-3 col-form-label">Long Description</label>
                            <div class="col-sm-9">
                                <textarea class="form-control textarea" name="long_description" rows="10"></textarea>
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="inputPassword3" class="col-sm-3 col-form-label">Blog Image</label>
                            <div class="col-sm-9">
                                <input type="file"  name="blog_image" accept="image/*">
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="inputEmail3" class="col-sm-3 col-form-label">Publication Status</label>
                            <div class="col-sm-9">
                                <input type="radio" class="custom-radio" name="status" value="1"> Published
                                <input type="radio" class="custom-radio" name="status" value="0"> Unpublished
                            </div>
                        </div>

                        <div class="form-group row">
                            <div class="col-sm-12">
                                <button type="submit" name="btn" class="btn btn-block btn-success">Save Blog Info</button>
                            </div>
                        </div>
                    </form>

                </div>
            </div>
        </div>
    </div>
</div>




<?php include '../footer.php'?>

<!-- Bootstrap core JavaScript -->
<script src="../assets/js/jquery.js"></script>
<script src="../assets/js/bootstrap.min.js"></script>
<script src="../assets/js/tinymce/tinymce.min.js"></script>
<script>tinymce.init({selector:'.textarea'});</script>

<script src="../assets/js/bootstrap.bundle.min.js"></script>

</body>

</html>