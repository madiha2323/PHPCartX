<?php

session_start();

unset($_SESSION['Admin_login']);

header("location: login.php");

?>