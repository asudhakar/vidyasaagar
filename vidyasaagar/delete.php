<?php 
include_once 'controllers/function.php';


$id = $_GET['id'];
$name = $_GET['file'];
$link = db_connect_local();
$sql = "DELETE FROM files WHERE id=$id";
executeQuery($sql, $link);
delete_file($name);

header("Location: index.php");
