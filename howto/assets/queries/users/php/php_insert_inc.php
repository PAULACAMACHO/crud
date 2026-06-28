<?php


    include '../../../assets/connection/connection.php';
    include '../getID.php';

    if(isset($_POST['submit'])) {

            try {

                $iName = $_POST['fileName'];
                $iText = $_POST['fileText']; 

                $query = "SELECT file_name, file FROM php_text WHERE file_name = :iName";
                $stmt = $pdo->prepare($query);
                $data = [
                    ':iName'=>$iName
                ];
                $stmt->execute($data);
                $text = $stmt->fetch(PDO::FETCH_OBJ);
     
                if(!empty($text->file)) {

                    $msg = "Text is alredy inserted!";

                } else {

                    $query_insert = "INSERT INTO php_text (file_name, file) VALUES (:title, :text)";
                    $stmt_insert = $pdo->prepare($query_insert);
                    $data_insert = [
                        ':title'=>$iName,
                        ':text'=>$iText
                    ];
                    $stmt_insert->execute($data_insert);

                    $msg = "Text inserted!";
                    header("Refresh:1");   

                }

            } catch(PDOException $e){
                    echo "Error code: ".$e->getCode()." Message: ".$e->getMessage()."<br/>";
            }
        }
