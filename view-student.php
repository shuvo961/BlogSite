<?php
require_once"vendor/autoload.php";
use App\classes\Student;
$result='';

   $result = Student::viewStudent();

?>

<!DOCTYPE html>
<html>
<head>
    <title>Add Student</title>
</head>
<body>

<a href="add-student.php">Add Student</a>
<a href="view-student.php">View Student</a>
<hr>
<table border="1" width="600">

   <tr>
       <th>ID</th>
       <th>Name</th>
       <th>Email</th>
       <th>College</th>
   </tr>

  <?php while($student= mysqli_fetch_assoc($result)) { ?>

    <tr>
        <td><?php echo $student['id']?></td>
        <td><?php echo $student['name']?></td>
        <td><?php echo $student['email']?></td>
        <td><?php echo $student['college']?></td>

    </tr>
    <?php } ?>


</table>

</body>
</html>