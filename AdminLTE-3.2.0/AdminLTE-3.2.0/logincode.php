<?php
session_start();
include("db_connection.php");
if(isset($_POST['Login']))
{
    $Email = $_POST['username'];
    $password = $_POST['password'];
    $log_query="select * from php where username='$Email' AND password='$password' limit 1";
    $log_query_run = mysqli_query($conn,$log_query);
    
    if(mysqli_num_rows($log_query_run) > 0)
    {
        foreach($log_query_run as $row)
        {
            $id=$row['id'];
            $name=$row['name'];
            $password=$row['password'];
            $Email=$row['Email'];
            $gender=$row['gender'];
            $hobby=$row['hobby'];
            $image=$row['image'];
            $_SESSION['auth']=true;
            $_SESSION['auth_user']=[
            'id'=>$id,
            'name'=>$name,
            'password'=>$password,
            'Email'=>$Email,
            'gender'=>$gender,
            'hobby'=>$hobby,
            'image'=>$image
            ];
        $_SESSION['status'] = "Login successfully";
        header("location:login.php");
        }
    }
    else
    {
        $_SESSION['status'] = "Invalid username and password";
        header("location:login.php");    
    }
}
else
{
    $_SESSION['status'] = "Access Denied";
    header("location:login.php");
}
?>