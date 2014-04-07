<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <link   href="css/bootstrap.min.css" rel="stylesheet">
    <script src="scripts/bootstrap.min.js"></script>
    <script src="scripts/jquery-2.1.0.js"></script>
    <script src="scripts/jquery.ui.widget.js"></script>
    <script src="scripts/jquery.iframe-transport.js"></script>
    <script src="scripts/jquery.fileupload.js"></script>
	
</head>
 
<body>

<?php include('includes/search_bar.php') ?>

    <div class="container">
            <div class="row">
                <h3>Doge Users</h3>
            </div>
            <div class="row">
                
		<p><a href="create.php" class="btn btn-success">Create User</a></p>
		<p><a href="goods_create.php" class="btn btn-success">Create Goods</a></p>
               
		<table class="table table-striped table-bordered">
                  <thead>
                    <tr>
                      <th>ID</th>
		      <th>First Name</th>
                      <th>Last Name</th>
		      <th>Extra Line</th>
		      <th>Mailing Address</th>
		      <th>City and State</th>
		      <th>Zip Code</th>	
		      <th>Email Address</th>
		     </tr>
                  </thead>
                  <tbody>
                  <?php
                   include 'database.php';
                   $pdo = Database::connect();
                   $sql = 'SELECT * FROM users ORDER BY Id DESC';
                   foreach ($pdo->query($sql) as $row) {
                            echo '<tr>';
                            echo '<td>'. $row['Id'] . '</td>';
                            echo '<td>'. $row['FirstName'] . '</td>';
                            echo '<td>'. $row['LastName'] . '</td>';
                            echo '<td>'. $row['MailingAddress'] . '</td>';
                            echo '<td>'. $row['MailingExtraLine'] . '</td>';
                            echo '<td>'. $row['MailingPostOffice'] . '</td>';
			    echo '<td>'. $row['MailingZip'] . '</td>';
                            echo '<td>'. $row['EmailAddress'] . '</td>';
			    echo '<td width=250>';
			    echo '<a class="btn" href="read.php?id='.$row['Id'].'">Read</a>';
                            echo '';
                            echo '<a class="btn btn-success" href="update.php?id='.$row['Id'].'">Update</a>';
                            echo '';
                            echo '<a class="btn btn-danger" href="delete.php?id='.$row['Id'].'">Delete</a>';
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
