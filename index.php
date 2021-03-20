<?php
require_once 'vendor/autoload.php';
$display= new \App\classes\Display();

$blogs= $display->getAllPublishedBlogs();


?>



<!DOCTYPE html>
<html>
<head>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Blog Site</title>
    <link href="assets/css/bootstrap.min.css" rel="stylesheet">
    <link href="assets/css/heroic-features.css" rel="stylesheet">
    <link href="assets/css/style.css" rel="stylesheet">

</head>
<body>

<div class="bg-image">

</div>

    <!-- Navigation -->
    <?php include "includes/nav.php";?>

    <!-- Page Content -->
    <div class="container">


        <!-- Jumbotron Header -->
        <header class="jumbotron my-4 bg bg-image">
              <h3 class="display-4">Featured!</h3>
              <p class="lead">This is a test blog-site. Your featured content will be here.</p>
              <a href="#" class="btn btn-primary btn-lg">Read More!</a>

        </header>




        <!-- Page Features -->
        <div class="row text-center">

            <?php while($result=mysqli_fetch_assoc($blogs)) { ?>

            <div class="col-lg-3 col-md-6 mb-4">
                <div class="card h-100 shadowbox">
                    <img class="card-img-top" style=" border-radius: 20px 20px  0px 0px;" src="app/<?php echo $result['blog_image'] ?>" alt="">
                    <div class="card-body">
                        <h6 class="card-title"><?php echo $result['blog_title']  ?></h6>
                        <p  align="justify" class="card-text small"><?php  echo $result['sdes'] ?></p>
                    </div>
                    <div class="card-footer">
                        <a href="blog-details.php?id=<?php echo $result['id'] ?>" class="btn btn-primary">Read More!</a>
                    </div>
                </div>
            </div>

            <?php    }   ?>

        </div>
        <!-- /.row -->

    </div>
    <!-- /.container -->

    <!-- Footer -->
    <footer class="py-5 " id="ft">
        <div class="container-fluid" >
            <p class="m-0 text-center text-white">Copyright &copy; Shuvo 2021</p>
        </div>
        <!-- /.container -->
    </footer>

<script src="assets/js/jquery.js"></script>
<script src="assets/js/bootstrap.min.js"></script>
<script src="assets/js/bootstrap.bundle.js"></script>

</body>
</html>
