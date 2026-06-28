<?php

    include 'admin_login_inc.php';

    if(isset($_POST['hashed'])){

        $postUsername = $_POST['admin-name'];
        $postPassword = $_POST['admin-passwd'];
        $hash = password_hash($postPassword, PASSWORD_DEFAULT);

        try{

            $query = "SELECT admin_id, admin_name, admin_email, admin_passwd FROM admins WHERE admin_name  = :adname";
            $stmt = $pdo->prepare($query);
            $data = [
                ':adname'=>$postUsername
            ];
            $stmt->execute($data);
            $row = $stmt->fetch(PDO::FETCH_OBJ);
            $count = $stmt->rowCount();
          
            if($count > 0 && $postPassword == $row->admin_passwd){

                $query2 = "UPDATE admins SET admin_passwd = :hash WHERE admin_name = :name";
                $stmt = $pdo->prepare($query2);
                $data = [
                ':hash'=>$hash, 
                ':name'=>$postUsername
                ];
                $stmt->execute($data);

                $_SESSION['hash_msg'] = 'Password hashed';
                $_SESSION['active_form'] = 'login';

            } else if($count > 0 && password_verify($postPassword, $row->admin_passwd)){
             
                $_SESSION['hashed_msg'] = 'Your password was already hashed';
                $_SESSION['active_form'] = 'login';

            } else {

                $_SESSION['hash_error'] = 'Wrong username or password!';
                $_SESSION['active_form'] = 'hashed'; 

            } 

        }catch(PDOException $e){
                echo "Error code: ".$e->getCode()." Message: ".$e->getMessage()."<br/>";
        }

        header("Location: ../../../admins/insert_user.php"); 
        exit();
    } 
?>
    