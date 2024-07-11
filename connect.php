<?php
	$name = $_POST['name'];
	$email = $_POST['email'];
	$contact = $_POST['contact'];
	$password = $_POST['password'];

	// Database connection
	$conn = new mysqli('localhost','root','','Major-project');
	if($conn->connect_error){
		echo "$conn->connect_error";
		die("Connection Failed : ". $conn->connect_error);
	} else {
		$stmt = $conn->prepare("insert into sign(name, email, contact, password) values(?, ?, ?, ?)");
		$stmt->bind_param("ssis", $name, $email, $contact, $password);
		$stmt->execute();
		echo "Registration successfully...";
		$stmt->close();
		$conn->close();
	}
?>