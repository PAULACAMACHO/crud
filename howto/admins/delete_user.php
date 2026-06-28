<?php

    include '../assets/queries/admins/select_user_inc.php';
    include '../assets/queries/admins/del_user_inc.php';

    session_start();
    if(!isset($_SESSION['adminName'])) {
        header("location: admin_login.php?Login error!");
        exit();
    }

    $title="Admin Page";
    $header="User Deleted";

    include '../assets/templates/head_admin.php';
    include '../assets/templates/header_admin.php';
?>
<?php echo $deletMsg;?>
    <div class="container">
        <div class="user_box">
            <h2><?php echo $header; ?></h2>     
            <p class="message"><?php echo "User deleted with success!";?></p>
        </div>
        <button onclick="window.location.href='all_users'">Search</button>
        <button onclick="window.location.href='insert_user'">Insert User</button>
        <button onclick="window.location.href='logout'">Logout</button>
    </div>

<?php

    include '../assets/templates/footer.php';

?>