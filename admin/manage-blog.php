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

use App\classes\blogs;
$query = blogs::manageBlog();

if(isset($_GET['delete']))
{    $id= $_GET['id'];
    blogs::deleteBlog($id);
}
?>

<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title>Dashboard</title>
    <link href="../assets/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" type="text/css" href="../assets/css/font-awesome.css">

    <link href="../assets/css/style.css" rel="stylesheet">


</head>

<body>


<?php include 'includes/menu.php'?>

<div class="container" style="margin-top: 10px">
    <div class="row">
        <div class="col-sm-12 mx-auto">
            <div class="card mt-lg-5 mb-lg-5 shadowbox">
                <div class="card-body">
                    <table class="table table-bordered">
                        <thead class="table-dark">
                        <tr>
                            <th scope="col">SL NO</th>
                            <th scope="col">Category Name</th>
                            <th scope="col">Blog Title</th>
                            <th scope="col">Publication Status</th>
                            <th scope="col">Action</th>

                        </tr>
                        </thead>


                        <tbody>
                        <?php
                        $i = 1;

                        while ( $cat = mysqli_fetch_assoc($query)){ ?>
                            <tr>
                                <th scope="row"><?php echo $i++; ?></th>
                                <td><?php echo $cat['name'] ?></td>
                                <td><?php echo $cat['blog_title'] ?></td>
                                <td><?php echo $cat['status']==1 ? 'Published' : 'UnPublished' ?></td>
                                <td>
                                    <a href="view-blog.php?id=<?php echo $cat['id'] ?>">View</a>
                                    <a href="edit-blog.php?id=<?php echo $cat['id'] ?>">Edit</a>
                                    <a href="?delete=true&id=<?php echo $cat['id']?>">Delete</a>
                                </td>
                            </tr>
                        <?php } ?>
                        </tbody>
                    </table>
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
