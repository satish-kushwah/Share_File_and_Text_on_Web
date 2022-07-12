<?php
session_start();
session_destroy();
setcookie("loggedin", "", time() - 3600);
header('Location: index.php');
