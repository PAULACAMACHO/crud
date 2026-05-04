<?php

    function show_imgs() {
    include 'dbexamples.php';

        try {

            $query = "SELECT img_id, img, file_name, img_descr, create_at FROM img";
            $stmt = $pdo->prepare($query);
            $stmt->execute();
            $imgs = $stmt->fetchAll(PDO::FETCH_OBJ);
                
            foreach ($imgs as $img) {

?>
                <div>
                    <p>Image ID: <?php echo $img->img_id; ?></p>
                    <div class="image"><a href="link.php?imgID=<?php echo $img->img_id?>"><?php echo '<img width="100%;" src="images/'.$img->img.'"/>' ?></a></div>
                    <p>File Name: <?php echo $img->file_name; ?></p>
                    <p>Image Description: <?php echo $img->img_descr; ?></p>
                    <p>Create At: <?php echo $img->create_at; ?></p>
                </div>
                <a href="#page_up"><button>Page Up</button></a>
                <a href="#page_down"><button>Page Down</button></a>
<?php
            }
                
        }catch(PDOException $e){
                echo "Error code: ".$e->getCode()." Message: ".$e->getMessage()."<br/>";
        }
    }  

    $title = "Read";
    $header = "Read";
    include 'templates/head.php';   
?>
<h1><?php echo $header; ?></h1>
    <main class="container">
        <div id="page_up">
            <?php echo show_imgs(); ?>
        </div>
    </main>
   
<?php
    include 'templates/footer.php';
?>