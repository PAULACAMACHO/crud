<?php

    include '../../connection/connection.php';

    if(isset($_GET['ID'])){

        $ID = $_GET['ID'];
    
        try {

            $query_select = "SELECT img, file FROM php_img JOIN php_text ON php_img.file_name = php_text.file_name WHERE img_id = :iID";
            $stmt_select = $pdo->prepare($query_select);
            $data_select = [
                ':iID'=>$ID
            ];
            $stmt_select->execute($data_select);
            $img = $stmt_select->fetch(PDO::FETCH_OBJ);

            if(empty($img->file)) {

                unlink("../../../images/".$img->img."");

                $query_delete = "DELETE FROM php_img WHERE img_id = :delID";
                $stmt_delete = $pdo->prepare($query_delete);
                $data_delete = [
                    ':delID'=>$ID
                ];
                $stmt_delete->execute($data_delete);
                $img = $stmt_delete->fetch(PDO::FETCH_OBJ);

                header("Location: ../../../users/php/php");

            }else {

                unlink("../../../images/".$img->img."");

                $query_delete = "DELETE php_img, php_text FROM php_img JOIN php_text ON php_img.file_name = php_text.file_name WHERE img_id = :delID";
                $stmt_delete = $pdo->prepare($query_delete);
                $data_delete = [
                    ':delID'=>$ID
                ];
                $stmt_delete->execute($data_delete);
                $img = $stmt_delete->fetch(PDO::FETCH_OBJ);

                header("Location: ../../../users/php/php");
            }
                
        }catch(PDOException $e){
                echo "Error code: ".$e->getCode()." Message: ".$e->getMessage()."<br/>";
        } 
    }
    