<?php
    session_start();
    if(isset($_SESSION['auth']))
    {
        $_SESSION['status'] = "you are already logged In";
        header("location:index.php");
    }
?>
<!DOCTYPE html>
<html lang="en">
<style>
</style>
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title> Login Form </title>
    <link rel="stylesheet" href="style.css">
</head>

<body>
    <section class="container">
        <h2> Login Form </h2>
        <?php
        // include('message.php');
        ?>
        <form action="registration.php" class="form" method="POST" autocomplete="off">
            <label for="userId"><span> Email or Phone </span></label>
            <input type="text" name="username" id="userId">
            <label for="password"><span> Password </span></label>
            <input type="password" name="password" id="password">
            <button type="submit" name="Login">Login</button>
        </form>
        <p class="newUser">
            Not a member? <span><a href="Registration.php">Signup now</a></span>
        </p </section>
</body>
</html>
<?php
    include("db_connection.php");
    if(isset($_POST['Login']))
    {
        $username=$_POST['username'];
        $password=$_POST['password'];

        $query="select * from php where Email='$username' && password='$password'";
        $data=mysqli_query($conn,$query);
        $total=mysqli_num_rows($data);
        $fetch=mysqli_fetch_array($data);
        // echo $total;
        if($total==1)
        {
            // echo "Login ok";
            $username=$fetch['user_name'];
            session_start();
            $_SESSION['user_name']=$username;
            header("location:index.php");
        }
        else{
            echo "Login failed";
        }
    }
?>