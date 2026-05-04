<?php
   
    include 'dbexamples.php';

    $updateMsg = "";
    
    if(isset($_GET['imgID'])){

        $imgID = $_GET['imgID'];
    
        try {

            $query = "SELECT img_id, img, img.file_name, img_descr, img.create_at, file FROM img INNER JOIN text ON img.file_name = text.file_name WHERE img_id = :iID LIMIT 1";
            $stmt = $pdo->prepare($query);
            $data = array(':iID'=>$imgID);
            $stmt->execute($data);
            $img = $stmt->fetch(PDO::FETCH_OBJ);

            if(empty($img->file)) {
                $query = "SELECT img_id, img, file_name, img_descr, img.create_at FROM img WHERE img_id = :iID LIMIT 1";
            $stmt = $pdo->prepare($query);
            $data = array(':iID'=>$imgID);
            $stmt->execute($data);
            $img = $stmt->fetch(PDO::FETCH_OBJ);
            }
            
         }catch(PDOException $e) {
            echo "Error: ".$e->getMessage()."<br/>";
        }
    }

    if(isset($_POST['upd_img'])) {

        unlink("images/" . $img->img . "");

        $tmp_name = $_FILES['image']['tmp_name'];
        $name = $_FILES['image']['name'];

        try { 
                           
            $query = "UPDATE img SET img = :i WHERE img_id = :iID";

	        $stmt = $pdo->prepare($query);
	        $data = [
                ':iID' => $imgID,
	            ':i' => $name
	        ];
	        $stmt->execute($data);

            move_uploaded_file($tmp_name, "images/".$name);
            $updateMsg = "Success! Image has been updated!";
            header("Refresh:0");

        }catch(PDOException $e) {
            echo "Error: ".$e->getMessage()."<br/>";
        }
    }

    if(isset($_POST['update'])) {

        $img_name = $_POST['name'];
        $img_description = $_POST['description'];

        try { 
                           
            $query = "UPDATE img JOIN text ON img.file_name = text.file_name SET img.file_name = :fn, img_descr = :id, text.file_name = :fn WHERE img_id = :iID";

	        $stmt = $pdo->prepare($query);
	        $data = [
                ':iID' => $imgID,
	            ':fn' => $img_name, 
	            ':id' => $img_description 
	        ];
	        $stmt->execute($data);

            header("Refresh:0");
            $updateMsg = "Success! Image has been updated!";

        }catch(PDOException $e) {
            echo "Error: ".$e->getMessage()."<br/>";
        }
    }


    if(isset($_POST['update_file'])){

        $file = $_POST['text'];

        try {

            $query = "UPDATE text JOIN img SET file = :f WHERE text.file_name = img.file_name";

            $stmt = $pdo->prepare($query);
            $data = [
                ':f' => $file 
            ];
            $stmt->execute($data);

            echo "Success! Text has been inserted!"; 
            header("Refresh:0");

        }catch(PDOException $e){
                echo "Error code: ".$e->getCode()." Message: ".$e->getMessage()."<br/>";
        }

    }

    function search_files(){

        include 'dbexamples.php';

        $query = "SELECT img_id, img, file_name, img_descr, create_at FROM img";
        $stmt = $pdo->prepare($query);
        $stmt->execute();
        $imgs = $stmt->fetchAll(PDO::FETCH_OBJ);

            foreach ($imgs as $img) {
                $id = $img->img_id;
                $fileName = $img->file_name;
                echo '<option value="'.$id.'"data-tokens="'.$fileName.'"">'.$fileName.'</option>';      
            } 
    }

    $title = "Update";
    $header = "Update";
    include 'templates/head.php';

?>
    <h1><?php echo $header; ?></h1>
    <?php echo $updateMsg; ?>
 <main class="container">
    <form action="" method="POST" enctype="multipart/form-data">
	    <div>
	       <label for="image">Image:</label><br/>
            <?php echo "<img src='images/".$img->img."' width=50%;>"; ?><br/>   
	        <input type="file" name="image"/>
            <input type="submit" name="upd_img" value="Update"/>
	    </div>
        <hr/>
       
	    <div>
            <label for="name">File Name:</label>
	        <input type="text" name="name" value="<?php echo $img->file_name; ?>" placeholder="Name"/>
	    </div> 
	    <div>
            <label for="description">Description:</label>
	        <input type="text" name="description" value="<?php echo $img->img_descr; ?>"placeholder="Description"/>
	    </div>
        <input type="submit" name="update" value="Update"/>
        <hr/>
        <br/>
        <?php if(empty($img->file)) {
            echo "No file!";
        } else{ 
            ?>
        <label for="file">File:</label><br/>
        <textarea name="text" rows="20" cols="40"><?php echo $img->file; ?></textarea><br/>
        
        <?php
            }
        ?>
        <input type="submit" name="update_file" value="Update" />
    </form>          
</main>
   
<?php
    include 'templates/footer.php';
?>

