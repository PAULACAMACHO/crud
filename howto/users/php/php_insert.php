<?php

    include '../../assets/queries/users/getID.php';
    include '../../assets/queries/users/php/php_insert_inc.php';

    $title="User Page";
    $header="PHP Insert";

    include '../../assets/templates/head_user.php';
    //include '../../assets/templates/header_user.php';
    include '../../assets/templates/header_search.php';
?>
    
      <div class="wrapper">

        <h2><?php echo $header; ?></h2>
        <h3><?php echo $msg ?></h3>  
         
     </div>

    <main class="main">

        <form action="" method="POST">
            <div>
                <br/>
                <label class="label" for="name"><em>File name: </em></label>
                <input type="text" name="fileName" class="name" value = "<?php echo $img->file_name; ?>" placeholder="File name">
            </div>
            <br/>
            <label class="label" for="name"><em>File: </em></label>
            <div>
                <textarea id="insert" name="fileText" placeholder="Insert text" rows=30% cols=43%><?php echo $img->file; ?></textarea>
                <input type="submit" class="btns" name="submit" value="Insert"/>
            </div>      
        </form>
            <button class="btns" onclick="window.location.href='php'">&laquo; PHP</button>
            <button class="btns" onclick="window.location.href='php'">&laquo; Cancel</button>

    </main>

<?php

    include '../../assets/templates/footer_user.php';

?>