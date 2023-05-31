<?php session_start();
    // echo "welcome".$_SESSION['user_name'];
?>
<?php 
    include("navbar.php");
    include("header.php");
    include("db_connection.php");
    include("Update.php");
?>
<?php
error_reporting(0);
$id=$_GET['id'];
$select="select * from php where id='$id'";
$s=mysqli_query($conn,$select);
$row=mysqli_fetch_assoc($s);
$hobby=$row['hobby'];
$hobby1=explode(",",$hobby);
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Update</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
    <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.12.9/dist/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
</head>
<body>
<div class="container"> 
        <div class="row">
            <div class="col-md-12">
                <?php
                    if(isset($_SESSION['status']))
                    {
                        echo "<h4>".$_SESSION['status']."</h4>";
                        unset($_SESSION['status']);
                    }
                ?>
                <div class="card">
                    <div class="card-header">
                        <h3 class="card-title">Edit-Register User</h3>
                        <a href="Registration.php" class="btn btn-danger btn-sm float-right">BACK</a>
                        <!-- Modal -->
                        <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                            <div class="modal-dialog" role="document">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <h5 class="modal-title" id="exampleModalLabel">Add User</h5>
                                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                <span aria-hidden="true">&times;</span>
                                            </button>
                                    </div>
                                    
                                </div>
                            </div>
                        </div>
                        <div class="card-body">
                          <div class="row">
                            <div class="col-md-6">
                            <form action="Registration.php" method="POST">
                                    <div class="modal-body">
                                          <?php
                                          if(isset($_GET['id']))
                                          {
                                            $id=$_GET['id'];
                                            $query="select * from php where id='$id' limit 1";
                                            $query_run=mysqli_query($conn,$query);

                                            if(mysqli_num_rows($query_run)> 0)
                                            {
                                              foreach($query_run as $row)
                                              {
                                                ?>
                                        <div class="form-group">
                                            <label for=""></label><br>
                                            <input type="hidden" class="from-control" name="Id" value="<?php echo $row['Id']?>" placeholder="Id">
                                        </div>
                                        <div class="form-group">
                                            <label for="">name</label><br>
                                            <input type="text" class="from-control" name="name" value="<?php echo $row['name']?>" placeholder="Name">
                                        </div>
                                        <div class="form-group">
                                            <label for="">password</label><br>
                                            <input type="password" class="from-control" name="password" value="<?php echo $row['password']?>" placeholder="password">
                                        </div>
                                        <div class="form-group">
                                            <label for="">Email-Id</label><br>
                                            <input type="Email-Id" class="from-control" name="Email" value="<?php echo $row['Email']?>" placeholder="Email-Id">
                                        </div>
                                        <div class="form-group">
                                            <label for="">Gender</label><br>
                                            <input type="radio" class="from-control" placeholder="Gender" name="gender" value="<?php echo $row['gender']?>">Male&nbsp;&nbsp;
                                            <input type="radio" class="from-control" placeholder="Gender" name="gender" value="<?php echo $row['gender']?>">Female&nbsp;&nbsp;
                                            <!-- <input type="radio" class="from-control" placeholder="Gender" name="gender">&nbsp;Other -->
                                        </div>
                                        <div class="form-group">
                                            <label for="">Hobby</label><br>
                                            <input type="Checkbox" class="from-control" name="hobby[]" placeholder="Checkbox" value="Cricket" value="<?php echo $row['hobby']?>">Cricket&nbsp;&nbsp;
                                            <input type="Checkbox" class="from-control" name="hobby[]" placeholder="Checkbox" value="Vollyball" value="<?php echo $row['hobby']?>">Vollyball&nbsp;&nbsp;
                                            <input type="Checkbox" class="from-control" name="hobby[]" placeholder="Checkbox" value="Kabbadi" value="<?php echo $row['hobby']?>">Kabbadi&nbsp;&nbsp;
                                            <input type="Checkbox" class="from-control" name="hobby[]" placeholder="Checkbox" value="Chess" value="<?php echo $row['hobby']?>">Chess
                                        </div>
                                        <div class="form-group">
                                            <label for="">Image</label><br>
                                            <input type="file" name="image" multiple value="<?php echo $row['image']?>">
                                            <input type="hidden" name="image_old" multiple value="<?php echo $row['image']?>">
                                        </div>
                                        <!-- <img src="<?php echo "images/".$row['image'];?>" width="100px"> -->
                                        </div>
                                                <?php
                                              }
                                            }
                                            else{
                                                echo "<h4>No record found!</h4>";
                                            }
                                          }
                    
                                          ?>
                                            <div class="modal-footer">
                                                <!-- <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button> -->
                                                <button type="submit" name="UpdateUser" class="btn btn-info">Update</button>
                                        </div>
                                    </div>
                            </form>
                            </div>
                          </div>
                            <!-- <table class="table">
                                <thead>
                                        <tr>
                                            <th scope="col">Id</th>
                                            <th scope="col">Name</th>
                                            <th scope="col">Password</th>
                                            <th scope="col">Email-Id</th>
                                            <th scope="col">Gender</th>
                                            <th scope="col">Hobby</th>
                                        </tr>
                                </thead>
                                <tbody>
                                    <?php
                                        // error_reporting(0);
                                        $query="select * from php";
                                        $query_run=mysqli_query($conn,$query);
                                        if(mysqli_num_rows($query_run)> 0)
                                        {
                                            foreach($query_run as $row)
                                            {
                                            ?>
                                            <tr>
                                                <td><?php echo $row['id'];?></td>
                                                <td><?php echo $row['name'];?></td>
                                                <td><?php echo $row['password'];?></td>
                                                <td><?php echo $row['Email'];?></td>
                                                <td><?php echo $row['gender'];?></td>
                                                <td><?php echo $row['Hobby'];?></td>
                                                <td>
                                                    <a href="edit.php?id=<?php echo $row['id'];?>" class="btn btn-info btn-sm">Edit</a>
                                                    <a href="delete.php?id=$row['id']" class="btn btn-danger btn-sm">Delet</a>
                                                </td>
                                            </tr>
                                            <?php
                                            }
                                        }
                                        else
                                        {
                                        ?>

                                        <?php
                                        }
                                    ?>           
                                </tbody>
                            </table> -->
                        </div>
                </div>
            </div>
        </div>
    </div>
  <!-- <form action="Update.php" method="POST">
    id:  <input type="hidden" name="id" value="<?php echo $row['id'];?>"><br><br>
    name:<input type="text" name="name" value="<?php echo $row['name'];?>"><br><br>
    password:<input type="password" name="password" value="<?php echo $row['password'];?>"><br><br>
    Email-id:<input type="Email-id" name="Email-id" value="<?php echo $row['Email'];?>"><br><br>
    gender:&nbsp;&nbsp;<input type="radio" name="gender" value="<?php echo $row['gender'];?>">M&nbsp;&nbsp;
           <input type="radio" name="gender" value="<?php echo $row['gender'];?>">F&nbsp;&nbsp;
           <input type="radio" name="gender" value="<?php echo $row['gender'];?>">O
    <br><br>
    hobby:&nbsp;&nbsp;<input type="checkbox" name="hobby" value="<?php echo $row['hobby'];?>">cricket&nbsp;&nbsp;
          <input type="checkbox" name="Hobby" value="<?php echo $row['hobby'];?>">vollyball&nbsp;&nbsp;
          <input type="checkbox" name="Hobby" value="<?php echo $row['hobby'];?>">kabbadi
    <br><br>
    <button class="btn btn-primary" type="submit" name="Update" value="Update">Update</button>
  </form> -->
</body>
</html>