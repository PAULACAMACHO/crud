<?php

   include '../assets/queries/users/upload_img_inc.php';

   include '../assets/queries/users/user_login_inc.php';
    session_start();
    if(!isset($_SESSION['userName'])) {
        header("location: ../index.php?Login error!");
        exit();
    }

    $title="User Page";
    $header="Upload";

    include '../assets/templates/head_user.php';
    include '../assets/templates/header_user.php';
?>
    <div class="wrapper">
        <h2><?php echo $header; ?></h2>
        <h5><?php echo $msg; ?></h5>
        <h5><?php echo $msg_error; ?></h5> 
    </div>

    <main class="main">
        <div class="data_wrapper">
            <form action="" method="POST" enctype="multipart/form-data">
                <div class="input-box">
                <label for="image">Image:</label>
                    <input type="file" name="image">
                </div> 
                <div class="input-box">  
                    <input class="input-box" type="text" name="name" placeholder="File Name <?php echo $nmsg ?>">
                </div> 
                <div class="input-box">
                    <input class="input-box" type="text" name="description" placeholder="File Description <?php echo $dmsg ?>">
                </div> 
                <input type="submit" class="btn" name="upload">
            </form>    
        </div>
 </main>

<?php

    include '../assets/templates/footer_user.php';

?>