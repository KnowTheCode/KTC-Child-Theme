<nav class="catalog__nav">
	<ul>
		<li><label>Filter by:</label></li>
		<li><a href="<?php echo $permalink; ?>" class="button<?php if ( ! $filter ) { echo ' current__filter'; } ?>"><?php _e( 'Topics', 'ktc' ); ?></a>
		<li><a href="<?php printf( '%s?filter=index', $permalink ); ?>" class="button<?php if ( $filter === 'index' ) { echo ' current__filter'; } ?>"><?php _e( 'Index', 'ktc' ); ?></a></li>
		<li><a href="<?php printf( '%s?filter=series', $permalink ); ?>" class="button<?php if ( $filter === 'series' ) { echo ' current__filter'; } ?>"><?php _e( 'Series', 'ktc' ); ?></a></li>
	</ul>
</nav>