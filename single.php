<?php
/**
 * The template for displaying all single posts.
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/#single-post
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
                    while (have_posts()) : the_post();
                        echo '<h2>'.get_the_title().'</h2>';
                        the_content();


                        the_post_navigation( array(
                            'next_text' =>
                                '<span class="screen-reader-text">Следующая запись</span> ' .
                                '<span class="post-title">%title</span>',
                            'prev_text' =>
                                '<span class="screen-reader-text">Предыдущая запись</span> ' .
                                '<span class="post-title">%title</span>',
                        ) );

                        ?>


                        <?php
                        // If comments are open or we have at least one comment, load up the comment template.
                        if (comments_open() || get_comments_number()) :
                            comments_template();
                        endif;

                    endwhile; // End of the loop.
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
