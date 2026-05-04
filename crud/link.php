<?php
    $title = "Image";
    $header = "Image";
    include 'templates/head.php';

    include 'dbexamples.php';

    if(isset($_GET['imgID'])) {

        $id = $_GET['imgID'];
 try {

            $query = "SELECT img_id, img, img.file_name, img_descr, file, img.create_at FROM img INNER JOIN text ON img.file_name = text.file_name WHERE img_id = :iID LIMIT 1";
            $stmt = $pdo->prepare($query);
            $data = array(':iID'=>$id);
            $stmt->execute($data);
            $img = $stmt->fetch(PDO::FETCH_OBJ);
        
            
        if(empty($img->file)){

            $query = "SELECT img_id, img, file_name, img_descr, create_at FROM img WHERE img_id = :iID LIMIT 1";
            $stmt = $pdo->prepare($query);
            $data = array(':iID'=>$id);
            $stmt->execute($data);
            $img = $stmt->fetch(PDO::FETCH_OBJ);
        }
           
        } catch(PDOException $e){
                echo "Error code: ".$e->getCode()." Message: ".$e->getMessage()."<br/>";
        }
    }  
?>
<h1><?php echo $header; ?></h1>
 <main class="container">
    
    <div> 
        <p>Image ID: <?php echo $img->img_id; ?></p>
        <p><?php echo '<img width="100%;" src="images/'.$img->img.'"/>' ?></p>
        <p>File Name: <?php echo $img->file_name; ?></p>
        <p>Description: <?php echo $img->img_descr; ?></p>
        <?php if(empty($img->file)){?>
        <p>File: No file!</p>
         <?php }else { ?>
             <p>File: <?php echo $img->file; ?></p>
         <?php } ?>
        <p>Create at: <?php echo $img->create_at; ?></p>
        <hr/>
        <a class="btn" href="delete.php?imgID=<?php echo $img->img_id; ?>"><button>Delete</button></a>
        <a class="btn" href="update.php?imgID=<?php echo $img->img_id; ?>"><button>Update</button></a>
    </div>
</main>

    
<?php
    include 'templates/footer.php';
?>