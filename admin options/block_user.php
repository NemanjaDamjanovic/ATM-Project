<?php include '../configuration/database.php'; ?>

<?php

$id = $_GET['id'];

// Update table.
$query = "UPDATE users SET user_status = 'Blocked' WHERE id = '$id'";
// Execute the query.
$result = mysqli_query($connect, $query);

if ($result) {
  header("Location: ../admin_page.php");
} else {
  echo "User blocking failed: " . mysqli_error($connect);
}

?>