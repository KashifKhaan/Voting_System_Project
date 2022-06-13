<?php
include_once 'connect.php';

$id = $_GET['id'];
$query = "DELETE FROM `votes` where Id = $id";
mysqli_query($con,$query);
header('location:index.php');
?>

