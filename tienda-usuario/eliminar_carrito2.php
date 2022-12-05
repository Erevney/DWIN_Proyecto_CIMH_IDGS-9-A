<?php
session_start();

if(!isset($_GET['id']) OR !is_numeric($_GET['id']))
    header('Location: carrito2.php');

$id = $_GET['id'];

if(isset($_SESSION['carrito2'])){
    unset($_SESSION['carrito2'][$id]);   
    header('Location: carrito2.php');
}else{
    header('Location: otros.php');
}