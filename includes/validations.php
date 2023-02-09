<?php


// Check user ID field if its not empty.
if(!empty($user_id)) {
    
    // Sanitize inputs for additional security (SQL injection etc).
    $user_id = filter_input(INPUT_POST, 'id', FILTER_SANITIZE_FULL_SPECIAL_CHARS);
    
    // Give condition that ID must have more then 6 characters.
    if(strlen($user_id) < 6) {
      $length_error = '<p style="color: red">ID must have at least 6 characters.</p><br>';
      $valid = false;
    }

    // Give condition that ID first letter need to be uppercase.
    if (!preg_match("/^[A-Z]/", $user_id)) {
    $uc_error = '<p style="color: red">First letter must be uppercase.</p><br>';
    $valid = false;
    }

   // Give condition that ID must contain one number and one special character.
    if (!preg_match("/^(?=.*[a-zA-Z])(?=.*[0-9])(?=.*[!@#\$%\^&\*])/", $user_id)) {
    $special_char_error = '<p style="color: red">ID must contain one number and one special character.</p><br>';
    $valid = false;
    }
    // Check if key exist in array (database)
    if(!is_null($row) && array_key_exists('user_status', $row)) {
        // Check if user have status 'Blocked'
        if($row['user_status'] === 'Blocked') {
            echo '<h4 style="color: red">Your accound is blocked</h4>';
            $valid = false;
        }
    }
} else{
    $id_error = 'ID is required';
    $valid = false;
  }

// Check user Pass field if its empty.
if(!empty($user_pass)) {

// Set that lenght of password must be four digits.
    if(!preg_match('/^[0-9]{4}$/', $user_pass)) {
        $pass_length_error = '<p style="color: red">Password must be four numbers.</p><br>';
        $valid = false;
    }
} else{
$password_error = 'Password is required';
$valid = false;
  }



?>