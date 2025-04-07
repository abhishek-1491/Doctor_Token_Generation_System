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

$doctor_id = "doctor_". mt_rand(1000, 9999);
$name = $data["name"];
$email = $data["email"];
$contact = $data["contact"];
$username = $data["username"];
$password = password_hash($data["password"], PASSWORD_DEFAULT);

// echo json_encode(["status" => "success", "name" => $name]);

$doctor = $conn->prepare("INSERT INTO doctors (name,email,contact,username,password,doctor_id) VALUES (?,?,?,?,?,?)");
$doctor->bind_param("ssssss", $name,$email,$contact,$username,$password,$doctor_id);

if ($doctor->execute()) {
    echo json_encode(["status" => "success", "doctor_id" => $doctor_id]);
}
else{
    echo json_encode(["status" => "failed"]);
}


?>