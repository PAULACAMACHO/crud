<?php
    function show_text(){
        include '../assets/connection/connection.php';

        if(isset($_GET['textID'])){

            $imgID = $_GET['textID'];
        
            try {


                $query = "SELECT file FROM php_text, php_img WHERE text_";
                $stmt = $pdo->prepare($query);  
                $stmt->execute();
                $text = $stmt->fetch(PDO::FETCH_OBJ);

    ?>
                <div class="data_wrapper">

                    <p>Image ID: <?php echo $img->img_id; ?></p>
                    <p>Image: <?php echo '<img width="100%;" src="../../images/'.$img->img.'"/>' ?></p>
                    <p>File name: <?php echo $img->file_name; ?></p>
                    <p>Image description: <?php echo $img->img_descr; ?></p>
                    <p>Creat at: <?php echo $img->create_at; ?></p>
                    <p>Explenation: <?php echo $text->file; ?></p>
                    <hr/>
                    <button class="previous_btn" onclick="window.location.href='php_imgs'">&laquo; Previous</button>
                    <button class="previous_btn" onclick="window.location.href='php_imgs'">&laquo; Insert Text</button>
                    <button class="previous_btn" onclick="window.location.href='php_imgs'">&laquo; Edit</button>
                    <a class="previous_btn" href="assets/queries/del_inc?ID=<?php echo $img->img_id ?>;">&laquo; Delete</a>
                
                </div>

    <?php 

            }catch(PDOException $e){
                    echo "Error code: ".$e->getCode()." Message: ".$e->getMessage()."<br/>";
            } 
        }
    }    
?>