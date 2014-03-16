
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <link   href="css/bootstrap.min.css" rel="stylesheet">
    <script src="scripts/bootstrap.min.js"></script>
    <script src="scripts/jquery-2.1.0.js"></script>
    <script src="scripts/dropdown.js"></script>	
</head>

<?php

    require 'database.php';

    if (!empty($_POST)) {
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
	
        // if ($firstName isset($_POST['FirstName']));
        // if (isset(

	// $_POST['FirstName'], $_POST['LastName'], $_POST['MailingAddress'], $_POST['MailingExtraLine'], 
	// $_POST['MailingCity'], $_POST['MailingState'], $_POST['MailingZip'], $_POST['EmailAddress'], 
	// $_POST['PhoneNumber'], $_POST['LoginId'], $_POST['Password']

	// ));
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
        if(isset($_POST['notify_box'])){ $notify = $_POST['notify_box']; }


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
            $sql = "INSERT INTO users (FirstName,LastName,MailingAddress,MailingExtraLine,MailingCity,MailingState,MailingZip,EmailAddress,PhoneNumber,LoginId,Password) values(?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?)";
            $q = $pdo->prepare($sql);
            $q->execute(array($firstName,$lastName,$mailingAddress,$mailingExtraLine,$mailingCity,$mailingState,$mailingZip,$emailAddress,$phoneNumber,$loginId,$password));
            Database::disconnect();
            header("Location: crud_index.php");
        }
    }
?> 

<body>
    <div class="container">
     
                <div class="span10 offset1">
                    <div class="row">
                        <h3>Create Goods and Services</h3>
                    </div>
             
                    <form class="form-horizontal" action="crud_create.php" method="post">
                      
			<!-- Split button -->
	<div class="btn-group">
	  <button type="button" class="btn btn-primary">Select Class</button>
	  <button type="button" class="btn btn-primary dropdown-toggle" data-toggle="dropdown">
	    <span class="caret"></span>
	    <span class="sr-only">Toggle Dropdown</span>
	  </button>
	  <ul class="dropdown-menu" role="menu">
	    <li><a href="#">Goods</a></li>
	    <li><a href="#">Services</a></li>
	    <li><a href="#">Tender</a></li>
	    <li><a href="#">Asset</a></li>
	    <li><a href="#">Equity</a></li>
	    <li><a href="#">Expense</a></li>
	    <li><a href="#">Rental</a></li>
	    <li class="divider"></li>
	    <li><a href="#">Other</a></li>
	  </ul>
	</div>

			<!-- end button -->

			<div class="control-group <?php echo !empty($lastNameError)?'error':'';?>">
                        <label class="control-label">Last Name</label>
                        <div class="controls">
                            <input type="text"  name="LastName" value="<?php echo !empty($lastName)?$lastName:'';?>">
                            <?php if (!empty($lastNameError)): ?>
                                <span class="help-inline"><?php echo $lastNameError;?></span>
                            <?php endif; ?>
                        </div>
                      </div>

			<div class="control-group <?php echo !empty($mailingAddressError)?'error':'';?>">
                        <label class="control-label">Mailing Address</label>
                        <div class="controls">
                            <input type="text"  name="MailingAddress" value="<?php echo !empty($mailingAddress)?$mailingAddress:'';?>">
                            <?php if (!empty($mailingAddressError)): ?>
                                <span class="help-inline"><?php echo $mailingAddressError;?></span>
                            <?php endif; ?>
                        </div>
                      </div>

			<div class="control-group <?php echo !empty($mailingExtraLineError)?'error':'';?>">
                        <label class="control-label">Suite/Apt.</label>
                        <div class="controls">
                            <input type="text"  name="MailingExtraLine" value="<?php echo !empty($mailingExtraLine)?$mailingExtraLine:'';?>">
                            <?php if (!empty($mailingExtraLineError)): ?>
                                <span class="help-inline"><?php echo $mailingExtraLineError;?></span>
                            <?php endif; ?>
                        </div>
                      </div>

			<div class="control-group <?php echo !empty($mailingCityError)?'error':'';?>">
                        <label class="control-label">Mailing City</label>
                        <div class="controls">
                            <input type="text"  name="MailingCity" value="<?php echo !empty($mailingCity)?$mailingCity:'';?>">
                            <?php if (!empty($mailingCity)): ?>
                                <span class="help-inline"><?php echo $mailingCityError;?></span>
                            <?php endif; ?>
                        </div>
                      </div>
			
			<div class="control-group <?php echo !empty($mailingStateError)?'error':'';?>">
                        <label class="control-label">Mailing State (enter 2 letter abbreviation)</label>
                        <div class="controls">
                            <input type="text"  name="MailingState" value="<?php echo !empty($mailingState)?$mailingState:'';?>">
                            <?php if (!empty($mailingState)): ?>
                                <span class="help-inline"><?php echo $mailingCityError;?></span>
                            <?php endif; ?>
                        </div>
                      </div>

					
			<div class="control-group <?php echo !empty($mailingZipError)?'error':'';?>">
                        <label class="control-label">Zip Code</label>
                        <div class="controls">
                            <input type="text"  name="MailingZip" value="<?php echo !empty($mailingZip)?$mailingZip:'';?>">
                            <?php if (!empty($mailingZip)): ?>
                                <span class="help-inline"><?php echo $mailingZipError;?></span>
                            <?php endif; ?>
                        </div>
                      </div>


                      <div class="control-group <?php echo !empty($emailAddressError)?'error':'';?>">
                        <label class="control-label">Email Address</label>
                        <div class="controls">
                            <input name="EmailAddress" type="text" name="EmailAddress" value="<?php echo !empty($emailAddress)?$emailAddress:'';?>">
                            <?php if (!empty($emailAddressError)): ?>
                                <span class="help-inline"><?php echo $emailAddressError;?></span>
                            <?php endif;?>
                        </div>
                      </div>


			<div class="control-group <?php echo !empty($phoneNumberError)?'error':'';?>">
                        <label class="control-label">Phone Number</label>
                        <div class="controls">
                            <input type="text"  name="PhoneNumber" value="<?php echo !empty($phoneNumber)?$phoneNumber:'';?>">
                            <?php if (!empty($phoneNumber)): ?>
                                <span class="help-inline"><?php echo $phoneNumberError;?></span>
                            <?php endif; ?>
                        </div>
                      </div>


                      <div class="control-group <?php echo !empty($loginIdError)?'error':'';?>">
                        <label class="control-label">Login Id</label>
                        <div class="controls">
                            <input name="LoginId" type="text"  name="LoginId" value="<?php echo !empty($loginId)?$loginId:'';?>">
                            <?php if (!empty($loginIdError)): ?>
                                <span class="help-inline"><?php echo $loginIdError;?></span>
                            <?php endif;?>
		      </div>
                      </div>
                     <div class="control-group <?php echo !empty($passwordError)?'error':'';?>">
                        <label class="control-label">Password</label>
                        <div class="controls">
                            <input name="Password" type="password"  name="Password" value="<?php echo !empty($password)?$password:'';?>">
			    <span class="help-inline"><?php echo $passwordError;?></span>
                           
				</div>
				</div>
			  <div class="form-actions">
                          <button type="submit" class="btn btn-success">Create</button>
                          <a class="btn" href="index.php">Back</a>
                        </div>
                    </form>
                </div>
                 
    </div> <!-- /container -->
  </body>
</html>

