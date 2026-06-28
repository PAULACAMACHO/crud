<?php 

    $host = 'localhost'; 
    $db = 'HowTo'; 
    $port = '3306'; 
    $charset = 'utf8'; 
    $user = 'aluapzurc'; 
    $passwd = 'vaitefoder'; 

    $dsn = "mysql:host=$host; dbname=$db; port=$port; charset=$charset"; 

    $errmode = [PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION]; 