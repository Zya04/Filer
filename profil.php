<?php
require ('init.php');

if(!empty($_FILES)){ 
    $file_name = $_FILES['file']['name'];
    $file_extension = strrchr($file_name, ".");
}

$title = "profil";
?>
<div class="col_profil">
    <h2>Welcome in your profile! </h2>
</div>
<input type="file" name="file"> add your file here! <br>
<input type="submit" name="sendFile" value="add"> <br> <br>
<table class="table_profile" align="center">
    <tr>
        <td>file</td>
        <td>edit</td>
        <td>delete</td>
        <td>download</td>
    </tr>

</table>

<?php
$content = ob_get_contents();
ob_end_clean();
require('layout.php'); 

































