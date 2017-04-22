<?php
$args = array(
    'textarea_name' => "ktc_optin_fullpage[_optin_fullpage_content]",
);
wp_editor( genesis_get_custom_field( '_optin_fullpage_content' ), '_optin_fullpage_content', $args );
?>
<p class="description">Enter the content that you want to display when the optin button is pressed.</p>