<?php
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "db_aquatrack";

$conn = new mysqli($servername, $username, $password, $dbname);

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $email = $_POST['email'];
    $password = $_POST['password'];

    $email = mysqli_real_escape_string($conn, $email);
    $password = mysqli_real_escape_string($conn, $password);

    $sql = "SELECT * FROM admin WHERE Email = '$email' AND Password = '$password'";
    $result_user = mysqli_query($conn, $sql);

    if (mysqli_num_rows($result_user) == 1) {
        $row = mysqli_fetch_assoc($result_user);
        session_start();
        $_SESSION['admin_id'] = $row['admin_id'];
        $_SESSION['Email'] = $email;

        header('Location: ../home.html');
        exit();
    } else {
        header('Location: ../login.html?error=invalid');
        exit();
    }
}

$conn->close();
?>