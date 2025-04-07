<?php

$host = "localhost";
$user = "root"; // Change if using a different username
$pass = ""; // Change if you have a password
$dbname = "booking_appointment";

$conn = new mysqli($host, $user, $pass, $dbname);
$token = 1;
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

$sql = "SELECT token,created_at FROM appointment ORDER BY id DESC LIMIT 1";
$result = $conn->query($sql);
$token = 1;
if ($result->num_rows > 0) {
    $row = $result->fetch_assoc();

    $dateNtime = new DateTime($row["created_at"]);
    $datetime = new DateTime();

    $preDateNtime = $dateNtime->format('Y-m-d');
    $now = $datetime->format('Y-m-d');

    if($preDateNtime == $now){
        $token = (int) $row["token"] +1;
    }
    else{
        $token = 1;
    }
}


?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="style.css">
</head>

<body>
    <div class="main-container">
    <div class="container">
        <div class="form-container">
            <h1>Book Appointment</h1>

            <div class="form-group row">
                <label for="First_name">First Name</label>
                <input type="text" name="fname" id="fname" required>
            </div>
            <div class="form-group row">
                <label for="Last_name">Last Name</label>
                <input type="text" name="lname" id="lname" required>
            </div>
            <div class="form-group row">
                <label for="Mobile">Contact Number</label>
                <input type="number" name="mobile" id="mobile" required>
            </div>
            <div class="form-group row">
                <label for="Email">Email</label>
                <input type="email" name="email" id="email" required>
            </div>
            <div class="form-group" id="faddress">
                <label for="address">Address</label>
                <input type="text" name="address" id="address" required>
            </div>
            <div class="form-group">
                <label for="a_reason">Appointment Reason</label>
                <textarea name="" id="reason" cols="30" rows="5" required></textarea>
            </div>
            <input type="number" name="token" id="token" value="<?php echo $token ?>" hidden>
            <div class="form-group">
                <button onclick="bookAppointment()">Book Appointment</button>
            </div>
        </div>



    </div>
    </div>


</body>
<script src="script.js"></script>

</html>