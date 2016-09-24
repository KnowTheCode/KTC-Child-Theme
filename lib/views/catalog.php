<section class="catalog">
	<div class="wrap">
		<ul class="grid__container">
		<?php foreach( $catalog_items as $term ) :
			$term_link = get_term_link( $term, 'catalog' ); ?>
			<li class="grid__block">
				<a href="<?php echo esc_url( $term_link ); ?>"><?php esc_html_e( $term->name ); ?> ( <?php echo (int) $term->count; ?> )</a>
			</li>
		<?php endforeach; ?>
		</ul>
	</div>
</section>