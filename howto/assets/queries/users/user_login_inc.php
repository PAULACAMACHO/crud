<?php

    session_start();

    include 'assets/connection/connection.php';

   $ErrMess = '';

    if(isset($_POST['login'])){

        $postUsername = $_POST['user-name'];
        $postPassword = $_POST['user-password'];
    
        try {

            $query = "SELECT user_name, user_email, user_passwd FROM users WHERE user_name = :uname";

            $stmt = $pdo->prepare($query);
            $data = [
                ':uname'=>$postUsername
            ];
            $stmt->execute($data);
            $row = $stmt->fetch(PDO::FETCH_OBJ);
            $count = $stmt->rowCount();
          
            if($count > 0 && password_verify($postPassword, $row->user_passwd)){

                $_SESSION['userName'] = $row->user_name;
                header("Location: ../../../users/home");
                
            }else{
                $ErrMess = '*Wrong Username or Password!';
            }


        }catch(PDOException $e){
                echo "Error code: ".$e->getCode()." Message: ".$e->getMessage()."<br/>";
        }  
    }
    