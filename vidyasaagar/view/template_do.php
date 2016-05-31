<?php 
include_once '../controllers/function.php';
$link = db_connect_local();
if(isset($_GET['delete'])){
	$id = $_GET['delete'];
	delete_template($id, $link);
}else{
	$template_name = $_POST['template_name'];
	$template_message = $_POST['template-message'];
	mysqli_set_charset($link, 'utf8mb4'); 
	insert_template($template_name, $template_message, $link);
}

header("Location: manage_templates.php");

function insert_template($template_name, $template_message, $link){
	$sql = "INSERT INTO `message_templates` (`template_name`, `template_message`) VALUES('$template_name','$template_message')";
	executeQuery($sql, $link);
}


function delete_template($id, $link){
	$sql = "DELETE FROM `message_templates` WHERE id=$id";
	executeQuery($sql, $link);
}