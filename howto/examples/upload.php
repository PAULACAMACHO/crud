<?php


    include '../assets/connection/connection.php';

    if(isset($_POST['upload'])) {

	    $phpFileUploadErrors = array(
	        0 => 'There is no error, the file uploaded with success',
	        1 => 'The uploaded file exceeds the upload_max_filesize directive in php.ini',
	        2 => 'The uploaded file exceeds the MAX_FILE_SIZE directive that was specified in the HTML form',
	        3 => 'The uploaded file was only partially uploaded',
	        4 => 'No file was uploaded',
	        6 => 'Missing a temporary folder',
	        7 => 'Failed to write file to disk.',
	        8 => 'A PHP extension stopped the file upload.',
	    );

        $ext_error = false;
        $extensions = array('jpg', 'jpeg', 'gif', 'png', 'pdf');

        $tmp_name = $_FILES['image']['tmp_name'];
        $name = $_FILES['image']['name'];
        $img_name = $_POST['name'];
        $img_description = $_POST['description'];

        $file_ext = explode('.', $name);
        $file_ext = end($file_ext);

	    if (!in_array($file_ext, $extensions)){
	        $ext_error = true;
	    }
	    $file_error = $_FILES['image']['error'];
	    if ($file_error){
	    ?> 
	    	<div> 
	    		<?php echo $phpFileUploadErrors[$file_error]; ?>
	        </div> 
	    <?php 
	    }
	    elseif ($ext_error){
	    ?> 
	        <div> 
	        	<?php echo "Invalid file extension! " . "Please upload files with these extensions only: ("; 
		        foreach ($extensions as $key => $extension){
		            echo ".".$extension." ";
		        }
		        	echo ")";
		        ?> 
	    	</div> 
	   	<?php  
	    }
	    else {
	    ?>
	        <div> 
	        <?php 
		        move_uploaded_file($tmp_name, "../images/".$name); 
		        echo "Success! Image has been uploaded!";
	        ?>
	        </div>
	    <?php
	    }        

	    try {

	        $query = "INSERT INTO php_img (img, file_name, img_descr) VALUES (:i, :fn, :id)";

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
?>

<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>Upload</title>
</head>
<body>

	<form action="" method="POST" enctype="multipart/form-data">
	    <div class="input-box">
	    <label for="image">Image:</label>   
	        <input type="file" name="image">
	    </div> 
	    <div class="input-box">
	        <input class="input-box" type="text" name="name" placeholder="Name">
	    </div> 
	    <div class="input-box">
	        <input class="input-box" type="text" name="description" placeholder="Description">
	    </div> 
	    <input type="submit" class="btn" name="upload">
	</form>
         
</body>
</html>
