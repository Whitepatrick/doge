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

	ini_set('display_errors',1); 
 	error_reporting(E_ALL);

    if (!empty($_POST)) {
        // keep track validation errors
        $descriptionError = null;
        $classError = null;
	$ledgerInError = null;
        $costError = null;
        $ledgerOutError = null;
        $priceError = null;
        $primarySupplierError = null;
        $primarySupplierPartNoError = null;
        $imageNameError = null;
        $qohError = null;
        $safetyLevelError = null;
        $eoqError = null;
	

	$notify = "";
//	$class = $_GET['Class'];
	$description = $_POST['Description'];
        $ledgerIn = $_POST['LedgerIn'];
        $cost = $_POST['Cost'];
        $ledgerOut = $_POST['LedgerOut'];
        $price = $_POST['Price'];
        $primarySupplier = $_POST['PrimarySupplier'];
        $primarySupplierPartNo = $_POST['PrimarySupplierPartNo'];
        $imageName = $_POST['ImageName'];
        $qoh = $_POST['QOH'];
        $safetyLevel = $_POST['SafetyLevel'];
	$eoq = $_POST['EOQ'];
        if(isset($_POST['notify_box'])){ $notify = $_POST['notify_box']; }

        // validate input
        $valid = true;
        if (empty($description)) {
            $descriptionError = 'Describe activity';
            $valid = false;
        }

        if (empty($class)) {
            $classError = 'Please enter activity class';
            $valid = false;
	}            
	
	if ( !filter_var($ledgerIn,FILTER_VALIDATE_INT) ) {
	    $ledgerInError = 'Please enter a dollar amount';
	    $valid = false;
	}

	if ( !is_float($cost) ) {
            $ledgerInError = 'Please enter a dollar amount';
            $valid = false;
        }

	if ( !filter_var($ledgerOut,FILTER_VALIDATE_INT) ) {
            $ledgerOutError = 'Please enter a dollar amount';
            $valid = false;
        }

	if ( !is_float($price) ) {
            $priceError = 'Please enter a dollar amount';
            $valid = false;
        }

	if ( !filter_var($primarySupplier,FILTER_VALIDATE_INT) ) {
            $primarySupplierError = 'Please enter an integer';
            $valid = false;
        }

	if ( !is_float($qoh) ) {
            $qohError = 'Please enter an amount';
            $valid = false;
        }

	if ( !is_float($safetyLevel) ) {
            $safetyLevelError = 'Please enter an amount';
            $valid = false;
        }

	if ( !is_float($eoq) ) {
            $eoqError = 'Please enter an amount';
            $valid = false;
        }

        // insert data
        if ($valid) {
            $pdo = Database::connect();
            $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
            $sql = "INSERT INTO goods (Class,Description,LedgerIn,Cost,LedgerOut,Price,PrimarySupplier,PrimarySupplierPartNo,ImageName,QOH,SafetyLevel,EOQ) values(?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?)";
            $q = $pdo->prepare($sql);
            $q->execute(array($class,$description,$ledgerIn,$cost,$ledgerOut,$price,$primarySupplier,$primarySupplierPartNo,$imageName,$qoh,$safetyLevel,$eoq));
            Database::disconnect();
            header("Location: goods_index.php");
        }
    }
?>

