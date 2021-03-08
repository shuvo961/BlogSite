<?php
require_once"vendor/autoload.php";
use App\classes\Student;
$result='';
if(isset($_POST['submit'])){
    $result = Student::addStudent($_POST);
}



?>

<!DOCTYPE html>
<html>
<head>
    <title>Add Student</title>
</head>
<body>
<?php echo '<h1>'.$result.'</h1>'.'<br>';?>
<a href="add-student.php">Add Student</a>
<a href="view-student.php">View Student</a>
<hr>
   <table border="1">
            <form action="" method="post">

                <tr>
                    <th>ID</th>
                    <td><input type="text" name="id" value=""></td>
                </tr>

                <tr>
                    <th>Name</th>
                    <td><input type="text" name="name" value=""></td>
                </tr>

                <tr>
                    <th>Email</th>
                    <td><input type="text" name="email" value=""></td>
                </tr>

                <tr>
                    <th>College</th>
                    <td><input type="text" name="college" value=""></td>
                </tr>

                <tr>
                    <th></th>
                    <td><input type="submit" name="submit" value="Submit"></td>
                </tr>

            </form>


   </table>

</body>
</html>