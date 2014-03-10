<?php

ob_start();

$host="127.0.0.1";
$username="root";
$password="P13857";
$db_name="doge";
$tbl_name="doge_users";

mysql_connect("$host", "$username", "$password")or die("cannot connect");
mysql_select_db("$db_name")or die("cannot select DB");

?>
