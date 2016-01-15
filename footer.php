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
				<?php get_sidebar('latestpages')?>

			</div>
			<div class="col-lg-3">
				<!--				TODO: здесь будет размещен виджет Footer_D-->

				<?php get_sidebar('photo')?>

			</div>
		</div>
	</div>
	<div id="sub-footer">
		<div class="container">
			<div class="row">
				<div class="col-lg-6">
					<div class="copyright">
						<p>
							<span><?php printf(esc_html__('&copy; %1$s 2015 All right reserved. By','moderna'),'Moderna');?> </span><a href="<?php echo esc_url( __('http://bootstraptaste.com','moderna') )?>" target="_blank"><?php esc_html_e('Bootstrap Themes','moderna')?></a>
						</p>
						<!--
                            All links in the footer should remain intact.
                            Licenseing information is available at: http://bootstraptaste.com/license/
                            You can buy this theme without footer links online at: http://bootstraptaste.com/buy/?theme=Moderna
                        -->
					</div>
				</div>
				<div class="col-lg-6">
<!--					TODO: Придумать как лучше выводить в админке (как нижнее меню, виджет или Custom Type)-->
					<ul class="social-network">
						<li><a href="#" data-placement="top" title="Facebook"><i class="fa fa-facebook"></i></a></li>
						<li><a href="#" data-placement="top" title="Twitter"><i class="fa fa-twitter"></i></a></li>
						<li><a href="#" data-placement="top" title="Linkedin"><i class="fa fa-linkedin"></i></a></li>
						<li><a href="#" data-placement="top" title="Pinterest"><i class="fa fa-pinterest"></i></a></li>
						<li><a href="#" data-placement="top" title="Google plus"><i class="fa fa-google-plus"></i></a></li>
					</ul>
				</div>
			</div>
		</div>
	</div>
</footer>
</div>
<a href="#" class="scrollup"><i class="fa fa-angle-up active"></i></a>
<!-- javascript
    ================================================== -->
<!-- Placed at the end of the document so the pages load faster -->


<?php wp_footer(); ?>

</body>
</html>


