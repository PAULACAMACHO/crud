<?php
    $title = "Insert";
    $header = "Text";
    include 'templates/head.php'; 
    
   

 	function search_files(){

        include 'dbexamples.php';

        $query = "SELECT file_name FROM img";
        $stmt = $pdo->prepare($query);
        $stmt->execute();
        $imgs = $stmt->fetchAll(PDO::FETCH_OBJ);

            foreach ($imgs as $img) {
            	$fileName = $img->file_name;
                echo '<option value="'.$fileName.'"data-tokens="'.$fileName.'"">'.$fileName.'</option>';      
            } 
    } 

    include 'dbexamples.php';
    
    if(isset($_POST['insert'])){

        $fname = $_POST['filename'];
        $file = $_POST['text'];

        try {

	        $query = "INSERT INTO text (file_name, file) VALUES (:fn, :f)";

	        $stmt = $pdo->prepare($query);
	        $data = [
	            ':fn' => $fname, 
	            ':f' => $file 
	        ];
	        $stmt->execute($data);

            echo "Success! Text has been inserted!"; 

	    }catch(PDOException $e){
	            echo "Error code: ".$e->getCode()." Message: ".$e->getMessage()."<br/>";
	    }

    }


?>
<h1><?php echo $header; ?></h1>
 <main class="container">
   
     <form action="" method="POST">
        <select name="filename" class="selectpicker" data-live-search="true" data-header="Search" data-width="auto" data-size="1">
            <option>Search...</option>
            <?php search_files()?>
        </select><br/>
        <hr/>
        <textarea name="text" rows="20" cols="50"></textarea><br/>
        <button type="submit" name="insert">Submit</button>
        <hr/>
    </form>
    
</main>
    
<?php
    include 'templates/footer.php';
?>