<?php

    include 'updateID.php';

?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Update</title>
</head>
<body>

 <form action="updateID.php?imgID=<?php echo $imgID;?>" method="POST" enctype="multipart/form-data">
        <div>
        <?php echo '<img width="30%;" src="../images/'.$img->img.'"/>'; ?>
        <label for="image">Image:</label>   
            <input type="file" name="image">
        </div>
        <div>
            <input type="text" name="name" value = "<?php echo $img->file_name; ?>" placeholder="Image name">
        </div>
        <div>
            <input type="text" name="description" value = "<?php echo $img->img_descr; ?>" placeholder="Image description">
        </div> 
         <input type="submit" name="update" value="Update"/>
    </form>

        
    
</body>
</html>
 



