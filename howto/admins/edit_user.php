<?php

    include '../assets/connection/connection.php';
    include '../assets/queries/admins/edit_user_inc.php';
    include '../assets/queries/admins/all_users_inc.php';

    session_start();
    if(!isset($_SESSION['adminName'])) {
        header("location: admin_login.php?Login error!");
        exit();
    }
       
    $title="Admin Page";
    $header="Update User";

    include '../assets/templates/head_admin.php';
    include '../assets/templates/header_admin.php';
    
?>

    <div class="container">
        <div class="box edit">
            <form action="" method="POST">
                <h2><?php echo $header; ?></h2>
                <p class="session" >Admin <?=$_SESSION['adminName'];?></p>
                <table>
                    <tr>
                        <td><input class="alert-msg" type="text" name="user-name" placeholder="User Name <?php echo $errorName; ?><?php echo $errorUMsg; ?>"></td>
                        <td><input type="submit" name="update-name"></td>
                    </tr>
    
                    <tr>
                        <td><input class="alert-msg" type="email" name="user-email" placeholder="Email <?php echo $validEmail; ?><?php echo $errorEmail ;?><?php echo $errorEMsg; ?>"></td>
                        <td><input type="submit" name="update-email"></td>
                    </tr>
                </table>
            </form>    
        </div>
        <button type="button" name="select" onclick="window.location.href='all_users'">All Users</button>
        <button onclick="window.location.href='logout'">Logout</button>
    </div>

<?php

    include '../assets/templates/footer.php';

?>
