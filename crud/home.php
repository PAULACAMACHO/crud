<?php

    $title = "Home";
    $header = "Home";
    include 'templates/head.php'; 

?>
<h1><?php echo $header; ?></h1>
    <main class="container">
        <div id="page_up">
            <?php
                $dirname = "images/";
                $images = glob($dirname."*.png");

                foreach($images as $image) {
                    echo '<img width=30%, src="'.$image.'"/><br/>';
                }
            ?>
        </div>
    </main>

<?php
    include 'templates/footer.php';
?>