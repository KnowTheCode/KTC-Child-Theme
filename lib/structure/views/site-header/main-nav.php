<nav class="main-nav--container" itemscope itemtype="http://schema.org/SiteNavigationElement">
    <ul class="main-nav">
		<?php if ( $user_is_logged_in ) : ?>
            <li class="menu-item menu--signout">
                <a href="<?php echo esc_url( wp_logout_url( $signinout_redirect ) ); ?>" itemprop="url"><span itemprop="name" class="menu-item--text">Log Out</span></a>
            </li>
		<?php else: ?>
            <li class="menu-item menu--gopro">
                <a href="<?php echo fulcrum_get_url_relative_to_home_url( 'go-pro' ); ?>" itemprop="url"><span itemprop="name" class="menu-item--text">Go Pro</span></a>
            </li>
            <li class="menu-item menu--signin">
                <a href="<?php echo esc_url( wp_login_url( $signinout_redirect ) ); ?>" itemprop="url"><span itemprop="name" class="menu-item--text"></i>Log In</span></a>
            </li>
		<?php endif; ?>
        <li class="menu-item menu--dashboard --has-subnav">
            <a href="javascript:void(0)" itemprop="url">My Stuff</a>
        </li>
        <li class="menu-item menu--library --has-subnav">
            <a href="javascript:void(0)" itemprop="url"><span itemprop="name" class="menu-item--text">Build. Learn.</span></a>
        </li>
        <li class="menu-item menu--blog --has-subnav">
            <a href="javascript:void(0)" itemprop="url"><span itemprop="name" class="menu-item--text">Tips. Insights.</span></a>
        </li>
        <li class="menu-item menu--help --has-subnav">
            <a href="javascript:void(0)" itemprop="url"><span itemprop="name" class="menu-item--text">Help</span></a>
        </li>
    </ul>
</nav>

