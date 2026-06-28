<?php

    include '../assets/functions/search_function.php';
    include '../assets/queries/users/img_inc.php';

    include '../assets/queries/users/user_login_inc.php';
    session_start();
    if(!isset($_SESSION['userName'])) {
        header("location: ../index.php?Login error!");
        exit();
    }

    $title="User Page";
    $header="Search";

    include '../assets/templates/head_search.php';
?>

    <div class="wrapper">

        <h2><?php echo $header; ?></h2>  
     
    </div>

    <main class="main">
       
        <search class="data_wrapper">
            <form action="img" method="POST">
                <select name="theID" class="selectpicker" data-live-search="true" data-header="Search" data-width="auto" data-size="3">
                    <option>Search...</option>
                    <?php php_search_files() ?>
                    <?php windows_search_files() ?>
                </select>
                <button class="btn" type="submit" name="search">Search</button>
            </form>
            <hr/>
            <button class="btn" onclick="window.location.href='home'">&laquo; Home</button>
            <button class="btn" onclick="window.location.href='upload'">&laquo; Upload</button>
            <button class="btn" onclick="window.location.href='insert'">&laquo; Insert</button> 
        </search>
            
    </main>

    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap-select@1.13.14/dist/js/bootstrap-select.min.js"></script>

<?php

    include '../assets/templates/footer_user.php';

?>