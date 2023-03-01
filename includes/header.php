<!-- Activate header option below only if user_page.php is current active page. -->
<?php
  $current_page = basename($_SERVER['PHP_SELF']);
  if ($current_page == "user_page.php") {
?>

<?php session_start(); ?>

    <!DOCTYPE html>
    <html lang="en">
    <head>
      <meta charset="UTF-8">
      <meta http-equiv="X-UA-Compatible" content="IE=edge">
      <meta name="viewport" content="width=device-width, initial-scale=1.0">
      <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
      <link rel="icon" type="image/png" href="./images/uniATM.png">
      <title>Universal ATM</title>
    </head>
    <body>
      <nav class="navbar navbar-expand-sm navbar-light bg-light mb-4">
        <div class="container">
          <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
          <span class="navbar-toggler-icon"></span>
          </button>
          <div class="collapse navbar-collapse my-2" id="navbarNav">
            <ul class="navbar-nav ms-auto">
              <li class="nav-item d-inline-block px-5">
                  <?php
                    if(isset($_SESSION['id'])) {
                      echo '<p style="color: green" class="mt-2">Welcome ' . ucfirst($_SESSION['id']) . '</p>';
                    }
                  ?>
              </li>
              <li class="nav-item d-inline-block">
                <a class="nav-link" href="logout.php" style="color: red;"><p>Log out <img src='Images/logout.png' alt='Logout user' width='25' height='25'></p></a>
              </li>
            </ul>
          </div>
        </div>
      </nav>

      <!-- Activate header option below only if admin_page.php is current active page. -->
<?php
  } elseif ($current_page == "admin_page.php") {
?>

<?php session_start(); ?>


    <!DOCTYPE html>
    <html lang="en">
    <head>
      <meta charset="UTF-8">
      <meta http-equiv="X-UA-Compatible" content="IE=edge">
      <meta name="viewport" content="width=device-width, initial-scale=1.0">
      <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
      <link rel="icon" type="image/png" href="./images/uniATM.png">
      <title>Universal ATM</title>
    </head>
    <body>
      <nav class="navbar navbar-expand-sm navbar-light bg-light mb-4">
        <div class="container">
          <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
          <span class="navbar-toggler-icon"></span>
          </button>
          <div class="collapse navbar-collapse my-2" id="navbarNav">
            <ul class="navbar-nav ms-auto">
              <li class="nav-item d-inline-block px-5">
                <?php
                  if(isset($_SESSION['id'])) {
                    echo '<p style="color: green" class="mt-2">Welcome Admin ' . ucfirst($_SESSION['id']) . '</p>';
                  }
                ?>
              </li>
              <li class="nav-item d-inline-block">
                <a class="nav-link" href="logout.php" style="color: red;"><p>Log out <img src='Images/logout.png' alt='Logout user' width='25' height='25'></p></a>
              </li>
            </ul>
          </div>
        </div>
      </nav>
    

<!-- Activate header option below only if withdraw.php/history.php/change_pin.php is current active page. -->
<?php
  } elseif ($current_page == 'withdraw.php' || $current_page == 'history.php' || $current_page == 'change_pin.php'){
?>

  <!DOCTYPE html>
  <html lang="en">
  <head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <link rel="icon" type="image/png" href="../images/uniATM.png">
    <title>Universal ATM</title>
  </head>
  <body>
    <nav class="navbar navbar-expand-sm navbar-light bg-light mb-4">
      <div class="container">
        <a class="navbar-brand" href="../user_page.php" style="color: black"><img src='../Images/arrow.png' alt='previous page' width='25' height='25'></a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarNav">
          <ul class="navbar-nav ms-auto">
            <li class="nav-item">
              <a class="nav-link" href="../logout.php" style="color: black"><p style='color: red'>Log out<img src='../Images/logout.png' alt='Logout user' width='25' height='25'></p></a>
            </li>
          </ul>
        </div>
      </div>
    </nav>

<!-- Activate header option below only if new_user_form.php/update_user.php is current active page. -->
<?php
  } elseif ($current_page == 'new_user_form.php' || $current_page == 'update_user.php') {

?>

  <!DOCTYPE html>
  <html lang="en">
  <head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <link rel="icon" type="image/png" href="../images/uniATM.png">
    <title>Universal ATM</title>
  </head>
  <body>
    <nav class="navbar navbar-expand-sm navbar-light bg-light mb-4">
      <div class="container">
        <a class="navbar-brand" href="../admin_page.php" style="color: black"><img src='../Images/arrow.png' alt='previous page' width='25' height='25'></a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarNav">
          <ul class="navbar-nav ms-auto">
            <li class="nav-item">
              <a class="nav-link" href="../logout.php" style="color: black"><p style='color: red'>Log out<img src='../Images/logout.png' alt='Logout user' width='25' height='25'></p></a>
            </li>
          </ul>
        </div>
      </div>
    </nav>

<!-- For all other pages use header option below (index.php, sign_in.php and sign_up.php). -->
<?php
  } else {
?>
  <!DOCTYPE html>
    <html lang="en">
    <head>
      <meta charset="UTF-8">
      <meta http-equiv="X-UA-Compatible" content="IE=edge">
      <meta name="viewport" content="width=device-width, initial-scale=1.0">
      <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
      <link rel="icon" type="image/png" href="./images/uniATM.png">
      <title>Universal ATM</title>
    </head>
    <body>
<?php
  }
?>

<main>
  <div class="container d-flex flex-column align-items-center">
