<?php

/**
 * Fallback template.
 *
 * @package Kanto
 */

get_header();
?>
<main class="staff-page">
	<section class="staff-intro">
		<div>
			<p class="staff-kicker"><?php bloginfo('description'); ?></p>
			<h1 class="staff-title"><?php bloginfo('name'); ?></h1>
		</div>
	</section>
</main>
<?php get_footer(); ?>