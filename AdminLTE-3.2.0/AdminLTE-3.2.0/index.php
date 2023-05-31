<?php
    session_start();
    if(!isset($_SESSION['user_name']))
    {
      header("location:login.php");
    }
    include("navbar.php");
    include("header.php");
    include("db_connection.php");
        
    
?>

<?php
  // $select="select * from php";
  // $res=mysqli_query($conn,$select);
  // if(mysqli_num_rows($res)>0){
  //   while($row=mysqli_fetch_assoc($res)){
  //     echo $row['id'];
  //     echo $row['name'];
  //     echo $row['password'];
  //     echo $row['Email'];
  //     echo $row['gender'];
  //     echo $row['hobby'];  
  //   }
  // }
?>
