<?php
require ('init.php');
if(isset($_POST['sendFile'])){ 
    $file_name = $_FILES['files']['name'];
    $file_tmp_name = $_FILES ['files']['tmp_name'];
    $file_dest = 'users/'.$file_name;
    $success = $file_name;
    if (move_uploaded_file($file_tmp_name, $file_dest)) {
        $success;
    } else {
        echo "sa marche po";
    }
}

$title = "profil";
?>
<article>
    <div class="col_profil">
        <h2>Welcome in your profile! </h2>
    </div>
    <h4>add your file here! </h4>
    <form action="profil.php" method="POST" enctype="multipart/form-data">
        <input type="file" name="files"> 
        <input type="submit" name="sendFile" value="add"> <br> <br>
    </form>
    <table class="table_profile">
        <tr>
            <td>File name</td>
            <td>Rename</td>
            <td>Delete</td>
            <td>Download</td>
        </tr>
        <tr>
            <td><?= $success ?> </td>
            <td> </td>
            <td> </td>
            <td> </td>
        </tr>
    </table>
</article>

<?php
$content = ob_get_contents();
ob_end_clean();
require('layout.php'); 

































