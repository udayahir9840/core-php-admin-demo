<?php
include("db_connection.php");
include("navbar.php");
include("header.php");
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
                <div class="card">
                    <div class="card-header">
                        <h3 class="card-title">Logo </h3>
                        <a href="login.php">Logout</a>
                        <a href="" class="btn btn-primary btn-sm float-right" data-toggle="modal"
                            data-target="#exampleModal">Add User</a>
                        <!-- Modal -->
                        <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog"
                            aria-labelledby="exampleModalLabel" aria-hidden="true">
                            <div class="modal-dialog" role="document">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <h5 class="modal-title" id="exampleModalLabel">Logo</h5>
                                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                            <span aria-hidden="true">&times;</span>
                                        </button>
                                    </div>
                                    <form action="code1.php" method="POST" enctype="multipart/form-data">
                                        <div class="modal-body">
                                            <div class="form-group">
                                                <label for=""></label><br>
                                                <input type="hidden" class="from-control" name="id" placeholder="Id">
                                            </div>
                                            <div class="form-group">
                                                <label for="">Image</label><br>
                                                <input type="file" name="image[]" multiple>
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
                                        <th scope="col">Image</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php
                                        // error_reporting(0);
                                        $userprofile=@$_SESSION['user_name'];
                                            if($userprofile == true)
                                            {
                                            }
                                            else
                                            {
                                                ("location:login.php");
                                            }
                                        $query="select * from logo";
                                        $query_run=mysqli_query($conn,$query);
                                        if(mysqli_num_rows($query_run)> 0)
                                        {
                                            foreach($query_run as $row)
                                            {
                                            ?>
                                    <?php       
                                            echo "<tr>
                                                    <td>".$row['id']."</td>
                                                    <td><img src= '".$row['image']."' width='50px' height='50px'</td>
                                                  </tr>"
                                                  
                                            ?>
                                    <td>
                                        <a href="edit1.php?id=<?php echo $row['id'];?>"
                                            class="btn btn-info btn-sm">Edit</a>
                                        <a href="delete1.php?id=<?php echo $row['id'];?>"
                                            class="btn btn-danger btn-sm">Delet</a>
                                    </td>
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