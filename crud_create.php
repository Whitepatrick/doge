<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <link   href="css/bootstrap.min.css" rel="stylesheet">
    <script src="scripts/bootstrap.min.js"></script>
</head>
 
<body>
    <div class="container">
     
                <div class="span10 offset1">
                    <div class="row">
                        <h3>Create a Customer</h3>
                    </div>
             
                    <form class="form-horizontal" action="crud_create.php" method="post">
                      
			<div class="control-group <?php echo !empty($firstNameError)?'error':'';?>">
                        <label class="control-label">First Name</label>
                        <div class="controls">
                            <input name="name" type="text"  placeholder="Name" value="<?php echo !empty($firstName)?$firstName:'';?>">
                            <?php if (!empty($firstNameError)): ?>
                                <span class="help-inline"><?php echo $firstNameError;?></span>
                            <?php endif; ?>
                        </div>
                      </div>


			<div class="control-group <?php echo !empty($lastNameError)?'error':'';?>">
                        <label class="control-label">Last Name</label>
                        <div class="controls">
                            <input name="name" type="text"  placeholder="Name" value="<?php echo !empty($lastName)?$lastName:'';?>">
                            <?php if (!empty($lastNameError)): ?>
                                <span class="help-inline"><?php echo $lastNameError;?></span>
                            <?php endif; ?>
                        </div>
                      </div>

			<div class="control-group <?php echo !empty($mailingAddressError)?'error':'';?>">
                        <label class="control-label">Mailing Address</label>
                        <div class="controls">
                            <input name="name" type="text"  placeholder="Name" value="<?php echo !empty($mailingAddress)?$mailingAddress:'';?>">
                            <?php if (!empty($mailingAddressError)): ?>
                                <span class="help-inline"><?php echo $mailingAddressError;?></span>
                            <?php endif; ?>
                        </div>
                      </div>

			<div class="control-group <?php echo !empty($mailingExtraLineError)?'error':'';?>">
                        <label class="control-label">Suite/Apt.</label>
                        <div class="controls">
                            <input name="name" type="text"  placeholder="Name" value="<?php echo !empty($mailingExtraLine)?$mailingExtraLine:'';?>">
                            <?php if (!empty($mailingExtraLineError)): ?>
                                <span class="help-inline"><?php echo $mailingExtraLineError;?></span>
                            <?php endif; ?>
                        </div>
                      </div>

			<div class="control-group <?php echo !empty($nameError)?'error':'';?>">
                        <label class="control-label">Name</label>
                        <div class="controls">
                            <input name="name" type="text"  placeholder="Name" value="<?php echo !empty($name)?$name:'';?>">
                            <?php if (!empty($nameError)): ?>
                                <span class="help-inline"><?php echo $nameError;?></span>
                            <?php endif; ?>
                        </div>
                      </div>



                      <div class="control-group <?php echo !empty($emailError)?'error':'';?>">
                        <label class="control-label">Email Address</label>
                        <div class="controls">
                            <input name="EmailAddress" type="text" placeholder="Email Address" value="<?php echo !empty($email)?$email:'';?>">
                            <?php if (!empty($emailError)): ?>
                                <span class="help-inline"><?php echo $emailError;?></span>
                            <?php endif;?>
                        </div>
                      </div>
                      <div class="control-group <?php echo !empty($loginIdError)?'error':'';?>">
                        <label class="control-label">Login Id</label>
                        <div class="controls">
                            <input name="LoginId" type="text"  placeholder="Login Id" value="<?php echo !empty($loginId)?$loginId:'';?>">
                            <?php if (!empty($loginIdError)): ?>
                                <span class="help-inline"><?php echo $loginIdError;?></span>
                            <?php endif;?>
		      </div>
                      </div>
                     <div class="control-group <?php echo !empty($mailingAddressError)?'error':'';?>">
                        <label class="control-label">Mailing Address</label>
                        <div class="controls">
                            <input name="MailingAddress" type="text"  placeholder="Mailing Address" value="<?php echo !empty($mailingAddress)?$mailingAddress:'';?>">
			    <span class="help-inline"><?php echo $mailingAddress;?></span>
                            <?php endif;?>
			  <div class="form-actions">
                          <button type="submit" class="btn btn-success">Create</button>
                          <a class="btn" href="crud_index.php">Back</a>
                        </div>
                    </form>
                </div>
                 
    </div> <!-- /container -->
  </body>
</html>

<?php
     
    require 'database.php';
 
    if ( !empty($_POST)) {
        // keep track validation errors
        $firstNameError = null;
	$lastNameError = null;
	$mailingAddressError = null;
	$mailingExtraLineError = null;
	$mailingCityError = null;
	$mailingStateError = null;
	$mailingZipError = null;
	$emailAddressError = null;
        $phoneNumberError = null;
	$loginIdError = null;
	$passwordError = null;
         
        // keep track post values
        $firstName = $_POST['FirstName'];
	$lastName = $_POST['LastName'];
	$mailingAddress = $_POST['MailingAddress'];
	$mailingExtraLine = $_POST['MailingExtraLine'];
	$mailingCity = $_POST['MailingCity'];
	$mailingState = $_POST['MailingState'];
	$mailingZip = $_POST['MailingZip'];
	$emailAddress = $_POST['EmailAddress'];
	$phoneNumber = $_POST['PhoneNumber'];
	$loginId = $_POST['LoginId'];
	$password = $_POST['Password'];
         
        // validate input
        $valid = true;
        if (empty($firstName)) {
            $firstNameError = 'Please enter First Name';
            $valid = false;
        }
         
        if (empty($lastName)) {
            $lastNameError = 'Please enter Last Name';
            $valid = false;
        }
                 
        if (empty($mailingAddress)) {
            $mailingAddressError = 'Please enter Street Address';
            $valid = false;
        }
        
	if (empty($mailingExtraLine)) {
            $mailingExtraLineError = 'Please enter Suite/Apt';
            $valid = false;
        }

	if (empty($mailingCity)) {
            $mailingPostOfficeError = 'Please enter City';
            $valid = false;
        }

	if (empty($mailingState)) {
            $mailingStateError = 'Please enter two letter State';
            $valid = false;
        }

        if (empty($mailingZip)) {
            $mailingZipError = 'Please enter Zip Code';
            $valid = false;
        }

	if (empty($emailAddress)) {
            $emailAddressError = 'Please enter Email Address';
            $valid = false;
        } else if ( !filter_var($emailAddress,FILTER_VALIDATE_EMAIL) ) {
            $emailAddressError = 'Please enter a valid Email Address';
            $valid = false;
        }

	if (empty($phoneNumber)) {
            $phoneNumberError = 'Please enter Phone Number';
            $valid = false;
        }

        if (empty($loginId)) {
            $loginIdError = 'Please enter Login ID';
            $valid = false;
        }

	if (empty($password)) {
            $passwordError = 'Please enter Password';
            $valid = false;
        }
	 
        // insert data
        if ($valid) {
            $pdo = Database::connect();
            $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
            $sql = "INSERT INTO users (FirstName,EmailAddress,LoginId) values(?, ?, ?)";
            $q = $pdo->prepare($sql);
            $q->execute(array($name,$email,$loginId));
            Database::disconnect();
            header("Location: crud_index.php");
        }
    }
?>
