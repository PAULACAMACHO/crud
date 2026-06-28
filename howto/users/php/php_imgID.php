<?php

    include '../../assets/queries/users/php/php_img_id_inc.php';

    $title="User Page";
    $header="PHP";

    include '../../assets/templates/head_user.php';
    include '../../assets/templates/header_user.php';
?>

    <div class="wrapper">

        <h2><?php echo $header; ?></h2>
         
    </div>

    <main class="main">
        <?php
            show_image();
        ?>
    </main>

<?php

    include '../../assets/templates/footer_user.php';

?>