<?php
    require 'database.php';
    $id = null;
    if ( !empty($_GET['id'])) {
        $id = $_REQUEST['id'];
    }
     
    if ( null==$id ) {
        header("Location: crud_index.php");
    } else {
        $pdo = Database::connect();
        $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        $sql = "SELECT * FROM users where Id = ?";
        $q = $pdo->prepare($sql);
        $q->execute(array($id));
        $data = $q->fetch(PDO::FETCH_ASSOC);
        Database::disconnect();
    }
?>
 
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <link   href="css/bootstrap.min.css" rel="stylesheet">
    <script src="scripts/bootstrap.min.js"></script>
    <script src="scripts/jquery-2.1.0.js"></script>
</head>
 
<body>
    <div class="container">
     
                <div class="span10 offset1">
                    <div class="row">
                        <h3>Read a User</h3>
                    </div>
                     
                    <div class="form-horizontal" >
                      

			<div class="control-group">
                        <label class="control-label">First Name</label>
                        <div class="controls">
                            <label class="checkbox">
                                <?php echo $data['FirstName'];?>
                            </label>
                        </div>
                      </div>
                      
			<div class="control-group">
                        <label class="control-label">Last Name</label>
                        <div class="controls">
                            <label class="checkbox">
                                <?php echo $data['LastName'];?>
                            </label>
                        </div>
                      </div>


			<div class="control-group">
                        <label class="control-label">Mailing Address</label>
                        <div class="controls">
                            <label class="checkbox">
                                <?php echo $data['MailingAddress'];?>
                            </label>
                        </div>
                      </div>


			<div class="control-group">
                        <label class="control-label">Apt/Suite</label>
                        <div class="controls">
                            <label class="checkbox">
                                <?php echo $data['MailingExtraLine'];?>
                            </label>
                        </div>
                      </div>
                      <div class="control-group">
                        <label class="control-label">City</label>
                        <div class="controls">
                            <label class="checkbox">
                                <?php echo $data['MailingCity'];?>
                            </label>
                        </div>
                      </div>
                        
			<div class="control-group">
                        <label class="control-label">State</label>
                        <div class="controls">
                            <label class="checkbox">
                                <?php echo $data['MailingState'];?>
                            </label>
                        </div>
                      </div>
		
			<div class="control-group">
                        <label class="control-label">Zip Code</label>
                        <div class="controls">
                            <label class="checkbox">
                                <?php echo $data['MailingZip'];?>
                            </label>
                        </div>
                      </div>

			<div class="control-group">
                        <label class="control-label">Email Address</label>
                        <div class="controls">
                            <label class="checkbox">
                                <?php echo $data['EmailAddress'];?>
                            </label>
                        </div>
                      </div>

			<div class="control-group">
                        <label class="control-label">Phone Number</label>
                        <div class="controls">
                            <label class="checkbox">
                                <?php echo $data['PhoneNumber'];?>
                            </label>
                        </div>
                      </div>
			
			<div class="control-group">
                        <label class="control-label">Login ID</label>
                        <div class="controls">
                            <label class="checkbox">
                                <?php echo $data['LoginId'];?>
                            </label>
                        </div>
                      </div>

			<div class="form-actions">
                          <a class="btn" href="index.php">Back</a>
                       </div>
                     
                      
                    </div>
                </div>
                 
    </div> <!-- /container -->
  </body>
</html>
