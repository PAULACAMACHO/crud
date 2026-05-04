<?php

	include 'dbexamples.php';

    if(isset($_POST['upload'])) {

        $tmp_name = $_FILES['image']['tmp_name'];
        $name = $_FILES['image']['name'];
        $img_name = $_POST['name'];
        $img_description = $_POST['description'];

		    move_uploaded_file($tmp_name, "images/".$name); 
		    echo "Success! Image has been uploaded!";    

	    try {

	        $query = "INSERT INTO img (img, file_name, img_descr) VALUES (:i, :fn, :id)";

	        $stmt = $pdo->prepare($query);
	        $data = [
	            ':i' => $name, 
	            ':fn' => $img_name, 
	            ':id' => $img_description 
	        ];
	        $stmt->execute($data);

	    }catch(PDOException $e){
	            echo "Error code: ".$e->getCode()." Message: ".$e->getMessage()."<br/>";
	    }
    }  

    $title = "Create";
    $header = "Create";
    include 'templates/head.php';   
?>

	<h1><?php echo $header; ?></h1>

 <main class="container">
	<form action="" method="POST" enctype="multipart/form-data" class="content">
	    <label for="image">Image:</label>   
	    <input type="file" name="image"/><br/>
		<label for="name">Name:</label>
	    <input type="text" name="name" placeholder="Name"/><br/>
		<label for="description">Description:</label>
	    <input type="text" name="description" placeholder="Description"/><br/>
	    <input type="submit" name="upload" value="Upload"/>
	    <hr/>
	</form>
	
</main>
   
<?php
    include 'templates/footer.php';
?>