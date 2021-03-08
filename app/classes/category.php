<?php


namespace App\classes;
use App\classes\Database;


class category
{
    public function addCategory($data)
    {
            $sql = "INSERT INTO category ( name , info , status ) VALUES ('$data[category_name]', '$data[category_info]','$data[status]')";
            if(mysqli_query(Database::dbConnection(),$sql))
            {
                $message = "Successfully added";
                return $message;


            } else {
                die("Query Problem".mysqli_error(Database::dbConnection()));
            }


    }
    public function manageCategory(){
        $sql = "SELECT * FROM category";


        if(mysqli_query(Database::dbConnection(),$sql))
        {
            $query= mysqli_query(Database::dbConnection(),$sql);

            return $query;

        } else {
            die("Query Problem".mysqli_error(Database::dbConnection()));
        }


    }

    public function loadCategoryName(){

        $sql = "SELECT * FROM category WHERE status = 1";


        if(mysqli_query(Database::dbConnection(),$sql))
        {
            $query= mysqli_query(Database::dbConnection(),$sql);

            return $query;

        } else {
            die("Query Problem".mysqli_error(Database::dbConnection()));
        }

    }


    public function getCategoryInfo($id){

        $sql = " SELECT * FROM category WHERE id = '$id' ";
        if(mysqli_query(Database::dbConnection(),$sql)){

            $query = mysqli_query(Database::dbConnection(),$sql);
            return $query;

        }

    }

    public function updateCategoryInfo($data){
        $sql = "UPDATE category SET name='$data[category_name]',info='$data[category_info]', status='$data[status]' WHERE id = '$data[id]'";
        if(mysqli_query(Database::dbConnection(),$sql))
        {
            $message = "Successfully Updated";
            return $message;


        } else {
            die("Query Problem".mysqli_error(Database::dbConnection()));
        }

    }

    public function deleteCategory($id){

        $sql = "DELETE FROM category WHERE id='$id'";

        if(mysqli_query(Database::dbConnection(),$sql)){
            header("Location: manage-category.php");

        } else {
            die("Query Problem".mysqli_error(Database::dbConnection()));
        }


    }

}


