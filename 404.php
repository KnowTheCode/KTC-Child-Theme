<?php
/**
 * 404 Template
 *
 * @package     KnowTheCode
 * @since       1.0.0
 * @author      hellofromTonya
 * @link        https://KnowTheCode.io
 * @license     GNU-2.0+
 */
namespace KnowTheCode;

remove_action( 'genesis_loop', 'genesis_do_loop' );
add_action( 'genesis_loop', __NAMESPACE__ . '\render_404' );
/**
 * Render the 404 message.
 *
 * @since 1.0.0
 *
 * @return void
 */
function render_404() {
	?>
	<article class="entry" style="padding: 60px 0 80px; position: relative;">
		<h1 style="font-size: 200%;">What? A 404? Really?</h1>
		<h2 style="background-color: #f2f2f2; padding: 10px; font-weight: 400;">&gt;_Nope, this is not a <a href="https://knowthecode.io/library/problem-solving">problem solving lab</a> exercise.</h2>
		<h2 style="font-weight: 400;"><em>I'm just lost</em>. Yup, I have a "Huh?" look on my face right now.</h2>
		<p><a href="https://knowthecode.io/library" class="button green">Get back to the learning!</a></p>
		<p>Wow, that was bad English. Good thing I'm not an English teacher, as I'm sure <a href="https://knowthecode.io/glossary#smoosh">"smooshed together"</a> is not a real phrase. hehe</p>
	</article>
	<?php
}

genesis();