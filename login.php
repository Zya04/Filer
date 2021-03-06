<?php
require('init.php');
$username = '';
$password = '';
$errors = '';
if (!empty($_POST['username']) && !empty($_POST['password']))
{
    $username = htmlentities($_POST['username']);
    $password = sha1($_POST['password']);
    
    $addUser = "SELECT * FROM users WHERE password = '". $password . "' AND username = '" . $username . "'";
    $result = mysqli_query($link, $addUser);
    $user = mysqli_fetch_assoc($result);

    if ($user !== NULL)
    {
        session_start();
        $_SESSION['id'] = $user['id'];
        $_SESSION['username'] = $user['username'];
        header('Location: index.php');
        exit();
       
    }
    else 
    {
      $errors = 'Invalid username or password';
    } 
}
$title = "Login";
ob_start();
?>
<div class="col">
    <form action="login.php" method="POST">
        <?= $errors ?> <br><br>
        <div class="form-group">
            <input type="text" name="username" id="username" placeholder="username" class="form-control" value="<?= $username ?>">
        </div>
        <div class="form-group">
            <input type="password" name="password" id="password" class="form-control" placeholder="password">
        </div>
        <button type="submit" class="btn btn-primary">Login</button>
    </form>
</div>
<?php
$content = ob_get_contents();
ob_end_clean();
require('layout.php'); 