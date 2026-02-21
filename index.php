 <?php 

session_start();
$errors = [
    'login' => $_SESSION['login_error'] ?? '',
    'register' => $_SESSION['register_error']  ?? ''
];
$activeForm =$_SESSION['active_form'] ?? 'login';

session_unset();

function showError($error) {
    return !empty($error) ? "<p class='error-message'>$error</p>" : '';
}

function isActiveForm($formName,$activeForm) {
    return $formName === $activeForm ? 'active' : '';
}


?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>login and register form</title>
    <link rel="stylesheet" href="index.css">   
</head>
<body>
    <div class="container">
        <div Cass="form-box <?= isActiveForm('login',$activeForm); ?>" id="login-form">
            <form action="shfrw.php" method="POST">

            <h2>Login</h2>
            <?= showError($errors['login']);?>
            <input type="Email" name="email" placeholder="Email" required>
            <input type="password" name="password" placeholder="password" required>
            <button type="submit" name="login">Login</button>
            <p>Don't have an account? <a href="#" onclick="showForm('register-form')">register</a></p>
            </form>

        
        </div>
        <div class="form-box <?= isActiveForm('register',$activeForm); ?>" id="register-form">
            <form action="shfrw.php" method="POST">

            <h2>register</h2>
            <?= showError($errors['register']);  ?>
            <input type="text" name="name" placeholder="name" required>
            <input type="Email" name="email" placeholder="Email" required>
            <input type="password" name="password" placeholder="password" required>
            <select name="role">
                <option value="">--Select Role--</option>
                <option value="user">User</option>
                <option value="admin">Admin</option>
            
            </select>
            <button type="submit" name="register">register</button>
            <p>Already have an account? <a href="#" onclick="showForm('login-form')">login</a></p>
            </form>

        
        </div>
    </div>
    <script src="script.js"></script>

</body>
</html>