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
                        while ($query->have_posts()) : $query->the_post();

                            get_template_part('template-parts/content', 'page');
                        endwhile;

                        if (function_exists('wp_pagenavi')) {
                            wp_pagenavi(array('query' => $query));
                        }

                        wp_reset_postdata();
                    else:

                        get_template_part('template-parts/content', 'none');

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

<?php
get_footer();
