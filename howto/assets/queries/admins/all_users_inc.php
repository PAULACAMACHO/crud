<?php

    include '../assets/connection/connection.php';
    
        try {

            $query = "SELECT user_id, user_name, user_email, create_at FROM users";

            $stmt = $pdo->prepare($query);
            $stmt->execute();
            $rows = $stmt->fetchAll(PDO::FETCH_OBJ);
                
        }catch(PDOException $e){
                echo "Error code: ".$e->getCode()." Message: ".$e->getMessage()."<br/>";
        }  
    