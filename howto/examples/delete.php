<?php


    include '../assets/connection/connection.php';

    if(isset($_GET['imgID'])){

        $imgID = $_GET['imgID'];
    
        try {

            //Select img to delete from the folder images/
            $query_select = "SELECT img FROM php_img WHERE img_id = :iID";
            $stmt_select = $pdo->prepare($query_select);
            $data_select = [
                ':iID'=>$imgID
            ];
            $stmt_select->execute($data_select);
            $img = $stmt_select->fetch(PDO::FETCH_OBJ);

            unlink("../images/".$img->img."");

           //Delete all the other information from the table
            $query_delete = "DELETE FROM php_img WHERE img_id = :delID";
            $stmt_delete = $pdo->prepare($query_delete);
            $data_delete = [
                ':delID'=>$imgID
            ];
            $stmt_delete->execute($data_delete);
    
            header("location: views");

        }catch(PDOException $e){
                echo "Error code: ".$e->getCode()." Message: ".$e->getMessage()."<br/>";
        } 
    } 
?>

