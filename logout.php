<?php
session_start();

unset($_SESSION['isLoggedIn']);
unset($_SESSION['session_user_id']);

session_destroy();
header("Location: login.php");
?>