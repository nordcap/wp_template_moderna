<?php
/**
 * The template for displaying archive pages.
 *
 * @link https://codex.wordpress.org/Template_Hierarchy
 *
 * @package moderna
 */

get_header();
get_template_part('template-parts/headline');

?>
    <section id="content">
        <div class="container">
            <div class="row">
                <div class="col-lg-8">

                    <?php
                    the_archive_title('<h2>', '</h2><hr/>');
                    the_archive_description('<div>', '</div>');
                    if (have_posts()) : ?>


                        <?php
                        /* Start the Loop */
                        while (have_posts()) : the_post();

                            /*
                             * Include the Post-Format-specific template for the content.
                             * If you want to override this in a child theme, then include a file
                             * called content-___.php (where ___ is the Post Format name) and that will be used instead.
                             */

                            get_template_part('template-parts/content', 'page');

                        endwhile;

                        if (function_exists('wp_pagenavi')) :
                            wp_pagenavi();
                        endif;

                    else :

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
