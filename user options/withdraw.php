<!-- File's which are included to current file. -->
<?php include '../includes/header.php'; ?>
<?php include '../configuration/database.php'; ?>

<?php 
// Session start.
session_start();

// Check if $_SESSION['id'] is set.
if(isset($_SESSION['id'])) {

    // Wrap $_SESSION['id'] into varibale.
    $user_id = $_SESSION['id'];
    // Select user balance from database table.
    $query = "SELECT user_balance FROM users WHERE user_id = '$user_id'";
    // Execute the query.
    $result = mysqli_query($connect, $query);
    // Fetches a result row from a query result as an associative array.
    $row = mysqli_fetch_assoc($result);
    // Retrieve exact value from query, stored in variable.
    $balance = $row['user_balance'];
}
// Set $domination and $withdraw varibles.
$denomination = 0;
$withdraw_message = '';

// Check which checkbox is checked and according to that set $domination value.
if (isset($_POST['5000'])) {
  $denomination = $_POST['5000'];
} elseif (isset($_POST['2000'])) {
  $denomination = $_POST['2000'];
} elseif (isset($_POST['1000'])) {
  $denomination = $_POST['1000'];
} elseif (isset($_POST['500'])) {
  $denomination = $_POST['500'];
} elseif (isset($_POST['200'])) {
  $denomination = $_POST['200'];
} elseif(isset($_POST['other_value'])) {
  $denomination = $_POST['other_value'];
}

// If withdraw is clicked.
if(isset($_POST['withdraw'])){

  // Withdraw variable value is set.
  $withdraw = $balance - $denomination;
  // Update user_balance row according to substraction inside $withdraw variable.
  $query = "UPDATE users SET user_balance='$withdraw' WHERE user_id='$user_id'";
  // Execute the query.
  $result = mysqli_query($connect, $query);
    // If denomination is greter then 0, insert data into another table. This is only done to prevent to "0 - ZERO" withdraw will display as log in user history file.
  if($denomination > 0) {
  $transactions = $denomination;
  $date = date("Y-m-d H:i:s");
  // INSERT data into table.
  $query = "INSERT INTO withdraw_history (user_id, user_last_transaction, transaction_date) VALUES ('$user_id', '$transactions', '$date')";
  // Execute the query.
  $result = mysqli_query($connect, $query);
  }
  // If withdraw is clicked and value inserted without checkboxes (custom value), if its any number greater then zero then proceed and make a withdraw.
  if($_POST['other_value'] != 0) {
  $withdraw_message = '<p style="color: green">You succsessfuly withdraw your money</p>';
  $denomination = 0;
  } else {
  $withdraw_message = '<p style="color: red">Please select or enter amount to withdraw</p>';
    }
}
?>

<div class="mt-5 mb-5">
<h3 style="color: green; text-align: center;">Please chose how much money you want to withdraw:</h3>
</div>

<form action="#" method="POST">
<div class="container d-flex justify-content-center">
  <form>
    <div class="form-group form-check">
      <input type="checkbox" class="form-check-input" id="denomination_5000" name="5000" value="5000" onclick="clearCheckboxes()">
      <label class="form-check-label" for="denomination_5000"><h5><b><?php echo number_format(5000); ?></b></h5></label>    </div>
   <div class="form-group form-check">
      <input type="checkbox" class="form-check-input" id="denomination_2000" name="2000" value="2000" onclick="clearCheckboxes()">
      <label class="form-check-label" for="denomination_2000"><h5><b><?php echo number_format(2000); ?></b></h5></label>
    </div>
    <div class="form-group form-check">
      <input type="checkbox" class="form-check-input" id="denomination_1000" name="1000" value="1000" onclick="clearCheckboxes()">
      <label class="form-check-label" for="denomination_1000"><h5><b><?php echo number_format(1000); ?></b></h5></label>
    </div>
    <div class="form-group form-check">
      <input type="checkbox" class="form-check-input" id="denomination_500" name="500" value="500" onclick="clearCheckboxes()">
      <label class="form-check-label" for="denomination_500"><h5><b>500</b></h5></label>
    </div>    <div class="form-group form-check">
      <input type="checkbox" class="form-check-input" id="denomination_200" name="200" value="200" onclick="clearCheckboxes()">
      <label class="form-check-label" for="denomination_200"><h5><b>200</b></h5></label>
    </div>
</div>
  <div class="form-group text-center mt-5 mb-3">
    <input type="submit" class="btn btn-dark w-500" value="Submit" name="submit">
  </div>
  <p class="mt-5" style="text-align:center">or enter other amount:</p>
  
</form>
<form action="#" method="POST">
  <div class="mb-5">
  <input class="form-control mb-5" type="number" value="<?php echo $denomination; ?>" name="other_value" placeholder="Enter other amount">
  <?php echo $withdraw_message; ?>
  <input class="btn btn-dark w-100" type="submit" class="submit" value="Withdraw" name="withdraw">
  </div>
</form>

<!-- JS script to prevent checking more then one boxes at the same time. -->
<?php include '../includes/checkbox_settings.js'; ?>

<div class="mt-5" style="text-align: center;">
<h3 style="color: green">Available balance is:</h3>

<?php

// If balance is less or equal to "0" then displayed it red.
if($balance <= 0) {
 echo "<h3 class='mt-5' style='color:red'>" . number_format($balance) . ' RSD' . "</h3>";
} else {
  // Otherwise display it green.
    echo "<h3 class='mt-5' style='color:green'>" . number_format($balance) . ' RSD' . "</h3>";
}

?>

</div>
<div class="mt-5 mb-5">
    <a class='btn btn-dark w-500' href="../user_page.php">Back on user page</a>
</div>

<!-- File's which are included to current file. -->
<?php include '../includes/footer.php'; ?>