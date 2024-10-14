<?php
include "connect.php";
$id_monhoc = $_GET["id_monhoc"];
$sql1 = "DELETE FROM monhoc WHERE id_monhoc = '$id_monhoc'";
$stmt = $conn->prepare($sql1);
$query = $stmt->execute();
header("location:listSubjects.php");
?>