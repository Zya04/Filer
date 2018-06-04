<?php
require('init.php');
$firstname = '';
$lastname = '';
$username = '';
$password = '';
$password_repeat = '';
$email = '';
$error_password ='';
$error_password_repeat='';
$error_username= '';
if (!empty($_POST['firstname']) && !empty($_POST['lastname'])
    && !empty($_POST['username']) && !empty($_POST['email'])
    && !empty($_POST['password']) && !empty($_POST['password_repeat']))
{
    $firstname = htmlentities($_POST['firstname']);
    $lastname = htmlentities($_POST['lastname']);
    $username = htmlentities($_POST['username']);
    $email = htmlentities($_POST['email']);
    $password = sha1($_POST['password']);
    $password_repeat = sha1($_POST['password_repeat']);

    $formVerif = true;
    if (strlen($_POST['username']) < 3) {
        $error_username = "Username too short";
        $formVerif = false;
    } elseif (!filter_var($_POST['email'], FILTER_VALIDATE_EMAIL)) {
        $formVerif = false;
    } elseif (strlen($_POST['password']) < 6) {
        $error_password = 'Password too short';
        $formVerif = false;
    } elseif ($_POST['password'] != $_POST['password_repeat']) {
        $error_password_repeat = "Passwords not the same";
        $formVerif = false;
    }
    if ($password === $password_repeat && $formVerif)
    {
        $creation = date('Y-m-d H:i:s');
        
        $addUser= "INSERT INTO `users` (`id`, `creation`, `firstname`, `lastname`, `username`, `password`,`email` ) VALUES (NULL,?,?,?,?,?,?)";

        $stmt = mysqli_prepare($link, $addUser); 

        mysqli_stmt_bind_param($stmt, 'ssssss', $creation, $firstname, $lastname, $username, $password, $email);
        mysqli_stmt_execute($stmt);
        mysqli_stmt_close($stmt);
        mysqli_close($link);
        mkdir('users/'.$username);
        header('Location: login.php');
        exit();
    }
}

$title = "Register";

ob_start();
?>
<div class="col_register">
    <form action="register.php" method="POST"> 
        <?= $error_username ?> <br>
        <?= $error_password ?><br>
        <?= $error_password_repeat?>

        <div class="form-group"> 
            <input type="text" name="firstname" id="firstname" placeholder="firstname" class="form-control" value="<?= $firstname ?>">
        </div>
        <div class="form-group">
            <input type="text" name="lastname" id="lastname" placeholder="lastname" class="form-control"  value="<?= $lastname ?>">
        </div>
        <div class="form-group">
            <input type="text" name="username" id="username" placeholder="username" class="form-control" value="<?= $username ?>">
        </div>
        <div class="form-group">
            <input type="email" name="email" id="email" placeholder="email" class="form-control" value="<?= $email ?>">
        </div>
        <div class="form-group">
            <input type="password" name="password" id="password" class="form-control" placeholder="password">
        </div>
        <div class="form-group">
            <input type="password" name="password_repeat" id="password_repeat" class="form-control" placeholder="password repeat" >
        </div>
        <button type="submit" class="btn btn-primary">Register</button>
    </form>
</div>
<?php
$content = ob_get_contents();
ob_end_clean();

require('layout.php');  