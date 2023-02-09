<?php 

// Error variables.
$id_error = $password_error = $length_error = $uc_error = $special_char_error =  $pass_length_error = $existing_account_error = '';

// Check if form is submited.
if(isset($_POST['submit'])) {

    // Put user values in variables.
    $user_id = $_POST['id'];
    $user_pass = $_POST['pass'];
    $valid = true;

    // Access user_status from databse by specific user_id.
    $query2 = "SELECT user_status FROM users WHERE user_id = '$user_id'";
    // Execute the query.
    $result2 = mysqli_query($connect, $query2);
    // Fetches a result row from a query result as an associative array.
    $row = mysqli_fetch_array($result2);

    // Include validation input file.
    include 'validations.php';
    
    // Check if inputs pass all conditions and head it to user page and insert user into database.
    if($valid) {
        
        // Select from database table.
        $query1 = "SELECT * FROM users WHERE user_id = '$user_id' AND user_pass = $user_pass";
        // Execute the query.
        $result1 = mysqli_query($connect, $query1);

        // If user exist dont insert it into database again.
        if (mysqli_num_rows($result1) > 0) {

            // Id user and pass input match admin credentials then head it to admin page otherwise if existing user make input head it to user page.
            if($user_id == 'Nemanja94#' && $user_pass == 5712){
                $_SESSION['id'] = $user_id;
                // Redirect to admin page.
                header('Location: admin_page.php');
            } else {
                // Redirect to user page.
                header('Location: user_page.php');
            }
        } else {
            $existing_account_error = "<p style='color: red'>Username or password is incorect.</p>";
        } 
    }
}


?>





