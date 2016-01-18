<?php
/**
 * The template for displaying the footer.
 *
 * Contains the closing of the #content div and all content after.
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package moderna
 */

?>

<footer>
	<div class="container">
		<div class="row">
			<div class="col-lg-3">

				<?php get_sidebar('address')?>

			</div>
			<div class="col-lg-3">

				<?php get_sidebar('pages')?>

			</div>
			<div class="col-lg-3">
				<?php get_sidebar('latestposts')?>

			</div>
			<div class="col-lg-3">

				<?php get_sidebar('photo')?>

			</div>
		</div>
	</div>
	<div id="sub-footer">
		<div class="container">
			<div class="row">
				<div class="col-lg-6">
					<?php get_sidebar('copyright')?>
				</div>
				<div class="col-lg-6">
					<ul class="social-network">
						<?php
						$query = new WP_Query(array('post_type'=>'post_contacts', 'order'=>'ASC'));
						if ( $query->have_posts() ) :
						while ($query->have_posts()) : $query->the_post(); ?>
							<li><a href="<?php the_field('link');?>" data-placement="<?php the_field('data-placement');?>" title="<?php the_field('title');?>"><i class="fa fa-<?php the_field('name_social');?>"></i></a></li>

						<? endwhile; endif; wp_reset_postdata(); ?>
					</ul>
				</div>
			</div>
		</div>
	</div>
</footer>
</div>
<a href="#" class="scrollup"><i class="fa fa-angle-up active"></i></a>


<?php wp_footer(); ?>

</body>
</html>


