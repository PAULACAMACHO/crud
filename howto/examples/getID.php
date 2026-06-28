
<?php
    include '../assets/connection/connection.php';

    if(isset($_GET['imgID'])){

        $imgID = $_GET['imgID'];
    
        try {

            //Select img to delete from the folder images/
            $query = "SELECT img_id, img, php_img.file_name, img_descr, php_img.create_at, text_id, php_text.file_name, file, php_text.create_at FROM php_img INNER JOIN php_text ON php_img.file_name = php_text.file_name WHERE img_id = :iID";
                $stmt = $pdo->prepare($query);
                $data = [
                    ':iID'=>$imgID
                ];
                $stmt->execute($data);
                $img = $stmt->fetch(PDO::FETCH_OBJ);

        }catch(PDOException $e){
            echo "Error code: ".$e->getCode()." Message: ".$e->getMessage()."<br/>";
        }
    } 