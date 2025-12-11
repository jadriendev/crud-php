<?php
include 'connection.php';
$id = $_GET['id'];

$conn->query("DELETE FROM tblcrud WHERE id = $id");

header("Location: home.php");
exit();
?>