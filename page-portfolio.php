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
                <ul class="portfolio-categ filter">
                    <li class="all active"><a href="#" title=""><?php esc_html_e('All','moderna')?></a></li>
                    <li class="web"><a href="#" title=""><?php esc_html_e('Web design','moderna')?></a></li>
                    <li class="icon"><a href="#" title=""><?php esc_html_e('Icons','moderna')?></a></li>
                    <li class="graphic"><a href="#" title=""><?php esc_html_e('Graphic design','moderna')?></a></li>
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
                                    <!-- TODO: Ошибка! При изменении ACF полей (id у select), данные связанные с ними не обновляются. -->
                                    <li class=" item-thumbs col-lg-3 <?php the_field('class_list'); ?>"
                                        data-id="<?php the_field('data-id'); ?>"
                                        data-type="<?php the_field('data-type'); ?>">

                                        <!-- Fancybox - Gallery Enabled - Title - Full Image -->
                                        <!-- TODO: Касательно картинки - the_field('image') идентично the_field('название поля')-->
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
