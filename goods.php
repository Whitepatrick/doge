<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="utf-8">
	<link href="css/bootstrap.min.css" rel="stylesheet">
	<script src="scripts/bootstrap.min.js"></script>
	<script src="scripts/jquery-2.1.0.js"></script>
	<script src="scripts/dropdown.js"></script>
</head>


<?php

	require 'database.php';
	
		ini_set('display errors' ,1);
		error_reporting(E_ALL);

	if (!empty($_POST)) {
		
		$descriptionError = NULL;
		//$classError = NULL;
		$ledgerInError = NULL;
		$costError = NULL;
		$ledgerOutError = NULL;
		$priceError = NULL;
		//$primarySupplierError = NULL;
		//$primarySupplierPartNoError = NULL;
		//$imageNameError = NULL;
		//$qohError = NULL;

		
		$notify = "";
		
	//	$class = $_GET['Class'];
		$description = $_POST['Description'];
		$ledgerIn = (isset($_GET['LedgerIn']) ? $_GET['LedgerIn'] : NULL);
		$cost = $_POST['Cost'];
		$ledgerOut = (isset($_GET['LedgerOut']) ? $_GET['LedgerOut'] : NULL);
                $price = $_POST['Price'];
		//$primarySupplier = $_POST['PrimarySupplier'];
                //$primarySupplierPartNo = $_POST['PrimarySupplierPartNo'];
                //$imageName = $_POST['ImageName'];
                //$qoh = $_POST['QOH'];
		if(isset($_POST['notify_box'])){ $notify = $_POST['notify_box']; }

		
		$valid = true;


		if ($valid) {
			$pdo = Database::connect();
			$pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
			$sql = "INSERT INTO goods (Description,LedgerIn,Cost,LedgerOut,Price) VALUES(?,?,?,?,?)";
			$q = $pdo->prepare($sql);
			$q->execute(array($description,$ledgerIn,$cost,$ledgerOut,$price));
			Database::disconnect();
			header("Location: goods_index.php");

		}
	}
?>
	

<body>

<div class="container">
	<div class="span10 offset1">
		<div class="row">
			<h3>Create Goods & Services</h3>
		</div>

		<form class="form-horizontal" action="goods.php" method="post">

		<div class="control-group <?php echo !empty($descriptionError)?'error':'';?>">
                <label class="control-label">Description</label>
                <div class="controls">
                        <input type="text"  name="Description" value="<?php echo !empty($description)?$description:'';?>">
                            <?php if (!empty($descriptionError)): ?>
                                <span class="help-inline"><?php echo $descriptionError;?></span>
                            <?php endif; ?>

                </div>
                </div>
                
		 <div class="btn-group">
                <button type="button" class="btn btn-primary">Select Class</button>
                <button type="button" class="btn btn-primary dropdown-toggle" data-toggle="dropdown">
                        <span class="caret"></span>
			<span class="sr-only">Toggle Dropdown</span>
                </button>
		<ul class="dropdown-menu" role="menu">
			<li><a href="goods.php?LedgerIn=1000&LedgerOut=1000">Cash</a></li>
			<li><a href="goods.php?LedgerIn=1010&LedgerOut=1010">Accounts Recievable</a></li>
			<li><a href="goods.php?LedgerIn=1040&LedgerOut=1040">Tools</a></li>
			<li><a href="goods.php?LedgerIn=2000&LedgerOut=2000">Accounts Payable</a></li>
			<li><a href="goods.php?LedgerIn=3000&LedgerOut=3000">Equity</a></li>
			<li><a href="goods.php?LedgerIn=4000&LedgerOut=4000">Sales of Goods</a></li>
			<li><a href="goods.php?LedgerIn=4005&LedgerOut=4005">Shipping Customer Orders</a></li>
                        <li><a href="goods.php?LedgerIn=4010&LedgerOut=4010">Sales of Services</a></li>
                        <li><a href="goods.php?LedgerIn=5000&LedgerOut=5000">Cost of Goods</a></li>
                        <li><a href="goods.php?LedgerIn=5005&LedgerOut=5005">Shipping for goods received</a></li>
                        <li><a href="goods.php?LedgerIn=5010&LedgerOut=5010">Cost of Services sold</a></li>
                        <li><a href="goods.php?LedgerIn=5050&LedgerOut=5050">Rent</a></li>
			<li><a href="goods.php?LedgerIn=5061&LedgerOut=5061">TelePhone</a></li>
			<li><a href="goods.php?LedgerIn=5062&LedgerOut=5062">Internet Access</a></li>
		</ul>
		</div>



		 <div class="control-group <?php echo !empty($costError)?'error':'';?>">
                 <label class="control-label">Cost</label>
                 <div class="controls">
                 	<input type="number"  name="Cost" value="<?php echo !empty($cost)?$cost:'';?>">
                        	
				<?php if (!empty($costError)): ?>
                                <span class="help-inline"><?php echo $costError;?></span>
                                <?php endif; ?>
                 </div>
                 </div>

		 <div class="control-group <?php echo !empty($priceError)?'error':'';?>">
                 <label class="control-label">Price</label>
                 <div class="controls">
                 	<input type="number"  name="Price" value="<?php echo !empty($price)?$price:'';?>">
                        	
				<?php if (!empty($price)): ?>
                                <span class="help-inline"><?php echo $priceError;?></span>
                                <?php endif; ?>
                 </div>
                 </div>
			
		 <div class="form-actions">
                 <button type="submit" class="btn btn-success">Create</button>
                 <a class="btn" href="goods_index.php">Back</a>
                 </div>
                 
		</form>
                </div>

    </div> <!-- /container -->
  </body>
</html>

		










