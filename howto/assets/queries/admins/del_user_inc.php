<?php

    include '../../connection/connection.php';

    if(isset($_GET['userID'])){

        $uID = $_GET['userID'];
    
        try {

            $query = "DELETE FROM users WHERE user_id = :uid";
            $stmt = $pdo->prepare($query);
            $data = [
                ':uid'=>$uID
            ];
            $stmt->execute($data);
            $user = $stmt->fetch(PDO::FETCH_OBJ);

            header("Location: ../../../admins/delete_user");
                
        }catch(PDOException $e){
                echo "Error code: ".$e->getCode()." Message: ".$e->getMessage()."<br/>";
        } 
    }
    ?>