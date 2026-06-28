<?php

    include '../../assets/queries/users/windows/windows_imgs_inc.php';


    $title="User Page";
    $header="Windows Images";

    include '../../assets/templates/head_user.php';
    include '../../assets/templates/header_user.php';
?>

    <div class="wrapper">
        <h2><?php echo $header; ?></h2>
        <h5><?php echo $msgDel; ?></h5>       
    </div>

    <main class="main">
        <?php
            show_images();
        ?>
    </main>    
    

<?php

    include '../../assets/templates/footer_user.php';

?>