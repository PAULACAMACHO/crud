<?php


    session_start();
    if(!isset($_SESSION['adminName'])) {
        header("location: admin_login.php?Login error!");
        exit();
    }

    $title="Admin Page";
    $header="User Selected";

    include '../assets/templates/head_admin.php';
    include '../assets/templates/header_admin.php';
?>

    <div class="container">
        <div class="user_box">
            <h2><?php echo $header; ?></h2>

            <?php 
                include '../assets/queries/admins/select_user_inc.php';
            ?> 

        </div>
        <button onclick="window.location.href='all_users'">&laquo; Previous</button>
        <button onclick="window.location.href='insert_user'">Insert User</button>
        <button onclick="window.location.href='logout'">Logout</button>
    </div>

<?php

    include '../assets/templates/footer.php';

?>