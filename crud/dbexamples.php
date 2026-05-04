<?php 

    $host = 'localhost'; 
    $db = 'examples'; 
    $port = '3306'; 
    $charset = 'utf8'; 
    $user = 'root'; 
    $passwd = ''; 

    $dsn = "mysql:host=$host; dbname=$db; port=$port; charset=$charset"; 

    $errmode = [PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION]; 



try { 

    $pdo = new PDO($dsn, $user, $passwd, $errmode); 

    $query = ' 

        CREATE TABLE IF NOT EXISTS img ( 
            img_id INT PRIMARY KEY NOT NULL AUTO_INCREMENT, 
            img VARCHAR(128) NOT NULL UNIQUE, 
            file_name VARCHAR(128) NOT NULL UNIQUE, 
            img_descr VARCHAR(128) NOT NULL, 
            create_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP 
        )ENGINE=InnoDB DEFAULT CHARSET=utf8mb4; 
        SET GLOBAL interactive_timeout=28800; 
        SET GLOBAL wait_timeout=28800; 

        CREATE TABLE IF NOT EXISTS text ( 
            text_id INT PRIMARY KEY NOT NULL AUTO_INCREMENT, 
            file_name VARCHAR(128) NOT NULL UNIQUE, 
            file TEXT(256) NOT NULL, 
            create_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP 
        )ENGINE=InnoDB DEFAULT CHARSET=utf8mb4; 
        SET GLOBAL interactive_timeout=28800; 
        SET GLOBAL wait_timeout=28800;  

    '; 

    $pdo->exec($query); 

    }catch(PDOException $e){ 

        echo "Error code: " . $e->getCode() . ' Message: ' . $e->getMessage() . "<br/>"; 

    } 

?> 