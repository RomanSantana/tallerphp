<?php

session_start();
unset($_SESSION["user"]);
unset($_SESSION["Nivel"]);
session_destroy();
header("location:login.php");

?>
