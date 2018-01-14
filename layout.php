<!doctype html>
<html lang="en">
  <head>
    <title><?php echo $title; ?></title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <link rel="stylesheet" href="style.css">
  </head>
  <body>
    <main>
        <div class="container">
            <header class="row">
                <div class="col"><h2> Project Filer</h2></div>
            </header>
            <nav class="row">
                <div class="col-2"><a href="index.php">Home</a> -
                    <?php if (isset($_SESSION['username'])):?>
                        <a href="profil.php">Profil</a> -
                    <?php endif; ?>
                    <?php if (!isset($_SESSION['username'])): ?>
                    <a href="register.php">Register</a> -
                    <?php endif; ?>

                    <?php if (isset($_SESSION['username'])): ?>
                    <a href="logout.php">Logout</a>
                    <?php else: ?>
                    <a href="login.php">Login</a>
                    <?php endif; ?>
                </div>
                <div class="col-2">
                    <?php if (isset($_SESSION['username'])): ?>
                    Logged in as <?= $_SESSION['username'] ?> <br> <br>
                    <?php else: ?> <br>
                    Not logged in
                    <?php endif; ?>
                        <div id="content" class="row">
                            <?php echo $content; ?>   
                        </div> 
                </div>
            </nav>
        </div>
    <main>
    <footer>
        &copy; Nassurally Zya
    </footer>
  </body>
</html>
