<?php

    include '../assets/queries/users/insert_inc.php';
    include '../assets/functions/insert_function.php';

    include '../assets/queries/users/user_login_inc.php';
    session_start();
    if(!isset($_SESSION['userName'])) {
        header("location: ../index.php?Login error!");
        exit();
    }

    $title="User Page";
    $header="Insert";

    include '../assets/templates/head_search.php';
?>

    <div class="wrapper">

        <h2><?php echo $header; ?></h2>
        <h3><?php echo $msg ?></h3>  
     
    </div>

    <main class="main">
        
            <form action="" method="POST">
            <search >
                <h2 class="title">Title</h2>
                <select name="fileName" class="selectpicker" data-live-search="true" data-header="Search" data-width="auto" data-size="5">
                    <option>Insert title...</option>
                    <?php php_search_files() ?>
                    <?php windows_search_files() ?>
                </select>
           </search>
            <div>
                <textarea id="insert" name="fileText" placeholder="Insert text" rows=30% cols=43%></textarea>
                <input type="submit" class="btns" name="submit" value="Insert"/>
            </div>
            </form>
            <button class="btns" onclick="window.location.href='home'">&laquo; Home</button>
            <button class="btns" onclick="window.location.href='upload'">&laquo; Upload</button>
            <button class="btns" onclick="window.location.href='search'">&laquo; Search</button> 
                      
    </main>

    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap-select@1.13.14/dist/js/bootstrap-select.min.js"></script>

<?php

    include '../assets/templates/footer_user.php';

?>
