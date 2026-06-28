<?php

    include '../assets/connection/connection.php';

    $errorName = '';
    $errorEmail = '';
    $validEmail = '';
    $errorUMsg = '';
    $errorEMsg = '';
    $insertName = '';
    $insertEmail = '';

    if(isset($_POST['update-name'])) {

        $id = $_GET['userID'];
        $uname = $_POST['user-name'];
    
        try {

            $query_select = "SELECT user_name FROM users WHERE user_name = :uname";
            $stmt_select = $pdo->prepare($query_select);
            $data_select = [
                ':uname'=>$uname
            ];
            $stmt_select->execute($data_select);
            $row = $stmt_select->fetch(PDO::FETCH_OBJ);

            if($row->user_name == $uname) {

                $errorUMsg = "already exists!";

            } else {

                $query = "UPDATE users SET user_name = :uname WHERE user_id = :uid";
                $stmt = $pdo->prepare($query);
                $data = [
                    ':uid'=>$id,
                    ':uname'=>$uname                          
                ];
                $stmt->execute($data);
                $user = $stmt->fetch(PDO::FETCH_OBJ);

                $insertName = "Name inserted with success!";
                header("Location: all_users");
            } 
             
        }catch(PDOException $e){
                echo "Error code: ".$e->getCode()." Message: ".$e->getMessage()."<br/>";
        } 

    }
       
    if(isset($_POST['update-email'])) {
        $id = $_GET['userID'];
            $uemail = $_POST['user-email'];

        try{

                $query_select = "SELECT user_email FROM users WHERE user_email = :uemail";
                $stmt_select = $pdo->prepare($query_select);
                $data_select = [
                    ':uemail'=>$uemail
                ];
                $stmt_select->execute($data_select);
                $row = $stmt_select->fetch(PDO::FETCH_OBJ);

                if ($row->user_email == $uemail) {

                    $errorEMsg = "already exists!";

                } else {

                    $query = "UPDATE users SET user_email = :uemail WHERE user_id = :uid";
                    $stmt = $pdo->prepare($query);
                    $data = [
                        ':uid'=>$id, 
                        ':uemail'=>$uemail
                    ];
                    $stmt->execute($data);
                    $user = $stmt->fetch(PDO::FETCH_OBJ);

                    $insertEmail = "Email inserted with success!";
                    header("Location: all_users");
                }
        
        }catch(PDOException $e){
                echo "Error code: ".$e->getCode()." Message: ".$e->getMessage()."<br/>";
        } 

    }
        
    ?>