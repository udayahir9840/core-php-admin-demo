<?php
include("db_connection.php")
?>
<?php
    $select="select * from php";
    $res=mysqli_query($conn,$select);
    while ($row=mysqli_fetch_assoc($res))
    {?>
    <table border="2px">
        <tr>
            <td><?php echo $row['id'];?></td>
            <td><?php echo $row['name'];?></td>
            <td><?php echo $row['password'];?></td>
            <td><?php echo $row['Email'];?></td>
            <td><?php echo $row['gender'];?></td>
            <td><?php echo $row['hobby'];?></td>
            <td><a href="delete.php?id=<?php echo $row['id'];?>">Delete</a></td>
            <td><a href="edit.php?id=<?php echo $row['id'];?>">Update</a></td>
        </tr>
    </table>
      <?php
    }
?>