<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="utf-8">
	<link href="css/bootstap.min.css" rel="stylesheet">
	<script src="scripts/bootstrap.min.js"></script>
	<script src="scripts/dropdown.js"></script>
</head>


<?php

	require 'database.php';
	
		ini_set('display errors' ,1);
		error_reporting(E_ALL);

	if (!empty($_POST)) {
		
		$descriptionError = NULL;
		$classError = NULL;
		$ledgerInError = NULL;
		$costError = NULL;
		$ledgerOutError = NULL;
		$priceError = NULL;
		$primarySupplierError = NULL;
		$primarySupplierPartNoError = NULL;
		$imageNameError = NULL;
		$qohError = NULL;

		
		$notify "";
		$description = $_POST['Description'];
		$ledgerIn = $_POST['LedgerIn'];
		$cost = $_POST['Cost'];
		$ledgerOut = $_POST['LedgerOut'];
                $price = $_POST['Price'];
		$primarySupplier = $_POST['PrimarySupplier'];
                $primarySupplierPartNo = $_POST['PrimarySupplierPartNo'];
                $imageName = $_POST['ImageName'];
                $qoh = $_POST['QOH'];
		if(isset($_POST['notify_box'])){ $notify = $_POST['notify_box']; }

		
		$valid = true;

		if (empty($description)) {
			$descriptionError = 'Describe Activity';
			$valid = false;
		}

		if (empty($class)) {
                        $classError = 'Please select activity class';
                        $valid = false;
                }

		if (empty($ledgerIn)) {
			$ledgerInError = 'Please enter a dollar amount';
			$valid = false;
		} else if ( !filter_var($ledgerIn,FILTER_VALIDATE_INT) ) {
			$ledgerInError = 'Please enter a dollar amount';
			$valid = false;
		}

		if (empty($cost)) {
			$costError = 'Please enter a dollar amount';
			$valid = false;
		} else if ( !is_float($cost) ) {
			$costError = 'Please enter a dollar amount';
			$valid = false;
		}

		if (empty($ledgerOut)) {
                        $ledgerOutError = 'Please enter a dollar amount';
                        $valid = false;
                } else if ( !filter_var($ledgerOut,FILTER_VALIDATE_INT) ) {
                        $ledgerOutError = 'Please enter a dollar amount';
                        $valid = false;
                }

                if (empty($price)) {
                        $priceError = 'Please enter a dollar amount';
                        $valid = false;
                } else if ( !is_float($price) ) {
                        $priceError = 'Please enter a dollar amount';
                        $valid = false;
                }
		
		if (empty($primarySupplier)) {
                        $primarySupplierError = 'Please enter an integer';
                        $valid = false;
                } else if ( !filter_var($primarySupplier,FILTER_VALIDATE_INT) ) {
                        $primarySupplierError = 'Please enter an integer';
                        $valid = false;
                }

                if (empty($qoh)) {
                        $qohError = 'Enter an amount';
                        $valid = false;
                } else if ( !is_float($qoh) ) {
                        $qohError = 'Enter an amount';
                        $valid = false;
                }


		if ($valid) {
			$pdo = Database::connect();
			$pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
			$sql = "INSERT INTO goods (Class,Description,LedgerIn,Cost,LedgerOut,Price,PrimarySupplier,QOH) VALUES(?,?,?,?,?,?,?,?)";
			$q = $pdo->prepare($sql);
			$q->execute(array($class,$description,$ledgerIn,$cost,$ledgerOut,$price,$primarySupplier,$qoh));
			Database::disconnect();
			header("Location: goods_index");

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

		<div class="btn-group">
		<button type="button" class="btn btn-primary">Select Class</button>
		<button type="button" class="btn btn-primary dropdown-toggle" data-toggle="dropdown">
			<span class="sr-only">Toggle Dropdown</span>
		</button>
		<ul class="dropdown-menu" role="menu">
			<li><a href="goods.php?Class=Goods">Goods</a></li>
			<li><a href="goods.php?Class=Service">Service</a></li>
			<li><a href="goods.php?Class=Tender">Tender</a></li>
			<li><a href="goods.php?Class=Asset">Asset</a></li>
			<li><a href="goods.php?Class=Equity">Equity</a></li>
			<li><a href="goods.php?Class=Expense">Expense</a></li>
			<li><a href="goods.php?Class=Rental">Rental</a></li>
			<li class="divider"></li>
			<li><a href="goods.php?Class=Other">Other</a></li>
		</ul>
		</div>












