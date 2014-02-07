<meta http-equiv="Content-Type" content="text/html; charset=utf-8">


<?php

require("common.php")

$sql="SELECT * FROM $tbl_name WHERE doge_admin=1";

$result=mysql_query($sql);

if ($result="1")
{
header("Location:admin.php")
else
header("Location:main_login.php");
}
