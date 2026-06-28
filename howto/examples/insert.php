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
                echo '<option value="'.$fileName.'"data-tokens="'.$fileName.'"">'.$fileName.'</option>';      
            } 
    }
    
    include '../assets/connection/connection.php';

    if(isset($_POST['submit'])) {

        $msg = "";

        $iName = $_POST['fileName'];
        $iText = $_POST['fileText'];

        

        try {
    
            $query_insert = "INSERT INTO php_text (file_name, file) VALUES (:title, :text)";
            $stmt_insert = $pdo->prepare($query_insert);
            $data_insert = [
                ':title'=>$iName,
                ':text'=>$iText
            ];
            $stmt_insert->execute($data_insert);

            $msg = "Text inserted!";

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
    <title>Insert</title>
</head>
<body>

    <main >

        <h2>Insert</h2>
        <?php echo $msg ?>

           
        <form action="" method="POST">
            <search >
                <select name="fileName" data-live-search="true" data-header="Search" data-width="auto" data-size="5">
                    <option>Search...</option>
                    <?php search_files()?>
                </select>
           </search> 
            <div>
                <textarea id="insert" name="fileText" placeholder="Insert text" rows=30% cols=43%></textarea>
                <input type="submit" class="btn" name="submit" value="Submit" />
            </div>
        </form>

    </main>

</body>
</html>


