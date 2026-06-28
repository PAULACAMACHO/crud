<?php


    include '../assets/connection/connection.php';

    if(isset($_POST['upload'])) {

        $msg_error = '';
        $nmsg = '';
        $dmsg = '';


        $phpFileUploadErrors = array(
            0 => 'There is no error, the file uploaded with success!',
            1 => 'The uploaded file exceeds the upload_max_filesize directive in php.ini!',
            2 => 'The uploaded file exceeds the MAX_FILE_SIZE directive that was specified in the HTML form!',
            3 => 'The uploaded file was only partially uploaded!',
            4 => 'No file was uploaded!',
            6 => 'Missing a temporary folder!',
            7 => 'Failed to write file to disk.',
            8 => 'A PHP extension stopped the file upload.',
        );

        $ext_error = false;
        $extensions = array('jpg', 'jpeg', 'gif', 'png', 'pdf');
        //$extensions = array('png');

        $tmp_name = $_FILES['image']['tmp_name'];
        $name = $_FILES['image']['name'];
        $img_name = $_POST['name'];
        $img_description = $_POST['description'];

        $phpArray = ['php', 'PHP', 'Php'];
        $windowsArray = ['windows', 'WINDOWS', 'Windows'];

        $file_ext = explode('.', $name);
        $file_ext = end($file_ext);

        if (!in_array($file_ext, $extensions)){
            $ext_error = true;
        }
        $file_error = $_FILES['image']['error'];
        if ($file_error){
        ?> 
        <div> 
            <?php $msg = $phpFileUploadErrors[$file_error]; ?>
        </div> 
        <?php 
        }

        elseif ($ext_error){
        ?> 
        <div> 
            <?php echo "Invalid file extension! " . "Please upload files with these extensions only: ("; 
            foreach ($extensions as $key => $extension){
                echo ".".$extension." ";
            }
                echo ")";

            ?>

        </div> 

        <?php  
        } else if(empty($img_name)) {
                $nmsg = " can not be empty!";
        } else if(empty($img_description)) {
                $dmsg = " can not be empty!";
        } else {

            foreach ($phpArray as $array) {

                try {
            
                    if(str_contains($img_name,$array)) {

                        move_uploaded_file($tmp_name, "../images/".$name);              

                            $query = "INSERT INTO php_img (img, file_name, img_descr) VALUES (:i, :fn, :id)";

                            $stmt = $pdo->prepare($query);
                            $data = [
                                ':i' => $name, 
                                ':fn' => $img_name, 
                                ':id' => $img_description 
                            ];
                            $stmt->execute($data);

                            $msg = $phpFileUploadErrors[$file_error];
                            header("Refresh:5");
                            break;
                    }
                        

                        if(!str_contains($img_name,$array)) {

                            $msg_error = 'A PHP file name error!';
                            header("Refresh:5");
                            break;

                        }
                        
                    
                } catch(PDOException $e){
                            echo "Error code: ".$e->getCode()." Message: ".$e->getMessage()."<br/>";
                }
            }
        
        }
    
        

            foreach ($windowsArray as $array) {

                if(str_contains($img_name, $array)) {

                    move_uploaded_file($tmp_name, "../images/".$name);               

                    try {

                        $query = "INSERT INTO windows_img (img, file_name, img_descr) VALUES (:i, :fn, :id)";

                        $stmt = $pdo->prepare($query);
                        $data = [
                            ':i' => $name, 
                            ':fn' => $img_name, 
                            ':id' => $img_description 
                        ];
                        $stmt->execute($data);

                        $msg = $phpFileUploadErrors[$file_error];

                    }catch(PDOException $e){
                            echo "Error code: ".$e->getCode()." Message: ".$e->getMessage()."<br/>";

                    }
            
                }

            }        
    }

