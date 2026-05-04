<?php
    $title = "Search";
    $header = "Search";
    include 'templates/head.php'; 
    
   

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


?>
<h1><?php echo $header; ?></h1>
 <main class="container">
    
     <form action="img.php" method="POST">
        <select name="theID" class="selectpicker" data-live-search="true" data-header="Search" data-width="auto" data-size="1">
            <option>Search...</option>
            <?php search_files()?>
        </select>
        <button type="submit" name="search">Search</button>
        <hr/>
    </form>
    
</main>
    
<?php
    include 'templates/footer.php';
?>