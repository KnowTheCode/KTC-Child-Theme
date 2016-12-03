<article <?php echo genesis_attr( 'entry' ); ?>>
	<header class="entry-header">
		<h3 class="entry-title" itemprop="headline">
			<a href="<?php the_permalink(); ?>" rel="bookmark"><?php the_title(); ?></a>
		</h3>
		<?php if ( $this->parent_title ) : ?>
		<h4 class="episode__lab-title"><i class="fa fa-<?php echo $this->font_icon; ?>" aria-hidden="true"></i> <?php esc_html_e( $this->parent_title ); ?></h4>
		<?php endif; ?>
	</header>
	<?php if ( $this->post_type !== 'docx' ) : ?>
	<div class="entry-content" itemprop="text">
		<?php do_action( 'genesis_entry_content' ); ?>
	</div>
	<?php endif; ?>
</article>