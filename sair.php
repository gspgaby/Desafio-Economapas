<?php
session_start();
unset($_SESSION['usuario']);
unset($_SESSION['id_usuario']) ;
header('Location: index.php');
?>