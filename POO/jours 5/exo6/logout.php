<?php
session_start();
session_destroy();
setcookie("jwt", "", time() - 3600, "/");
header("Location: login.php");
exit();
?>
