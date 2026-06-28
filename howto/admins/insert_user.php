 <?php

    include '../assets/connection/connection.php';
    include '../assets/queries/admins/insert_user_inc.php';
    include '../assets/queries/admins/all_users_inc.php';

    session_start();
    if(!isset($_SESSION['adminName'])) {
        header("location: admin_login.php?Login error!");
        exit();
    }
       
    $title="Admin Page";
    $header="Insert User";

    include '../assets/templates/head_admin.php';
    include '../assets/templates/header_admin.php';
    
?>

    <div class="container">
        <div class="box">
            <form action="" method="POST">
                <h2><?php echo $header; ?></h2>
                <p class="session" >Admin <?=$_SESSION['adminName'];?></p>
                <?php 
                    if(!empty($insertMsg)) {
                ?>
                    <p class="message"><?php echo $insertMsg;?></p>
                <?php
                    }
                ?>
                <input class="alert-msg" type="text" name="user-name" placeholder="User Name <?php echo $errorName; ?><?php echo $errorUMsg; ?>">
                <input class="alert-msg" type="email" name="user-email" placeholder="Email <?php echo $validEmail; ?><?php echo $errorEmail ;?><?php echo $errorEMsg; ?>">
                <input class="alert-msg" type="password" name="user-password" placeholder="Password <?php echo $emptyPass; ?><?php echo $errorCht; ?><?php echo $errorString; ?><?php echo $errorInt ?>">
                <input class="alert-msg" type="password" name="repeat-password" placeholder="Repeat Password <?php echo $errorRepeat; ?><?php echo $errorMatch; ?>">
                <button type="submit" name="insert">Insert</button>
            </form>
        </div>
        <button type="button" name="select" onclick="window.location.href='all_users'">All Users</button>
        <button onclick="window.location.href='logout'">Logout</button>
    </div>

<?php

    include '../assets/templates/footer.php';

?>