<body>
    <div class="container">
     
                <div class="span10 offset1">
                    <div class="row">
                        <h3>Create Goods and Services</h3>
                    </div>
             
                    <form class="form-horizontal" action="goods_create.php" method="post">
                      
			<!-- Split button -->
	<div class="btn-group">
	  <button type="button" class="btn btn-primary">Select Class</button>
	  <button type="button" class="btn btn-primary dropdown-toggle" data-toggle="dropdown">
	    <span class="caret"></span>
	    <span class="sr-only">Toggle Dropdown</span>
	  </button>
	  <ul class="dropdown-menu" role="menu">
	    <li><a href="goods_create.php?Class=goods">Goods</a></li>
	    <li><a href="goods_create.php?Class=service">Services</a></li>
	    <li><a href="goods_create.php?Class=tender">Tender</a></li>
	    <li><a href="goods_create.php?Class=asset">Asset</a></li>
	    <li><a href="goods_create.php?Class=equity">Equity</a></li>
	    <li><a href="goods_create.php?Class=expense">Expense</a></li>
	    <li><a href="goods_create.php?Class=rental">Rental</a></li>
	    <li class="divider"></li>
	    <li><a href="goods_create.php?class=other">Other</a></li>
	  </ul>
	</div>

			<!-- end button -->

			<div class="control-group <?php echo !empty($descriptionError)?'error':'';?>">
                        <label class="control-label">Description</label>
                        <div class="controls">
                            <input type="text"  name="Description" value="<?php echo !empty($description)?$description:'';?>">
                            <?php if (!empty($descriptionError)): ?>
                                <span class="help-inline"><?php echo $descriptionError;?></span>
                            <?php endif; ?>
                        </div>
                      </div>

			<div class="control-group <?php echo !empty($ledgerInError)?'error':'';?>">
                        <label class="control-label">Ledger In</label>
                        <div class="controls">
                            <input type="number"  name="LedgerIn" value="<?php echo !empty($ledgerIn)?$ledgerIn:'';?>">
                            <?php if (!empty($ledgerInError)): ?>
                                <span class="help-inline"><?php echo $ledgerInError;?></span>
                            <?php endif; ?>
                        </div>
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

			<div class="control-group <?php echo !empty($ledgerOutError)?'error':'';?>">
                        <label class="control-label">Ledger Out</label>
                        <div class="controls">
                            <input type="number"  name="LedgerOut" value="<?php echo !empty($ledgerOut)?$ledgerOut:'';?>">
                            <?php if (!empty($ledgerOut)): ?>
                                <span class="help-inline"><?php echo $ledgerOutError;?></span>
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

					
			<div class="control-group <?php echo !empty($primarySupplierError)?'error':'';?>">
                        <label class="control-label">Primary Supplier</label>
                        <div class="controls">
                            <input type="number"  name="PrimarySupplier" value="<?php echo !empty($primarySupplier)?$primarySupplier:'';?>">
                            <?php if (!empty($primarySupplier)): ?>
                                <span class="help-inline"><?php echo $primarySupplierError;?></span>
                            <?php endif; ?>
                        </div>
                      </div>


                      <div class="control-group <?php echo !empty($primarySupplierPartNoError)?'error':'';?>">
                        <label class="control-label">Primary Supplier Part No.</label>
                        <div class="controls">
                            <input type="text" name="PrimarySupplierPartNo" value="<?php echo !empty($primarySupplierPartNo)?$primarySupplierPartNo:'';?>">
                            <?php if (!empty($primarySupplierPartNoError)): ?>
                                <span class="help-inline"><?php echo $primarySupplierPartNoError;?></span>
                            <?php endif;?>
                        </div>
                      </div>


			<div class="control-group <?php echo !empty($imageNameError)?'error':'';?>">
                        <label class="control-label">Image Name</label>
                        <div class="controls">
                            <input type="text"  name="ImageName" value="<?php echo !empty($imageName)?$imageName:'';?>">
                            <?php if (!empty($imageName)): ?>
                                <span class="help-inline"><?php echo $imageNameError;?></span>
                            <?php endif; ?>
                        </div>
                      </div>


                      <div class="control-group <?php echo !empty($qohError)?'error':'';?>">
                        <label class="control-label">Quantity On Hand</label>
                        <div class="controls">
                            <input name="QOH" type="number"  value="<?php echo !empty($qoh)?$qoh:'';?>">
                            <?php if (!empty($qohError)): ?>
                                <span class="help-inline"><?php echo $qohError;?></span>
                            <?php endif;?>
		      </div>
                      </div>
                     <div class="control-group <?php echo !empty($safetyLevelError)?'error':'';?>">
                        <label class="control-label">Safety Level</label>
                        <div class="controls">
                            <input type="number"  name="SafetyLevel" value="<?php echo !empty($safetyLevel)?$safetyLevel:'';?>">
			  <!-- span class="help-inline" --><!-- ?php // echo $safetyLevelError;? --><!-- /span -->                           
				</div>
				</div>

			
			<div class="control-group <?php echo !empty($eoqError)?'error':'';?>">
                        <label class="control-label">Economic Order Quantity</label>
                        <div class="controls">
                            <input type="number"  name="EOQ" value="<?php echo !empty($eoq)?$eoq:'';?>">
                            <!-- span class="help-inline" --><!-- ?php // echo $eoqError;? --><!-- /span -->

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

