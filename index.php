<?php
require('init.php');		
$title = "Home";
ob_start();
?>
<div class="col">
    <?php 
		if (isset($_SESSION['username'])){
			echo "<h2> Go to your profil for upload files. </h2>";
		}
		else {
			echo " ";
		}
    ?>
</div>
<?php
$content = ob_get_contents();
ob_end_clean();

require('layout.php');

