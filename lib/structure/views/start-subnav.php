<nav class="nav-secondary" itemscope itemtype="http://schema.org/SiteNavigationElement">
	<div class="wrap">
		<ul id="menu-secondary-nav" class="menu genesis-nav-menu menu-secondary">
			<li class="menu-item menu__glossary<?php if ( is_page( 'library' ) ) { echo ' current-menu-item'; } ?>">
				<a href="<?php echo fulcrum_get_url_relative_to_home_url( 'library' ); ?>" itemprop="url"><span itemprop="name"><i class="fa fa-code" aria-hidden="true"></i> Mastery Skills</span></a>
			</li>
			<li class="menu-item menu__glossary<?php if ( is_page( 'catalog' ) ) { echo ' current-menu-item'; } ?>">
				<a href="<?php echo fulcrum_get_url_relative_to_home_url( 'catalog' ); ?>" itemprop="url"><span itemprop="name"><i class="fa fa-list-ul" aria-hidden="true"></i> Catalog</span></a>
			</li>
			<li class="menu-item menu__glossary<?php if ( is_page( 'the-docx' ) ) { echo ' current-menu-item'; } ?>">
				<a href="<?php echo fulcrum_get_url_relative_to_home_url( 'the-docx' ); ?>" itemprop="url"><span itemprop="name"><i class="fa fa-list-ul" aria-hidden="true"></i> Docx</span></a>
			</li>
			<li class="menu-item menu__glossary<?php if ( is_page( 'glossary' ) ) { echo ' current-menu-item'; } ?>">
				<a href="<?php echo fulcrum_get_url_relative_to_home_url( 'glossary' ); ?>" itemprop="url"><span itemprop="name"><i class="fa fa-list-ul" aria-hidden="true"></i> Glossary</span></a>
			</li>
			<li class="menu-item menu__whatsnew<?php if ( is_page( 'whats-new' ) ) { echo ' current-menu-item'; } ?>">
				<a href="<?php echo fulcrum_get_url_relative_to_home_url( 'whats-new' ); ?>" itemprop="url"><span itemprop="name"><i class="fa fa-plus-circle" aria-hidden="true"></i> What's New</span></a>
			</li>
			<li class="menu-item menu__whatscoming<?php if ( is_page( 'whats-coming' ) ) { echo ' current-menu-item'; } ?>">
				<a href="<?php echo fulcrum_get_url_relative_to_home_url( 'whats-coming' ); ?>" itemprop="url"><span itemprop="name"><i class="fa fa-plus-circle" aria-hidden="true"></i> What's Coming</span></a>
			</li>
		</ul>
	</div>
</nav>