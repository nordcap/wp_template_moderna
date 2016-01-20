<?php
/**
 * The template for displaying 404 pages (not found).
 *
 * @link https://codex.wordpress.org/Creating_an_Error_404_Page
 *
 * @package moderna
 */

get_header();
get_template_part('template-parts/headline'); ?>

    <section id="content">
        <div class="container">
            <div class="row">
                <div class="col-lg-8">
                    <h1><?php esc_html_e('Oops! That page can&rsquo;t be found.', 'moderna'); ?></h1>

                    <p><?php esc_html_e('It looks like nothing was found at this location. Maybe try one of the links below or a search?', 'moderna'); ?></p>
                    <?php get_search_form(); ?>
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
