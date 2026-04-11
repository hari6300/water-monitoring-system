<?php
$conn = new mysqli("localhost","root","","WaterMonitoring");
$id = $_GET['id'];
$conn->query("DELETE FROM WaterUsage WHERE id=$id");
echo "Deleted";
?>
