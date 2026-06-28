<?php

    session_start();

    include '../../connection/connection.php';

    if(isset($_POST['login'])){

        $postUsername = $_POST['admin-name'];
        $postPassword = $_POST['admin-passwd'];

        try{

            $query = "SELECT admin_id, admin_name, admin_email, admin_passwd FROM admins WHERE admin_name = :adname";
            $stmt = $pdo->prepare($query);
            $data = [
                ':adname'=>$postUsername
            ];
            $stmt->execute($data);
            $row = $stmt->fetch(PDO::FETCH_OBJ);
            $count = $stmt->rowCount();


            if  ($count > 0 && password_verify($postPassword, $row->admin_passwd)){
             
                $_SESSION['adminName'] = $row->admin_name;
                header("Location: ../../../admins/insert_user");

            } else if($count > 0 && $postPassword == $row->admin_passwd){

                $_SESSION['hash'] = 'Hash your password!';
                $_SESSION['active_form'] = 'hashed';

            } else {

                $_SESSION['login_error'] = 'Wrong username or password!';
                $_SESSION['active_form'] = 'login';
            }
                       
        }catch(PDOException $e){
                echo "Error code: ".$e->getCode()." Message: ".$e->getMessage()."<br/>";
        }
        
        header("Location: ../../../admins/insert_user"); 
        exit();
        
    }

?>    
    


    
    