<nav class="nav nav-inline mobile-nav">
	<div class="container grid">
		<p class="nav__logo"><a href="<?php echo DIRECTORY; ?>" title="Example">Example</a></p>
		<p class="nav__mobile-icon"><a href="" class="js-toggle-nav">&#9776;</a></p>
		<ul class="nav__links grid__three-quarter">
			<li>
				<a href="" class="js-toggle-subnav" title="link 1" id="link1">Link A</a>
				<div class="nav__sublinks">
					<ul class="nav__sublinks--links">
						<?php foreach (Pages_model::list_menu(1) as $page): ?>
						<li><a href="<?php echo DIRECTORY; ?>home/page/<?php echo $page['id']; ?>"><?php echo $page['title']; ?></a></li>
						<?php endforeach; ?>
					</ul>
				</div>
			</li>
			<li>
				<a href="" class="js-toggle-subnav" title="link 2" id="link2">Link B</a>
				<div class="nav__sublinks">
					<ul class="nav__sublinks--links">
						<?php foreach (Pages_model::list_menu(2) as $page): ?>
						<li><a href="<?php echo DIRECTORY; ?>home/page/<?php echo $page['id']; ?>"><?php echo $page['title']; ?></a></li>
						<?php endforeach; ?>
					</ul>
				</div>
			</li>
			<li>
				<a href="" class="js-toggle-subnav" title="link 3" id="link3">Link C</a>
				<div class="nav__sublinks">
					<ul class="nav__sublinks--links">
						<?php foreach (Pages_model::list_menu(3) as $page): ?>
						<li><a href="<?php echo DIRECTORY; ?>home/page/<?php echo $page['id']; ?>"><?php echo $page['title']; ?></a></li>
						<?php endforeach; ?>
					</ul>
				</div>
			</li>
			<li>
				<a href="" class="js-toggle-subnav" title="link 4" id="link4">Link D</a>
				<div class="nav__sublinks">
					<ul class="nav__sublinks--links">
						<?php foreach (Pages_model::list_menu(4) as $page): ?>
						<li><a href="<?php echo DIRECTORY; ?>home/page/<?php echo $page['id']; ?>"><?php echo $page['title']; ?></a></li>
						<?php endforeach; ?>
					</ul>
				</div>
			</li>
		</ul>
	</div>
</nav>