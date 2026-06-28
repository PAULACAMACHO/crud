<?php 

include 'config.php';

try { 

    $pdo = new PDO($dsn, $user, $passwd, $errmode); 

    $query = ' 

        CREATE TABLE IF NOT EXISTS mysql_img ( 
            img_id INT PRIMARY KEY NOT NULL AUTO_INCREMENT, 
            img VARCHAR(128) NOT NULL UNIQUE, 
            file_name VARCHAR(128) NOT NULL UNIQUE, 
            img_descr VARCHAR(128) NOT NULL, 
            create_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP  
        )ENGINE=InnoDB DEFAULT CHARSET=utf8mb4; 
        SET GLOBAL interactive_timeout=28800; 
        SET GLOBAL wait_timeout=28800; 

        CREATE TABLE IF NOT EXISTS mysql_text ( 
            text_id INT PRIMARY KEY NOT NULL AUTO_INCREMENT, 
            file_name VARCHAR(128) NOT NULL UNIQUE, 
            file TEXT(256) NOT NULL, 
            create_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP 
        )ENGINE=InnoDB DEFAULT CHARSET=utf8mb4; 
        SET GLOBAL interactive_timeout=28800; 
        SET GLOBAL wait_timeout=28800; 

        CREATE TABLE IF NOT EXISTS php_img ( 
            img_id INT PRIMARY KEY NOT NULL AUTO_INCREMENT, 
            img VARCHAR(128) NOT NULL UNIQUE, 
            file_name VARCHAR(128) NOT NULL UNIQUE, 
            img_descr VARCHAR(128) NOT NULL, 
            create_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP 
        )ENGINE=InnoDB DEFAULT CHARSET=utf8mb4; 
        SET GLOBAL interactive_timeout=28800; 
        SET GLOBAL wait_timeout=28800; 

        CREATE TABLE IF NOT EXISTS php_text ( 
            text_id INT PRIMARY KEY NOT NULL AUTO_INCREMENT, 
            file_name VARCHAR(128) NOT NULL UNIQUE, 
            file TEXT(256) NOT NULL, 
            create_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP
        )ENGINE=InnoDB DEFAULT CHARSET=utf8mb4; 
        SET GLOBAL interactive_timeout=28800; 
        SET GLOBAL wait_timeout=28800; 

        CREATE TABLE IF NOT EXISTS django_img ( 
            img_id INT PRIMARY KEY NOT NULL AUTO_INCREMENT, 
            img VARCHAR(128) NOT NULL UNIQUE, 
            file_name VARCHAR(128) NOT NULL UNIQUE, 
            img_descr VARCHAR(128) NOT NULL, 
            create_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP 
        )ENGINE=InnoDB DEFAULT CHARSET=utf8mb4; 
        SET GLOBAL interactive_timeout=28800; 
        SET GLOBAL wait_timeout=28800; 
        
        CREATE TABLE IF NOT EXISTS django_text ( 
            text_id INT PRIMARY KEY NOT NULL AUTO_INCREMENT, 
            file_name VARCHAR(128) NOT NULL UNIQUE, 
            file TEXT(256) NOT NULL, 
            create_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP 
        )ENGINE=InnoDB DEFAULT CHARSET=utf8mb4; 
        SET GLOBAL interactive_timeout=28800; 
        SET GLOBAL wait_timeout=28800; 

        CREATE TABLE IF NOT EXISTS linux_img ( 
            img_id INT PRIMARY KEY NOT NULL AUTO_INCREMENT, 
            img VARCHAR(128) NOT NULL UNIQUE, 
            file_name VARCHAR(128) NOT NULL UNIQUE, 
            img_descr VARCHAR(128) NOT NULL, 
            create_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP 
        )ENGINE=InnoDB DEFAULT CHARSET=utf8mb4; 
        SET GLOBAL interactive_timeout=28800; 
        SET GLOBAL wait_timeout=28800; 

        CREATE TABLE IF NOT EXISTS linux_text ( 
            text_id INT PRIMARY KEY NOT NULL AUTO_INCREMENT, 
            file_name VARCHAR(128) NOT NULL UNIQUE, 
            file TEXT(256) NOT NULL, 
            create_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP 
        )ENGINE=InnoDB DEFAULT CHARSET=utf8mb4; 
        SET GLOBAL interactive_timeout=28800; 
        SET GLOBAL wait_timeout=28800; 

        CREATE TABLE IF NOT EXISTS windows_img ( 
            img_id INT PRIMARY KEY NOT NULL AUTO_INCREMENT, 
            img VARCHAR(128) NOT NULL UNIQUE, 
            file_name VARCHAR(128) NOT NULL UNIQUE, 
            img_descr VARCHAR(128) NOT NULL, 
            create_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP 
        )ENGINE=InnoDB DEFAULT CHARSET=utf8mb4; 
        SET GLOBAL interactive_timeout=28800; 
        SET GLOBAL wait_timeout=28800; 

        CREATE TABLE IF NOT EXISTS windows_text ( 
            text_id INT PRIMARY KEY NOT NULL AUTO_INCREMENT, 
            file_name VARCHAR(128) NOT NULL UNIQUE, 
            file TEXT(256) NOT NULL, 
            create_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP 
        )ENGINE=InnoDB DEFAULT CHARSET=utf8mb4; 
        SET GLOBAL interactive_timeout=28800; 
        SET GLOBAL wait_timeout=28800; 

        CREATE TABLE IF NOT EXISTS network_img ( 
            img_id INT PRIMARY KEY NOT NULL AUTO_INCREMENT, 
            img VARCHAR(128) NOT NULL UNIQUE, 
            file_name VARCHAR(128) NOT NULL UNIQUE, 
            img_descr VARCHAR(128) NOT NULL, 
            create_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP 
        )ENGINE=InnoDB DEFAULT CHARSET=utf8mb4; 
        SET GLOBAL interactive_timeout=28800; 
        SET GLOBAL wait_timeout=28800; 

        CREATE TABLE IF NOT EXISTS network_text ( 
            text_id INT PRIMARY KEY NOT NULL AUTO_INCREMENT, 
            file_name VARCHAR(128) NOT NULL UNIQUE, 
            file TEXT(256) NOT NULL, 
            create_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP 
        )ENGINE=InnoDB DEFAULT CHARSET=utf8mb4; 
        SET GLOBAL interactive_timeout=28800; 
        SET GLOBAL wait_timeout=28800; 

        CREATE TABLE IF NOT EXISTS others_img ( 
            img_id INT PRIMARY KEY NOT NULL AUTO_INCREMENT, 
            img VARCHAR(128) NOT NULL UNIQUE, 
            file_name VARCHAR(128) NOT NULL UNIQUE, 
            img_descr VARCHAR(128) NOT NULL, 
            create_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP 
        )ENGINE=InnoDB DEFAULT CHARSET=utf8mb4; 
        SET GLOBAL interactive_timeout=28800; 
        SET GLOBAL wait_timeout=28800; 

        CREATE TABLE IF NOT EXISTS others_text ( 
            text_id INT PRIMARY KEY NOT NULL AUTO_INCREMENT, 
            file_name VARCHAR(128) NOT NULL UNIQUE, 
            file TEXT(256) NOT NULL, 
            create_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP 
        )ENGINE=InnoDB DEFAULT CHARSET=utf8mb4; 
        SET GLOBAL interactive_timeout=28800; 
        SET GLOBAL wait_timeout=28800; 

        CREATE TABLE IF NOT EXISTS users ( 
            user_id INT PRIMARY KEY NOT NULL AUTO_INCREMENT, 
            user_name VARCHAR(128) NOT NULL UNIQUE, 
            user_email VARCHAR(128) NOT NULL UNIQUE, 
            user_passwd VARCHAR(256) NOT NULL, 
            create_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP 
        )ENGINE=InnoDB DEFAULT CHARSET=utf8mb4; 

         CREATE TABLE IF NOT EXISTS admins ( 
            admin_id INT PRIMARY KEY NOT NULL AUTO_INCREMENT, 
            admin_name VARCHAR(128) NOT NULL UNIQUE, 
            admin_email VARCHAR(128) NOT NULL UNIQUE, 
            admin_passwd VARCHAR(256) NOT NULL, 
            create_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP 
        )ENGINE=InnoDB DEFAULT CHARSET=utf8mb4; 

    '; 

    $pdo->exec($query); 

    }catch(PDOException $e){ 

        echo "Error code: " . $e->getCode() . ' Message: ' . $e->getMessage() . "<br/>"; 

    } 

?> 