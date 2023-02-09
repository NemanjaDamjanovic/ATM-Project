<!-- File's which are included in sign_up.php file. -->
<?php include 'includes/header.php'; ?>
<?php include 'configuration/database.php'; ?>
<?php include 'includes/sign_up_input_check.php'; ?>

<?php
// Starting session to store user information.
session_start();

// If Sign Ip is clicked redirect user to sign ip page.
if(isset($_POST['signin'])) {
  header('Location: sign_in.php');
}
?>

<img src="images/uniATM.png" width="250" height="250">
<h1>Please fill the form's below</h1>

<!-- Display error if conditions is not met -->
<?php echo $uc_error; ?>
<?php echo $length_error; ?>
<?php echo $special_char_error; ?>
<?php echo $pass_length_error; ?>
<?php echo $existing_account_error; ?>

<form action="<?php echo htmlspecialchars($_SERVER['PHP_SELF']); ?>" method="POST" class="mt-4 w-75">
      <div class="mb-3">
        <label for="fullname" class="form-label" style="color: black">Full name</label>
        <input type="text" class="form-control <?php echo $fullname_error ? 'is-invalid' : null; ?>" id="fullname" name="fullname" placeholder="Enter your full name">
        <div class="invalid-feedback">
          <?php echo $fullname_error; ?>
        </div>
      </div>
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
        <input type="submit" name="submit" value="Sign up" class="btn btn-dark w-100">
      </div>
        <p class="mb-3" style="text-align: center;"><b>or</b></p>      
    </form>
    <form action="sign_in.php" method="POST" class="w-75">
      <input type="submit" value="Sign in" class="btn btn-dark w-100" name="signin">
    </form>

<!-- File's which are included in sign_up.php file. -->
<?php include 'includes/footer.php'; ?>