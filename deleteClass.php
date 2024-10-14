<?php
include "connect.php";
$id_lop = $_GET["id_lop"];
$sql1 = "DELETE FROM lop WHERE id_lop = '$id_lop'";
$stmt = $conn->prepare($sql1);
$query = $stmt->execute();

$sql2 = "UPDATE hocsinh SET id_lop = '14' WHERE id_lop = '$id_lop' ";
$stmt2 = $conn->prepare($sql2);
$query = $stmt2->execute();
header("location:listClasses.php");
?>