<meta http-equiv="Content-Type" content="text/html; charset=utf-8">

<?php
session_start();
if(!$_SESSION['myusername']){
header("location:main_login.php");
}
?>

<html>
<head></head>
<body>
Login Successful
</body>
</html>
