<?php
$conn = new mysqli("localhost","root","","WaterMonitoring");
$result = $conn->query("SELECT id,data FROM WaterUsage");

$data = [];
while($row = $result->fetch_assoc()){
 $json = json_decode($row['data'],true);
 $data[] = $json;
}
echo json_encode($data);
?>
