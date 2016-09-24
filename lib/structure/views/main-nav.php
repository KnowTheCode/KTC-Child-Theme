<nav class="nav-primary" itemscope itemtype="http://schema.org/SiteNavigationElement">
	<div class="wrap">
		<ul id="menu-main-nav" class="menu genesis-nav-menu menu-primary">
			<?php if ( ! $user_is_logged_in ) : ?>
			<li class="menu-item menu__join">
				<a href="<?php echo home_url( 'membership' ); ?>" itemprop="url"><span itemprop="name"><i class="fa fa-code" aria-hidden="true"></i> Join</span></a>
			</li>
			<?php endif; ?>
			<li class="menu-item menu__library<?php if ( is_page( 'library' ) ) { echo ' current-menu-item'; } ?>">
				<a href="<?php echo home_url( 'library' ); ?>" itemprop="url"><span itemprop="name"><i class="fa fa-fighter-jet" aria-hidden="true"></i> Skills</span></a>
			</li>
			<li class="menu-item menu__catalog<?php if ( is_page( 'catalog' ) ) { echo ' current-menu-item'; } ?>">
				<a href="<?php echo home_url( 'catalog' ); ?>" itemprop="url"><span itemprop="name"><i class="fa fa-list" aria-hidden="true"></i> Catalog</span></a>
			</li>
			<li class="menu-item menu__help<?php if ( is_page( 'help' ) ) { echo ' current-menu-item'; } ?>">
				<a href="<?php echo home_url( 'help' ); ?>" itemprop="url"><span itemprop="name"><i class="fa fa-question-circle" aria-hidden="true"></i> Help</span></a>
			</li>
			<?php if ( $user_is_logged_in ) : ?>
			<li class="menu-item menu__dashboard<?php if ( is_page( 'my-dashboard' ) ) { echo ' current-menu-item'; } ?>">
				<a href="<?php echo home_url( 'my-dashboard' ); ?>" itemprop="url"><span itemprop="name"><i class="fa fa-dashboard" aria-hidden="true"></i> My Dashboard</span></a>
			</li>
			<?php endif; ?>
		</ul>
	</div>
</nav>