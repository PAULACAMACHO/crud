<?php

    function show_image(){
        
        include '../../assets/connection/connection.php';

        global $empty, $file_name; 

        $empty = "";
        $file_name = "";

        if(isset($_GET['imgID'])){

            $imgID = $_GET['imgID'];
        
            try {


                $query = "SELECT img_id, img, php_img.file_name, img_descr, php_img.create_at, text_id, php_text.file_name, file, php_text.create_at FROM php_img INNER JOIN php_text ON php_img.file_name = php_text.file_name WHERE img_id = :iID";
                $stmt = $pdo->prepare($query);
                $data = [
                    ':iID'=>$imgID
                ];
                $stmt->execute($data);
                $img = $stmt->fetch(PDO::FETCH_OBJ);

                $file_name = $img->file_name;
                ?>
                <div class="wrapper_file">
                    <h2><?php echo $file_name; ?></h2>
                </div>
<?php

                if(empty($img->file)) {

                    $query = "SELECT img_id, img, php_img.file_name, img_descr, create_at FROM php_img WHERE img_id = :iID";
                    $stmt = $pdo->prepare($query);
                    $data = [
                        ':iID'=>$imgID
                    ];
                    $stmt->execute($data);
                    $img = $stmt->fetch(PDO::FETCH_OBJ);

                    ?>
                    <div class="wrapper_file">
                        <h2><?php echo $file_name; ?></h2>
                        <h2><?php echo "No file!"; ?></h2>
                    </div>
<?php
                }

?>

                    <div class="data_wrapper">

                        <p><em>Image ID: </em><?php echo $img->img_id; ?></p>
                        <figure>
                            <figcaption><em>Image:</em></figcaption>
                            <?php echo '<img width="100%;" src="../../../../../images/'.$img->img.'"/>' ?>
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
                        <button class="previous_btn" onclick="window.location.href='php'">&laquo; Previous</button>
                        <button class="previous_btn"><a href="../../../users/php/php_insert?imgID=<?php echo $img->img_id; ?>">&laquo; Insert</a></button>
                        <button class="previous_btn"><a href="../../../users/php/php_update?imgID=<?php echo $img->img_id; ?>">&laquo; Edit</a></button>
                        <button class="previous_btn"><a onclick=checker() href="../../assets/queries/users/del_inc?ID=<?php echo $img->img_id; ?>">&laquo; Delete</a></button>
                       </div> 

<?php


            }catch(PDOException $e){
                    echo "Error code: ".$e->getCode()." Message: ".$e->getMessage()."<br/>";
            } 
        } 
    }   
?>

