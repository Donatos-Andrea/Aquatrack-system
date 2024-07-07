<?php
$username = "root";
$password = "";
$database = "db_aquatrack";
$mysqli = new mysqli("localhost", $username, $password, $database);

if ($mysqli->connect_error) {
    die("Connection failed: " . $mysqli->connect_error);
}

$query = "SELECT * FROM product";
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
  <link rel="stylesheet" href="../stylesheets/product.css" />
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
    <div class="product">
      <h1>Product Details</h1>
      <table id="product-table">
        <thead>
          <tr>
            <th>Product Id</th>
            <th>Product name</th>
            <th>Category</th>
            <th>Sub-Category</th>
            <th>Size</th>
            <th>Action</th>
          </tr>
        </thead>
        <tbody>
          <?php
          if (!empty($rows)) {
              foreach ($rows as $row) {
                  echo "<tr>";
                  echo "<td>" . $row['product_id'] . "</td>";
                  echo "<td>" . $row['product_name'] . "</td>";
                  echo "<td>" . $row['category'] . "</td>";
                  echo "<td>" . $row['subcategory'] . "</td>";
                  echo "<td>" . $row['size'] . "</td>";
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

  <script src="./js/product.js"></script>
</body>
</html>

