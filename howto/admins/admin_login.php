<?php

    session_start();

    $errors = [
    'login' => $_SESSION['login_error'] ?? '',// $_SESSION['login_error'] = 'Wrong username or password!';
    'hashed' => $_SESSION['hash_error'] ?? ''// $_SESSION['hash_error'] = 'Wrong username or password!';
    ];

    $msgs = [
        'message_hash' => $_SESSION['hash_msg'] ?? '',// $_SESSION['hash_msg'] = 'Password hashed';
        'message_hashed' => $_SESSION['hashed_msg'] ?? ''// $_SESSION['hashed_msg'] = 'Your password was already hashed';
    ];

    $amsgs = [
        'message' => $_SESSION['hash'] ?? ''//$_SESSION['hash'] = 'Hash your password!';
    ];

    $activeForm = $_SESSION['active_form'] ?? 'login';

    session_unset();

    function showError($error) {
        return !empty($error) ? "<p class='error-message'>$error</p>" : '';
    }

    function showMsg($msg) {
    return !empty($msg) ? "<p class='message'>$msg</p>" : '';
    }

    function showAlertMsg($amsg) {
    return !empty($amsg) ? "<p class='alert-message'>$amsg</p>" : '';
    }

    function isActiveForm($formName, $activeForm) {
        return $formName ===  $activeForm ? 'active'  : '';
    }

    $title="Admin Page";
    $header="Admin Login";
    $header2="Password Hash";
    
    include '../assets/templates/head_admin.php';

?>

     <div class="container">
        <div class="form-box <?= isActiveForm('login', $activeForm); ?> " id="login-form">
            <form action="../assets/queries/admins/admin_login_inc.php" method="POST">
                <h2><?php echo $header; ?></h2>
                <?= showError($errors['login']); ?>
                <?= showMsg($msgs['message_hash']); ?>
                <?= showMsg($msgs['message_hashed']); ?>
                <input type="text" name="admin-name" placeholder="Username" required>
                <input type="password" name="admin-passwd" placeholder="Password" required>
                <button type="submit" name="login">Login</button>
                <p>First Login <a href="#" onclick="showForm('hashing-form')">Hash your password</a></p>
            </form>
        </div>
    </div>

    <div class="container">
        <div class="form-box <?= isActiveForm('hashed', $activeForm); ?>" id="hashing-form">
            <form action="../assets/queries/admins/admin_hash_inc.php" method="POST">
                <h2><?php echo $header2; ?></h2>
                <?= showAlertMsg($amsgs['message']); ?>
                <?= showError($errors['hashed']); ?>
                <input type="text" name="admin-name" placeholder="Username" required>
                <input type="password" name="admin-passwd" placeholder="Password" required>
                <button type="submit" name="hashed">Submit</button>
                <p>Admin <a href="#" onclick="showForm('login-form')">Login</a></p>
            </form>
        </div>
    </div>
 
<?php

    include '../assets/templates/footer.php';

?>

    