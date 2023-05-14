
<?php

try{
    $pdoConnect = new PDO("mysql:host=localhost;dbname=mydb","root", "",);
} catch (PDOException $exc) {
    echo $exc->getMessage();
    exit();
}

//if(isset($_POST['submit'])) {
	$email = $_POST['email'];
	$password = $_POST['password'];

	$stmt = $pdoConnect->prepare("SELECT  * FROM users WHERE email = :email AND password = :password");

	$stmt->execute(array(":email"=> $email, ":password"=> $password));

	$user = $stmt->fetch(PDO::FETCH_ASSOC);


if($user)
{
session_start();
				$_SESSION["user"] = $user;
               // echo json_encode(array('sucess'=>true));
				// echo "Login successful";
				header("Location: dashboard.php");
           }else{
           	echo json_encode(array('sucess'=>false, 'message'=>'invalid login credentials'));
           }

   ?>