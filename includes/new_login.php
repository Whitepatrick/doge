<?php

	// make mysql connection with DB
	require("common.php");

	// initialize variable
	$submitted_username = '';

	// if the form has been submitted, login code runs
	if(!empty($_POST))
	{
		// query DB to retrieve user's info
		// using their username.
		$query = "
			SELECT
				doge_id,
				doge_username,
				doge_password,
				salt,
				email
			FROM doge_users
			WHERE
				doge_username = :username
		";

		// parameter values to be passed in query
		$query_params = array(
			':username' => $_POST['username']
		);

		try
		{
			// execute the query against the database
