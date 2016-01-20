<?php
/**
 * The template for displaying search results pages.
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/#search-result
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
                    if (have_posts()) :
                         printf(esc_html__('Search Results for: %s', 'moderna'), '<span>' . get_search_query() . '</span>');

                        /* Start the Loop */
                        while (have_posts()) : the_post();
                            /**
                             * Run the loop for the search to output the results.
                             * If you want to overload this in a child theme then include a file
                             * called content-search.php and that will be used instead.
                             */

                            get_template_part('template-parts/content', 'page');
                        endwhile;

                        if (function_exists('wp_pagenavi')) :
                            wp_pagenavi();
                        endif;
                    else:

                        get_template_part('template-parts/content', 'none');

                    endif; ?>
                    ?>


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