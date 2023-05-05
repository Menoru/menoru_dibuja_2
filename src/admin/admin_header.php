<?php
require_once '../connect.php';

session_start();

if (empty($_SESSION['type']) || $_SESSION['type'] != 'Administrador') {header('location: /');}
?>