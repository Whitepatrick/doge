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
		$safetyLevelError = NULL;
		$eoqError = NULL;

		
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
		$safetyLevel = $_POST['SafetyLevel'];
                $eoq = $_POST['EOQ'];
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
                        $ledgerOutError = 'Please ';
                        $valid = false;
                } else if ( !filter_var($ledgerOut,FILTER_VALIDATE_INT) ) {
                        $ledgerOutError = '';
                        $valid = false;
                }

                if (empty($)) {
                        $Error = '';
                        $valid = false;
                } else if ( !is_float($) ) {
                        $Error = '';
                        $valid = false;
                }
		
		if (empty($)) {
                        $Error = '';
                        $valid = false;
                } else if ( !filter_var($,FILTER_VALIDATE_INT) ) {
                        $Error = '';
                        $valid = false;
                }

                if (empty($)) {
                        $Error = '';
                        $valid = false;
                } else if ( !is_float($) ) {
                        $Error = '';
                        $valid = false;
                }

		if (empty($)) {
                        $Error = '';
                        $valid = false;
                } else if ( !is_float($) ) {
                        $Error = '';
                        $valid = false;
                }














