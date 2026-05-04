<?php
   
    include 'dbexamples.php';
    $title = "Delete";

    $deletMsg = "";
    
    if(isset($_GET['imgID'])){

        $imgID = $_GET['imgID'];
    
        try {

            $query = "SELECT img, file from img JOIN text ON img.file_name = text.file_name WHERE img_id = :id";
            $stmt = $pdo->prepare($query);
            $data = [
                ':id'=>$imgID
            ];
            $stmt->execute($data);
            $img = $stmt->fetch(PDO::FETCH_OBJ); 
 
            if(empty($img->file)) {

                $query = "SELECT img from img WHERE img_id = :id";
                $stmt = $pdo->prepare($query);
                $data = [
                    ':id'=>$imgID
                ];
                $stmt->execute($data);
                $img = $stmt->fetch(PDO::FETCH_OBJ); 

                unlink("images/" .$img->img. "");

                $query = "DELETE img FROM img WHERE img_id = :iID";
                $stmt = $pdo->prepare($query);
                $data = [
                    ':iID'=>$imgID
                ];
                $stmt->execute($data);
                $img = $stmt->fetch(PDO::FETCH_OBJ);

                $deletMsg = "Image deleted!";

            } else {

                unlink("images/" .$img->img. "");

                $query = "DELETE img, text FROM img INNER JOIN text ON text.file_name = img.file_name WHERE img_id = :iID";
                $stmt = $pdo->prepare($query);
                $data = [
                    ':iID'=>$imgID
                ];
                $stmt->execute($data);
                $img = $stmt->fetch(PDO::FETCH_OBJ);

                $deletMsg = "Image deleted!";

            }
                
        }catch(PDOException $e){
                echo "Error code: ".$e->getCode()." Message: ".$e->getMessage()."<br/>";
        } 
    }

    include 'templates/head.php';

    $header = "Delete";
?>
 <h1><?php echo $header; ?></h1>

 <main class="container">
   
    <?php echo $deletMsg; ?>
</main>

    
<?php
    include 'templates/footer.php';
?>