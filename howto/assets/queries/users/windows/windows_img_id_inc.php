
<?php
    function show_image(){
        include '../../assets/connection/connection.php';

        $empty = "";

        if(isset($_GET['imgID'])){

            $imgID = $_GET['imgID'];
        
            try {


                $query = "SELECT img_id, img, windows_img.file_name, img_descr, windows_img.create_at, text_id, windows_text.file_name, file, windows_text.create_at FROM windows_img INNER JOIN windows_text ON windows_img.file_name = windows_text.file_name WHERE img_id = :iID";
                $stmt = $pdo->prepare($query);
                $data = [
                    ':iID'=>$imgID
                ];
                $stmt->execute($data);
                $img = $stmt->fetch(PDO::FETCH_OBJ);

                if(empty($img->file)) {

                    $query = "SELECT img_id, img, file_name, img_descr, create_at FROM windows_img WHERE img_id = :iID";
                    $stmt = $pdo->prepare($query);
                    $data = [
                        ':iID'=>$imgID
                    ];
                    $stmt->execute($data);
                    $img = $stmt->fetch(PDO::FETCH_OBJ);
                }
?>
                    <div class="data_wrapper">

                        <p><em>Image ID: </em><?php echo $img->img_id; ?></p>
                        <figure>
                            <figcaption><em>Image:</em></figcaption>
                            <?php echo '<img width="100%;" src="../../../../images/'.$img->img.'"/>' ?>
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
                        <button class="previous_btn" onclick="window.location.href='windows'">&laquo; Previous</button>
                        <button class="previous_btn"><a href="../../../insert.php?imgID=<?php echo $img->img_id; ?>">&laquo; Insert</a></button>
                        <button class="previous_btn"><a href="../../../users/update.php?imgID=<?php echo $img->img_id; ?>">&laquo; Edit</a></button>
                        <button class="previous_btn"><a href="../assets/queries/users/del_inc?ID=<?php echo $img->img_id; ?>">&laquo; Delete</a></button>

                    </div>

<?php


            }catch(PDOException $e){
                    echo "Error code: ".$e->getCode()." Message: ".$e->getMessage()."<br/>";
            } 
        } 
    }   
?>