<nav class="nav-secondary" itemscope itemtype="http://schema.org/SiteNavigationElement">
	<div class="wrap">
		<ul id="menu-secondary-nav" class="menu genesis-nav-menu menu-secondary">
			<li class="menu-item menu__account<?php if ( is_page( 'account' ) ) { echo ' current-menu-item'; } ?>">
				<a href="<?php echo home_url( 'account' ); ?>" itemprop="url"><span itemprop="name"><i class="fa fa-tachometer" aria-hidden="true"></i> My Account</span></a>
			</li>
			<li class="menu-item menu__account<?php if ( is_page( 'your-activity-history' ) ) { echo ' current-menu-item'; } ?>">
				<a href="<?php echo home_url( 'your-activity-history' ); ?>" itemprop="url"><span itemprop="name"><i class="fa fa-history" aria-hidden="true"></i> My Viewing History</span></a>
			</li>
			<?php if ( is_user_logged_in() ) : ?>
				<li class="menu-item menu__proforums">
					<a href="<?php echo home_url( 'forums' ); ?>" itemprop="url"><span itemprop="name"><i class="fa fa-life-ring" aria-hidden="true"></i> Pro Forums</span></a>
				</li>
				<li class="menu-item menu__account<?php if ( is_page( 'account' ) ) { echo ' current-menu-item'; } ?>">
					<a href="<?php echo home_url( 'account' ); ?>?action=subscriptions" itemprop="url"><span itemprop="name"><i class="fa fa-life-ring" aria-hidden="true"></i> My Subscription</span></a>
				</li>
			<?php endif; ?>
		</ul>
	</div>
</nav>