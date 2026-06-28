<?php

     /*include 'assets/connection/connection.php';
 
    try {
        
        $query = "SELECT img_id, img, file_name, img_descr, create_at FROM php_img";

        $stmt = $pdo->prepare($query);
        $stmt->execute();
        $imgs = $stmt->fetchAll(PDO::FETCH_OBJ);              
                  

    }catch(PDOException $e){
            echo "Error code: ".$e->getCode()." Message: ".$e->getMessage()."<br/>";
    }*/

    function show_php_texts(){
        include '../assets/connection/connection.php';
     
        try {
            
            $query = "SELECT text_id, file_name, file, create_at FROM php_text";

            $stmt = $pdo->prepare($query);
            $stmt->execute();
            $texts = $stmt->fetchAll(PDO::FETCH_OBJ);


                foreach ($texts as $text) {

?>

                    <div class="data_wrapper">

                        
                            <p><?php echo $text->text_id; ?></p>
                            <p><?php echo $text->file_name; ?></p>
                            <p><?php echo $text->file; ?></p>
                            <p><?php echo $text->create_at; ?></p>

                    </div>
                           
            <?php
                   
                } 
                   

        }catch(PDOException $e){
                echo "Error code: ".$e->getCode()." Message: ".$e->getMessage()."<br/>";
        }
    }
?>