<!-- Inline navigation with the logo on the left and links on the right. Also this type of nav can be made to be fixed -->
<nav class="nav nav-inline mobile-nav">
	<div class="container grid">
		<p class="nav__logo"><a href="<?php echo DIRECTORY; ?>" title="Example">Example</a></p>
		<p class="nav__mobile-icon"><a href="" class="js-toggle-nav">&#9776;</a></p>
		<ul class="nav__links grid__three-quarter">
			<li>
				<a href="" class="js-toggle-subnav" title="link 1">Link 1</a>
				<div class="nav__sublinks">
					<ul class="nav__sublinks--links">
						<?php foreach (Pages::list(1) as $page): ?>
						<li><a href="<?php echo DIRECTORY; ?>home/page/<?php echo $page['id']; ?>"><?php echo $page['title']; ?></a></li>
						<?php endforeach; ?>
					</ul>
				</div>
			</li>
			<li>
				<a href="" class="js-toggle-subnav" title="link 2">Link 2</a>
				<div class="nav__sublinks">
					<ul class="nav__sublinks--links">
						<?php foreach (Pages::list(2) as $page): ?>
						<li><a href="<?php echo DIRECTORY; ?>home/page/<?php echo $page['id']; ?>"><?php echo $page['title']; ?></a></li>
						<?php endforeach; ?>
					</ul>
				</div>
			</li>
			<li>
				<a href="" class="js-toggle-subnav" title="link 3">Link 3</a>
				<div class="nav__sublinks">
					<ul class="nav__sublinks--links">
						<?php foreach (Pages::list(3) as $page): ?>
						<li><a href="<?php echo DIRECTORY; ?>home/page/<?php echo $page['id']; ?>"><?php echo $page['title']; ?></a></li>
						<?php endforeach; ?>
					</ul>
				</div>
			</li>
			<li>
				<a href="" class="js-toggle-subnav" title="link 4">Link 4</a>
				<div class="nav__sublinks">
					<ul class="nav__sublinks--links">
						<?php foreach (Pages::list(4) as $page): ?>
						<li><a href="<?php echo DIRECTORY; ?>home/page/<?php echo $page['id']; ?>"><?php echo $page['title']; ?></a></li>
						<?php endforeach; ?>
					</ul>
				</div>
			</li>
			<li>
				<a href="" class="js-toggle-subnav" title="link 5">Link 5</a>
				<div class="nav__sublinks">
					<ul class="nav__sublinks--links">
						<?php foreach (Pages::list(5) as $page): ?>
						<li><a href="<?php echo DIRECTORY; ?>home/page/<?php echo $page['id']; ?>"><?php echo $page['title']; ?></a></li>
						<?php endforeach; ?>
					</ul>
				</div>
			</li>
			<li>
				<a href="" class="js-toggle-subnav" title="link 6">Link 6</a>
				<div class="nav__sublinks">
					<ul class="nav__sublinks--links">
						<?php foreach (Pages::list(6) as $page): ?>
						<li><a href="<?php echo DIRECTORY; ?>home/page/<?php echo $page['id']; ?>"><?php echo $page['title']; ?></a></li>
						<?php endforeach; ?>
					</ul>
				</div>
			</li>
		</ul>
	</div>
</nav>