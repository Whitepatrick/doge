<meta http-equiv="Content-Type" content="text/html; charset=utf-8">


<?php

require("common.php")

// session_start();
// if(!$_SESSION['myusername']){
// header("location:main_login.php");
// }

$admin_sql="SELECT * FROM $tbl_name WHERE doge_admin=1";

$result=mysql_query($admin_sql);

if ($result="1")
{
header("Location:admin.php")
else
header("Location:main_login.php");
}

?>
