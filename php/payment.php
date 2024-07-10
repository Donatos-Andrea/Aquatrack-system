<?php
$username = "root";
$password = "";
$database = "db_aquatrack";
$mysqli = new mysqli("localhost", $username, $password, $database);

if ($mysqli->connect_error) {
    die("Connection failed: " . $mysqli->connect_error);
}

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $action = $_POST['action'];

    if ($action == "update") {
        $payment_id = $_POST['payment_id'];
        $date_of_payment = $_POST['date_of_payment'];
        
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

/*<?php
$username = "root";
$password = "";
$database = "db_aquatrack";
$mysqli = new mysqli("localhost", $username, $password, $database);

if ($mysqli->connect_error) {
    die("Connection failed: " . $mysqli->connect_error);
}

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $action = $_POST['action'];

    if ($action == "update") {
        $order_id = $_POST['order_id'];
        $customer_id = $_POST['customer_id'];
        $product_id = $_POST['product_id'];
        $unit_price = $_POST['unit_price'];
        $selling_price = $_POST['selling_price'];
        $total_amount = $_POST['total_amount'];
        $delivery_date = $_POST['delivery_date'];

        $update_query = "UPDATE order_list SET customer_id=?, product_id=?, unit_price=?, selling_price=?, total_amount=?, delivery_date=? WHERE order_id=?";
        $stmt = $mysqli->prepare($update_query);
        $stmt->bind_param("iiddssi", $customer_id, $product_id, $unit_price, $selling_price, $total_amount, $delivery_date, $order_id);

        if ($stmt->execute()) {
            echo "Record updated successfully";
        } else {
            echo "Error updating record: " . $mysqli->error;
        }

        $stmt->close();
    } elseif ($action == "delete") {
        $order_id = $_POST['order_id'];
        $delete_query = "DELETE FROM order_list WHERE order_id=?";

        $stmt = $mysqli->prepare($delete_query);
        $stmt->bind_param("i", $order_id);

        if ($stmt->execute()) {
            echo "Record deleted successfully";
        } else {
            echo "Error deleting record: " . $mysqli->error;
        }

        $stmt->close();
    } elseif ($action == "create") {
        $order_id = $_POST['order_id'];
        $customer_id = $_POST['customer_id'];
        $product_id = $_POST['product_id'];
        $unit_price = $_POST['unit_price'];
        $selling_price = $_POST['selling_price'];
        $total_amount = $_POST['total_amount'];
        $delivery_date = $_POST['delivery_date'];

        $create_query = "INSERT INTO order_list (order_id, customer_id, product_id, unit_price, selling_price, total_amount, delivery_date) VALUES (?, ?, ?, ?, ?, ?, ?)";

        $stmt = $mysqli->prepare($create_query);
        $stmt->bind_param("iiiddss", $order_id, $customer_id, $product_id, $unit_price, $selling_price, $total_amount, $delivery_date);

        if ($stmt->execute()) {
            echo "Record created successfully";
        } else {
            echo "Error creating record: " . $mysqli->error;
        }

        $stmt->close();
    } elseif ($action == "calculate_total") {
        $date = $_POST['date'];
        $total_amount = calculateTotalAmount($mysqli, $date);
        echo "Total amount for $date: " . $total_amount;
    }
}

function calculateTotalAmount($mysqli, $date) {
    $query = "SELECT SUM(total_amount) AS total_amount FROM order_list WHERE delivery_date=?";
    $stmt = $mysqli->prepare($query);
    $stmt->bind_param("s", $date);
    $stmt->execute();
    $stmt->bind_result($total_amount);
    $stmt->fetch();
    $stmt->close();
    return $total_amount;
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

ITRY NYO TOH SINCE ITO UNG MAGLALABAS NG TOTAL AMOUNT OF SALES WITHIN THE DAY
BAKIT KO PINADAGDAG KO
DAHIL SA NASA PROJECT PROPOSAL YAN, NA NAKIKITA UNG DAILY SALES NG BUSINESS
KAYO ANG MAG TRY NITO SINCE ERROR SA END KO UNG SYSTEM
KUNG D NYO MATRY, E BAHALA NA TLGA KAY ALMI
WAG NYO D PANSININ TOH, YAN DIN NAPAPANSIN KO SAINYO, MINSAN D NYO NA PINAPANSIN
UNG MGA DOCUMENTS(FROM THE BUSINESS) NATIN, NAKAKALIMUTAN NYO NA UNG MGA CONTENTS NUN
BAHALA NLNG KAU KUNG ITRY NYO PA TOH O INDE

*/
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
      <li><a href="products.php">Products</a></li>
      <li><a href="order_list.php">Order list</a></li>
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
