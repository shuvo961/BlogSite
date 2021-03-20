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

use App\classes\category;
   $query = category::manageCategory();

if(isset($_GET['delete']))
{    $id= $_GET['id'];

    category::deleteCategory($id);
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


<div class="container">
    <div class="row">
        <div  class="col-md-8 mx-auto" style="margin-top: 100px">
            <div class="card shadowbox">
                <div class="card-body">
                    <table class="table table-borderless">
                        <thead>
                        <tr>
                            <th scope="col">ID</th>
                            <th scope="col">Category Name</th>
                            <th scope="col">Category Description</th>
                            <th scope="col">Publication Status</th>
                            <th scope="col">Action</th>

                        </tr>
                        </thead>


                        <tbody>

                        <?php   while ( $cat = mysqli_fetch_assoc($query)){ ?>
                            <tr>
                                <th scope="row"><?php echo $cat['id'] ?></th>
                                <td><?php echo $cat['name'] ?></td>
                                <td> <textarea class="form-control" readonly ><?php echo $cat['info'] ?></textarea>  </td>
                                <td><?php echo  $cat['status']==1 ? 'Published' : 'UnPublished'?></td>
                                <td>
                                    <a href="edit-category.php?id=<?php echo $cat['id'] ?>">Edit</a>
                                    <a href="?delete=true&id=<?php echo $cat['id']?>" onclick="alert('Are you sure? You want to delete!')" >Delete</a>
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