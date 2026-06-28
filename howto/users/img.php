<?php

    include '../assets/queries/users/del_inc.php';
    include '../assets/queries/users/img_inc.php';

    
    include '../assets/queries/users/user_login_inc.php';
    session_start();
    if(!isset($_SESSION['userName'])) {
        header("location: ../index.php?Login error!");
        exit();
    }

    $title="User Page";
    $header="View";

    include '../assets/templates/head_user.php';
    include '../assets/templates/header_user.php';
?>
    
    <div class="wrapper">
        <h2><?php echo $header; ?></h2>  
    </div>

    <main class="main">
        <div class="data_wrapper">
            <p><em>Image ID: </em><?php echo $img->img_id; ?></p>
            <figure>
                <figcaption><em>Image:</em></figcaption>
                <?php echo '<img width="100%;" src="../../images/'.$img->img.'"/>'; ?>
            </figure>
            <p><em>File name: </em><?php echo $img->file_name; ?></p>
            <p><em>Image description: </em><?php echo $img->img_descr; ?></p>
            <p><em>Create at: </em><?php echo $img->create_at; ?></p>
            <?php if(empty($img->file)) {?>
                <p><em>Explenation: </em>No File!</p>
            <?php } else { ?>
               <p><em>Explenation: </em><?php echo $img->file; ?></p>
            <?php
                }
            ?>
            <hr/>
            <button class="previous_btn" onclick="window.location.href='search'">&laquo; Previous</button>
            <button class="previous_btn" onclick="window.location.href='insert'">&laquo; Insert</button>
            <button class="previous_btn"><a href="update?imgID=<?php echo $img->img_id; ?>">&laquo; Edit</a></button>
            <button class="previous_btn"><a onclick=checker() href="../assets/queries/users/del_inc?ID=<?php echo $img->img_id; ?>">&laquo; Delete</a></button>
        </div>
    </main>

<?php

    include '../assets/templates/footer_user.php';

?>