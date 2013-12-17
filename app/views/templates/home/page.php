<!-- THIRD + TWO THIRDS -->
<div class="grid__two-third">
	<div class="example">
		<h1><?php echo $page_data['title']; ?></h1>
		<?php echo $page_data['content']; ?>
		
		<?php if (count($page_data['links']) > 0): ?>

		<h2><u>Links</u></h2>
		<?php foreach ($page_data['links'] as $link): ?>
		<p><a target="_blank" href="http://<?php echo $link['url']; ?>" class="link"><?php echo $link['title']; ?></a></p>
		<?php endforeach; ?>

		<?php endif; ?>
	
		<?php foreach ($documents as $doc): ?>
		<p class="downloads"><?php echo $doc['title']; ?> <a target="_blank" href="<?php echo DIRECTORY; ?>_admin/assets/uploads/documents/<?php echo $doc['name']; ?>" class="btn">Download</a></p>
		<?php endforeach; ?>
		
		
	</div>
</div>
<div class="grid__third">
	<div class="example">
		<?php foreach (Image_model::get_multiple_images($images) as $img): ?>
		<?php if (!!$img): ?>
		<img src="<?php echo DIRECTORY; ?>_admin/assets/uploads/images/283/<?php echo $img; ?>" class="side-img" />
		<?php endif; ?>
		<?php endforeach; ?>
	</div>
</div>