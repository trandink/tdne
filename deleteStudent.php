<?php
include "connect.php";
$id_hocsinh = $_GET["id_hocsinh"];
$sql1 = "DELETE FROM hocsinh WHERE id_hocsinh = '$id_hocsinh'";
$stmt = $conn->prepare($sql1);
$query = $stmt->execute();
header("location:listStudents.php");
?>