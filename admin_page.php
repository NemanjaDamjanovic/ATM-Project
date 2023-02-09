<!-- File's which are included in sign_up.php file. -->
<?php include 'includes/header.php'; ?>
<?php include 'configuration/database.php'; ?>

<?php
  // Start a session.
  session_start();
  // Welcome user by his session.
  if(isset($_SESSION['id'])) {
    echo '<h1 style="color: green">Welcome Admin ' . ucfirst($_SESSION['id']) . '</h1>';
  }
?>

<h3 class="mt-5 mb-5" style="color: back">Admin Dashboard</h3>
<!-- Style table, th and td. -->
<style>
  table, th, td {
    border: 1px solid black;
    text-align: center;
  }
</style>
<h5 style="color: black">Information about users</h5>
<div class="mb-5 mt-5">
  <table class="table" style="width: 1000px; height: 150px;">
  <!-- HTML for table header -->
    <thead>
      <tr>
        <th>Full Name</th>
        <th>Username</th>
        <th>User PIN</th>
        <th>Balance</th>
        <th>Last Transaction</th>
        <th>Date of last Transaction</th>
        <th colspan="3">Action</th>
      </tr>
    </thead>
    <tbody>
<!-- PHP code to fetch and display data -->
<?php
  // Accsess to user table.
  $query1 = "SELECT * FROM users";

  // Execute the query.
  $result1 = mysqli_query($connect, $query1);
  // Check if query failed.
  if ($result1 === false) {
    echo "Query failed: " . mysqli_error($connect);
  } else {
    // Loop trought all user rows.
    while ($row1 = mysqli_fetch_array($result1)) {
      echo "<tr>";
      echo "<td>" . $row1['user_full_name'] . "</td>";
      echo "<td>" . $row1['user_id'] . "</td>";
      echo "<td>" . $row1['user_pass'] . "</td>";
      echo "<td>" . number_format($row1['user_balance']) . " RSD" .  "</td>";

      // Query to retrieve the last transaction for each user
      $query2 = "SELECT * FROM withdraw_history WHERE user_id = '" . $row1['user_id'] . "' ORDER BY transaction_date DESC LIMIT 1";
      // Execute the query.
      $result2 = mysqli_query($connect, $query2);
      // Fetches a result row from a query result as an associative array.
      $row2 = mysqli_fetch_array($result2);

      // Check if row exist and if does fill table with data from database.
      if ($row2) {
        echo "<td>" . number_format($row2['user_last_transaction']) . " RSD" . "</td>";
        echo "<td>" . $row2['transaction_date'] . "</td>";
      } else {
        // Otherwise leave "-" in table field.
        echo "<td>-</td>";
        echo "<td>-</td>";
      }
      echo "<td>";
      // Check user status if its blocked and display it in table.
      if ($row1['user_status'] == 'Blocked') {
        echo "<p style='color: red'>Blocked</p>";
      } else {
        
        // Block user.
        echo "<a href='admin options/block_user.php?id=" . $row1['id'] . "'><img src='images/block.png' alt='Block user' width='25' height='25'></a>";
        }
        echo "</td>";
        echo "<td>";
        // OCheck user status if its active and display it in table.
        if ($row1['user_status'] == 'Active') {
          echo "<p style='color: green'>Active</p>";
        } else {
          // Unblock user.
          echo "<a href='admin options/unblock_user.php?id=" . $row1['id'] . "'><img src='images/unblock.png' alt='Block user' width='25' height='25'></a>";
        }
        // Update user.
        echo "</td>";
        echo "<td><a href='admin options/update_user.php?id=" . $row1['id'] . "'><img src='images/edit.png' alt='Block user' width='25' height='25'></a></td>";
        echo "</tr>";
      }
    }
    // Add new user.
    echo "<tr>";
    echo "<td style='border: none;' colspan='8'><form action='admin options/new_user_form.php' method='POST'><button class='btn btn-dark w-1000' style='width: 104%;' name='add_user'><img src='images/add_user.png' alt='Block user' width='45' height='45'></button></form></td>";
    echo "</tr>";
?>
    </tbody>
  </table>
</div>

<!-- File's which are included in sign_up.php file. -->
<?php include 'includes/footer.php'; ?>