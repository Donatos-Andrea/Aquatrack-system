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

    $customerId = $_POST['customerid'];
    $firstName = $_POST['firstname'];
    $middleName = $_POST['middlename'];
    $lastName = $_POST['lastname'];
    $municipality = $_POST['municipality'];
    $barangay = $_POST['barangay'];
    $zipCode = $_POST['zipcode'];
    $street = $_POST['street'];
    $contactNo = $_POST['number'];
    $email = $_POST['email'];

    if (empty($customerId) || empty($firstName) || empty($middleName) || empty($lastName) || empty($municipality) || empty($barangay) || empty($zipCode) || empty($street) || empty($contactNo) || empty($email)) {
        die("All fields are required.");
    }

    $sql = "INSERT INTO `customer` (`customerid`, `firstname`, `middlename`, `lastname`, `street`, `barangay`, `municipality`, `zip_code`, `contact_number`, `email_address`)
            VALUES ('$customerId','$firstName', '$middleName', '$lastName', '$street', '$barangay', '$municipality', '$zipCode', '$contactNo', '$email')";

    if (mysqli_query($conn, $sql)) {
        echo "Customer Information successfully added!";
    } else {
        echo "Error: " . $sql . "<br>" . mysqli_error($conn);
    }

    mysqli_close($conn);
}
?>
