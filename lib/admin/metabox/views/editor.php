<?php
$metakey = $metabox['args']['metakey'];

wp_editor( genesis_get_custom_field( $metakey ), $metakey, array(
	'textarea_name' => sprintf( '%s[%s]',
		$post_key, $metakey
    ),
) );
?>
<p class="description">Enter the content that you want to display.</p>