<!-- File's which are included to current file. -->
<?php include '../includes/header.php'; ?>
<?php include '../configuration/database.php'; ?>
<?php ?>

<h4 class="mb-5">If you want to see your history of transaction download PDF below</h4>

<?php
// Start a session.
session_start();

// Wrat $_SESSION['id'] into variable.
$user_id = $_SESSION['id'];

// Check if form 'pdf' is clicked and download it.
if(isset($_POST['pdf'])) {
    include '../tcpdf/report.php';
}
?>

<form action="../tcpdf/report.php" method="POST">
<div class="mt-5 mb-5">
    <input class="btn btn-dark w-500" type="submit" value="Download PDF" name="pdf">
</div>
</form>

<!-- File's which are included to current file. -->
<?php include '../includes/footer.php'; ?>