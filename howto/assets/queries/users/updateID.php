  <?php

    include 'getID.php';

    if(isset($_POST['updImg'])){

        $msg = '';

        unlink("../images/".$img->img."");

        $tmp_name = $_FILES['image']['tmp_name'];
        $name = $_FILES['image']['name'];
        
        try {

            $query_update = "UPDATE php_img SET img = :img WHERE img_id = :imgID";
            $stmt_update = $pdo->prepare($query_update);
            $data_update = [
                ':imgID'=>$imgID,
                ':img'=>$name
            ];
            $stmt_update->execute($data_update);

            move_uploaded_file($tmp_name, "../../images/".$name);

            $msg = "File image updated!";
            header("Refresh:5");
            

        }catch(PDOException $e){
                        echo "Error code: ".$e->getCode()." Message: ".$e->getMessage()."<br/>";
                                  } 
    }

    if(isset($_POST['updName'])){

        $fname = $_POST['name'];
        $idescr = $_POST['description'];

        try {

            $query_update = "UPDATE php_img JOIN php_text ON php_img.file_name = php_text.file_name SET php_img.file_name = :fname, img_descr = :idescr, php_text.file_name = :fname WHERE img_id = :updID";
            $stmt_update = $pdo->prepare($query_update);
            $data_update = [
                ':updID'=>$imgID,
                ':fname'=>$fname,
                ':idescr'=>$idescr
            ];
            $stmt_update->execute($data_update);

            $msg = "File updated!";
            header("Refresh:5");

        }catch(PDOException $e){
            echo "Error code: ".$e->getCode()." Message: ".$e->getMessage()."<br/>";
        } 
    }  

    if(isset($_POST['updFile'])){

        $file = $_POST['fileText'];

        try {

            $query_update = "UPDATE php_text JOIN php_img ON php_text.file_name = php_img.file_name SET file = :f WHERE img_id = :updID";
            $stmt_update = $pdo->prepare($query_update);
            $data_update = [
                ':updID'=>$imgID,
                ':f'=>$file
            ];
            $stmt_update->execute($data_update);

            $msg = "File text updated!";

            header("Refresh:5");

        }catch(PDOException $e){
            echo "Error code: ".$e->getCode()." Message: ".$e->getMessage()."<br/>";
        } 
    }  
