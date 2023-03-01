<!-- File's which are included to current file. -->
<?php include '../includes/header.php'; ?>
<?php include '../configuration/database.php'; ?>

<?php
// Start a session.
session_start();

// Wrap session ID into variable.
if(isset($_SESSION['id'])) {
$user_id = $_SESSION['id'];

// Select user password by his own user_id from database table.
$query = "SELECT user_pass FROM users WHERE user_id = '$user_id'";
// Execute the query.
$result = mysqli_query($connect, $query);
// Fetches a result row from a query result as an associative array.
$row = mysqli_fetch_assoc($result);
// Retrieve exact value from query, stored in variable.
$pin = $row['user_pass'];

    // Check if confirm is clicked.
    if(isset($_POST['confirm'])){
        
        // Create variables for old and new pin.
        $old_pin = $_POST['old_pin'];
        $new_pin = $_POST['new_pin_1'];
        $new_pin_check = $_POST['new_pin_2'];

        // Check if old PIN match current pin from database.
        if($old_pin !== $pin) {
            $old_pin_error = 'Your PIN is incorect';
        }
        // Set condition that PIN need to be four digits.
        if($new_pin && $new_pin_check) {
            if(!preg_match('/^[0-9]{4}$/', $new_pin)) {
                echo '<p style="color: red">Password must be four numbers.</p><br>';
                }
                // If new pin doesnt match show error.
                if($new_pin !== $new_pin_check){
                    $unmatched_pin_error = 'Your new PIN doesnt match';
                }else {
                    // Otherwise update user password in table.
                    $query = "UPDATE users SET user_pass = '$new_pin_check' WHERE user_id = '$user_id'";
                    $result = mysqli_query($connect, $query);
                    echo $message = '<h3 style="color: green">Your pin is succsessfuly changed</h3>';
                    header("refresh:2;url=change_pin.php");
                    unset($message);
                    
            } 
        }

    }
}

?>

<form action="#" method="POST">
    <div class="mt-5 mb-3">
        <div>
            <label class="form-label" style="color: black" for="pin">Your old pin</label>
            <input class="form-control <?php echo $old_pin_error ? 'is-invalid' : null; ?>" type="password" name="old_pin" placeholder="Old PIN">
            <div class="invalid-feedback mb-3">
                <?php echo $old_pin_error; ?>
            </div>
        </div>
        <div>
            <label class="form-label" style="color: black" for="pin">Enter your new PIN</label>
            <input class="form-control" type="password" name="new_pin_1" placeholder="New PIN">
        </div>
        <div>
            <label class="form-label" style="color: black" for="pin">Confirm your new PIN</label>
            <input class="form-control <?php echo $unmatched_pin_error ? 'is-invalid' : null; ?>" type="password" name="new_pin_2" placeholder="New PIN">
            <div class="invalid-feedback">
                <?php echo $unmatched_pin_error; ?>
            </div>
        </div>
        <input class="btn btn-dark w-100 mt-5 mb-5" type="submit" class="submit" value="Confirm" name="confirm">
    </div>
</form>

<!-- File's which are included to current file. -->
<?php include '../includes/footer.php'; ?>
