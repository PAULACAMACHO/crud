<?php

    include '../assets/connection/connection.php';

    $noUser = '';

    if(isset($_POST['search'])) {

        $username = $_POST['username'];
    
        try {

            $query = "SELECT user_id, user_name, user_email, create_at FROM users WHERE user_name = :uname OR user_email = :uname";
            $stmt = $pdo->prepare($query);
            $data = [
                ':uname' => $username,
            ];
            $stmt->execute($data);
            $user = $stmt->fetch(PDO::FETCH_OBJ); 

            if($username != $user->user_name && $username != $user->user_email) {

                $noUser = "The user does not exists!";
                if(!empty($noUser)) {
            ?>
                <p class="error-message"><?php echo $noUser;?></p>
            <?php
                }

            }
           
?>
            <table>
                <tr>
                    <th>User ID</th>
                    <th>User Name</th>
                    <th>User Email</th>
                    <th>User Created</th>
                    <th>Remove</th>
                    <th>Modify</th>
                </tr>
                        
                <tr>
                    <td><?php echo $user->user_id; ?></td> 
                    <td><?php echo $user->user_name; ?></td> 
                    <td><?php echo $user->user_email; ?></td> 
                    <td><?php echo $user->create_at; ?></td> 
                    <td><a class="red" href="../assets/queries/admins/del_user_inc.php?userID=<?php echo $user->user_id; ?>"><i class="fa-regular fa-trash-can"></i></a></td>
                    <td><a class="green" href="edit_user.php?userID=<?php echo $user->user_id; ?>"><i class="fa-solid fa-pen-to-square"></i></a></td>
                </tr>
                
            </table>

    <?php      
                
        }catch(PDOException $e){
                echo "Error code: ".$e->getCode()." Message: ".$e->getMessage()."<br/>";
        } 

    }
    ?>