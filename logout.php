<?php
unset($_COOKIE['user']);
setcookie("user", "", time() - 3600, "/");
setcookie("user", "", time() - 3600);
?>
<meta http-equiv="Refresh" content="0; url=login.php">
<a href="login.php"> click here to login </a>