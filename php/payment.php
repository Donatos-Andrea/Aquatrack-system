<?php
$username = "root";
$password = "";
$database = "db_aquatrack";
$mysqli = new mysqli("localhost", $username, $password, $database);

if ($mysqli->connect_error) {
    die("Connection failed: " . $mysqli->connect_error);
}

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
                  echo "<td><button>Edit</button></td>";
                  echo "</tr>";
              }
          }
          ?>
        </tbody>
      </table>
      <button id="add-btn">Add Row</button>
    </div>
  </main>

  <section class="footer">
    <p class="copyright">© 2024 by PPG. All rights reserved. </p>
  </section>

  <script src="./js/payment.js"></script>
</body>
</html>
