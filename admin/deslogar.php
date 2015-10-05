<?
session_start();

unset($_SESSION['usuario']);
unset($_SESSION['validacao']);
session_destroy();

Header("Location: index.php");
?>