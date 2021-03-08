<?php
session_start();
if($_SESSION['id']==null){
    header('Location: index.php');
}

require_once "../vendor/autoload.php";
use App\classes\Login;

if(isset($_GET['logout'])){

        Login::logout();

}

?>



<!DOCTYPE html>
<html>
<head>
    <title>Dashboard</title>



    <link rel="stylesheet" href="../assets/css/bootstrap.min.css">


    <link rel="stylesheet" type="text/css" href="../assets/css/login.css">
    <link rel="stylesheet" type="text/css" href="../assets/css/font-awesome.css">


</head>
<body>

     <?php include 'includes/menu.php'?>
    <script src="../assets/js/jquery.js"></script>
    <script src="../assets/js/bootstrap.min.js"></script>
    <script src="../assets/js/bootstrap.bundle.js"></script>
</body>
</html>
