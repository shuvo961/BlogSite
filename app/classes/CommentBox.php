<?php


namespace App\classes;
use App\classes\Database;


class CommentBox
{
    public function getAllComments($id)
    {
        $sql = "SELECT * FROM comments WHERE blog_id=$id";
        if(mysqli_query(Database::dbConnection(),$sql)){
            $query=mysqli_query(Database::dbConnection(),$sql);
            return $query;
        }
        else{
            die("Query Problem".mysqli_error(Database::dbConnection()));
        }

    }
    public function makeComments($data)
    {
        $sql = "Insert into comments (blog_id,name,details) VALUES('$data[blog_id]','$data[name]','$data[details]') ";
        if(mysqli_query(Database::dbConnection(),$sql)){
                 $message= 'Successfully Added';
        }
        else{
            die("Query Problem".mysqli_error(Database::dbConnection()));
        }

    }


}