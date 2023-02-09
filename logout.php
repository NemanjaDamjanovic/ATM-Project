<?php
// Start session.
session_start();
// Stop/Destroy active session
session_destroy();
// Redirect to index page.
header('Location: ./index.php');

?>