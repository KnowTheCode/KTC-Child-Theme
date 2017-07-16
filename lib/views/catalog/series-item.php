<?php
namespace KnowTheCode\Catalog;
?>
<li data-postid="<?php echo get_the_ID(); ?>">
	<i class="fa fa-flask" aria-hidden="true"></i>
	<a href="<?php the_permalink(); ?>"><?php the_title(); ?></a>
</li>