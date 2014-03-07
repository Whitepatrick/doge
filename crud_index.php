<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <link   href="css/bootstrap.min.css" rel="stylesheet">
    <script src="scripts/bootstrap.min.js"></script>
</head>
 
<body>

<?php include('includes/search_bar.php') ?>

    <div class="container">
            <div class="row">
                <h3>Doge Database UI</h3>
            </div>
            <div class="row">
                <p>
                    <a href="crud_create.php" class="btn btn-success">Create</a>
                </p>
                <table class="table table-striped table-bordered">
                  <thead>
                    <tr>
                      <th>Name</th>
                      <th>Email Address</th>
                      <th>Login ID</th>
                      <th>Action</th>
		     </tr>
                  </thead>
                  <tbody>
                  <?php
                   include 'database.php';
                   $pdo = Database::connect();
                   $sql = 'SELECT * FROM users ORDER BY Id DESC';
                   foreach ($pdo->query($sql) as $row) {
                            echo '<tr>';
                            echo '<td>'. $row['FirstName'] . '</td>';
                            echo '<td>'. $row['EmailAddress'] . '</td>';
                            echo '<td>'. $row['LoginId'] . '</td>';
                            echo '<td width=250>';
			    echo '<a class="btn" href="read.php?id='.$row['id'].'">Read</a>';
                            echo '';
                            echo '<a class="btn btn-success" href="update.php?id='.$row['id'].'">Update</a>';
                            echo '';
                            echo '<a class="btn btn-danger" href="delete.php?id='.$row['id'].'">Delete</a>';
                            echo '</td>';

                   }
                   Database::disconnect();
                  ?>
                  </tbody>
            </table>
        </div>
    </div> <!-- /container -->
  </body>
</html>
