<?php
header("Content-Type: application/json; charset=UTF-8");
$obj = json_decode($_GET["cari"], false);

$conn = new mysqli("myServer", "myUser", "myPassword", "Northwind");
//$result = $conn->query("SELECT name FROM ".$obj->table." LIMIT ".$obj->limit);
$result = $conn->query("SELECT * FROM `mst_kapal` WHERE nama_kapal LIKE ".$obj->name);
$outp = array();
$outp = $result->fetch_all(MYSQLI_ASSOC);

echo json_encode($outp);
?>