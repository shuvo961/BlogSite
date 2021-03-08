<?php

namespace App\classes;
use App\classes\Database;
use http\Header;

class Login
{
      public function loginCheck($data){
           $username= $data['username'];
           $password= md5($data['password']);
           $sql= "SELECT * FROM admin WHERE email='$username' AND password='$password'  ";

           if(mysqli_query(Database::dbConnection(),$sql))
           {
               $result = mysqli_query(Database::dbConnection(),$sql);
               $user =mysqli_fetch_assoc($result);
               if($user){
                   session_start();
                   $_SESSION['id']=$user['id'];
                   $_SESSION['name']=$user['name'];
                   \header('Location: dashboard.php');
               }   else{
                   $message= "Wrong Username or Password!!!";
                   return $message;
               }

           }
           else {
               die("QueryProblem".mysqli_error(Database::dbConnection()));
           }
      }

      public function logout(){
          unset($_SESSION['id']);
          unset($_SESSION['name']);
          \header('Location: index.php');
      }
}