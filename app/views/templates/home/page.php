<!-- THIRD + TWO THIRDS -->
<div class="grid__two-third">
	<div class="example">

		<h1><?php echo $title; ?></h1>
		<?php echo $content; ?>
	
		<?php foreach ($documents as $doc): ?>
		<p class="downloads"><?php echo $doc['title']; ?> <a target="_blank" href="<?php echo DIRECTORY; ?>_admin/assets/uploads/documents/<?php echo $doc['name']; ?>" class="btn">Download</a></p>
		<?php endforeach; ?>
	
		<?php foreach ($links as $link): ?>
		<p><a target="_blank" href="http://<?php echo $link['link']; ?>" class="link"><?php echo $link['title']; ?></a></p>
		<?php endforeach; ?>
	</div>
</div>
<div class="grid__third">
	<div class="example">
		<?php foreach (Image_model::get_multiple_images($images) as $img): ?>
		<img src="<?php echo DIRECTORY; ?>_admin/assets/uploads/images/283/<?php echo $img; ?>" class="side-img" />
		<?php endforeach; ?>
	</div>
</div>