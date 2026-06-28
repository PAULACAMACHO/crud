<?php

 	function php_search_files(){

        include '../assets/connection/connection.php';
            
        $query = "SELECT img_id, img, file_name, img_descr, create_at FROM php_img";

        $stmt = $pdo->prepare($query);
        $stmt->execute();
        $imgs = $stmt->fetchAll(PDO::FETCH_OBJ);

            foreach ($imgs as $img) {
            	$fileName = $img->file_name;
                echo '<option value="'.$fileName.'"data-tokens="'.$fileName.'"">'.$fileName.'</option>';      
            } 
    }

     function windows_search_files(){

        include '../assets/connection/connection.php';
            
        $query = "SELECT img_id, img, file_name, img_descr, create_at, img_id, img, file_name, img_descr, create_at FROM windows_img";

        $stmt = $pdo->prepare($query);
        $stmt->execute();
        $imgs = $stmt->fetchAll(PDO::FETCH_OBJ);

            foreach ($imgs as $img) {
                $fileName = $img->file_name;
                echo '<option value="'.$fileName.'"data-tokens="'.$fileName.'"">'.$fileName.'</option>';         
            } 
    }        

?>

