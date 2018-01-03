<?php
require('init.php');
$result = mysqli_prepare($link, 'SELECT * FROM posts ORDER BY id DESC');
$data =[];
while ($row = mysqli_fetch_assoc($result)){
	$data[]=$row;
}
$title = "Home";
ob_start();
?>
<div class="col_1"><h2>Articles</h2></div>
<div class="col">
	<?php foreach ($data as $article): ?>
	<article>
		<h3> <a href="article.php?id=<?= $article['id'] ?>"><?= article['title']?></a></h3>
		<div><?= nl2br($article['content']) ?></div>
	</article>
	<?php endforeach; ?>
</div>
<?php
$content = ob_get_contents();
ob_end_clean();
require ('layout.php');
