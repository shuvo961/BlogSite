<?php


namespace App\classes;


class Student
{
    public function addStudent($data){
        $link= mysqli_connect('localhost','root','','blogtest');
        $sql="insert into Students (name,email,college) values ('$data[name]','$data[email]','$data[college]')";
        if(mysqli_query($link,$sql)){
            $msg= 'Success';
            return $msg;
        }
        else {
             die("Query Problem".mysqli_error($link));
        }
    }

    public function viewStudent(){
        $link= mysqli_connect('localhost','root','','blogtest');
        $sql="Select * FROM Students";
        if(mysqli_query($link,$sql)){
              $queryResult = mysqli_query($link,$sql);
              return $queryResult;
        }
        else {
            die("Query Problem".mysqli_error($link));
        }
    }

}