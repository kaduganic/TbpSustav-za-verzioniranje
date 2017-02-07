<?php


include './_headerLogika.php';
session_start();
unset($_SESSION["PzaWeb"]);
session_destroy();
header("Location: prijava.php");
?>
