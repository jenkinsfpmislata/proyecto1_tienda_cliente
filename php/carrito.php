<?php
// Archivo: siguiente.php
require_once 'carrito.php';

session_start();

$carrito = $_SESSION['carrito'];
$nombre=$carrito.numero;
echo 'Hola, mi nombre es '.$nombre ;
?>
