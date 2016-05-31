<?php 

include_once '../controllers/function.php';

$name_and_numbers = $_POST['name_and_number'];
$message = $_POST['message'];
$name_and_numbers = unserialize(base64_decode($name_and_numbers));
$path = $_POST['path'];





$link = db_connect();

foreach ($name_and_numbers as $key => $number) {
	$sql = "INSERT INTO `MessageOut` (`MessageTo` , `MessageText`) VALUES ('$number', '$message')";
	echo $sql;
	mysqli_set_charset($link, 'utf8mb4'); 
	executeQuery($sql, $link);
	
}
header('Location: ../index.php');

	function db_connect(){
		$connection = mysqli_connect('vefetch.ddns.net', "jayamuni", "jayam1234", "jayamuni", 3306);
		if (!$connection) {
		    die("Connection failed: " . mysqli_connect_error());
		    exit();
		}
		return $connection;
	}






	