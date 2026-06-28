<?php

    include '../connection/connection.php';

    $errorName = '';
    $errorEmail = '';
    $validEmail = '';
    $errorUMsg = '';
    $errorEMsg = '';
    $emptyPass = '';
    $errorCht = '';
    $errorString = '';
    $errorInt = '';
    $errorRepeat = '';
    $errorMatch = '';
    $insertMsg = '';

    if(isset($_POST['insert'])){

        $postUsername = $_POST[ 'user-name'];
        $postUseremail = $_POST['user-email'];
        $postPassword = $_POST['user-password'];
        $repeatPassword = $_POST['repeat-password'];
        $options = ['cost'=>13,];
        $passwdHash = password_hash($postPassword, PASSWORD_DEFAULT, $options);

        try {

        if(empty($postUsername)) {
            $errorName = "is required!";
        }

        else if(empty($postUseremail)) {
            $errorEmail = "is required!";
        }

        else if(!filter_var($postUseremail, FILTER_VALIDATE_EMAIL)) {
            $validEmail = "@ Valid email is required!";
        }

        else if(empty($postPassword)) {
            $emptyPass = "is required!";
        }

        /*elseif(!filter_var($_POST['user-email'], FILTER_VALIDATE_EMAIL)) {
            die("Valid email is required!");
        }*/
   
        else if(strlen($postPassword) < 8) {
            $errorCht = "must be at least 8 characters!";
        }

        else if(!preg_match("/[a-z]/i", $postPassword)) {
            $errorString = "must contail at least one letter!";
        }

        else if(!preg_match("/[0-9]/", $postPassword)) {
            $errorInt = "must contain at least one number!";
        }

        else if(empty($repeatPassword)) {
            $errorRepeat = "is required!";
        }

        else if($postPassword !== $repeatPassword){
            $errorMatch = "= Passwords must match!";
        }
        
        else {

            $postUseremail = $_POST['user-email'];

            $query_select = "SELECT user_name, user_email FROM users WHERE user_name = :uname OR user_email = :uemail";
            $stmt_select = $pdo->prepare($query_select);
            $data_select = [
                ':uname'=>$postUsername, 
                ':uemail'=>$postUseremail
            ];
            $stmt_select->execute($data_select);
            $row = $stmt_select->fetch(PDO::FETCH_OBJ);

                if($row->user_name == $postUsername) {

                    $errorUMsg = "already exists!";

                } else if ($row->user_email == $postUseremail) {

                    $errorEMsg = "already exists!";

                } else{

                    $query_insert = "INSERT INTO users (user_name, user_email, user_passwd) VALUES (:uname, :uemail, :upasswd)";
                    $stmt_insert = $pdo->prepare($query_insert);
                    $data_insert = [
                        ':uname'=>$postUsername,
                        ':uemail'=>$postUseremail,
                        ':upasswd'=>$passwdHash
                    ];
                    $stmt_insert->execute($data_insert);

                    $insertMsg = "User inserted with success!";

                    //header("Location: insert_user.php");  
                } 
            }             

        }catch(PDOException $e){
                echo "Error code: ".$e->getCode()." Message: ".$e->getMessage()."<br/>";
        }
             
        //header("Location: insert_user.php"); 
        //exit();
        
    }
    