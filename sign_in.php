<!-- File's which are included to current file. -->
<?php include 'includes/header.php'; ?>
<?php include 'configuration/database.php'; ?>
<?php include 'includes/sign_in_input_check.php'; ?>

<?php
// Starting session to store user information.
session_start();
// Check if ID is submited and give value of ID to $_SESSION.
if(isset($_POST['id'])) {
  $_SESSION['id'] = $_POST['id'];
  
}
// If Sign Up is clicked redirect user to sign up page.
if(isset($_POST['signup'])) {
  header('Location: sign_up.php');
}
?>

<img src="images/uniATM.png" width="250" height="250">
<h2 style="color: black">Welcome to Universal ATM</h2>
<p class="lead text-center" style="color: black">Please enter your informations</p>

<!-- Error's -->
<?php echo $uc_error; ?>
<?php echo $length_error; ?>
<?php echo $special_char_error; ?>
<?php echo $pass_length_error; ?>
<?php echo $existing_account_error; ?>

<form action="<?php echo htmlspecialchars($_SERVER['PHP_SELF']); ?>" method="POST" class="mt-4 w-75">
      <div class="mb-3">
        <label for="id" class="form-label" style="color: black">Id</label>
        <input type="text" class="form-control <?php echo $id_error ? 'is-invalid' : null; ?>" id="id" name="id" placeholder="Enter your ID">
        <div class="invalid-feedback">
          <?php echo $id_error; ?>
        </div>
      </div>
      <div class="mb-3">
        <label for="password" class="form-label" style="color: black">Password</label>
        <input type="password" class="form-control <?php echo $password_error ? 'is-invalid' : null; ?>" id="password" name="pass" placeholder="Enter your password">
        <div class="invalid-feedback">
          <?php echo $password_error; ?>
        </div>
      </div>
      <div class="mb-3">
        <input type="submit" name="submit" value="Sign in" class="btn btn-dark w-100">
      </div>
    </form>
    <p class="mb-3" style="text-align: center;"><b>or</b></p>  
    <form action="sign_up.php" method="POST" class="w-75">
      <input type="submit" value="Sign up" class="btn btn-dark w-100" name="signup">
    </form>

<!-- File's which are included to current file. -->
<?php include 'includes/footer.php'; ?>