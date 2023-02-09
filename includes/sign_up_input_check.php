<?php include 'errors.php'; ?>

<?php

// Check if form is submited.
if(isset($_POST['submit'])) {

  // Put user values in variables.
  $user_id = $_POST['id'];
  $user_pass = $_POST['pass'];
  $user_fullname = $_POST['fullname'];
  $valid = true;

  // Check full name field if its not empty.
if(!empty($user_fullname)) {
  $user_fullname = filter_input(INPUT_POST, 'fullname', FILTER_SANITIZE_FULL_SPECIAL_CHARS);
} else {
  $fullname_error = 'Name is required';
  $valid = false;
} 

  include 'validations.php';

  // Check if inputs pass all conditions and head it to user page and insert user into database.
if($valid) {

  // If user exist select it from database by his specific user_id.
  $query = "SELECT * FROM users WHERE user_id = '$user_id'";
  // Execute the query.
  $result = mysqli_query($connect, $query);
  

  // Check if in database row exist with given values.
  if (mysqli_num_rows($result) > 0) {
      $existing_account_error = "<p style='color: red'>Your account already exist.</p>";
  } else {
    
    // If row in database doesnt exist insert new user into database.
    $query = "INSERT INTO users (user_id, user_pass, user_full_name) VALUES ('$user_id', '$user_pass', '$user_fullname')";
    // Execute the query.
    $result = mysqli_query($connect, $query);
    // Redirect new created user to sign in page.
    header('Location: sign_in.php');
    
    // Start session and give user a welcome balance.
    session_start();
    
    if(isset($_POST['id'])) {
      $_SESSION['id'] = $_POST['id'];

      // Wrap $_SESSION['id'] into variable.
      $user_id = $_SESSION['id'];
      // Set welcome balance in variable and give it value of "10.000".
      $welcome_balance = 10000;
      // Update database, set every new user welcome balance "10.000".
      $query = "UPDATE users SET user_balance='$welcome_balance' WHERE user_id='$user_id'";
      // Execute the query.
      $result= mysqli_query($connect, $query);
      // Set every new user Active status.
      $user_status = 'Active';
      // Update user_status in table.
      $query2 = "UPDATE users SET user_status = '$user_status' WHERE user_id = '$user_id'";
      // Execute the query.
      $result2 = mysqli_query($connect, $query2);
    }
  } 
  }
}
?>