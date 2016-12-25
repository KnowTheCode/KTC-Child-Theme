<nav class="nav-primary" itemscope itemtype="http://schema.org/SiteNavigationElement">
	<div class="wrap">
		<ul id="menu-main-nav" class="menu genesis-nav-menu menu-primary">
			<li class="menu-item menu__library">
				<a href="<?php echo fulcrum_get_url_relative_to_home_url( 'library' ); ?>" itemprop="url"><span itemprop="name">Browse</span></a>
			</li>
			<?php if ( ! $user_is_logged_in ) : ?>
			<li class="menu-item">
				<a href="<?php echo wp_login_url( site_url( '/my-dashboard', 'https' ) ); ?>" itemprop="url"><span itemprop="name"></i>Sign In</span></a>
			</li>
			<li class="menu-item menu__join">
				<a href="<?php echo fulcrum_get_url_relative_to_home_url( 'membership' ); ?>" itemprop="url"><span itemprop="name">Go Pro</span></a>
			</li>
			<?php else: ?>
				<li class="menu-item menu__dashboard">
					<a href="<?php echo fulcrum_get_url_relative_to_home_url( 'my-dashboard' ); ?>" itemprop="url"><span itemprop="name">My Dashboard</span></a>
				</li>
			<?php endif; ?>
		</ul>
	</div>
</nav>