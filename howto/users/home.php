<?php

    include '../assets/queries/users/user_login_inc.php';
    session_start();
    if(!isset($_SESSION['userName'])) {
        header("location: ../index.php?Login error!");
        exit();
    }


    $title="User Page";
    $header="Home";

    include '../assets/templates/head_user.php';
    include '../assets/templates/header_user.php';
?>
  <div class="wrapper">

        <h2><?php echo $header; ?></h2>  
     
    </div>
<main class="main">
    
 <div class="data_wrapper_home">
        <?php

        $dirname = "../images/";
        $images = glob($dirname."*.png");

        foreach($images as $image) { 
            echo '<img width= 30%, src="'.$image.'" /><br />';
        }
                
?>
 </div>

</main>
    

<?php

    include '../assets/templates/footer_user.php';

?>