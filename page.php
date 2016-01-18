<?php
/**
 * The template for displaying all pages.
 *
 * This is the template that displays all pages by default.
 * Please note that this is the WordPress construct of pages
 * and that other 'pages' on your WordPress site may use a
 * different template.
 *
 * @link https://codex.wordpress.org/Template_Hierarchy
 *
 * @package moderna
 */

get_header();
get_template_part('template-parts/headline'); ?>


    <section id="content">
        <div class="container">
            <div class="row">
                <div class="col-lg-8">
                    <?php
                    $paged = (get_query_var('paged')) ? get_query_var('paged') : 1;
                    $query = new WP_Query(array(
                        'type_post' => 'post',
                        'posts_per_page' => 4,
                        'paged' => $paged));

                    if ($query->have_posts()) :
                        while ($query->have_posts()) : $query->the_post(); ?>

                            <?php get_template_part('template-parts/content', 'page'); ?>
                        <? endwhile; endif; ?>

                    <?php if (function_exists('wp_pagenavi')) {
                        wp_pagenavi(array('query' => $query));
                    } ?>

                    <?php wp_reset_postdata(); ?>

                </div>
                <div class="col-lg-4">
                    <?php //get_sidebar(); ?>

                    <aside class="right-sidebar">

                        <?php get_sidebar('search'); ?>
                        <?php get_sidebar('categories'); ?>


                        <div class="widget">
                            <h5 class="widgetheading">Latest posts</h5>
                            <ul class="recent">
                                <li>
                                    <img src="img/dummies/blog/65x65/thumb1.jpg" class="pull-left" alt=""/>
                                    <h6><a href="#">Lorem ipsum dolor sit</a></h6>

                                    <p>
                                        Mazim alienum appellantur eu cu ullum officiis pro pri
                                    </p>
                                </li>
                                <li>
                                    <a href="#"><img src="img/dummies/blog/65x65/thumb2.jpg" class="pull-left" alt=""/></a>
                                    <h6><a href="#">Maiorum ponderum eum</a></h6>

                                    <p>
                                        Mazim alienum appellantur eu cu ullum officiis pro pri
                                    </p>
                                </li>
                                <li>
                                    <a href="#"><img src="img/dummies/blog/65x65/thumb3.jpg" class="pull-left" alt=""/></a>
                                    <h6><a href="#">Et mei iusto dolorum</a></h6>

                                    <p>
                                        Mazim alienum appellantur eu cu ullum officiis pro pri
                                    </p>
                                </li>
                            </ul>
                        </div>
                        <div class="widget">
                            <h5 class="widgetheading">Popular tags</h5>
                            <ul class="tags">
                                <li><a href="#">Web design</a></li>
                                <li><a href="#">Trends</a></li>
                                <li><a href="#">Technology</a></li>
                                <li><a href="#">Internet</a></li>
                                <li><a href="#">Tutorial</a></li>
                                <li><a href="#">Development</a></li>
                            </ul>
                        </div>
                    </aside>
                </div>
            </div>
        </div>
    </section>

<?php
get_footer();
