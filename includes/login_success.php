<?php
session_start();
if(!session_is_registered(myusername)){
header("location:includes/main_login.php");
}
?>

<html>
<body>
<p>Login Successful</p>
</body>
</html>
