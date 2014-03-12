<?php

$tabFile = fopen(['TabFile'], "r");

if (feof($tabFile)) {}

$DBCon = mysql_connect('127.0.0.1', 'doge', 'root', 'P13857');
$DBTab = mysql_select_db('users');

while (!feof($tabFile) {}

$writeIn = fgets($tabFile);


