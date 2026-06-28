<?php

    include '../../assets/queries/users/php/php_imgs_inc.php';
    include '../../assets/queries/users/del_inc.php';

    $title="User Page";
    $header="PHP Files";

    include '../../assets/templates/head_user.php';
    include '../../assets/templates/header_user.php';
?>

      <div class="wrapper">

        <h2><?php echo $header; ?></h2>
         
     </div>

    <main class="main">

            <!--<table>
                <tr>
                    <th>Image ID</th>
                    <th>Image</th>
                    <th>Image Name</th>
                    <th>Description</th>
                    <th>Create At</th>

                </tr>-->

                <?php

                    //foreach ($imgs as $img) {

                ?>

                    <!--<tr>
                        <td><?php //echo $img->img_id; ?></td>
                        <td><?php //echo '<img width="200px;" src="images/'.$img->img.'"/>' ?></td>
                        <td><?php //echo $img->file_name; ?></td>
                        <td><?php //echo $img->img_descr; ?></td>
                        <td><?php //echo $img->create_at; ?></td>
                    </tr>-->
                           
                <?php
                       
                    //} 
             
                ?>

            <!--</table>-->

            
            <?php
                show_images();
            ?>
</main>

<?php

    include '../../assets/templates/footer_user.php';

?>