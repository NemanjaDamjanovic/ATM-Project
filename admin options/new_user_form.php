<?php include '../includes/header.php'; ?>
<?php include '../configuration/database.php'; ?>

<?php

// Inclide error file.
include '../includes/errors.php';

// Check if confirm button is clicked.
if (isset($_POST['confirm'])) {
    
    // Put user values in variables.
    $user_id = $_POST['id'];
    $user_pass = $_POST['pass'];
    $user_fullname = $_POST['fullname'];
    $valid = true;

    // SELECT user_status from table by specific user_id.
    $query2 = "SELECT user_status FROM users WHERE user_id = '$user_id'";
    // Execute the query.
    $result2 = mysqli_query($connect, $query2);
    // Fetches a result row from a query result as an associative array.
    $row = mysqli_fetch_array($result2);

    // Check if user full name field is not empty.
    if(!empty($user_fullname)) {
        $user_fullname = filter_input(INPUT_POST, 'fullname', FILTER_SANITIZE_FULL_SPECIAL_CHARS);
      } else {
        $fullname_error = 'Name is required';
        $valid = false;
      } 

    // Include validation input file.
    include '../includes/validations.php';
    
    // Check if valid is true.
    if($valid) {

    // Select all from table by specific user_id.
    $query = "SELECT * FROM users WHERE user_id = '$user_id'";
    // Execute the
    $result = mysqli_query($connect, $query);
        
      
    // Check if in database row exist with given values.
    if (mysqli_num_rows($result) > 0) {
        $existing_account_error = "<p style='color: red'>That account already exist.</p>";
    } else {
        // If user doesnt exist insert new user into database.
        $query = "INSERT INTO users (user_id, user_pass, user_full_name) VALUES ('$user_id', '$user_pass', '$user_fullname')";
        $result = mysqli_query($connect, $query);
        
          

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
        echo '<p style="color: green">User added succsessfuly</p>';
    } 
}

}

?>

<?php echo $uc_error; ?>
<?php echo $length_error; ?>
<?php echo $special_char_error; ?>
<?php echo $pass_length_error; ?>
<?php echo $existing_account_error; ?>

<h2 class="mb-5">Add new user to database</h2>
<form class='mt-5 mb-5' action='#' method='POST'>
    <div class="d-flex mt-5 mb-5 form-label ms-auto" style="color: black; width: 100%;">
        
        <input class="form-control mx-2 <?php echo $fullname_error ? 'is-invalid' : null; ?>" type="text" name="fullname" placeholder="Enter full name">
        <input class="form-control <?php echo $id_error ? 'is-invalid' : null; ?>" type="text" name="id" placeholder="Enter ID">
        <input class="form-control mx-2 <?php echo $password_error ? 'is-invalid' : null; ?>" type="password" name="pass" placeholder="Enter password">
        <input class='btn btn-dark w-500 btn btn-primary ml-3 align-self-end' style="align-content: center;" type="submit" value="Add new user" name="confirm">
    </div>
</form>

<?php include '../includes/footer.php'; ?>
