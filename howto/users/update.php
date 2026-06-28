<?php

    include '../assets/queries/users/updateID.php';

    include '../assets/queries/users/user_login_inc.php';
    session_start();
    if(!isset($_SESSION['userName'])) {
        header("location: ../index.php?Login error!");
        exit();
    }

    $title="User Page";
    $header="PHP Update";

    include '../assets/templates/head_user.php';
    include '../assets/templates/header_user.php';
?>
    
      <div class="wrapper">

        <h2><?php echo $header; ?></h2>  
         
     </div>

    <main class="main">

        <div class="data_wrapper">

        <form action="" method="POST" enctype="multipart/form-data">
            <div class="input-box">
                <figure>
                    <figcaption><em>Image:</em></figcaption><br/>
                    <?php echo '<img width="100%;" src="../../images/'.$img->img.'"/>'; ?>
                </figure>
                <input type="file" name="image"/>
            </div>
            <input type="submit" class="btn" name="updImg" value="Update"/>
    
            <div class="input-box">
                <br/>
                <label for="name"><em>File name: </em></label>
                <input type="text" name="name" value = "<?php echo $img->file_name; ?>" placeholder="Image name">
            </div>

            <div class="input-box">
                 <br/>
                <label for="description"><em>Image description: </em></label>
                <input type="text" name="description" value = "<?php echo $img->img_descr; ?>" placeholder="Image description">
            </div> 
            <input type="submit" class="btn" name="updName" value="Update"/>
        </form>
   
        <search>
        <form action="" method="POST">
            <br/>
            <label for="name"><em>File: </em></label>
            
            <div class="input-box">
                <textarea id="insert" name="fileText" placeholder="Insert text" rows=30% cols=43%><?php echo $img->file; ?></textarea>
            </div>
            <input type="submit" class="btn" name="updFile" value="Update"/>   
        </form>
        </search>
        <button class="btn" onclick="window.location.href='php/php'">&laquo; Cancel</button>

    </div>

</main>

<?php

    include '../assets/templates/footer_user.php';

?>


