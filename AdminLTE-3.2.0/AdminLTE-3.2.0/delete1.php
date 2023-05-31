<?php
    include("db_connection.php");
?>
<?php
    $id=$_GET['id'];
    $delete="delete from `logo` where id='$id'";
    $q=mysqli_query($conn,$delete);
    if ($q){
        header('location:logo.php');
    }
?>