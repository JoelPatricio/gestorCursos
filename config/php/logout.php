<?php
session_start();
unset($_SESSION["matricula"]);
header("Location: ..\..\index.php");
?>