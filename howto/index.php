<?php

   include 'assets/queries/users/user_login_inc.php';

    $title="User Page";
    $header="User Login";

    include 'assets/templates/head_user.php';
    //include 'assets/templates/header_user.php';
    
?>

        <div class="wrapper">
            <form action="" method="POST">
                <h2><?php echo $header; ?></h2>
                <?php echo $ErrMess ?>
                <div class="input-box">
                    <input type="text" name="user-name" placeholder="Username" required>
                    <i class='bxds bx-user'></i> 
                </div>
                <div class="input-box">
                    <input type="password" name="user-password" placeholder="Password" required>
                    <i class='bxds bx-lock'></i> 
                </div>
                <button type="submit" class="btn" name="login">Login</button>
            </form>
        </div>

