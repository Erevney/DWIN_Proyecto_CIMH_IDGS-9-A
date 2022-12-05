<?php

session_start();

$_SESSION['user_id']=array();

header('Location: login.php');