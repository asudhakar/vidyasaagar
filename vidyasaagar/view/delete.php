<?php 
include_once '../controllers/function.php';
$id = $_GET['id'];
$link = db_connect_local();
$sql = "DELETE FROM message_templates WHERE id=$id";
executeQuery($sql, $link);
header("Location: manage_templates.php");