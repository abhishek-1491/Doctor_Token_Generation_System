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
$first_name = $data["first_name"];
$last_name = $data["last_name"];
$mobile = $data["mobile"];
$email = $data["email"];
$address = $data["address"];
$reason = $data["reason"];
// $date = $data["date"];
// $time = $data["time"];

$bookA = $conn->prepare("INSERT INTO appointment (token,first_name,last_name,mobile,email,address,reason) VALUES (?,?,?,?,?,?,?)");
$bookA->bind_param("issssss", $token, $first_name, $last_name, $mobile, $email, $address, $reason);

if ($bookA->execute()) {
    echo json_encode(["status" => "success", "token" => $token]);
}
else{
    echo json_encode(["status" => "failed"]);
}


?>