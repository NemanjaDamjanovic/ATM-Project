<!-- File's which are included in sign_up.php file. -->
<?php include '../includes/header.php'; ?>
<?php include '../configuration/database.php'; ?>

<?php
// Start a session.
session_start();

// Wrap $_SESSION['id'] into variable.
$id = $_SESSION['id'];

// Check if the form has been submitted.
if (isset($_POST['update'])) {
    echo '<h4 class="mt-5 mb-5" style="color: green">User succsessfuly updated</h4>';
  // Get the updated user information from the form.
  $id = $_POST['id'];
  $full_name = $_POST['full_name'];
  $username = $_POST['username'];
  $user_pin = $_POST['user_pin'];
  $balance = $_POST['balance'];

  // UPDATE query.
  $query = "UPDATE users SET user_full_name='$full_name', user_id='$username', user_pass='$user_pin', user_balance='$balance' WHERE id='$id'";
  // Execute the query.
  $result = mysqli_query($connect, $query);
}

// Get the user information to be updated.
if (isset($_GET['id'])) {
  $id = $_GET['id'];
  // SELECT all from users table by specific id.
  $query = "SELECT * FROM users WHERE id='$id'";
  // Execute the query.
  $result = mysqli_query($connect, $query);
  // Fetches a result row from a query result as an associative array.
  $user = mysqli_fetch_array($result);
}

?>

<!-- HTML form to update user information -->
<form action="update_user.php" method="POST">
  <input type="hidden" name="id" value="<?php echo (isset($user['id'])) ? $user['id'] : ''; ?>">
  <div class="form-group">
    <label for="full_name">Full Name:</label>
    <input type="text" class="form-control" name="full_name" value="<?php echo (isset($user['user_full_name'])) ? $user['user_full_name'] : ''; ?>">
  </div>
  <div class="form-group">
    <label for="username">Username:</label>
    <input type="text" class="form-control" name="username" value="<?php echo (isset($user['user_id'])) ? $user['user_id'] : ''; ?>">
  </div>
  <div class="form-group">
    <label for="user_pin">User PIN:</label>
    <input type="text" class="form-control" name="user_pin" value="<?php echo (isset($user['user_pass'])) ? $user['user_pass'] : ''; ?>">
  </div>
  <div class="form-group">
    <label for="balance">Balance:</label>
    <input type="text" class="form-control" name="balance" value="<?php echo (isset($user['user_balance'])) ? $user['user_balance'] : ''; ?>">
  </div>
   <input type="submit" class="btn btn-dark w-500" name="update" value="Update User">
</form>

<!-- File's which are included in sign_up.php file. -->
<?php include '../includes/footer.php'; ?>