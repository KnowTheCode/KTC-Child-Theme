<?php
namespace KnowTheCode\Structure;
?>
<header class="site-header" itemscope="" itemtype="https://schema.org/WPHeader">
    <div class="site-header--sidebar">
        <div class="title-area">
			<?php
			do_action( 'genesis_site_title' );
			do_action( 'genesis_site_description' );
			?>
        </div>
        <button id="hamburger-button" class="hamburger--button">
            <span class="screen-reader-text">Menu</span>
            <span class="hamburger--lines">
                <span class="hamburger--line"></span>
                <span class="hamburger--line"></span>
                <span class="hamburger--line"></span>
            </span>
        </button>
		<?php render_main_nav(); ?>
    </div>
    <div class="site-header--subnav-container">
		<?php render_subnavs(); ?>
    </div>
</header>