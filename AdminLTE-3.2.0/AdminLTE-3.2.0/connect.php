<?php
	$id = $_POST['id'];
	$Name = $_POST['Name'];
    $password = $_POST['password'];
    $email = $_POST['email'];
	$gender = $_POST['gender'];
	$hobby = $_POST['hobby'];
	// Database connection
	$conn = new mysqli('localhost','root','','php');
	if($conn->connect_error){
		echo "$conn->connect_error";
		die("Connection Failed : ". $conn->connect_error);
	} else {
		$stmt = $conn->prepare("insert into php(id,Name,password,email,gender,hobby) values(?, ?, ?, ?, ?, ?)");
		$stmt->bind_param("ssssss", $id, $Name,$password,$email,$gender,$hobby);
		$execval = $stmt->execute();
		echo $execval;
		echo "Registration successfully...";
		$stmt->close();
		$conn->close();
	}
?>