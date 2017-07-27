<nav class="site-header--subnav --subnav-search" itemscope itemtype="http://schema.org/SiteNavigationElement" style="visibility: hidden;">

    <div class="site-header--subnav-header">
        <div class="wrap">
            <h2>Search</h2>
            <button class="subnav-close--button"><i class="fa fa-times-circle" aria-hidden="true"></i> <span>Close</span></button>
        </div>
    </div>

    <div class="site-header--subnav-items">
        <?php
        genesis_widget_area( 'search_bar', array(
            'before' => '<div class="search_bar"><div class="wrapper">',
            'after'  => '</div></div>',
        ) );
        ?>
    </div>
</nav>