<?php
/**
 * Template part for displaying a message that posts cannot be found.
 *
 * @link https://codex.wordpress.org/Template_Hierarchy
 *
 * @package moderna
 */

?>


<section id="content">
	<div class="container">
		<div class="row">
			<div class="col-lg-8">
				<h1><?php esc_html_e( 'Nothing Found', 'moderna' ); ?></h1>

				<?php
				if ( is_home() && current_user_can( 'publish_posts' ) ) : ?>

					<p><?php printf( wp_kses( __( 'Ready to publish your first post? <a href="%1$s">Get started here</a>.', 'moderna' ), array( 'a' => array( 'href' => array() ) ) ), esc_url( admin_url( 'post-new.php' ) ) ); ?></p>

				<?php elseif ( is_search() ) : ?>

					<p><?php esc_html_e( 'Sorry, but nothing matched your search terms. Please try again with some different keywords.', 'moderna' ); ?></p>
					<?php
					get_search_form();

				else : ?>

					<p><?php esc_html_e( 'It seems we can&rsquo;t find what you&rsquo;re looking for. Perhaps searching can help.', 'moderna' ); ?></p>
					<?php
					get_search_form();

				endif; ?>
			</div>
			<div class="col-lg-4">
				<aside class="right-sidebar">
					<?php get_sidebar('search'); ?>
					<?php get_sidebar('categories'); ?>
					<?php get_sidebar('latestthumb'); ?>
					<?php get_sidebar('tags'); ?>
				</aside>
			</div>
		</div>
	</div>
</section>

