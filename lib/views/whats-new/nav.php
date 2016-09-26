<nav class="filterby__nav">
	<ul>
		<li><label>Filter by:</label></li>
<?php foreach( $filters as $filter => $button_text ) :
	$url = $filter ? sprintf( '%s?filter=%s', $permalink, $filter ) : $permalink ; ?>
		<li>
			<a href="<?php echo esc_url( $url ); ?>" class="button<?php if ( $filter == $filterby ) { echo ' current__filter'; } ?>"><?php echo $button_text; ?></a>
		</li>
<?php endforeach; ?>
	</ul>
</nav>