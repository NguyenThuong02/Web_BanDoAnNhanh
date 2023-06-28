<?php 
session_start();
ob_start();
unset($_SESSION['user']);
header('location: ../Login/');
?>