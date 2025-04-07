<?php 
$host = "localhost";
$user = "root"; // Change if using a different username
$pass = ""; // Change if you have a password
$dbname = "booking_appointment";

$conn = new mysqli($host, $user, $pass, $dbname);

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

$jsonData = file_get_contents("php://input");

$data = json_decode($jsonData, true);

$token = $data["token"];
$patient;
$sql = "SELECT * FROM appointment WHERE token = '$token'";
$result = $conn->query($sql);
if($result->num_rows > 0){
    $patient = $result->fetch_assoc();
    echo json_encode(["status" => "success", "check"=>"true" ,"patient" => $patient]);
}
else{
    echo json_encode(["status" => "failed","check" => "false"]);
}


?>