<nav class="site-header--subnav" itemscope itemtype="http://schema.org/SiteNavigationElement" style="visibility: hidden;">

    <div class="site-header--subnav-header">
        <div class="wrap">
        <?php if ( $user_is_logged_in ): ?>
            <h2>Hello <?php esc_html_e( $first_name ); ?>. <br/>Here are quick links to your stuff.</h2>
        <?php else: ?>
            <h2>My Stuff</h2>
         <?php endif; ?>
            <button class="subnav-close--button"><i class="fa fa-times-circle" aria-hidden="true"></i> <span>Close</span></button>
        </div>
    </div>

    <div class="infobox reminder"><div class="wrap">
        <h4><i class="fa fa-bullhorn" aria-hidden="true"></i> NEW – Coaching Pro Add-On</h4>
        <p>Do you want a coach, someone to help keep you motivated, focused, and accountable while you work through the labs and roadmaps? Then <a href="<?php echo fulcrum_get_url_relative_to_home_url( 'register/coaching-pro' ); ?>" target="_blank" style="color: #1b202d;">Coaching Pro</a> is your answer.</p>
    </div></div>

    <div class="site-header--subnav-items">
        <a href="<?php echo fulcrum_get_url_relative_to_home_url( 'my-dashboard' ); ?>" itemprop="url">
            <i class="fa fa-tachometer" aria-hidden="true"></i>
            <h4 itemprop="name">My Dashboard</h4>
            <p>My portal and central hub to my stuff.</p>
        </a>
        <a href="<?php echo fulcrum_get_url_relative_to_home_url( 'account' ); ?>" itemprop="url">
            <i class="fa fa-life-ring" aria-hidden="true"></i>
            <h4 itemprop="name">My Account</h4>
            <p>My membership and profile information.</p>
        </a>
        <a href="<?php echo fulcrum_get_url_relative_to_home_url( 'your-activity-history' ); ?>" itemprop="url">
            <i class="fa fa-history" aria-hidden="true"></i>
            <h4 itemprop="name">My Viewing History</h4>
            <p>Stuff I've completed, saved for later, or marked as my fav.</p>
        </a>
        <a href="<?php echo fulcrum_get_url_relative_to_home_url( 'thank-you' ); ?>" itemprop="url">
            <i class="fa fa-play-circle" aria-hidden="true"></i>
            <h4 itemprop="name">My Orientation</h4>
            <p>New? Just start here with the new member orientation.</p>
        </a>
        <a href="<?php echo fulcrum_get_url_relative_to_home_url( 'member-benefits-deals' ); ?>" itemprop="url">
            <i class="fa fa-comments" aria-hidden="true"></i>
            <h4 itemprop="name">My Deals</h4>
            <p>Yippee, deals! Saving you some money as part of your membership.</p>
        </a>
        <a href="<?php echo fulcrum_get_url_relative_to_home_url( 'one-on-one-mentoring' ); ?>" itemprop="url">
            <i class="fa fa-fast-forward" aria-hidden="true" style="color: #cc0000;"></i>
            <h4 itemprop="name" style="color: #cc0000;">1-on-1 Mentoring</h4>
            <p>NEW Add-on. Personalized, one-on-one mentoring with Tonya.</p>
        </a>
        <a href="<?php echo fulcrum_get_url_relative_to_home_url( 'developer-stories' ); ?>" itemprop="url">
            <i class="fa fa-comments" aria-hidden="true"></i>
            <h4 itemprop="name">Developer Stories</h4>
            <p>Real stories from your fellow developers and peers.</p>
        </a>
        <a href="javascript:void(0)" class="subnav-close--button">
            <i class="fa fa-times-circle" aria-hidden="true"></i>
            <h4 itemprop="name">close</h4>
            <p>Close this navigation panel.</p>
        </a>
    </div>
</nav>