<?php


namespace App\classes;


class blogs
{
    public function addBlog($data)
    {

        $fileName = $_FILES['blog_image']['name'];
        $directory = '../assets/img/';
        $imageUrl = $directory.$fileName;
        $fileType = pathinfo($fileName, PATHINFO_EXTENSION);
        $check = getimagesize($_FILES['blog_image']['tmp_name']);
        if($check){
            if(file_exists($imageUrl)){
                die('This file exists. Select another file..');
            } else{
                if($_FILES['blog_image']['size']>5000000){
                    die('File is too large, Select another one');
                }
                else {
                    if($fileType !='jpg' && $fileType!='png'){
                        die('Please insert a jpg or png');
                    } else {
                        move_uploaded_file($_FILES['blog_image']['tmp_name'],$imageUrl);

                        $sql = "INSERT INTO blogs ( category_id , blog_title, sdes ,ldes ,blog_image , status ) VALUES ('$data[category_id]', '$data[blog_title]','$data[short_description]','$data[long_description]','$imageUrl','$data[status]')";
                        if(mysqli_query(Database::dbConnection(),$sql))
                        {
                            $message = "Successfully Added";
                            return $message;


                        } else {
                            die("Query Problem".mysqli_error(Database::dbConnection()));
                        }

                    }
                }
            }
        } else {
            die('Please choose a image file. thanks!');
        }





    }

    public function manageBlog(){
        $sql = "SELECT b.* , c.name FROM blogs as b,category as c where b.category_id=c.id";


        if(mysqli_query(Database::dbConnection(),$sql))
        {
            $query= mysqli_query(Database::dbConnection(),$sql);

            return $query;

        } else {
            die("Query Problem".mysqli_error(Database::dbConnection()));
        }


    }


    public function getBlogInfo($id){

        $sql = " SELECT b.* , c.name FROM blogs as b,category as c where b.id=$id and b.category_id=c.id";
        if(mysqli_query(Database::dbConnection(),$sql)){

            $query = mysqli_query(Database::dbConnection(),$sql);
            $result = mysqli_fetch_assoc($query);
            return $result;

        }

    }

    public function updateBlogInfo($data){
        $blogImage=$_FILES['blog_image']['name'];
          if ($blogImage){
           $sql = " SELECT * FROM blogs where id='$data[blog_id]'";
           $query=mysqli_query(Database::dbConnection(),$sql);
           $result=mysqli_fetch_assoc($query);
           unlink($result['blog_image']);




           $fileName = $_FILES['blog_image']['name'];
           $directory = '../assets/images/';
           $imageUrl = $directory.$fileName;
           $fileType = pathinfo($fileName, PATHINFO_EXTENSION);
           $check = getimagesize($_FILES['blog_image']['tmp_name']);
           if($check){
               if(file_exists($imageUrl)){
                   die('This file exists. Select another file..');
               } else{
                   if($_FILES['blog_image']['size']>5000000){
                       die('File is too large, Select another one');
                   }
                   else {
                       if($fileType !='jpg' && $fileType!='png'){
                           die('Please insert a jpg or png');
                       } else {
                           move_uploaded_file($_FILES['blog_image']['tmp_name'],$imageUrl);

                           $sql = "UPDATE blogs SET category_id='$data[category_id]',blog_title='$data[blog_title]', sdes='$data[short_description]', ldes='$data[long_description]', blog_image = '$imageUrl' ,status='$data[status]' WHERE id = '$data[blog_id]'";

                           if(mysqli_query(Database::dbConnection(),$sql))
                           {
                               $message = "Successfully Added";
                               return $message;


                           } else {
                               die("Query Problem".mysqli_error(Database::dbConnection()));
                           }

                       }
                   }
               }
           } else {
               die('Please choose a image file. thanks!');
           }







       } else {

           $sql = "UPDATE blogs SET category_id='$data[category_id]',blog_title='$data[blog_title]', sdes='$data[short_description]', ldes='$data[long_description]', status='$data[status]' WHERE id = '$data[blog_id]'";
           if(mysqli_query(Database::dbConnection(),$sql))
           {
               $message = "Successfully Updated";
               return $message;


           } else {
               die("Query Problem".mysqli_error(Database::dbConnection()));
           }

       }

    }

    public function deleteBlog($id){
        $sql = "DELETE FROM blogs WHERE id='$id'";
        if(mysqli_query(Database::dbConnection(),$sql))
        {
            header("Location: manage-blog.php");


        } else {
            die("Query Problem".mysqli_error(Database::dbConnection()));
        }

    }

}