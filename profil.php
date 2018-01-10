<?php
require ('init.php');

$title = "profil";
?>
<div class="col_profil">
    <h2>Bienvenue sur ton profil </h2>
</div>
<input type="file" name="file">ajoute ton fichier.
<input type="submit" name="sendFile">ajouter

<?php
$content = ob_get_contents();
ob_end_clean();
require('layout.php'); 

































