<?php
/**
 * Template part for displaying page content in index.php.
 */ ?>


<section id="featured">
    <!-- start slider -->
    <div class="container">
        <div class="row">
            <div class="col-lg-12">
                <!-- Slider -->
                <div id="main-slider" class="flexslider">
                    <ul class="slides">
                        <li>
                            <img src="<?php echo get_template_directory_uri() ?>/img/slides/1.jpg" alt=""/>

                            <div class="flex-caption">
                                <h3>Modern Design</h3>

                                <p>Duis fermentum auctor ligula ac malesuada. Mauris et metus odio, in pulvinar urna</p>
                                <a href="#" class="btn btn-theme">Learn More</a>
                            </div>
                        </li>
                        <li>
                            <img src="<?php echo get_template_directory_uri() ?>/img/slides/2.jpg" alt=""/>

                            <div class="flex-caption">
                                <h3>Fully Responsive</h3>

                                <p>Sodales neque vitae justo sollicitudin aliquet sit amet diam curabitur sed
                                    fermentum.</p>
                                <a href="#" class="btn btn-theme">Learn More</a>
                            </div>
                        </li>
                        <li>
                            <img src="<?php echo get_template_directory_uri() ?>/img/slides/3.jpg" alt=""/>

                            <div class="flex-caption">
                                <h3>Clean & Fast</h3>

                                <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit donec mer lacinia.</p>
                                <a href="#" class="btn btn-theme">Learn More</a>
                            </div>
                        </li>
                    </ul>
                </div>
                <!-- end slider -->
            </div>
        </div>
    </div>


</section>
<section class="callaction">
    <div class="container">
        <div class="row">
            <div class="col-lg-12">
                <div class="big-cta">
                    <div class="cta-text">
<!--                        <h2><span>Moderna</span>HTML Business Template</h2>-->
                        <h2><span><?php esc_html_e('Moderna', 'moderna'); ?></span> <?php esc_html_e(' HTML Business Template','moderna');?></h2>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
<section id="content">
    <div class="container">
        <div class="row">
            <div class="col-lg-12">
                <div class="row">


                    <?php

                    $query = new WP_Query(array('post_type' => 'post_plus', 'order'=>'ASC'));
                    if ($query->have_posts()) :
                        while ($query->have_posts()) : $query->the_post(); ?>


                            <div class="col-lg-3">
                                <div class="box">
                                    <div class="box-gray aligncenter">
                                        <h4><?php the_title(); ?></h4>

                                        <div class="icon">
                                            <i class="fa <?php the_field('awesome_icon'); ?> fa-3x"></i>
                                        </div>
                                        <p>
                                            <?php the_excerpt(); ?>
                                        </p>

                                    </div>
                                    <div class="box-bottom">
                                        <!-- TODO: очевидно что ссылка будет вести на другую страницу или всплывающее окно. Но конкретно сказать трудно.-->
                                        <a href="<?php echo esc_url(home_url('/')); ?>"><?php esc_html_e('Learn more', 'moderna') ?></a>
                                    </div>
                                </div>
                            </div>
                        <? endwhile; endif;
                    wp_reset_postdata(); ?>

                </div>
            </div>
        </div>
        <!-- divider -->
        <div class="row">
            <div class="col-lg-12">
                <div class="solidline">
                </div>
            </div>
        </div>
        <!-- end divider -->
        <!-- Portfolio Projects -->
        <div class="row">
            <div class="col-lg-12">
                <h4 class="heading">Recent Works</h4>

                <div class="row">
                    <section id="projects">
                        <ul id="thumbs" class="portfolio">


                            <?php
                            $query = new WP_Query(array('post_type' => 'post_portfolio',  'posts_per_page'=>4));
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

                        </ul>
                    </section>
                </div>
            </div>
        </div>

    </div>
</section>


