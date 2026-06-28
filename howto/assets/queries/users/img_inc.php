<?php

    include '../assets/connection/connection.php';

    if(isset($_POST['search'])) {

        $id = $_POST['theID'];

        $phpArray = ['php', 'PHP', 'Php'];
        $windowsArray = ['windows', 'WINDOWS', 'Windows'];

        foreach ($phpArray as $array) {

            if(str_contains($id, $array)) {

            try {

                $query_text = "SELECT img_id, img, php_img.file_name, img_descr, php_img.create_at, file FROM php_text JOIN php_img ON php_text.file_name = php_img.file_name WHERE php_img.file_name = '$id' LIMIT 1";
                $stmt_text = $pdo->prepare($query_text);  
                $stmt_text->execute();
                $img = $stmt_text->fetch(PDO::FETCH_OBJ);

                if(empty($img->file)) {

                    $query = "SELECT img_id, img, file_name, img_descr, create_at FROM php_img WHERE php_img.file_name = '$id' LIMIT 1";
                    $stmt = $pdo->prepare($query);
                    $stmt->execute();
                    $img = $stmt->fetch(PDO::FETCH_OBJ);

                }

            } catch(PDOException $e){
                    echo "Error code: ".$e->getCode()." Message: ".$e->getMessage()."<br/>";
            }
        }
    }

        foreach ($windowsArray as $array) {

            if(str_contains($id, $array)) {

            try {

                $query_text = "SELECT img_id, img, windows_img.file_name, img_descr, windows_img.create_at, file FROM windows_text JOIN windows_img ON windows_text.file_name = windows_img.file_name WHERE windows_img.file_name = '$id' LIMIT 1";
                $stmt_text = $pdo->prepare($query_text);  
                $stmt_text->execute();
                $img = $stmt_text->fetch(PDO::FETCH_OBJ);

                if(empty($img->file)) {

                    $query = "SELECT img_id, img, file_name, img_descr, create_at FROM windows_img WHERE windows_img.file_name = '$id' LIMIT 1";
                    $stmt = $pdo->prepare($query);
                    $stmt->execute();
                    $img = $stmt->fetch(PDO::FETCH_OBJ);

                }

            } catch(PDOException $e){
                    echo "Error code: ".$e->getCode()." Message: ".$e->getMessage()."<br/>";
            }
        }
    }
}
