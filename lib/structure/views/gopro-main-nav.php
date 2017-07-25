<nav class="nav-primary" itemscope itemtype="http://schema.org/SiteNavigationElement">
	<div class="wrap">
		<ul id="menu-main-nav" class="menu genesis-nav-menu menu-primary">
            <?php if ( isset($show_library) && $show_library ) : ?>
			<li class="menu-item menu__library">
				<a href="<?php echo fulcrum_get_url_relative_to_home_url( 'library' ); ?>" itemprop="url"><span itemprop="name">Browse</span></a>
			</li>
            <?php endif; ?>
			<?php if ( isset($show_gopro) && $show_gopro ) : ?>
                <li class="menu-item menu__join">
                    <a href="<?php echo fulcrum_get_url_relative_to_home_url( 'go-pro' ); ?>" itemprop="url"><span itemprop="name">Go Pro</span></a>
                </li>
			<?php endif; ?>
			<li class="menu-item menu__help-center">
				<a href="<?php echo fulcrum_get_url_relative_to_home_url( 'help-center' ); ?>" itemprop="url"><span itemprop="name">Help</span></a>
			</li>
			<?php if ( ! $user_is_logged_in ) : ?>
			<li class="menu-item">
				<a href="<?php echo wp_login_url( site_url( '/my-dashboard', 'https' ) ); ?>" itemprop="url"><span itemprop="name"></i>Sign In</span></a>
			</li>
			<?php endif; ?>
		</ul>
	</div>
</nav>