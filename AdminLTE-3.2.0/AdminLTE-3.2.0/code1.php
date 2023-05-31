<?php
    session_start(); 
    include("navbar.php");
    include("header.php");
    include("db_connection.php");
    
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
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
                        <h3 class="card-title">Register User</h3>
                        <a href="" class="btn btn-primary btn-sm float-right" data-toggle="modal" data-target="#exampleModal">Add User</a>
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
                                    <form action="code.php" method="POST">
                                    <div class="modal-body">
                                        <div class="form-group">
                                            <label for="">Id</label><br>
                                            <input type="text" class="from-control" name="Id" placeholder="Id">
                                        </div>
                                        <div class="form-group">
                                            <label for="">Name</label><br>
                                            <input type="text" class="from-control" Name="Name" placeholder="Name">
                                        </div>
                                        <div class="form-group">
                                            <label for="">password</label><br>
                                            <input type="password" class="from-control" name="password" placeholder="password">
                                        </div>
                                        <div class="form-group">
                                            <label for="">Email-Id</label><br>
                                            <input type="Email-Id" class="from-control" name="Email" placeholder="Email-Id">
                                        </div>
                                        <!-- <div class="form-group">
                                            <label for="">Gender</label><br>
                                            <input type="radio" class="from-control" placeholder="Gender" name="g1">Male&nbsp;&nbsp;
                                            <input type="radio" class="from-control" placeholder="Gender" name="g1">Female&nbsp;&nbsp;
                                            <input type="radio" class="from-control" placeholder="Gender" name="g1">&nbsp;Other
                                        </div> -->
                                        <!-- <div class="form-group">
                                            <label for="">Hobby</label><br>
                                            <input type="Checkbox" class="from-control" name="h1" placeholder="Checkbox">Cricket&nbsp;&nbsp;
                                            <input type="Checkbox" class="from-control" name="h1" placeholder="Checkbox">Vollyball&nbsp;&nbsp;
                                            <input type="Checkbox" class="from-control" name="h1" placeholder="Checkbox">Kabbadi&nbsp;&nbsp;
                                            <input type="Checkbox" class="from-control" name="h1" placeholder="Checkbox">Chess
                                        </div> -->
                                        </div>
                                            <div class="modal-footer">
                                                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                                                <button type="submit" name="addUser" class="btn btn-primary">Save</button>
                                        </div>
                                    </div>
                                    </form>
                                </div>
                            </div>
                        </div>
                        <div class="card-body">
                            <table class="table">
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
                                        error_reporting(0);
                                        $query="select * from php";
                                        $query_run=mysqli_query($conn,$query);
                                        if(mysqli_num_rows($query_run)> 0)
                                        {
                                            foreach($query_run as $row)
                                            {
                                            ?>
                                            <tr>
                                                <td><?php echo $row['id']?></td>
                                                <td><?php echo $row['name']?></td>
                                                <td><?php echo $row['password']?></td>
                                                <td><?php echo $row['Email']?></td>
                                                <td><?php echo $row['gender']?></td>
                                                <td><?php echo $row['Hobby']?></td>
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
                            </table>
                        </div>
                </div>
            </div>
        </div>
    </div>
</body>
</html>
<tr>
                                                <td><?php echo $row['id'];?></td>
                                                <td><?php echo $row['name'];?></td>
                                                <td><?php echo $row['password'];?></td>
                                                <td><?php echo $row['Email'];?></td>
                                                <td><?php echo $row['gender'];?></td>
                                                <td><?php echo $row['hobby'];?></td>
                                                <!-- <td><?php echo $row['image'];?></td> -->
                                                <td>
                                                    <img src="<?php echo "images/".$row['image'];?>"></td>
                                                <td>
                                                <td>
                                                    <a href="edit.php?id=<?php echo $row['id'];?>" class="btn btn-info btn-sm">Edit</a>
                                                    <a href="delete.php?id=<?php echo $row['id'];?>" class="btn btn-danger btn-sm">Delet</a>
                                                </td>
                                            </tr>