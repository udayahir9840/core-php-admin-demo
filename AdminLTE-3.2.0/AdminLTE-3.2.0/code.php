<?php
    session_start();
    include('db_connection.php');
    if(isset($_POST['addUser']))
    {
        $id=$_POST['id'];
        $name=$_POST['name'];
        $password=$_POST['password'];
        $Email=$_POST['Email'];
        @$gender=$_POST["gender"];
        echo @$hobby=$_POST['hobby'];
        foreach($_FILES['image']['tmp_name'] as $key => $val)
        {
        $tempname=$_FILES["image"]["tmp_name"][$key];
        $filename=$_FILES["image"]["name"][$key];
        move_uploaded_file($tempname,$uploadfolder.$filename); 
        $folder="images/".$filename;
        $user_query="INSERT INTO php(id,name,password,Email,gender,hobby,image) VALUES
        ('$id','$name','$password','$Email','$gender','$hobby','$filename')";
        $user_query_run=mysqli_query($conn,$user_query);
        }
        if($user_query_run)
        {   
            // move_uploaded_file($_FILES["image"]["tmp_name"],"images/".$_FILES["image"]["name"]);
            $_SESSION['status']="User Added Successfully";
            header("Location:Registration.php");
        }else
        {
            $_SESSION['status']="User Registration Failed";
            header("Location:Registration.php");
        }
    }
    if(isset($_POST['UpdateUser']))
    {
        $id=$_POST['id'];
        $name=$_POST['name'];
        $password=$_POST['password'];
        $Email=$_POST['Email'];
        $gender=$_POST['gender'];
        $hobby=$_POST['hobby'];
        $filename=$_FILES["image"]["name"];
        $tempname=$_FILES["image"]["tmp_name"];
        $folder="images/".$filename;
        move_uploaded_file($tempname,$folder);
        $query="UPDATE php set name='$name',password='$password',Email='$Email',gender='$gender',hobby='$hobby' where id='id'";
        // (id,name,password,Email,gender,hobby) VALUES
        // ('$id','$name','$password','$Email','$gender')";
        $query_run=mysqli_query($conn,$query);
        if($query_run)
        {
            $_SESSION['status']="User Update Successfully";
            header("Location:Registration.php");
         }else
         {
             $_SESSION['status']="User Update Failed";
             header("Location:Registration.php");
         }
  
    }
?>
