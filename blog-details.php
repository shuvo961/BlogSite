<?php
require_once 'vendor/autoload.php';

$id = $_GET['id'];
$reload= 'blog-details.php?id='.$id;
use App\classes\blogs;
$query = blogs::getBlogInfo($id);

$CommentBox =new \App\classes\CommentBox();
$comments = $CommentBox->getAllComments($id);

if(isset($_POST['btn']))
{
      $CommentBox->makeComments($_POST);
}

?>

<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title>Blog Details</title>
    <link href="assets/css/bootstrap.min.css" rel="stylesheet">
    <link href="assets/css/style.css" rel="stylesheet">
    <link rel="stylesheet" type="text/css" href="assets/css/font-awesome.css">


</head>

<body>


<?php include 'includes/nav.php'?>



<div class="container" style="margin-top: 10px; padding-top: 50px" >
    <div class="row justify-content-center">

        <div class="col-md-12">
            <div class="card">
                <div class="card-body">
                       <div class="row">
                           <div class="col-sm-12">
                               <h1> <?php echo $query['blog_title'] ?></h1>
                           </div>

                           <div class="col-sn-6 offset-md-3">
                               <img src="app/<?php echo $query['blog_image']  ?> " alt="" height="300" width="400">
                           </div>

                           <div class="col-sm-12">
                               <h5>  <?php echo $query['sdes'] ?>     </h5>
                           </div>


                           <div class="col-sm-12">
                               <p align="justify"> <?php echo $query['ldes'] ?> </p>
                           </div>

                       </div>

                   </div>
               </div>
           </div>
    </div>

</div>

<!--- Comment Box --->
<div class="container">
    <div class="row">

            <div class="col-md-12 mx-auto py-lg-5">
                <div class="card">
                    <div class="card-header">
                        <h3> <span><i class="fa fa-comments" aria-hidden="true"></i></span>      Comments</h3>
                    </div>
                    <div class="card-body">
                        <div class="row justify-content-center">
                            <div class="col-md-8">
                                <?php while($result=mysqli_fetch_assoc($comments)){ ?>
                                 <div class="row card-body shadowbox table-bordered" style="margin-bottom: 10px">
                                  <div class="col-1">
                                      <i class="fa fa-user-circle fa-2x" aria-hidden="true"></i>
                                  </div>
                                     <div class="col-11">
                                      <p><?php echo $result['details']?></p>
                                     </div>
                                 </div>
                                <?php } ?>
                                <form method="post">
                                    <input type="hidden" name="blog_id" value="<?php echo $id?>" >
                                    <input type="hidden" name="name" value="<?php echo $id?>" >
                                    <div class="form-group row card-body">
                                        <div class="col-10">
                                            <input type="text" class="form-control" name="details" placeholder="Type your comment here..." value="">
                                        </div>
                                        <div class="col--2">
                                            <button name="btn" id="submit" type="submit" class=" btn btn-success" >Post</button>
                                        </div>
                                    </div>
                                </form>
                            </div>

                        </div>
                    </div>
                </div>
            </div>
    </div>
</div>
<!--- Comment Box --->


<!-- /.container -->

<!-- Footer -->
<footer class="py-5 " id="ft">
    <div class="container-fluid" >
        <p class="m-0 text-center text-white">Copyright &copy; Shuvo 2021</p>
    </div>
    <!-- /.container -->
</footer>

<!-- Bootstrap core JavaScript -->


<script src="assets/js/jquery.js"></script>
<script src="assets/js/bootstrap.min.js"></script>
<script src="assets/js/bootstrap.bundle.min.js"></script>

</body>

</html>
