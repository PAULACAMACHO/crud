<?php

    function search_files(){

        include '../assets/connection/connection.php';
            
        $query = "SELECT img_id, img, file_name, img_descr, create_at FROM php_img";

        $stmt = $pdo->prepare($query);
        $stmt->execute();
        $imgs = $stmt->fetchAll(PDO::FETCH_OBJ);

            foreach ($imgs as $img) {
                $id = $img->img_id;
                $fileName = $img->file_name;
                echo '<option value="'.$id.'"data-tokens="'.$fileName.'"">'.$fileName.'</option>';      
            } 
    }   

?>

<?php

    include '../assets/connection/connection.php';

    if(isset($_POST['search'])) {

        $id = $_POST['theID'];

        try {
            
        $query = "SELECT img_id, img, file_name, img_descr, create_at FROM php_img WHERE img_id = '$id' LIMIT 1";

        $stmt = $pdo->prepare($query);
        $stmt->execute();
        $img = $stmt->fetch(PDO::FETCH_OBJ);
?>
        <p>Image ID: <?php echo $img->img_id; ?></p>
        <a href="view?imgID=<?php $img->img_id ?>"><?php echo '<img width="675px;" src="../images/'.$img->img.'"/>' ?></a>
        <p>File Name: <?php echo $img->file_name; ?></p>
        <p>Imade Description: <?php echo $img->img_descr; ?></p>
        <p>Create at: <?php echo $img->create_at; ?></p>
<?php        
        } catch(PDOException $e){
                echo "Error code: ".$e->getCode()." Message: ".$e->getMessage()."<br/>";
        }
    }

?>

<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>Search</title>
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-select@1.13.14/dist/css/bootstrap-select.min.css">
</head>
<body>

	<search>
        <form action="" method="POST">
            <select name="theID" class="selectpicker show-tick" data-live-search="true" data-header="Search" data-width="auto" data-size="3">
                <option>Search...</option>
                <?php search_files()?>
            </select>
            <button class="btn" type="submit" name="search">Search</button>
        </form>
    </search>    

	<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>
   	<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap-select@1.13.14/dist/js/bootstrap-select.min.js"></script>

</body>
</html>
