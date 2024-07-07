<?php
$username = "root";
$password = "";
$database = "db_aquatrack";
$mysqli = new mysqli("localhost", $username, $password, $database);

if ($mysqli->connect_error) {
    die("Connection failed: " . $mysqli->connect_error);
}

$query = "SELECT * FROM order_list";
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
  <link rel="stylesheet" href="../stylesheets/order_list.css" />
</head>
<body>
  <header>
    <div class="logo-container">
      <img src="./images/logo.png" class="logo">
      <div class="logo-text">
        <h1>Aquatrack</h1>
        <p>Drink Pure, Live Pure</p> 
      </div>
    </div>
  </header>
  <nav>
    <ul>
      <li><a href="../home.html">Home</a></li>
      <li><a href="../view_record.html">View Record</a></li>
      <li><a href="./products.php">Products</a></li>
      <li><a href="./order_list.php">Order list</a></li>
    </ul>
  </nav>

  <main>
    <div class="order">
      <h1>Order Details</h1>
      <table id="order-table">
        <thead>
          <tr>
            <th>Order Id</th>
            <th>Unit Price</th>
            <th>Selling Price</th>
            <th>Delivery Price</th>
            <th>Action</th>
          </tr>
        </thead>
        <tbody>
          <?php
          if (!empty($rows)) {
              foreach ($rows as $row) {
                  echo "<tr>";
                  echo "<td>" . $row['order_id'] . "</td>";
                  echo "<td>" . $row['unit_price'] . "</td>";
                  echo "<td>" . $row['selling_price'] . "</td>";
                  echo "<td>" . $row['delivery_date'] . "</td>";
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

  <script src="./js/order.js"></script>
</body>
</html>

