<?php
require('init.php');
$result = mysqli_query($link, 'SELECT * FROM files ORDER BY id DESC');
$data = [];
while ($row = mysqli_fetch_assoc($result))
{
    $data[] = $row;
}

$title = "Home";

ob_start();
?>
<div class="col">
    <?php foreach ($data as $filer): ?>
    <filer>
        <h2><a href="filer.php?id=<?= $filer['id'] ?>"><?= $filer['title'] ?></a></h2>
        <div><?= nl2br($filer['content']) ?></div>
    </filer>
    <hr>
    <?php endforeach; ?>
</div>
<?php
$content = ob_get_contents();
ob_end_clean();

require('layout.php');

