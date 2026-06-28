<?php

function show_text(){

    include '../assets/connection/connection.php';

        if(isset($_GET['imgID'])){

            $imgID = $_GET['imgID'];
        
            try {


                $query = "SELECT img_id, img, php_img.file_name, img_descr, php_img.create_at, text_id, php_text.file_name, file, php_text.create_at FROM php_img INNER JOIN php_text ON php_img.file_name = php_text.file_name WHERE img_id = :iID";
                $stmt = $pdo->prepare($query);
                $data = [
                    ':iID'=>$imgID
                ];
                $stmt->execute($data);
                $img = $stmt->fetch(PDO::FETCH_OBJ);

                if(empty($img->file)) {

                    $query = "SELECT img_id, img, file_name, img_descr, create_at FROM php_img WHERE img_id = :iID";
                    $stmt = $pdo->prepare($query);
                    $data = [
                        ':iID'=>$imgID
                    ];
                    $stmt->execute($data);
                    $img = $stmt->fetch(PDO::FETCH_OBJ);
?>
                    <p>Image ID: <?php echo $img->img_id; ?></p>
                    <p>Image: <?php echo '<img width="30%;" src="../images/'.$img->img.'"/>'; ?></p>
                    <p>File name: <?php echo $img->file_name; ?></p>
                    <p>Image description: <?php echo $img->img_descr; ?></p>
                    <p>Creat at: <?php echo $img->create_at; ?></p>
                    <a href="delete?imgID=<?php echo $img->img_id; ?>">Delete</a>
                    <a href="update?imgID=<?php echo $img->img_id; ?>">Update</a>
                    <a href="insert">Insert</a>

<?php
                }else{
?>

                <p>Image ID: <?php echo $img->img_id; ?></p>
                <p>Image: <?php echo '<img width="30%;" src="../images/'.$img->img.'"/>'; ?></p>
                <p>File name: <?php echo $img->file_name; ?></p>
                <p>Image description: <?php echo $img->img_descr; ?></p>
                <p>Creat at: <?php echo $img->create_at; ?></p>
                <p>Explenation: <?php echo $img->file; ?></p>
                <a href="delete?imgID=<?php echo $img->img_id; ?>">Delete</a>
                <a href="update?imgID=<?php echo $img->img_id; ?>">Update</a>

<?php

                }           
    
            }catch(PDOException $e){
                echo "Error code: ".$e->getCode()." Message: ".$e->getMessage()."<br/>";
            }
    }
}

?>

<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>view</title>
</head>
<body>
	<?php show_text(); ?>
</body>
</html>

