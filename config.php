<?php
define('USER', 'id19960931_root');
define('PASSWORD', 'wU%3OmnHMRQY67#@');
define('HOST', 'localhost');
define('DATABASE', 'id19960931_tienda');
 
try {
    $connection = new PDO("mysql:host=".HOST.";dbname=".DATABASE, USER, PASSWORD);
} catch (PDOException $e) {
    exit("Error: " . $e->getMessage());
}
?>