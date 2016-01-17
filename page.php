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
                    $query = new WP_Query(array('type_post' => 'post', 'posts_per_page'=>3));
                    if ($query->have_posts()) :
                        while ($query->have_posts()) : $query->the_post(); ?>

                            <?php get_template_part('template-parts/content', 'page'); ?>
                        <? endwhile; endif; ?>
                    <!--TODO:сделать пагинацию - либо чере плагин wp_pagenavi либо самостоятельно-->
                    <?php if (function_exists('wp_pagenavi')) {
                        wp_pagenavi();
                    } ?>


                    <div id="pagination">
                        <span class="all">Page 1 of 3</span>
                        <span class="current">1</span>
                        <a href="#" class="inactive">2</a>
                        <a href="#" class="inactive">3</a>
                    </div>
                    <?php wp_reset_postdata(); ?>
                </div>
                <div class="col-lg-4">
                    <?php get_sidebar(); ?>
                </div>
            </div>
        </div>
    </section>

<?php
get_footer();
