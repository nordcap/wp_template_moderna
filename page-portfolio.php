<?php
/**
 * Страница Портфолио
 *
 */

get_header();
get_template_part('template-parts/headline'); ?>


<section id="content">
    <div class="container">
        <div class="row">
            <div class="col-lg-12">


                <?php
                $query = new WP_Query(array('post_type' => 'post_portfolio', 'posts_per_page' => 1));
                if ($query->have_posts()) :
                    while ($query->have_posts()) : $query->the_post(); ?>

                        <?php $listWork = get_field_object('data-type'); ?>
                        <?php ?>

                    <? endwhile; endif;
                wp_reset_postdata(); ?>


                <ul class="portfolio-categ filter">
                    <li class="all active"><a href="#" title=""><?php esc_html_e('All', 'moderna') ?></a></li>
                    <?php foreach ($listWork['choices'] as $keyWork => $nameWork): ?>
                        <li class="<?php echo $keyWork ?>">
                            <a href="#" title=""><?php esc_html_e($nameWork, 'moderna') ?></a>
                        </li>
                    <?php endforeach; ?>
                </ul>


                <div class="clearfix">
                </div>
                <div class="row">
                    <section id="projects">
                        <ul id="thumbs" class="portfolio">

                            <?php
                            $query = new WP_Query(array('post_type' => 'post_portfolio'));
                            if ($query->have_posts()) :
                                while ($query->have_posts()) : $query->the_post(); ?>
                                    <li class=" item-thumbs col-lg-3 <?php the_field('class_list'); ?>"
                                        data-id="<?php the_field('data-id'); ?>"
                                        data-type="<?php the_field('data-type'); ?>">

                                        <!-- Fancybox - Gallery Enabled - Title - Full Image -->
                                        <a class="hover-wrap fancybox" data-fancybox-group="gallery"
                                           title="<?php the_title(); ?>"
                                           href="<?php the_field('image'); ?>">
                                            <span class="overlay-img"></span>
                                            <span class="overlay-img-thumb font-icon-plus"></span>
                                        </a>
                                        <!-- Thumb Image and Description -->
                                        <img src="<?php the_field('thumbnail'); ?>"
                                             alt="<?php the_field('description'); ?>">

                                    </li>

                                <? endwhile; endif;
                            wp_reset_postdata(); ?>

                            <!-- End Item Project -->
                        </ul>
                    </section>
                </div>
            </div>
        </div>
    </div>
</section>


<?php get_footer(); ?>
