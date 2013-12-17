<img src="<?php echo DIRECTORY; ?>assets/images/top-search.jpg" />
<nav class="nav nav-inline mobile-nav">
	<div class="container grid">
		<ul class="nav__links">
			<li>
				<a href="" class="js-toggle-subnav active" title="link 1" id="link1">Home</a>
				<div class="nav__sublinks">
					<ul class="nav__sublinks--links">
						<?php foreach (Pages_model::list_menu(1) as $page): ?>
						<li><a href="<?php echo DIRECTORY; ?>home/page/<?php echo $page['id']; ?>"><?php echo $page['title']; ?></a></li>
						<?php endforeach; ?>
					</ul>
				</div>
			</li>
			<li>
				<a href="" class="js-toggle-subnav" title="link 2" id="link2">About us</a>
				<div class="nav__sublinks">
					<ul class="nav__sublinks--links">
						<?php foreach (Pages_model::list_menu(2) as $page): ?>
						<li><a href="<?php echo DIRECTORY; ?>home/page/<?php echo $page['id']; ?>"><?php echo $page['title']; ?></a></li>
						<?php endforeach; ?>
					</ul>
				</div>
			</li>
			<li>
				<a href="" class="js-toggle-subnav" title="link 3" id="link3">Our work</a>
				<div class="nav__sublinks">
					<ul class="nav__sublinks--links">
						<?php foreach (Pages_model::list_menu(3) as $page): ?>
						<li><a href="<?php echo DIRECTORY; ?>home/page/<?php echo $page['id']; ?>"><?php echo $page['title']; ?></a></li>
						<?php endforeach; ?>
					</ul>
				</div>
			</li>
			<li>
				<a href="" class="js-toggle-subnav" title="link 4" id="link4">Your health services</a>
				<div class="nav__sublinks">
					<ul class="nav__sublinks--links">
						<?php foreach (Pages_model::list_menu(4) as $page): ?>
						<li><a href="<?php echo DIRECTORY; ?>home/page/<?php echo $page['id']; ?>"><?php echo $page['title']; ?></a></li>
						<?php endforeach; ?>
					</ul>
				</div>
			</li>
			<li>
				<a href="" class="js-toggle-subnav" title="link 5" id="link5">Public involvement</a>
				<div class="nav__sublinks">
					<ul class="nav__sublinks--links">
						<?php foreach (Pages_model::list_menu(5) as $page): ?>
						<li><a href="<?php echo DIRECTORY; ?>home/page/<?php echo $page['id']; ?>"><?php echo $page['title']; ?></a></li>
						<?php endforeach; ?>
					</ul>
				</div>
			</li>
			<li>
				<a href="" class="js-toggle-subnav" title="link 6" id="link6">News and events</a>
				<div class="nav__sublinks">
					<ul class="nav__sublinks--links">
						<?php foreach (Pages_model::list_menu(6) as $page): ?>
						<li><a href="<?php echo DIRECTORY; ?>home/page/<?php echo $page['id']; ?>"><?php echo $page['title']; ?></a></li>
						<?php endforeach; ?>
					</ul>
				</div>
			</li>
		</ul>
	</div>
</nav>