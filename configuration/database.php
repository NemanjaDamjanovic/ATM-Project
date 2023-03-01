<?php

// Define database parameters.
define('DB_HOST', 'localhost');
define('DB_USER', 'Nemanja');
define('DB_PASS', '12345');
define('DB_NAME', 'atm');

// Connection with database.
$connect = new mysqli(DB_HOST, DB_USER, DB_PASS, DB_NAME);

// Checking if connection is established. 
if(!$connect) {
    die('FAILED TO CONNECT') . mysqli_error($connect);
} 
