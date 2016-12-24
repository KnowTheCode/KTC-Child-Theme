<nav class="nav-secondary" itemscope itemtype="http://schema.org/SiteNavigationElement">
	<div class="wrap">
		<ul id="menu-secondary-nav" class="menu genesis-nav-menu menu-secondary">
			<li class="menu-item menu__glossary<?php if ( is_page( 'quick-start-guide' ) ) { echo ' current-menu-item'; } ?>">
				<a href="<?php echo fulcrum_get_url_relative_to_home_url( 'quick-start-guide' ); ?>" itemprop="url"><span itemprop="name"><i class="fa fa-fighter-jet" aria-hidden="true"></i> Quick Start</span></a>
			</li>
			<li class="menu-item menu__glossary<?php if ( is_page( 'library' ) ) { echo ' current-menu-item'; } ?>">
				<a href="<?php echo fulcrum_get_url_relative_to_home_url( 'library' ); ?>" itemprop="url"><span itemprop="name"><i class="fa fa-code" aria-hidden="true"></i> Mastery Skills</span></a>
			</li>
			<li class="menu-item menu__glossary<?php if ( is_page( 'catalog' ) ) { echo ' current-menu-item'; } ?>">
				<a href="<?php echo fulcrum_get_url_relative_to_home_url( 'catalog' ); ?>" itemprop="url"><span itemprop="name"><i class="fa fa-list-ul" aria-hidden="true"></i> Screencast Catalog</span></a>
			</li>
			<li class="menu-item menu__glossary<?php if ( is_page( 'the-docx' ) ) { echo ' current-menu-item'; } ?>">
				<a href="<?php echo fulcrum_get_url_relative_to_home_url( 'the-docx' ); ?>" itemprop="url"><span itemprop="name"><i class="fa fa-list-ul" aria-hidden="true"></i> Docx</span></a>
			</li>
			<li class="menu-item menu__glossary<?php if ( is_home() ) { echo ' current-menu-item'; } ?>">
				<a href="<?php echo fulcrum_get_url_relative_to_home_url( 'insights' ); ?>" itemprop="url"><span itemprop="name"><i class="fa fa-list-ul" aria-hidden="true"></i> Quick Tips</span></a>
			</li>
		</ul>
	</div>
</nav>