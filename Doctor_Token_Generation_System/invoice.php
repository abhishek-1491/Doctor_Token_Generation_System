<?php
$token;
if (isset($_GET['token'])) {
    $token = htmlspecialchars($_GET['token']);
}
$host = "localhost";
$user = "root"; // Change if using a different username
$pass = ""; // Change if you have a password
$dbname = "booking_appointment";

$conn = new mysqli($host, $user, $pass, $dbname);

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

$sql = "SELECT first_name,last_name,mobile,reason,created_at FROM appointment WHERE token='$token'";
$result = $conn->query($sql);
$record;

if ($result->num_rows > 0) {
    $record = $result->fetch_assoc();
    
}

$datetime = new DateTime($record["created_at"]);

$date = $datetime->format('Y-m-d'); // Extract Date
$time = $datetime->format('H:i:s');


?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <script src="https://kit.fontawesome.com/35821647e0.js" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="style.css">
    <style>
        .date {
            position: absolute;
            margin-left: 18%;
            /* margin-top: -3%; */
        }
        button{
            position: absolute;
            padding: 10px 25px;
            border: none;
            color: white;
            border-radius: 25px;
            background-color: blue;
            font-size: large;
            top: 10%;
            left: 5%;

            a{
                text-decoration: none;
                color: white;
            }
        }
        #home-btn{
            left: 14%;
        }
    </style>

</head>

<body>
    <button><i class="fa-solid fa-arrow-left"></i> <a href="book_appointment.php">Back</a></button>
    <button id="home-btn"><i class="fa-solid fa-house"></i> <a href="index.html">Back To Home</a></button>
    <div class="main-container">
        <div class="container">
            <div class="appointment-details">
                <h1>Appointment Fixed</h1>
                <hr>
                
                <span class="date"><b>Date :</b>
                    <?php echo $date ?>
                    <br><b>Time : </b><?php echo $time ?>
                </span>
                <div class="invoice-details">
                    <p><strong>Token No : </strong>
                        <?php echo $token ?>
                    </p>
                    <p><strong>Name : </strong>
                        <?php echo $record["first_name"] . " " . $record["last_name"] ?>
                    </p>
                    <p><strong>Mobile : </strong>
                        <?php echo $record["mobile"] ?>
                    </p>
                    <p><strong>Appointment Reason : </strong><br><br>
                        <?php echo $record["reason"] ?>
                    </p>
                    <!-- <?php echo $record["created_at"] ?> -->
                </div>
            </div>
        </div>
    </div>


</body>
<script src="script.js"></script>

</html>