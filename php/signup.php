<?php
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "db_aquatrack";

$conn = mysqli_connect($servername, $username, $password, $dbname);

if (!$conn) {
    die("Connection failed: " . mysqli_connect_error());
}

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $firstName = $_POST['firstname'];
    $middleName = $_POST['middlename'];
    $lastName = $_POST['lastname'];
    $municipality = $_POST['municipality'];
    $barangay = $_POST['barangay'];
    $zipCode = $_POST['zipcode'];
    $street = $_POST['street'];
    $contactNo = $_POST['number'];
    $email = $_POST['email'];
    $password = $_POST['password'];
    $confirmPassword = $_POST['confirm_password'];

    if ($password != $confirmPassword) {
        echo "Passwords do not match.";
        exit();
    }

    $sql = "INSERT INTO admin (First_Name, Middle_Name, Last_Name, Municipality, Barangay, Zipcode, Street, Contact_No, Email, Password)
            VALUES ('$firstName', '$middleName', '$lastName', '$municipality', '$barangay', '$zipCode', '$street', '$contactNo', '$email', '$password')";

    if (mysqli_query($conn, $sql)) {
        echo "New record created successfully";
    } else {
        echo "Error: " . $sql . "<br>" . mysqli_error($conn);
    }

    mysqli_close($conn);
}
?>
