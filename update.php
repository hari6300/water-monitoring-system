<?php
$conn = new mysqli("localhost","root","","WaterMonitoring");
$id = $_GET['id'];
$conn->query("UPDATE WaterUsage SET data = JSON_SET(data,'$.status','Normal') WHERE id=$id");
echo "Updated";
?>
