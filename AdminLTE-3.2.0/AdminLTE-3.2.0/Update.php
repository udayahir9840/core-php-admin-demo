<?php
    include("db_connection.php")
?>
<?php
        // session_start();
    if (isset($_POST['Update'])){
        $id=$_POST['id'];
        $name=$_POST['name'];
        $password=$_POST['password'];
        $Email=$_POST['Email'];
        $gender=$_POST['gender'];
        $hobby=$_POST['hobby'];
        $update="Update php set id='$id',name='$name',password='$password',Email='$Email',gender='$gender',hobby='$hobby' where id='$id'";
        $u=mysqli_query($conn,$update);
        if($u){
            $_SESSION['status']="User Update Successfully";
            header('location:registration.php');
        }
        else{
            $_SESSION['status']="User Update not Successfully";
            header("location:Registration.php");
            
        }
    }
?>