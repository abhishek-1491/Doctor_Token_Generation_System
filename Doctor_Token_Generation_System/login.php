<?php 
$host = "localhost";
$user = "root"; // Change if using a different username
$pass = ""; // Change if you have a password
$dbname = "booking_appointment";

$conn = new mysqli($host, $user, $pass, $dbname);

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}
echo "Done";

if(isset($_POST['login'])){
    $username = $_POST['username'];
    $password = $_POST['password'];

    echo $username;
    echo $password;
    $query = "SELECT * FROM doctors WHERE username = '$username'";
    $result = mysqli_query($conn, $query);
    $user = mysqli_fetch_assoc($result);

    if ($user && password_verify($password, $user['password'])) {
        $_SESSION['doctor'] = $user;

        print_r($user);
        header("Location: doctor_dashboard.html");
        exit();
    } else {
        echo "Invalid credentials!";
    }
}
mysqli_close($conn);

// header('location:doctor_dashboard.html');

?>