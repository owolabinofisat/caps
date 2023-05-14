<?php

// if (isset($_POST['submit'])) {

try{
	$pdoConnect = new PDO("mysql:host=localhost;dbname=mydb","root", "",);
} catch (PDOException $exc) {
	echo $exc->getMessage();
	exit();
}

$firstname = $_POST['firstname'];
$lastname = $_POST['lastname'];
$email = $_POST['email'];
$password = $_POST['password'];
// $con_password = $_POST['con_password'];
$phone_number = $_POST['phone_number'];
// $password_harsh = password_hash($_POST['password'], PASSWORD_DEFAULT);



$pdoQuery = "INSERT INTO users 
(firstname, lastname, email, password, phone_number) VALUES (:firstname, :lastname, :email, :password, :phone_number)";
 
 $pdoResult = $pdoConnect->prepare($pdoQuery);

$pdoExec = $pdoResult->execute(array(":firstname"=>$firstname,":lastname"=> $lastname, ":email"=> $email, ":password"=> $password, ":phone_number"=>$phone_number));

if($pdoExec)
{
	
	// echo "data submitted successfully";

	header("Location: signupsucess.php");
	exit;
	
} else {
	echo "error ";
}



	?>