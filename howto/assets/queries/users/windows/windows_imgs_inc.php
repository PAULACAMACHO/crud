<?php

    function show_images(){

        include '../../assets/connection/connection.php';
     
        try {
            
            $query = "SELECT img_id, img, file_name, img_descr, create_at FROM windows_img";
            $stmt = $pdo->prepare($query);
            $stmt->execute();
            $imgs = $stmt->fetchAll(PDO::FETCH_OBJ);

                foreach ($imgs as $img) {

?>
                    <div class="data_wrapper">
                        <a href="../../../users/windows/windows_imgID?imgID=<?php echo $img->img_id ?>;"><?php echo '<img width="100%;" src="../../images/'.$img->img.'"/>' ?></a>
                        <p><?php echo $img->file_name; ?></p>
                        <p><?php echo $img->img_descr; ?></p>
                        <p><?php echo $img->create_at; ?></p>
                    </div>               
            <?php
                   
                }             

        }catch(PDOException $e){
                echo "Error code: ".$e->getCode()." Message: ".$e->getMessage()."<br/>";
        }
    }
    
?>