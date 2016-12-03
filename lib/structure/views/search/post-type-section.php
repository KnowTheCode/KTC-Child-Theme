<div class="clearfix"></div>
<div id="search-<?php echo $clean_post_type; ?>" class="callout gray search--section search--<?php echo $clean_post_type; ?>">
	<h2>
		<?php if ( $this->font_icon ) : ?>
		<i class="fa fa-<?php echo $this->font_icon; ?>" aria-hidden="true"></i>
		<?php endif; ?>
		<?php esc_html_e( $this->get_post_type_section_title() ); ?>
	</h2>
</div>