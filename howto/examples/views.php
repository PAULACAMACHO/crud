  <?php 
  function show_images(){
        include '../assets/connection/connection.php';
     
        try {
            
            $query = "SELECT img_id, img, file_name, img_descr, create_at FROM php_img";

            $stmt = $pdo->prepare($query);
            $stmt->execute();
            $imgs = $stmt->fetchAll(PDO::FETCH_OBJ);

            ?>
            

                <?php

                    foreach ($imgs as $img) {

                ?>

                 <div class="data_wrapper">

                    
                        <a href="view?imgID=<?php echo $img->img_id; ?>"><?php echo '<img width="30%;" src="../images/'.$img->img.'"/>' ?></a>
                    
        
                        <p><?php echo $img->file_name; ?></p>
                    
                    
                        <p><?php echo $img->img_descr; ?></p>
                    
                    
                        <p><?php echo $img->create_at; ?></p>
                    

                    </div>
                           
                <?php
                       
                    } 
             
                ?>            
                          
        <?php              

        }catch(PDOException $e){
                echo "Error code: ".$e->getCode()." Message: ".$e->getMessage()."<br/>";
        }
    }

    include 'view.php';
?>

<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>views</title>
</head>
<body>
	<?php show_images(); ?>
</body>
</html>