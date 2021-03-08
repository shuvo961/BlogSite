<?php


namespace App\classes;


class Database
{
     public function dbConnection(){
         $host='localhost';
         $username='root';
         $password= '';
         $database='blogtest';

         $link = mysqli_connect($host,$username,$password,$database);
         return $link;

     }
}