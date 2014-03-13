<?php

//$tabFile = fopen(['TabFile'], "r");

//if (feof($tabFile)) {}

//$DBCon = mysql_connect('127.0.0.1', 'doge', 'root', 'P13857');
//$DBTab = mysql_select_db('users');

//while (!feof($tabFile) {}

//$writeIn = fgets($tabFile);
 
 $target = "upload/"; 
 $target = $target . basename( $_FILES['uploaded']['name']) ; 
 $ok=1; 
 if(move_uploaded_file($_FILES['uploaded']['tmp_name'], $target)) 
 {
 echo "The file ". basename( $_FILES['uploadedfile']['name']). " has been uploaded";
 } 
 else {
 echo "Sorry, there was a problem uploading your file.";
 }
 ?> 
