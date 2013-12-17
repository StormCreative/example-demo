<footer class="footer">
	<div class="container">
		<ul class="footer__links">
			<li><a href="<?php echo DIRECTORY; ?>home/page_1">Link A<a></li>
			<li><a href="<?php echo DIRECTORY; ?>home/page_2">Link B<a></li>
			<li><a href="<?php echo DIRECTORY; ?>home/page_3">Link C<a></li>
			<li><a href="<?php echo DIRECTORY; ?>home/page_4">Link D<a></li>
		</ul>
	</div>
</footer>

<div class="changes">
	<a href="<?php echo DIRECTORY; ?>admin/listing/table/pages" class="btn accept-btn">Accept</a>
	<?php if ($show_accept): ?>
	<a href="<?php echo DIRECTORY; ?>admin/pages/edit/<?php echo $page_data['id']; ?>" class="btn decline-btn">Decline</a>
	<?php else: ?>
	<a href="<?php echo DIRECTORY; ?>admin/listing/table/pages" class="btn accept-btn">Accept</a>
	<?php endif; ?>
</div>
