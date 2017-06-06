<?php
wp_editor( genesis_get_custom_field( $metakey ), $metakey, array(
	'textarea_name' => "ktc_bootcamp_topic[{$metakey}]",
) );
?>
<p class="description">Enter the content that you want to display for the topic.</p>