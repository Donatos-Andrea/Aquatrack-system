<?php
// Check if form is submitted for adding, editing, or deleting payment
if ($_SERVER["REQUEST_METHOD"] == "POST") {
  
  // Handle add payment action
  if (isset($_POST['add'])) {
    // Redirect to add payment page or perform necessary actions
    header("Location: add_payment.php");
    exit();
  }
  
  // Handle edit payment action
  if (isset($_POST['edit'])) {
    // Get payment_id from hidden input
    $payment_id = $_POST['payment_id'];
    // Redirect to edit payment page with payment_id or perform necessary actions
    header("Location: edit_payment.php?payment_id=" . urlencode($payment_id));
    exit();
  }
  
  // Handle delete payment action
  if (isset($_POST['delete'])) {
    // Get payment_id from hidden input
    $payment_id = $_POST['payment_id'];
    // Perform deletion process (typically a database operation)
    // Example: DELETE FROM payments WHERE payment_id = $payment_id;
    // After deletion, redirect back to the same page or another appropriate page
    header("Location: payment_list.php");
    exit();
  }
}
?>
