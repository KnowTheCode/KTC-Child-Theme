<nav class="site-header--subnav" itemscope itemtype="http://schema.org/SiteNavigationElement" style="visibility: hidden;">

    <div class="site-header--subnav-header">
        <div class="wrap">
            <h2>Build. Learn Deeply.</h2>
            <button class="subnav-close--button"><i class="fa fa-times-circle" aria-hidden="true"></i><span>Close</span></button>
        </div>
    </div>

    <div class="site-header--subnav-items">
	    <?php if ( $user_is_logged_in ): ?>
        <a href="<?php echo fulcrum_get_url_relative_to_home_url( 'register/coaching-pro' ); ?>" itemprop="url">
            <i class="fa fa-bullhorn" aria-hidden="true"></i>
            <h4 itemprop="name">Coaching Pro</h4>
            <p>Hire Tonya to motivate you, check you focused, and maximize your learning.</p>
        </a>
        <a href="<?php echo fulcrum_get_url_relative_to_home_url( 'one-on-one-mentoring' ); ?>" itemprop="url">
            <i class="fa fa-bullhorn" aria-hidden="true"></i>
            <h4 itemprop="name">1-on-1 Mentoring</h4>
            <p>1-on-1 Personalized Mentoring Program. Private. Customized to fit what you want to master.</p>
        </a>
        <?php endif; ?>
        <a href="<?php echo fulcrum_get_url_relative_to_home_url( 'roadmap/custom-wordpress-plugin-developer-roadmap' ); ?>" itemprop="url">
            <i class="fa fa-map" aria-hidden="true"></i>
            <h4 itemprop="name">Plugin Developer Roadmap</h4>
            <p>Your guide to mastering custom WordPress plugin development.</p>
        </a>
        <a href="<?php echo fulcrum_get_url_relative_to_home_url( 'roadmap/genesis-developer-roadmap' ); ?>" itemprop="url">
            <i class="fa fa-map" aria-hidden="true"></i>
            <h4 itemprop="name">Genesis Roadmap</h4>
            <p>Your guide to mastering Genesis theme development.</p>
        </a>
        <a href="<?php echo fulcrum_get_url_relative_to_home_url( 'library' ); ?>" itemprop="url">
            <i class="fa fa-flask" aria-hidden="true"></i>
            <h4 itemprop="name">Code Projects</h4>
            <p>Build custom themes and plugins you learn deeply.</p>
        </a>
        <a href="<?php echo fulcrum_get_url_relative_to_home_url( 'the-docx' ); ?>" itemprop="url">
            <i class="fa fa-list-ul" aria-hidden="true"></i>
            <h4 itemprop="name">Docx</h4>
            <p>Documentation that doesn't suck. It's helpful.</p>
        </a>
        <a href="<?php echo fulcrum_get_url_relative_to_home_url( 'ask-tonya' ); ?>" itemprop="url">
            <i class="fa fa-play" aria-hidden="true"></i>
            <h4 itemprop="name">Ask Tonya</h4>
            <p>Videos that answer your questions.</p>
        </a>
        <a href="<?php echo fulcrum_get_url_relative_to_home_url( 'catalog' ); ?>" itemprop="url">
            <i class="fa fa-list-ul" aria-hidden="true"></i>
            <h4 itemprop="name">Catalog</h4>
            <p>List of topics to quickly find what you want.</p>
        </a>
        <a href="<?php echo fulcrum_get_url_relative_to_home_url( 'glossary' ); ?>" itemprop="url">
            <i class="fa fa-list-ul" aria-hidden="true"></i>
            <h4 itemprop="name">Glossary</h4>
            <p>List of terms and their meanings...in human-speak.</p>
        </a>
        <a href="<?php echo fulcrum_get_url_relative_to_home_url( 'interactive-guide' ); ?>" itemprop="url">
            <i class="fa fa-wordpress" aria-hidden="true"></i>
            <h4 itemprop="name">Interactive Guides</h4>
            <p>Try these forms and guides to see what happens.</p>
        </a>
        <a href="<?php echo fulcrum_get_url_relative_to_home_url( 'whats-new' ); ?>" itemprop="url">
            <i class="fa fa-plus-circle" aria-hidden="true"></i>
            <h4 itemprop="name">What's New</h4>
            <p>Check out all of the new content that's waiting for you.</p>
        </a>
        <a href="<?php echo fulcrum_get_url_relative_to_home_url( 'whats-coming' ); ?>" itemprop="url">
            <i class="fa fa-plus-circle" aria-hidden="true"></i>
            <h4 itemprop="name">What's Coming</h4>
            <p>The production schedule of what's in the pipeline.</p>
        </a>
        <a href="javascript:void(0)" class="subnav-close--button">
            <i class="fa fa-times-circle" aria-hidden="true"></i>
            <h4 itemprop="name">close</h4>
            <p>Close this navigation panel.</p>
        </a>
    </div>
</nav>