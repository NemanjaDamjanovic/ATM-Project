<!-- File's which are included in sign_up.php file. -->
<?php include 'includes/header.php'; ?>
<?php include 'configuration/database.php'; ?>

<div class="mt-5 mt-5" style="text-align: center;">

<?php
// Start session.
session_start();
// Check if session there is an ID in active session.
if(isset($_SESSION['id'])) {
    echo '<h1 style="color: green">Welcome ' . ucfirst($_SESSION['id']) . '</h1>';
    
    // Wrap $_SESSION['id'] into variable.
    $user_id = $_SESSION['id'];
    // Accsess to user balance in database.
    $query = "SELECT user_balance FROM users WHERE user_id = '$user_id'";
    // Execute the query.
    $result = mysqli_query($connect, $query);
    // Fetches a result row from a query result as an associative array.
    $row = mysqli_fetch_assoc($result);
    // Retrieve exact value from query, stored in variable.
    $balance = $row['user_balance'];
}
?>

</div>
<div class="mb-5 mt-5 ">
<nav class="navbar navbar-expand-lg navbar-light bg-light">
  <a class="navbar-brand" href="#">UniATM</a>
  <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
    <span class="navbar-toggler-icon"></span>
  </button>
  <div class="collapse navbar-collapse" id="navbarNav">
    <ul class="navbar-nav">
      <li class="nav-item active">
        <a class="nav-link" href="user options/withdraw.php">Withdraw</a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="user options/history.php">History of transactions</a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="user options/change_pin.php">Change your PIN</a>
      </li>
    </ul>
  </div>
</nav>
</div>
<div class="mb-5">
  <h1>Your Current balance is: </h1>
  <div class="mt-5 mb-5" style="text-align: center;">
    <?php
    if($balance <= 0) {
      echo "<h3 class='mt-5' style='color:red'>" . number_format($balance) . ' RSD' . "</h3>";
     } else {
         echo "<h3 class='mt-5' style='color:green'>" . number_format($balance) . ' RSD' . "</h3>";
     }
    ?>
  </div>
</div>

<?php include 'includes/footer.php'; ?>