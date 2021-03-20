<?php


namespace App\classes;
use App\classes\Database;

class Display
{
      public function getAllPublishedBlogs()
      {
            $sql = "SELECT * FROM blogs WHERE status= 1 ";
                if(mysqli_query(Database::dbConnection(),$sql)){
                    $query=mysqli_query(Database::dbConnection(),$sql);
                    return $query;
                }
                else{
                    die("Query Problem".mysqli_error(Database::dbConnection()));
                }

      }
}