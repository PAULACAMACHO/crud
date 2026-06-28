<?php

    include '../assets/queries/admins/all_users_inc.php';
    include '../assets/queries/admins/select_user_inc.php';
    include '../assets/queries/admins/del_user_inc.php';
    include '../assets/queries/admins/edit_user_inc.php';

    session_start();
    if(!isset($_SESSION['adminName'])) {
        header("location: admin_login.php?Login error!");
        exit();
    }

    $title="Admin Page";
    $header="All Users";

    include '../assets/templates/head_admin.php';
    include '../assets/templates/header_admin.php';
?>

    <div class="wrapper">
        <div class="user_search"> 
            <search>
                <form action="select_user" method="POST">
                    <input type="text" name="username" placeholder="Search User">
                    <button type="submit" name="search">Search</button>
                </form>
            </search>
        </div>
        <div class="user_box">
            <h2><?php echo $header; ?></h2>

            <?php 
                if(!empty($insertName)) {
            ?>
                <p class="message"><?php echo $insertName;?></p>
            <?php
                }
            ?>
            <?php 
                if(!empty($insertEmail)) {
            ?>
                <p class="message"><?php echo $insertEmail;?></p>
            <?php
                }
            ?>

            <table>
                <tr>
                    <th>User ID</th>
                    <th>User Name</th>
                    <th>User Email</th>
                    <th>User Created</th>
                </tr>

            <?php 
                foreach($rows as $row){
            ?>
                        
                <tr>
                    <td><?php echo $row->user_id; ?></td> 
                    <td><?php echo $row->user_name; ?></td> 
                    <td><?php echo $row->user_email; ?></td> 
                    <td><?php echo $row->create_at; ?></td> 
                </tr>                         
            <?php
                }
            ?>
             </table>
        </div>
        <button onclick="window.location.href='insert_user'">Insert</button>
        <button onclick="window.location.href='logout'">Logout</button>
    </div>

<?php

    include '../assets/templates/footer.php';

?>