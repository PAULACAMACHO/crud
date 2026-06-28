  <?php


    include 'getID.php';
        
    if(isset($_POST['update'])){

        unlink("../images/".$img->img."");

        $imgID = $_GET['imgID'];
        $tmp_name = $_FILES['image']['tmp_name'];
        $name = $_FILES['image']['name'];
        $fname = $_POST['name'];
        $idescr = $_POST['description'];

        try {

            $query_update = "UPDATE php_img SET img = :img, file_name = :fname, img_descr = :idescr WHERE img_id = :updID";
            $stmt_update = $pdo->prepare($query_update);
            $data_update = [
                ':updID'=>$imgID,
                ':img'=>$name,
                ':fname'=>$fname,
                ':idescr'=>$idescr
            ];
            $stmt_update->execute($data_update);
    
            if(move_uploaded_file($tmp_name, "../images/".$name)) {
                header("location: views");
            };

        }catch(PDOException $e){
                        echo "Error code: ".$e->getCode()." Message: ".$e->getMessage()."<br/>";
                                  } 
    }  