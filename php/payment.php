<?php
$username = "root";
$password = "";
$database = "db_aquatrack";
$mysqli = new mysqli("localhost", $username, $password, $database);

if ($mysqli->connect_error) {
    die("Connection failed: " . $mysqli->connect_error);
}

// Handle POST requests
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $action = $_POST['action'];

    if ($action == "update") {
        $payment_id = $_POST['payment_id'];
        $date_of_payment = $_POST['date_of_payment'];
        
        // Use prepared statement to prevent SQL injection
        $update_query = "UPDATE payment SET date_of_payment=? WHERE payment_id=?";
        $stmt = $mysqli->prepare($update_query);
        $stmt->bind_param("si", $date_of_payment, $payment_id);

        if ($stmt->execute()) {
            echo "Record updated successfully";
        } else {
            echo "Error updating record: " . $mysqli->error;
        }

        $stmt->close();
    } elseif ($action == "delete") {
        $payment_id = $_POST['payment_id'];
        $delete_query = "DELETE FROM payment WHERE payment_id=?";

        $stmt = $mysqli->prepare($delete_query);
        $stmt->bind_param("i", $payment_id);

        if ($stmt->execute()) {
            echo "Record deleted successfully";
        } else {
            echo "Error deleting record: " . $mysqli->error;
        }

        $stmt->close();
    } elseif ($action == "create") {
        $date_of_payment = $_POST['date_of_payment'];
        $create_query = "INSERT INTO payment (date_of_payment) VALUES (?)";

        $stmt = $mysqli->prepare($create_query);
        $stmt->bind_param("s", $date_of_payment);

        if ($stmt->execute()) {
            echo "Record created successfully";
        } else {
            echo "Error creating record: " . $mysqli->error;
        }

        $stmt->close();
    }
}

// Fetch payment records
$query = "SELECT * FROM payment";
$rows = [];

if ($result = $mysqli->query($query)) {
    while ($row = $result->fetch_assoc()) {
        $rows[] = $row;
    }
    $result->free();
} else {
    echo "Error: " . $mysqli->error;
}

$mysqli->close();
?>


<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <title>Payment</title>
  <link rel="stylesheet" href="../stylesheets/payment.css" />
</head>
<body>
  <header>
    <div class="logo-container">
      <img src="../Aquatrack-system/images/logo.png" class="logo">
      <div class="logo-text">
        <h1>Aquatrack</h1>
        <p>Drink Pure, Live Pure</p> 
      </div>
    </div>
  </header>
  <nav>
    <ul>
      <li><a href="home.html">Home</a></li>
      <li><a href="customers_information.html">View Record</a></li>
      <li><a href="products.html">Products</a></li>
      <li><a href="order_list.html">Order list</a></li>
    </ul>
  </nav>

  <main>
    <div class="payment">
      <h1>Payment Details</h1>
      <table id="payment-table">
        <thead>
          <tr>
            <th>Payment Id</th>
            <th>Date of Payment</th>
            <th>Action</th>
          </tr>
        </thead>
        <tbody>
          <?php
          if (!empty($rows)) {
              foreach ($rows as $row) {
                  echo "<tr>";
                  echo "<td>" . $row['payment_id'] . "</td>";
                  echo "<td>" . $row['date_of_payment'] . "</td>";
                  echo "<td>
                          <button class='edit-btn' onclick='handleEdit(this)'>Edit</button>
                          <button class='save-btn' style='display: none;' onclick='handleSave(this)'>Save</button>
                        </td>";
                  echo "</tr>";
              }
          }
          ?>
        </tbody>
      </table>
    </div>
  </main>

  <section class="footer">
    <p class="copyright">© 2024 by PPG. All rights reserved. </p>
  </section>

  <script src="../js/payment.js"></script>
</body>
</html>
