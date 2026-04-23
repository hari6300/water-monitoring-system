<?php
$conn = new mysqli("localhost", "root", "", "WaterMonitoring");

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

$result = $conn->query("SELECT * FROM WaterUsage");

$data = [];

while ($row = $result->fetch_assoc()) {
    $json = json_decode($row['data'], true);
    $data[] = $json;
}

echo json_encode($data);
?>
