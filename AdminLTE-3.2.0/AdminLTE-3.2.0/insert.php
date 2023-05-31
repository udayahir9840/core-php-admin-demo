<?php
    include("db_connection.php");
?>
<?php
// error_reporting(0);
// @$id=$_GET['id'];

@$name=$_GET['name'];   
@$password=$_GET['password'];
@$Email=$_GET['Email-Id'];
@$gender=$_GET['gender'];
@$hobby=$_GET['hobby'];
// $g=implode(",",$hobby);
//database connection
// $insert="insert into php(name,password,Email-Id,gender,Hobby) values('$name','$password','$Email','$gender','$Hobby')";
// $res=mysqli_query($conn,$insert);
// if($res){
//     echo "record insert successfully";
// }
// else{
//     echo "not inserting record";
// }
// $conn = new mysqli("localhost","root","","phpadmin_panel");
// if($conn->connect_error){
//     die('connection failed : '.$conn->connect_error);
// }else{
//     $stmt = $conn->prepare("insert into php(name,password,Email,gender,Hobby)
//     values(?,?,?,?,?)");
//     $stmt->bind_param('sssss',$name,$password,$Email,$gender,$Hobby);
//     $stmt->execute();
//     echo "registration successfully";
//     $stmt->close();
//     $conn->close();
// }
$insert="INSERT INTO php(name,password,Email,gender,hobby)value
('$name','$password',$Email,$gender,$hobby)";
$res=mysqli_query($conn,$insert);
if($res){
    echo("record insert successfully");
}
else{
    echo "not inserting record";
}
?>