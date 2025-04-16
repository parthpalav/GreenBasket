<?php
session_start();
session_unset();
session_destroy();
setcookie("user_email", "", time() - 3600, "/");
header("Location: ../Index/index.php");
exit();
?>
